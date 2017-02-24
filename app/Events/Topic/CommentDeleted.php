<?php

namespace Forum\Events\Topic;

use Forum\User;
use Forum\Comment;
use Forum\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CommentDeleted extends Event
{
    use SerializesModels;

    public $user, $comment;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, Comment $comment)
    {
        $this->user = $user;
        $this->comment = $comment;
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
