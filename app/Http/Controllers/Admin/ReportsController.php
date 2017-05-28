<?php

namespace Forum\Http\Controllers\Admin;

use Forum\Report;
use Forum\Events\Admin\ReportDenied;
use Forum\Http\Requests\Admin\DenyReportRequest;
use Illuminate\Http\Request;
use Forum\Http\Requests;
use Forum\Http\Controllers\Controller;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function show()
    {
        if (request()->ajax())
        {
            $reports = Report::pendingPaginator();

            return response()->json([
                'html' => view('user.partials.report.content', ['reports' => $reports])->render(),
                'end' => !$reports->hasMorePages(),
            ]);
        }
        else
        {
            return view('user.dashboard.reports');
        }
    }

    public function deny(DenyReportRequest $request, $id)
    {
        $report = Report::findOrFail($id);
        $report->status = 'denied';
        $report->save();

        event(new ReportDenied($report));

        return response()->json([ 'OK' ]);
    }
}
