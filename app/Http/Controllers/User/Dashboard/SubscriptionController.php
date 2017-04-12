<?php

namespace Forum\Http\Controllers\User\Dashboard;

use Auth;
use Forum\Events\User\Subscribed;
use Forum\Events\User\Unsubscribed;
use Forum\User;
use Forum\Subscription;
use Forum\Notification;
use Illuminate\Http\Request;
use Forum\Http\Requests\User\SubscribeRequest;
use Forum\Http\Controllers\Controller;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        if (request()->ajax())
        {
            $subscriptions = auth()->user()->getSubscriptionPaginator();

            return response()->json([
                'html' => view('user.partials.subscription.content', ['subscriptions' => $subscriptions])->render(),
                'end' => !$subscriptions->hasMorePages(),
            ]);
        }
        else
        {
            return view('user.dashboard.subscriptions');
        }
    }

    public function subscribe(SubscribeRequest $request, $userId)
    {
        $user = auth()->user();
        $targetUser = User::findOrFail($userId);

        if ($user->subscriptions->contains($targetUser))
        {
            $user->subscriptions()->detach($targetUser);
            event(new Unsubscribed($user, $targetUser));
        }
        else
        {
            $user->subscriptions()->attach($targetUser);
            event(new Subscribed($user, $targetUser));
        }

        return response()->json([
            'html' => view('user.partials.subscription.button', ['user' => $targetUser])->render(),
        ]);
    }
}
