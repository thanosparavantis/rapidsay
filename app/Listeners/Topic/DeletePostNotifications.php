<?php

namespace Forum\Listeners\Topic;

use Forum\Notification;
use Forum\Events\Topic\PostDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeletePostNotifications
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
        $post = $event->post;

        Notification::where('type', 'post')->where('type_id', $post->id)->each(function ($notification) {
            $notification->delete();
        });

        $post->comments->each(function ($comment) {
            Notification::where('type', 'comment')->where('type_id', $comment->id)->each(function ($notification) {
                $notification->delete();
            });

            $comment->ratings->each(function ($rating) {
                Notification::where('type', 'rating')->where('type_id', $rating->id)->each(function ($notification) {
                    $notification->delete();
                });
            });

            $comment->replies->each(function ($reply) {
                Notification::where('type', 'reply')->where('type_id', $reply->id)->each(function ($notification) {
                    $notification->delete();
                });

                $reply->ratings->each(function ($rating) {
                    Notification::where('type', 'rating')->where('type_id', $rating->id)->each(function ($notification) {
                        $notification->delete();
                    });
                });
            });
        });

        $post->ratings->each(function ($rating) {
            Notification::where('type', 'rating')->where('type_id', $rating->id)->each(function ($notification) {
                $notification->delete();
            });
        });
    }
}
