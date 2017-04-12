@extends('layouts.full-page')
@section('title', trans('app.tagline'))
@section('bodyClasses', 'mobile-no-margin')

@section('content')

<div class="features">
    <div class="section">
        <div class="app-logo">
            <img src="{{ asset('img/logo.png') }}" alt="{{ trans('app.name') }}">
        </div>
        <h1>{{ trans('home.welcome.title') }}</h1>
        <div class="point-group">
            <div class="points">
                <p>{{ trans('about.points.difference') }}</p>
                <p>{{ trans('about.points.alternative') }}</p>
            </div>
            <div class="points">
                <p>{{ trans('about.points.ratings') }}</p>
                <p>{{ trans('about.points.reputation') }}</p>
            </div>
        </div>
        <a href="{{ route('register') }}" class="btn green">
            <i class="fa fa-user-plus space-right" aria-hidden="true"></i>
            {{ trans('about.buttons.register') }}
        </a>
    </div>
    <div class="section">
        <h2><i class="fa fa-{{ config('glyphicons.post') }}" aria-hidden="true"></i>{{ trans('home.welcome.section.share.title') }}</h2>
        <ul>
            <li>{{ trans('home.welcome.section.share.line1') }}</li>
            <li>{{ trans('home.welcome.section.share.line2') }}</li>
            <li>{{ trans('home.welcome.section.share.line3') }}</li>
        </ul>
    </div>
    <div class="section">
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
    <div class="section">
        <h2><i class="fa fa-{{config('glyphicons.reply')  }}" aria-hidden="true"></i>{{ trans('home.welcome.section.discussions.title') }}</h2>
        <ul>
            <li>{{ trans('home.welcome.section.discussions.line1') }}</li>
            <li>{{ trans('home.welcome.section.discussions.line2') }}</li>
            <li>{{ trans('home.welcome.section.discussions.line3') }}</li>
        </ul>
    </div>
    <div class="section">
        <a href="{{ route('register') }}" class="btn green">
            <i class="fa fa-user-plus space-right" aria-hidden="true"></i>{{ trans('about.buttons.register') }}
        </a>
    </div>
</div>

<div class="mini-footer">
    <ul class="items-inline with-large-space">
        <li>
            <a href="{{ route('help') }}">
                {{ trans('page.title.help') }}
            </a>
        </li>
        <li>
            <a href="{{ route('terms-of-use') }}">
                {{ trans('about.terms-of-use') }}
            </a>
        </li>
        <li>
            <a href="{{ route('privacy-policy') }}">
                {{ trans('about.privacy-policy') }}
            </a>
        </li>
        <li class="flex-left">
            <form action="{{ route('post-language') }}" method="post" id="guest-lang-form">
                {{ csrf_field() }}
                <select name="locale" class="select" id="guest-lang-select">
                    <option selected disabled hidden>{{ trans('form.label.language') }}</option>
                    @foreach(config('languages') as $lang => $language)
                        <option value="{{ $lang }}" {{ app()->isLocale($lang) ? 'selected' : '' }}>{{ $language }}</option>
                    @endforeach
                </select>
            </form>
        </li>
    </ul>
</div>

@endsection
