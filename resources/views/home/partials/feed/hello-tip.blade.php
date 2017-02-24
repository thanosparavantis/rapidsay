@if (!auth()->user()->posts->count())
    <div class="tip-box blue" id="hello-tip-box">
        <p>{{ trans('home.feed.hello-tip.description') }}</p>
        <button class="btn green flex-left" id="hello-tip" data-value="{{ trans('home.feed.hello-tip.value') }}">{{ trans('home.feed.hello-tip.button') }}</button>
    </div>
@endif
