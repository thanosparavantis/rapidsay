@extends('layouts.status-page')
@section('title', trans('error.403.title'))

@section('content')

<h1>{{ trans('error.403.title') }}</h1>
<p>{{ trans('error.403.message') }}</p>
<a href="{{ route('home') }}" class="btn large extend green">{{ trans('page.title.home') }}</a>

@endsection