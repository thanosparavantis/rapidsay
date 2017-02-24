@extends('layouts.dashboard-page', ['border' => true])
@section('title', trans('page.title.subscriptions'))

@section('content')

<div id="subscriptions-content"></div>
@include('partials.ajax.loading')

@endsection

@section('scripts')
    <script src="{{ asset('js/AjaxPaginator.js') }}"></script>
    <script src="{{ asset('js/user/SubscriptionsLoader.js') }}"></script>
@endsection
