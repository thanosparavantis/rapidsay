@extends('layouts.app')

@section('body')

@include('partials.navbar')
<div class="dashboard-page">
    @include('partials.alerts')
    @include('partials.dashboard-navbar')
    @yield('content')
</div>

@endsection