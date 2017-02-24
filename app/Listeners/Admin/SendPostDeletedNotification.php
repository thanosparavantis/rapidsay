<?php

namespace Forum\Listeners\Admin;

use Forum\Notification;
use Forum\Events\Topic\PostDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPostDeletedNotification
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
     * @param  PostDeleted  $event
     * @return void
     */
    public function handle(PostDeleted $event)
    {
        $user = $event->user;
        $post = $event->post;

        if ($post->user_id != $user->id && $user->admin)
        {
            Notification::create([
                'type'          => 'post',
                'action'        => 'delete',
                'to_id'         => $post->user_id,
                'deleted_data'  => $post->body,
            ]);
        }
    }
}
