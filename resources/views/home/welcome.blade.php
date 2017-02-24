@extends('layouts.full-page')
@section('title', trans('page.title.welcome'))
@section('bodyClasses', 'mobile-no-margin')

@section('content')

<div class="features">
    <div class="section welcome">
        <div class="display">
            <img src="{{ asset('img/logo.png') }}">
        </div>
        <div class="description">
            <h1>{{ trans('home.welcome.title') }}</h1>
            <p>{{ trans('app.tagline') }}</p>
            <div class="buttons">
                <a href="{{ route('register') }}" class="btn green large"><i class="fa fa-user-plus space-right" aria-hidden="true"></i>{{ trans('home.welcome.register') }}</a>
                <a href="{{ route('login') }}" class="btn white large"><i class="fa fa-sign-in space-right" aria-hidden="true"></i>{{ trans('page.title.login') }}</a>
            </div>
        </div>
    </div>
    <div class="section">
        <h2 class="single-border"><i class="fa fa-{{ config('glyphicons.post') }}" aria-hidden="true"></i>{{ trans('home.welcome.section.share.title') }}</h2>
        <ul>
            <li>{{ trans('home.welcome.section.share.line1') }}</li>
            <li>{{ trans('home.welcome.section.share.line2') }}</li>
            <li>{{ trans('home.welcome.section.share.line3') }}</li>
        </ul>
    </div>
    <div class="section reverse">
        <h2><i class="fa fa-{{ config('glyphicons.reputation') }}" aria-hidden="true"></i>{{ trans('home.welcome.section.reputation.title') }}</h2>
        <ul>
            <li>{{ trans('home.welcome.section.reputation.line1') }}</li>
            <li>{{ trans('home.welcome.section.reputation.line2') }}</li>
            <li>{{ trans('home.welcome.section.reputation.line3') }}</li>
        </ul>
    </div>
    <div class="section">
        <h2><i class="fa fa-{{ config('glyphicons.subscriber') }}" aria-hidden="true"></i>{{ trans('home.welcome.section.audience.title') }}</h2>
        <ul>
            <li>{{ trans('home.welcome.section.audience.line1') }}</li>
            <li>{{ trans('home.welcome.section.audience.line2') }}</li>
            <li>{{ trans('home.welcome.section.audience.line3') }}</li>
        </ul>
    </div>
    <div class="section last-border reverse">
        <h2><i class="fa fa-{{config('glyphicons.reply')  }}" aria-hidden="true"></i>{{ trans('home.welcome.section.discussions.title') }}</h2>
        <ul>
            <li>{{ trans('home.welcome.section.discussions.line1') }}</li>
            <li>{{ trans('home.welcome.section.discussions.line2') }}</li>
            <li>{{ trans('home.welcome.section.discussions.line3') }}</li>
        </ul>
    </div>
    <div class="section register">
        <a href="{{ route('register') }}" class="btn green large"><i class="fa fa-sign-in space-right" aria-hidden="true"></i>{{ trans('home.welcome.register') }}</a>
    </div>
</div>

@endsection
