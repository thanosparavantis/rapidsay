@extends('layouts.status-page')
@section('title', trans('error.title'))

@section('content')

<h1>{{ trans('error.title') }}</h1>
<p>{{ $message }}</p>

@endsection