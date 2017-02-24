@extends('layouts.full-page')
@section('title', trans('page.title.notifications'))

@section('content')

<div class="content">
    <h1>{{ trans('page.title.notifications') }}</h1>
    <div id="notification-content"></div>
    @include('partials.ajax.loading')
</div>

@endsection

@section('scripts')
    <script src="{{ asset('js/AjaxPaginator.js') }}"></script>
    <script src="{{ asset('js/user/AjaxNotifications.js') }}"></script>
@endsection
