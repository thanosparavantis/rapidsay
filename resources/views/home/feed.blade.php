@extends('layouts.full-page', ['announcements' => true])
@section('title', trans('page.title.home'))

@section('content')

<div class="feed">
    @include('topic.partials.form.post')
    @include('home.partials.feed.hello-tip')
    @include('home.partials.feed.subscriber-tip')
    <span id="feed-content"></span>
    @include('partials.ajax.loading')
</div>

@endsection

@section('scripts')
    <script src="{{ asset('js/topic/Creator.js') }}"></script>
    <script src="{{ asset('js/AjaxPaginator.js') }}"></script>
    <script src="{{ asset('js/feed/FeedLoader.js') }}"></script>
    <script src="{{ asset('js/user/HelloTip.js') }}"></script>
@endsection
