<?php

namespace Forum\Events\User;

use Forum\User;
use Forum\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Unsubscribed extends Event
{
    use SerializesModels;

    public $subscriber, $subscription;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $subscriber, User $subscription)
    {
        $this->subscriber = $subscriber;
        $this->subscription = $subscription;
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
