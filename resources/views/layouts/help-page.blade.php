@extends('layouts.app')
@section('bodyClasses', 'mobile-no-margin')

@section('body')

@include('partials.navbar')
<div class="help-page">
    @include('partials.alerts')
    <div class="alert warning">
        <div class="icon">
            <i class="fa fa-{{ config('glyphicons.warning') }}" aria-hidden="true"></i>
        </div>
        <p>Some articles are out of date, this help center will be updated soon.</p>
    </div>

    <div class="help-content">
        @include('help.partials.sidebar')
        @include('help.partials.content')
    </div>
</div>

@endsection

@section('scripts')
    <script src="{{ asset('js/help/Help.js') }}"></script>
@endsection
