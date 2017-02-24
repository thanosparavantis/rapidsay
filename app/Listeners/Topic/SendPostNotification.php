<?php

namespace Forum\Listeners\Topic;

use Forum\Notification;
use Forum\Events\Topic\PostCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPostNotification
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
     * @param  PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        $post = $event->post;

        $post->user->subscribers->each(function ($subscriber) use ($post) {
            Notification::create([
                'type'      => 'post',
                'type_id'   => $post->id,
                'action'    => 'create',
                'from_id'   => $post->user_id,
                'to_id'     => $subscriber->id,
            ]);
        });
    }
}
