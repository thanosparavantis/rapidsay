<?php

namespace Forum\Listeners\Admin;

use Forum\Notification;
use Forum\Events\Topic\ReplyDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendReplyDeletedNotification
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
     * @param  ReplyDeleted  $event
     * @return void
     */
    public function handle(ReplyDeleted $event)
    {
        $user = $event->user;
        $reply = $event->reply;

        if ($reply->user_id != $user->id && $user->admin)
        {
            Notification::create([
                'type'          => 'reply',
                'action'        => 'delete',
                'to_id'         => $reply->user_id,
                'deleted_data'  => $reply->body,
            ]);
        }
    }
}
