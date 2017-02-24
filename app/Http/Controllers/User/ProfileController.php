<?php

namespace Forum\Http\Controllers\User;

use Auth;
use Forum\User;
use Forum\Http\Requests;
use Forum\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function show($username)
    {
        $user = User::where('username', $username)->firstOrFail();

        if (request()->ajax())
        {
            $activity = $user->getActivityPaginator();

            return response()->json([
                'html' => view('user.partials.profile.activity', ['activity' => $activity])->render(),
                'end' => !$activity->hasMorePages(),
            ]);
        }
        else
        {
            if ($user->banned && (!auth()->check() || !auth()->user()->admin)) {
                return redirect()->back()->with('warning', trans('user.profile.banned', ['name' => $user->fullName()]));
            }

            return view('user.profile', ['user' => $user]);
        }
    }
}
