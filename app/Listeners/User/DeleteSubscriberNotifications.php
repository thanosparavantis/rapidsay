<?php

namespace Forum\Listeners\User;

use Forum\Notification;
use Forum\Events\User\Unsubscribed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteSubscriberNotifications
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
     * @param  Unsubscribed  $event
     * @return void
     */
    public function handle(Unsubscribed $event)
    {
        $subscriber = $event->subscriber;
        $subscription = $event->subscription;
        $subscription->notifications()->where('type', 'subscriber')->where('from_id', $subscriber->id)->delete();
    }
}
