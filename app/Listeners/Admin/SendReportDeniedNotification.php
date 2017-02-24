<?php

namespace Forum\Listeners\Admin;

use Forum\Notification;
use Forum\Events\Admin\ReportDenied;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendReportDeniedNotification
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
     * @param  ReportDenied  $event
     * @return void
     */
    public function handle(ReportDenied $event)
    {
        $report = $event->report;

        Notification::create([
            'type' => 'report',
            'type_id' => $report->id,
            'action' => 'deny',
            'to_id' => $report->reporter_id,
        ]);
    }
}
