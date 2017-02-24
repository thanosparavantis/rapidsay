@if (!auth()->user()->subscriptions->count())
    <div class="tip-box">
        <p>{{ trans('home.feed.subscribe-tip.description') }}</p>
        <a href="{{ route('community') }}" class="btn blue flex-left">{{ trans('home.feed.subscribe-tip.button') }}</a>
    </div>
@endif
