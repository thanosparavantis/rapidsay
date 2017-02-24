@extends('layouts.app')

@section('body')

<div class="status-page">
    <img src="{{ asset('img/logo.png') }}" width="96" height="96">
    @yield('content')
</div>

@endsection