<?php

namespace Forum\Events\Topic;

use Forum\User;
use Forum\Reply;
use Forum\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ReplyEdited extends Event
{
    use SerializesModels;

    public $user, $reply;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, Reply $reply)
    {
        $this->user = $user;
        $this->reply = $reply;
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
