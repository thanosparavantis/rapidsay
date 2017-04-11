@extends('layouts.app')

@section('body')

@include('partials.navbar')
<div class="dashboard-page">

    @include('partials.alerts')

    <div class="dashboard-panel">
        <div class="menu">
            <h2>{{ trans('user.dashboard.section.account') }}</h2>
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}" class="{{ request()->route()->getName() == 'dashboard' ? 'active' : '' }}">
                        <i class="fa fa-{{ config('glyphicons.profile') }} space-right" aria-hidden="true"></i>
                        {{ trans('page.title.update-profile') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('change-password') }}" class="{{ request()->route()->getName() == 'change-password' ? 'active' : '' }}">
                        <i class="fa fa-{{ config('glyphicons.password') }} space-right" aria-hidden="true"></i>
                        {{ trans('page.title.change-password') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('privacy') }}" class="{{ request()->route()->getName() == 'privacy' ? 'active' : '' }}">
                        <i class="fa fa-{{ config('glyphicons.privacy') }} space-right" aria-hidden="true"></i>
                        {{ trans('page.title.privacy') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('delete-account') }}" class="{{ request()->route()->getName() == 'delete-account' ? 'active' : '' }}">
                        <i class="fa fa-{{ config('glyphicons.delete') }} space-right" aria-hidden="true"></i>
                        {{ trans('page.title.delete-account') }}
                    </a>
                </li>
            </ul>

            <h2>{{ trans('user.dashboard.section.other') }}</h2>
            <ul>
                <li>
                    <a href="{{ route('subscriptions') }}" class="{{ request()->route()->getName() == 'subscriptions' ? 'active' : '' }}">
                        <i class="fa fa-{{ config('glyphicons.subscriber') }} space-right" aria-hidden="true"></i>
                        {{ trans('page.title.subscriptions') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('language') }}" class="{{ request()->route()->getName() == 'language' ? 'active' : '' }}">
                        <i class="fa fa-{{ config('glyphicons.language') }} space-right" aria-hidden="true"></i>
                        {{ trans('page.title.language') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}">
                        <i class="fa fa-{{ config('glyphicons.logout') }} space-right" aria-hidden="true"></i>
                        {{ trans('page.title.logout') }}
                    </a>
                </li>
            </ul>
        </div>
        <div class="main">
            <div class="body">
                @yield('content')
            </div>
            
            @yield('buttons')
        </div>
    </div>

@endsection

@section('scripts')

<script src="{{ asset('js/user/Dashboard.js') }}"></script>

@endsection
