<?php

namespace Forum\Listeners\User;

use Forum\Notification;
use Forum\Events\User\UserDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteUserNotifications
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
     * @param  UserDeleted  $event
     * @return void
     */
    public function handle(UserDeleted $event)
    {
        $user = $event->user;

        Notification::where('from_id', $user->id)->orWhere('to_id', $user->id)->each(function ($notification) {
            $notification->delete();
        });
    }
}
