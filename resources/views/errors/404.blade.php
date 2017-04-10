@extends('layouts.status-page')
@section('title', 'Not Found')

@section('content')

<h1>{{ trans('error.404.title') }}</h1>
<p>{{ trans('error.404.message') }}</p>

@endsection

@section('actions')

<a href="{{ route('home') }}" class="btn green">
    <i class="fa fa-home space-right" aria-hidden="true"></i>
    {{ trans('page.title.home') }}
</a>

@endsection
