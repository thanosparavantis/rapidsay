@extends('layouts.dashboard-page')
@section('title', trans('page.title.reports'))

@section('content')

<h1>{{ trans('page.title.reports') }}</h1>
<p class="tip">{{ trans('user.dashboard.tips.reports') }}</p>

<div id="reports-content"></div>
@include('partials.ajax.loading')

@endsection

@section('scripts')

<script src="{{ asset('js/AjaxPaginator.js') }}"></script>
<script src="{{ asset('js/user/ReportActions.js') }}"></script>
<script src="{{ asset('js/user/ReportLoader.js') }}"></script>

@endsection
