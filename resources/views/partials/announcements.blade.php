@if ((auth()->guest() && Cache::has('announcement')) || (auth()->check() && Cache::has('announcement') && !auth()->user()->hasClosedAnnouncement()))
    <div class="alert">
        <div class="icon">
            <i class="fa fa-{{ config('glyphicons.status') }}" aria-hidden="true"></i>
        </div>
        <p>{!! trans('announcements.' . e(Cache::get('announcement'))) !!}</p>
        <div class="close like-link flex-left" data-target="{{ route('close-announcement') }}">
            <i class="fa fa-times" aria-hidden="true"></i>
        </div>
    </div>
@endif
