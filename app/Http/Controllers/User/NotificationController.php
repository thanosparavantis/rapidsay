<?php

namespace Forum\Http\Controllers\User;

use Auth;
use Carbon;
use Forum\Post;
use Forum\Notification;
use Illuminate\Http\Request;
use Forum\Http\Requests\User\CloseAnnouncement;
use Forum\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        if (request()->ajax())
        {
            $user = auth()->user();
            $notifications = $user->getNotificationPaginator();
            $unread = $user->getUnreadNotifications();
            $user->seeNotifications();

            return response()->json([
                'html' => view('user.partials.notification.content', ['notifications' => $notifications, 'unread' => $unread])->render(),
                'end' => !$notifications->hasMorePages(),
            ]);
        }
        else
        {
            return view('user.notifications');
        }
    }

    public function update(Request $request)
    {
        return response()->json([
            'unseen' => auth()->user()->getUnreadNotificationCount(),
        ]);
    }
}
