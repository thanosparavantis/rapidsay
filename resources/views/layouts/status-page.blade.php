@extends('layouts.app')

@section('body')

<div class="status-page">
    <div class="main">
        <div class="header">
            <img src="{{ asset('img/logo.png') }}">
        </div>
        <div class="body">
            @yield('content')
        </div>
    </div>
    <div class="actions">
        @yield('actions')
    </div>
</div>

@endsection
