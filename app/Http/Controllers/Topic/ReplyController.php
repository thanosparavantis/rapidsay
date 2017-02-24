<?php

namespace Forum\Http\Controllers\Topic;

use Auth;
use Forum\Events\Topic\ReplyCreated;
use Forum\Events\Topic\ReplyEdited;
use Forum\Events\Topic\ReplyDeleted;
use Forum\ModelHelper;
use Forum\Comment;
use Forum\Reply;
use Forum\Traits\UploadsImages;
use Forum\Http\Requests\Topic\ReplyRequest;
use Forum\Http\Requests\Topic\ReplyEditRequest;
use Forum\Http\Controllers\Controller;

/**
 * Handles reply creation, editing and deletion.
 */
class ReplyController extends TopicController
{
    use UploadsImages; // This controller can upload images.

    /**
     * Setup authentication middleware.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the reply page for a comment or another reply.
     */
    public function show($type, $id)
    {
        // Get the item to reply to.
        $item = ModelHelper::resolve($type, $id);

        // The the original post.
        $post = isset($item->post) ? $item->post : $item->comment->post;

        // Get the comment paginator.
        $comments = $post->getCommentPaginator();

        // Show the post with the reply form.
        return view('topic.view', ['post' => $post, 'comments' => $comments, 'replyType' => $type, 'replyId' => $id]);
    }

    /**
     * Called when a reply is submitted for creation.
     */
    public function reply(ReplyRequest $request, $type, $id)
    {
        // Get the item to reply to.
        $item = ModelHelper::resolve($type, $id);

        // Get the original comment.
        $comment = isset($item->comment) ? $item->comment : $item;
        $reply = $this->createReply($request, $comment);

        return $reply->redirect();
    }

    private function createReply(ReplyRequest $request, Comment $comment)
    {
        // Create the new reply.
        $reply = new Reply([
            'user_id' => auth()->user()->id,
            'body' => $request->reply_body,
        ]);

        // Associate the new reply with the comment.
        $comment->replies()->save($reply);

        // Upload any attached images.
        $this->uploadImage($request, 'reply_image', $reply);

        // Fire the reply created event.
        event(new ReplyCreated($reply));

        // Return the object of the new reply.
        return $reply;
    }

    /**
     * Called when a reply needs to be edited.
     */
    public function showEdit($id)
    {
        // Get the reply from id.
        $reply = Reply::findOrFail($id);

        // Get the post from the reply.
        $post = $reply->comment->post;

        // Get the comment paginator.
        $comments = $post->getCommentPaginator();

        // If authorized render the edit page.
        if ($this->authorize('edit', $reply)) {
            return view('topic.view', ['post' => $post, 'comments' => $comments, 'editType' => $reply->getType(), 'editId' => $reply->id]);
        }
    }

    /**
     * Called when a reply is submitted for editing.
     */
    public function edit(ReplyEditRequest $request, $id)
    {
        // Get the reply from id.
        $reply = Reply::findOrFail($id);

        // If the request body isn't the same, update the reply body.
        if ($reply->body != $request->reply_edit_body)
        {
            // Update reply.
            $reply->body = $request->reply_edit_body;
            $reply->update();

            // Fire reply edited event.
            event(new ReplyEdited(auth()->user(), $reply));
        }

        // If there are no pre-existing images, upload any attached ones.
        if (!$reply->images()->count()) {
            $this->uploadImage($request, 'reply_edit_image', $reply, true);
        }

        // Redirect back to the reply.
        return $reply->redirect();
    }

    /**
     * Called when a reply is submitted for deletion.
     */
    public function delete($id)
    {
        // Get the reply from id.
        $reply = Reply::findOrFail($id);

        // Get the comment from id.
        $comment = $reply->comment;

        // Check if authorized.
        if ($this->authorize('delete', $reply))
        {
            // Fire reply deleted event.
            event(new ReplyDeleted(auth()->user(), $reply));

            // Delete all reply images.
            $this->deleteReplyImages($reply);

            // Delete all reply ratings.
            $this->deleteReplyRatings($reply);

            // Delete the reply.
            $reply->delete();

            // Redirect back with reply deletion success.
            return $comment->redirect()->with('success', trans('reply.message.deleted'));
        }
    }

    /**
     * Deletes all images (if any) of a reply.
     */
    private function deleteReplyImages(Reply $reply)
    {
        $reply->images()->each(function ($image) {
            $image->delete();
        });
    }

    /**
     * Deletes all ratings (if any) of a reply.
     */
    private function deleteReplyRatings(Reply $reply)
    {
        $reply->ratings->each(function ($rating) {
            $rating->delete();
        });
    }
}
