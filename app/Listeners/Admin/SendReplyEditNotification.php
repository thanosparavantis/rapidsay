<?php

namespace Forum\Listeners\Admin;

use Forum\Notification;
use Forum\Events\Topic\ReplyEdited;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendReplyEditNotification
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
    public function handle(ReplyEdited $event)
    {
        $user = $event->user;
        $reply = $event->reply;

        if ($reply->user_id != $user->id && $user->admin)
        {
            Notification::create([
                'type'      => 'reply',
                'type_id'   => $reply->id,
                'action'    => 'edit',
                'to_id'     => $reply->user_id,
            ]);
        }
    }
}
