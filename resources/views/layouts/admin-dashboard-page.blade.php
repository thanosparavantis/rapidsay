@extends('layouts.app')

@section('body')

@include('partials.navbar')
<div class="admin-dashboard-page">
    @include('partials.alerts')
    @yield('content')
</div>

@endsection