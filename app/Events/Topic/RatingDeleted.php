<?php

namespace Forum\Events\Topic;

use Forum\User;
use Forum\Rating;
use Forum\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class RatingDeleted extends Event
{
    use SerializesModels;

    public $user, $rating;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, Rating $rating)
    {
        $this->user = $user;
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
