@extends('layouts.admin-dashboard-page')
@section('title', trans('page.title.dashboard'))

@section('content')
    <div class="content admin-dashboard">
        <h1>{{ trans('page.title.dashboard') }}</h1>
        @include('admin.partials.stats')
        @include('admin.partials.announce')
        @include('admin.partials.reports')
    </div>
@endsection