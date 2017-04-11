@extends('layouts.help-page')
@section('title', trans('page.title.help-center'))

@section('content')

    {!! trans('help.greeting') !!}
    @include('partials.fb-like')
    <p id="last-update">{{ trans('app.last-update', ['time' => $lastAppUpdate->diffForHumans()]) }}</p>

@endsection

@section('scripts')
    @include('partials.fb-js-sdk')
    <script src="{{ asset('js/help/Help.js') }}"></script>
@endsection
