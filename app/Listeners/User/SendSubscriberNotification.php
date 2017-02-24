<?php

namespace Forum\Listeners\User;

use Forum\Notification;
use Forum\Events\User\Subscribed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendSubscriberNotification
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
     * @param  Subscribed  $event
     * @return void
     */
    public function handle(Subscribed $event)
    {
        $subscriber = $event->subscriber;
        $subscription = $event->subscription;

        Notification::create([
            'type'      => 'subscriber',
            'type_id'   => $subscription->id,
            'action'    => 'create',
            'from_id'   => $subscriber->id,
            'to_id'     => $subscription->id,
        ]);
    }
}
