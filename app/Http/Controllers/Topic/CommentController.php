<?php

namespace Forum\Http\Controllers\Topic;

use Auth;
use Forum\Events\Topic\CommentCreated;
use Forum\Events\Topic\CommentEdited;
use Forum\Post;
use Forum\Comment;
use Forum\Traits\UploadsImages;
use Forum\Http\Requests\Topic\CommentRequest;
use Forum\Http\Requests\Topic\CommentEditRequest;
use Forum\Http\Controllers\Controller;

/**
 * Handles comment creation, editing and deletion.
 */
class CommentController extends Controller
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
     * Called when a comment is submitted for creation.
     */
    public function comment(CommentRequest $request, $postId)
    {
        // Get post from id.
        $post = Post::findOrFail($postId);

        // Create and return the object of the new comment.
        $comment = $this->createComment($request, $post);

        // View the newly created comment.
        return $comment->redirect();
    }

    /**
     * Creates a new comment from a request.
     */
    private function createComment(CommentRequest $request, Post $post)
    {
        // Create new comment.
        $comment = new Comment([
            'user_id' => auth()->user()->id,
            'body' => $request->comment_body,
        ]);

        // Associate the new comment with the post.
        $post->comments()->save($comment);

        // Upload any attached images.
        $this->uploadImage($request, 'comment_image', $comment);

        // Fire comment created event.
        event(new CommentCreated($comment));

        // Return the object of the new comment.
        return $comment;
    }

    /**
     * Called when a comment needs to be edited.
     */
    public function showEdit($id)
    {
        // Get the comment from id.
        $comment = Comment::findOrFail($id);

        // Get the post from the comment.
        $post = $comment->post;

        // Get comment paginator.
        $comments = $post->getCommentPaginator();

        // If authorized render the edit page.
        if ($this->authorize('edit', $comment)) {
            return view('topic.view', ['post' => $comment->post, 'comments' => $comments, 'editType' => $comment->getType(), 'editId' => $comment->id]);
        }
    }

    /**
     * Called when a comment is submitted for editing.
     */
    public function edit(CommentEditRequest $request, $id)
    {
        // Get the comment from id.
        $comment = Comment::findOrFail($id);

        // If the request body isn't the same, update the comment body.
        if ($comment->body != $request->comment_edit_body)
        {
            // Update comment.
            $comment->body = $request->comment_edit_body;
            $comment->update();

            // Fire comment edited event.
            event(new CommentEdited(auth()->user(), $comment));
        }

        // If there are no pre-existing images, upload any attached ones.
        if (!$comment->images()->count()) {
            $this->uploadImage($request, 'comment_edit_image', $comment, true);
        }

        // Redirect back to the comment.
        return $comment->redirect();
    }

    /**
     * Called when a comment is submitted for deletion.
     */
    public function delete($id)
    {
        // Get the comment from id.
        $comment = Comment::findOrFail($id);

        // Get the post from the comment.
        $post = $comment->post;

        // Check if authorized.
        if ($this->authorize('delete', $comment))
        {
            // Delete the comment.
            $comment->delete(auth()->user());

            // Redirect back with comment deletion success.
            return $post->redirect()->with('success', trans('comment.message.deleted'));
        }
    }
}
