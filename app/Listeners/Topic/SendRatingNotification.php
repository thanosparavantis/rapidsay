<?php

namespace Forum\Listeners\Topic;

use Forum\Notification;
use Forum\Events\Topic\RatingCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendRatingNotification
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
     * @param  RatingCreated  $event
     * @return void
     */
    public function handle(RatingCreated $event)
    {
        $rating = $event->rating;

        if ($rating->user_id != $rating->rateable->user_id)
        {
            Notification::create([
                'type'      => 'rating',
                'type_id'   => $rating->id,
                'action'    => 'create',
                'from_id'   => $rating->user_id,
                'to_id'     => $rating->rateable->user_id,
            ]);
        }
    }
}
