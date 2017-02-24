<?php

namespace Forum\Listeners\Admin;

use Forum\Notification;
use Forum\Events\Topic\PostEdited;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPostEditNotification
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
     * @param  PostEdited  $event
     * @return void
     */
    public function handle(PostEdited $event)
    {
        $user = $event->user;
        $post = $event->post;

        if ($post->user_id != $user->id && $user->admin)
        {
            Notification::create([
                'type'      => 'post',
                'type_id'   => $post->id,
                'action'    => 'edit',
                'to_id'     => $post->user_id,
            ]);
        }
    }
}
