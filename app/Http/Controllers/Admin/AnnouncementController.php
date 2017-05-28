<?php

namespace Forum\Http\Controllers\Admin;

use Cache;
use Carbon\Carbon;
use Forum\User;
use Forum\Http\Requests\Admin\AnnounceRequest;
use Forum\Http\Requests\Admin\RemoveAnnouncementRequest;
use Illuminate\Http\Request;
use Forum\Http\Requests;
use Forum\Http\Controllers\Controller;

class AnnouncementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function show()
    {
        return view('user.dashboard.announcement');
    }

    public function update(AnnounceRequest $request)
    {
        $key = $request->announcement_key;
        $expiresAt = Carbon::now()->addDays(3);
        Cache::put('announcement', $key, $expiresAt);

        User::each(function ($user) {
            $user->resetAnnouncement();
        });

        return redirect()->route('announcement')->with('success', trans('user.dashboard.message.announcement-added'));
    }

    public function remove(RemoveAnnouncementRequest $request)
    {
        Cache::forget('announcement');

        User::each(function ($user) {
            $user->resetAnnouncement();
        });

        return redirect()->route('announcement')->with('success', trans('user.dashboard.message.announcement-removed'));
    }
}
