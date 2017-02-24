@extends('layouts.full-page')
@section('title', trans('page.title.community'))

@section('content')
    <div class="content border">
        <h1>{{ trans('page.title.community') }}</h1>
        <p>{!! trans('home.community.users', ['count' => Forum\User::count()]) !!}</p>
    </div>
    <span id="community-content"></span>
    @include('partials.ajax.loading')
@endsection

@section('scripts')
    <script src="{{ asset('js/AjaxPaginator.js') }}"></script>
    <script src="{{ asset('js/community/CommunityLoader.js') }}"></script>
@endsection
