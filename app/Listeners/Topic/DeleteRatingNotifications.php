<?php

namespace Forum\Listeners\Topic;

use Forum\Events\Topic\RatingDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteRatingNotifications
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RatingDeleted  $event
     * @return void
     */
    public function handle(RatingDeleted $event)
    {
        $rating = $event->rating;
        $rating->rateable->user->notifications()->where('type', 'rating')->where('type_id', $rating->id)->each(function ($notification) {
            $notification->delete();
        });
    }
}
