<?php

namespace Forum\Http\Controllers\Admin;

use Cache;
use Carbon\Carbon;
use Forum\User;
use Forum\Post;
use Forum\Image;
use Forum\Rating;
use Forum\Report;
use Forum\Http\Requests\Admin\AnnounceRequest;
use Forum\Http\Requests\Admin\RemoveAnnouncementRequest;
use Forum\Events\Admin\ReportDenied;
use Forum\Http\Requests\Admin\DenyReportRequest;
use Forum\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function show()
    {
        return view('admin.dashboard', [
            'userCount'     => User::count(),
            'postCount'     => Post::count(),
            'imageCount'    => Image::count(),
            'ratingCount'   => Rating::count(),
            'reports'       => Report::pendingPaginator(),
        ]);
    }

    public function announce(AnnounceRequest $request)
    {
        $key = $request->announcement_key;
        $expiresAt = Carbon::now()->addDays(3);
        Cache::put('announcement', $key, $expiresAt);

        User::each(function ($user) {
            $user->resetAnnouncement();
        });

        return redirect()->route('admin-dashboard')->with('success', trans('admin.announcement.create'));
    }

    public function removeAnnouncement(RemoveAnnouncementRequest $request)
    {
        Cache::forget('announcement');

        User::each(function ($user) {
            $user->resetAnnouncement();
        });

        return redirect()->route('admin-dashboard')->with('success', trans('admin.announcement.delete'));
    }

    public function denyReport(DenyReportRequest $request, $id)
    {
        $report = Report::findOrFail($id);
        $report->status = 'denied';
        $report->save();
        event(new ReportDenied($report));
        return redirect()->route('admin-dashboard');
    }
}
