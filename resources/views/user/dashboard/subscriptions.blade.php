@extends('layouts.dashboard-page', ['border' => true])
@section('title', trans('page.title.subscriptions'))

@section('content')

<h1>{{ trans('page.title.subscriptions') }}</h1>
<p class="tip">{{ trans('user.dashboard.tips.subscriptions') }}</p>

<div id="subscriptions-content"></div>
@include('partials.ajax.loading')

@endsection

@section('scripts')
    <script src="{{ asset('js/AjaxPaginator.js') }}"></script>
    <script src="{{ asset('js/user/SubscriptionsLoader.js') }}"></script>
@endsection
