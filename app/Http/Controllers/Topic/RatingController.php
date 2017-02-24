<?php

namespace Forum\Http\Controllers\Topic;

use Auth;
use Forum\Events\Topic\RatingCreated;
use Forum\Events\Topic\RatingDeleted;
use Forum\Post;
use Forum\Comment;
use Forum\Reply;
use Forum\Rating;
use Forum\ModelHelper;
use Forum\Http\Controllers\Controller;
use Forum\Http\Requests\Topic\RateRequest;

class RatingController extends TopicController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function rate(RateRequest $request, $type, $id)
    {
        $item = ModelHelper::resolve($type, $id);
        $user = auth()->user();
        $rating = $user->ratings()->where('rateable_type', get_class($item))->where('rateable_id', $id)->first();

        if ($rating)
        {
            event(new RatingDeleted(auth()->user(), $rating));
            $rating->delete();
        }
        else
        {
            $rating = new Rating(['user_id' => $user->id]);

            if ($item->user_id == $user->id) {
                $rating->own = true;
            }

            $item->ratings()->save($rating);
            event(new RatingCreated($rating));
        }

        return response()->json([
            'html' => view('topic.partials.rating', ['item' => $item])->render(),
        ]);
    }
}
