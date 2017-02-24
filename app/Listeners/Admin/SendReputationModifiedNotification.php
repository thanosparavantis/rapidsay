<?php

namespace Forum\Listeners\Admin;

use Forum\Notification;
use Forum\Events\Admin\ReputationModified;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendReputationModifiedNotification
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
     * @param  ReputationModified  $event
     * @return void
     */
    public function handle(ReputationModified $event)
    {
        $userId = $event->userId;
        $reputation = $event->reputation;

        if ($reputation > 0)
        {
            Notification::create([
                'type' => 'reputation',
                'action' => 'increase',
                'data' => abs($reputation),
                'to_id' => $userId,
            ]);
        }
        else
        {
            Notification::create([
                'type' => 'reputation',
                'action' => 'decrease',
                'data' => abs($reputation),
                'to_id' => $userId,
            ]);
        }
    }
}
