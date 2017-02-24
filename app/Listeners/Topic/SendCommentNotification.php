<?php

namespace Forum\Listeners\Topic;

use Forum\Notification;
use Forum\Events\Topic\CommentCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCommentNotification
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
     * @param  CommentCreated  $event
     * @return void
     */
    public function handle(CommentCreated $event)
    {
        $comment = $event->comment;

        if ($comment->user_id != $comment->post->user_id) {
            Notification::create([
                'type'      => 'comment',
                'type_id'   => $comment->id,
                'action'    => 'create',
                'from_id'   => $comment->user_id,
                'to_id'     => $comment->post->user_id,
            ]);
        }
    }
}
