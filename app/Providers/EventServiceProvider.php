<?php

namespace Forum\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Illuminate\Auth\Events\Login' => [
            'Forum\Listeners\Auth\ToggleOnlineStatus',
        ],
        'Illuminate\Auth\Events\Logout' => [
            'Forum\Listeners\Auth\ToggleOfflineStatus',
        ],
        'Forum\Events\Topic\PostCreated' => [
            'Forum\Listeners\Topic\SendPostNotification',
        ],
        'Forum\Events\Topic\CommentCreated' => [
            'Forum\Listeners\Topic\SendCommentNotification',
        ],
        'Forum\Events\Topic\ReplyCreated' => [
            'Forum\Listeners\Topic\SendReplyNotification',
        ],
        'Forum\Events\Topic\RatingCreated' => [
            'Forum\Listeners\Topic\SendRatingNotification',
        ],

        'Forum\Events\Topic\PostEdited' => [
            'Forum\Listeners\Admin\SendPostEditNotification',
        ],
        'Forum\Events\Topic\CommentEdited' => [
            'Forum\Listeners\Admin\SendCommentEditNotification',
        ],
        'Forum\Events\Topic\ReplyEdited' => [
            'Forum\Listeners\Admin\SendReplyEditNotification',
        ],

        'Forum\Events\Topic\PostDeleted' => [
            'Forum\Listeners\Admin\SendPostDeletedNotification',
            'Forum\Listeners\Topic\DeletePostNotifications',
        ],
        'Forum\Events\Topic\CommentDeleted' => [
            'Forum\Listeners\Admin\SendCommentDeletedNotification',
            'Forum\Listeners\Topic\DeleteCommentNotifications',
        ],
        'Forum\Events\Topic\ReplyDeleted' => [
            'Forum\Listeners\Admin\SendReplyDeletedNotification',
            'Forum\Listeners\Topic\DeleteReplyNotifications',
        ],
        'Forum\Events\Topic\RatingDeleted' => [
            'Forum\Listeners\Topic\DeleteRatingNotifications',
        ],

        'Forum\Events\User\Subscribed' => [
            'Forum\Listeners\User\SendSubscriberNotification',
        ],
        'Forum\Events\User\Unsubscribed' => [
            'Forum\Listeners\User\DeleteSubscriberNotifications',
        ],

        'Forum\Events\Admin\ReportAccepted' => [
            'Forum\Listeners\Admin\SendReportAcceptedNotification',
        ],
        'Forum\Events\Admin\ReportDenied' => [
            'Forum\Listeners\Admin\SendReportDeniedNotification',
        ],

        'Forum\Events\Admin\ReputationModified' => [
            'Forum\Listeners\Admin\SendReputationModifiedNotification',
        ],
    ];

    protected $subscribe = [
        'Forum\Listeners\Topic\AcceptReports',
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
