<?php

namespace Forum\Listeners\Admin;

use Forum\Notification;
use Forum\Events\Topic\CommentEdited;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCommentEditNotification
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
    public function handle(CommentEdited $event)
    {
        $user = $event->user;
        $comment = $event->comment;

        if ($comment->user_id != $user->id && $user->admin)
        {
            Notification::create([
                'type'      => 'comment',
                'type_id'   => $comment->id,
                'action'    => 'edit',
                'to_id'     => $comment->user_id,
            ]);
        }
    }
}
