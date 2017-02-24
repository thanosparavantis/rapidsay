<?php

namespace Forum\Listeners\Topic;

use Forum\Notification;
use Forum\Events\Topic\ReplyDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteReplyNotifications
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
        $reply = $event->reply;

        Notification::where('type', 'reply')->where('type_id', $reply->id)->each(function ($notification) {
            $notification->delete();
        });

        $reply->ratings->each(function ($rating) {
            Notification::where('type', 'rating')->where('type_id', $rating->id)->each(function ($notification) {
                $notification->delete();
            });
        });
    }
}
