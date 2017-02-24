<?php

namespace Forum\Events\Topic;

use Forum\Rating;
use Forum\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class RatingCreated extends Event
{
    use SerializesModels;

    public $rating;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Rating $rating)
    {
        $this->rating = $rating;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
