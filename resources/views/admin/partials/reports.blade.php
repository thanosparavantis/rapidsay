<div class="section" id="reports">
    <h2>{{ trans('admin.reports.title') }}</h2>
    @if ($reports->count())
        @foreach ($reports as $report)
            @include('admin.partials.report')
        @endforeach
        {{ $reports->links() }}
    @else
        <div class="empty-content">{{ trans('admin.reports.none') }}</div>
    @endif
</div>