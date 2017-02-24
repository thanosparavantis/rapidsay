<form action="{{ route('admin-report-deny', $report->id) }}" method="post" id="deny-report">{{ csrf_field() }}</form>
<div class="report">
    <div class="type"><i class="fa fa-{{ config('glyphicons.' . $report->getType()) }}" aria-hidden="true"></i></div>
    <div class="container">
        <a href="{{ $report->reportable->route() }}" class="description">
            <span>{{ trans('admin.report.content') }}</span>
            <p>{{ $report->getPreview() }}</p>
            <span>{{ trans('admin.report.description') }}</span>
            <p>{{ $report->description }}</p>
        </a>
        <ul class="interact items-inline space">
            <li>{{ $report->created_at->diffForHumans() }}</li>
            <li class="flex-left"><a href="{{ route('user-profile', $report->reporter->username) }}" class="flex-left">{{ $report->reporter->fullName() }}</a></li>
            <li><span class="like-link" onclick="document.getElementById('deny-report').submit();"><i class="fa fa-{{ config('glyphicons.decline') }}" aria-hidden="true"></i></span></li>
        </ul>
    </div>
</div>