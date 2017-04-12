<div class="report">
    <ul class="items-inline with-space header">
        <li>
            @include('partials.profile-picture', [
                'user' => $report->reporter,
                'size' => 'small'
            ])
        </li>
        <li>
            <a href="{{ route('user-profile', $report->reporter->username) }}" class="name">
                {{ $report->reporter->fullName() }}
            </a>
        </li>
        <li class="flex-left">
            <button class="btn red" id="deny-report-button-{{ $report->id }}" data-target="{{ route('post-deny-report', $report->id) }}">
                <i class="fa fa-{{ config('glyphicons.times') }} space-right" aria-hidden="true"></i>
                {{ trans('report.button.deny') }}
            </button>
        </li>
    </ul>
    <div class="body">
        {{ $report->description }}
    </div>
    @include('topic.partials.user-content', ['item' => $report->reportable])
</div>
