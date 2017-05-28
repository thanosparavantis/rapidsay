<?php

namespace Forum\Http\Controllers\Topic;

use Forum\Post;
use Forum\Traits\UploadsImages;
use Forum\Http\Requests\Topic\PostRequest;
use Forum\Http\Requests\Topic\PostEditRequest;
use Forum\Events\Topic\PostCreated;
use Forum\Events\Topic\PostEdited;
use Forum\Http\Controllers\Controller;

/**
 * Handles post creation, editing and deletion.
 */
class PostController extends Controller
{
    use UploadsImages; // This controller can upload images.

    /**
     * Setup authentication middleware.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
    }

    /**
     * Called when a post needs to be shown.
     */
    public function show($id)
    {
        // Get the post from id.
        if (is_numeric($id))
        {
            $post = Post::findOrFail($id);
        }
        // For compatibility, get post from slug.
        else
        {
            $post = Post::where('slug', $id)->firstOrFail();
            return redirect()->route('view-post', $post->id);
        }

        // Return view with the post and comments.
        return view('topic.view', ['post' => $post]);
    }

    /**
     * Called when a post is submitted for creation.
     */
    public function create(PostRequest $request)
    {
        // Create and return the object of the new post.
        $post = $this->createNewPost($request);

        // View the newly created post.
        return $post->redirect();
    }

    /**
     * Creates a new post from a request.
     */
    private function createNewPost(PostRequest $request)
    {
        $post = Post::create([
            'user_id'       => auth()->user()->id,
            'body'          => $request->body,
        ]);

        // Upload attached images, redirect back if > 10.
        if (!$this->uploadImages($request, 'images', $post)) {
            return $this->redirectBackWithImagesError($request);
        }

        // Fire post creation event.
        event(new PostCreated($post));

        // Return the object of the new post.
        return $post;
    }

    /**
     * Called when a post needs to be edited.
     */
    public function showEdit($id)
    {
        // Get the post from id.
        $post = Post::findOrFail($id);

        // If authorized render the edit page.
        if ($this->authorize('edit', $post)) {
            return view('topic.view', ['post' => $post, 'editType' => $post->getType(), 'editId' => $post->id]);
        }
    }

    /**
     * Called when a post is submitted for editing.
     */
    public function edit(PostEditRequest $request, $id)
    {
        // Get the post from id.
        $post = Post::findOrFail($id);

        // If the request body isn't the same, update the post body.
        if ($post->body != $request->post_edit_body)
            $post->body = $request->post_edit_body;

        // If there are images attached, upload them and redirect in case of errors.
        if ($request->hasFile('post_edit_images') && ($post->images()->count() + count($request->file('post_edit_images')) > 10 || !$this->uploadImages($request, 'post_edit_images', $post, true))) {
            return $this->redirectBackWithImagesError($request, true);
        }

        // If the post is modified.
        if ($post->isDirty())
        {
            // Update the post in the database.
            $post->update();

            // Fire post edit event.
            event(new PostEdited(auth()->user(), $post));

            // Redirect back with success.
            return $post->redirect()->with('success', trans('post.message.edited'));
        }

        // If no changes were made, simply redirect to the post.
        return $post->redirect();
    }

    /**
     * Redirects back with image errors and preserves old data.
     */
    private function redirectBackWithImagesError($request, $edit = false)
    {
        // Old body data.
        $body = $request->body;
        $bodyField = "body";

        // If editing.
        if ($edit)
        {
            // Old body data from editing.
            $body = $request->edit_body;
            $bodyField = "edit_" . $bodyField;
        }

        // Redirect back with image limit error and with old field data.
        return redirect()->back()->with('warning', trans('post.message.image-limit'))->withInput([$bodyField => $body]);
    }

    /**
     * Called when a post is submitted for deletion.
     */
    public function delete($id)
    {
        // Get the post from id.
        $post = Post::findOrFail($id);

        // Check if authorized.
        if ($this->authorize('delete', $post))
        {
            // Delete the post.
            $post->delete(auth()->user());

            // Redirect with post deletion success.
            return $this->redirectHomeWithDeletionSuccess();
        }
    }

    /**
     * Redirects to home with post deletion success.
     */
    private function redirectHomeWithDeletionSuccess()
    {
        return redirect()->route('home')->with('success', trans('post.message.deleted'));
    }
}
