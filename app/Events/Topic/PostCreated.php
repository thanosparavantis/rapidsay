<?php

namespace Forum\Events\Topic;

use Forum\Post;
use Forum\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PostCreated extends Event
{
    use SerializesModels;

    public $post;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
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
