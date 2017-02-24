@extends('layouts.status-page')
@section('title', 'Not Found')

@section('content')

<h1>{{ trans('error.404.title') }}</h1>
<p>{{ trans('error.404.message') }}</p>
<a href="{{ route('home') }}" class="btn large extend green">{{ trans('page.title.home') }}</a>

@endsection