<?php

namespace Forum\Events\Admin;

use Forum\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ReputationModified extends Event
{
    use SerializesModels;

    public $userId;
    public $reputation;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($userId, $reputation)
    {
        $this->userId = $userId;
        $this->reputation = $reputation;
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
