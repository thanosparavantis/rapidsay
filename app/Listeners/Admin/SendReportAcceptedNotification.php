<?php

namespace Forum\Listeners\Admin;

use Forum\Notification;
use Forum\Events\Admin\ReportAccepted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendReportAcceptedNotification
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
     * @param  ReportAccepted  $event
     * @return void
     */
    public function handle(ReportAccepted $event)
    {
        $report = $event->report;

        Notification::create([
            'type' => 'report',
            'type_id' => $report->id,
            'action' => 'accept',
            'to_id' => $report->reporter_id,
        ]);
    }
}
