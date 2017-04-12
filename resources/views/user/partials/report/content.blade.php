@if ($reports->count())
    @foreach ($reports as $report)
        @include('user.partials.report.view', ['report' => $report])
    @endforeach
@endif

<div class="empty-content {{ $reports->count() ? 'hidden' : '' }}">{{ trans('report.none') }}</div>
