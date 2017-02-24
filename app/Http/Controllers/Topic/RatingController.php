<?php

namespace Forum\Http\Controllers\Topic;

use Auth;
use Forum\ModelHelper;
use Forum\Rating;
use Forum\Events\Topic\RatingCreated;
use Forum\Events\Topic\RatingDeleted;
use Forum\Http\Controllers\Controller;
use Forum\Http\Requests\Topic\RateRequest;

/**
 * Handles all content ratings.
 */
class RatingController extends TopicController
{
    /**
     * Setup authentication middleware.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Called when a post, comment or reply is rated.
     */
    public function rate(RateRequest $request, $type, $id)
    {
        // Get the model.
        $item = ModelHelper::resolve($type, $id);

        // Get authenticated user.
        $user = auth()->user();

        //Get rating model.
        $rating = $user->ratings()->where('rateable_type', get_class($item))->where('rateable_id', $id)->first();

        // If rating exists, remove it.
        if ($rating)
        {
            // Fire rating deleted event.
            event(new RatingDeleted(auth()->user(), $rating));

            // Delete rating.
            $rating->delete();
        }
        // If rating doesn't exist, add a new one.
        else
        {
            // Create a new rating model.
            $rating = new Rating(['user_id' => $user->id]);

            // If the user is rating his own content, mark rating as own.
            if ($item->user_id == $user->id) {
                $rating->own = true;
            }

            // Save rating on item.
            $item->ratings()->save($rating);

            // Fire rating created event.
            event(new RatingCreated($rating));
        }

        // JSON response.
        return response()->json([
            'html' => view('topic.partials.rating', [
                'item' => $item,
            ])->render(),
        ]);
    }
}
