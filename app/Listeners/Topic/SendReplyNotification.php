<?php

namespace Forum\Listeners\Topic;

use Forum\Notification;
use Forum\Events\Topic\ReplyCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendReplyNotification
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
     * @param  ReplyCreated  $event
     * @return void
     */
    public function handle(ReplyCreated $event)
    {
        $reply = $event->reply;
        $replies = $reply->comment->replies;

        if ($reply->user_id != $reply->comment->user_id)
        {
            Notification::create([
                'type'      => 'reply',
                'type_id'   => $reply->id,
                'action'    => 'create',
                'from_id'   => $reply->user_id,
                'to_id'     => $reply->comment->user_id,
            ]);
        }

        if ($replies->count() - 1 > 0)
        {
            $previous = $replies->get($replies->count() - 2);

            if ($previous && $reply->user_id != $previous->user_id && $previous->user_id != $reply->comment->user_id)
            {
                Notification::create([
                    'type'      => 'reply',
                    'type_id'   => $reply->id,
                    'action'    => 'create',
                    'from_id'   => $reply->user_id,
                    'to_id'     => $previous->user_id,
                ]);
            }
        }
    }
}
