@extends('layouts.app')

@section('body')

<div class="form-page">
    @include('partials.greeting')
    <p class="tip">@yield('tip')</p>
    @include('partials.alerts')

    <div class="panel">
        <h1>@yield('title')</h1>
        <form action="@yield('action')" method="post">
            {{ csrf_field() }}
            <div class="content">@yield('form')</div>
            <input type="submit" value="@yield('button-text')" class="btn @yield('button-color')">
        </form>
        <a href="{{ route('home') }}" class="btn">
            <i class="fa fa-home space-right" aria-hidden="true"></i>
            {{ trans('form.return') }}
        </a>
    </div>
</div>

@endsection
