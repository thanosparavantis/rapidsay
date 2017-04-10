@extends('layouts.status-page')
@section('title', trans('error.503.title'))

@section('content')

<h1>{{ trans('error.503.title') }}</h1>
<p>{{ trans('error.503.message') }}</p>

@endsection
