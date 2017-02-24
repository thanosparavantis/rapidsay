<?php

namespace Forum\Listeners\Admin;

use Forum\Notification;
use Forum\Events\Topic\CommentDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCommentDeletedNotification
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
     * @param  CommentDeleted  $event
     * @return void
     */
    public function handle(CommentDeleted $event)
    {
        $user = $event->user;
        $comment = $event->comment;

        if ($comment->user_id != $user->id && $user->admin)
        {
            Notification::create([
                'type'          => 'comment',
                'action'        => 'delete',
                'to_id'         => $comment->user_id,
                'deleted_data'  => $comment->body,
            ]);
        }
    }
}
