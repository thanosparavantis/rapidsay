@extends('layouts.help-page')
@section('title', trans('help.title'))

@section('content')
    <p>{{ trans('help.greeting.line1') }}</p>
    <p>{!! trans('help.greeting.line2', ['link' => '<a href="mailto:' . env('MAIL_USERNAME') . '">' . env('MAIL_USERNAME') . '</a>']) !!}</p>
    <p>{!! trans('help.greeting.line3') !!}</p>
    @include('partials.fb-like')

    <p id="last-update">{{ trans('app.last-update', ['time' => $lastAppUpdate->diffForHumans()]) }}</p>
@endsection

@section('scripts')
    @include('partials.fb-js-sdk')
    <script src="{{ asset('js/help/Help.js') }}"></script>
@endsection
