@extends('layouts.app')

@section('body')

@include('partials.navbar')
<div class="full-page">
    @if (isset($announcements))
        @include('partials.announcements')
    @endif
    @include('partials.alerts')
    @yield('content')
    {{-- @include('partials.footer') --}}
</div>

@endsection
