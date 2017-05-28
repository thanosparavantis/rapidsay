@extends('layouts.app')
@section('bodyClasses', 'mobile-no-margin')

@section('body')

@include('partials.navbar')

<div class="help-page">
    @include('partials.alerts')

    <div class="help-content">
        @include('help.partials.sidebar')
        @include('help.partials.content')
    </div>
</div>

@endsection

@section('scripts')

<script src="{{ asset('js/help/Help.js') }}"></script>

@endsection
