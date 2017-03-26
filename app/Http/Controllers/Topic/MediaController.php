<?php

namespace Forum\Http\Controllers\Topic;

use Forum\Image;
use Forum\ModelHelper;
use Forum\Http\Requests;
use Forum\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Handles media.
 */
class MediaController extends Controller
{
    /**
     * Setup authentication middleware.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Called when an image is manually deleted.
     */
    public function deleteImage($type, $id, $url)
    {
        // Get the model.
        $item = ModelHelper::resolve($type, $id);

        // If authorized to edit.
        if ($this->authorize('edit', $item))
        {
            // Get existing image.
            $image = Image::where('url', $url)->firstOrFail();

            // Delete image.
            $image->delete();

            // Redirect back.
            return redirect()->back();
        }
    }
}
