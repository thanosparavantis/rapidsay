@extends('layouts.dashboard-page')
@section('title', trans('page.title.language'))

@section('content')

<h1>{{ trans('page.title.language') }}</h1>
<p class="tip">{!! trans('user.dashboard.tips.language') !!}</p>

<form action="{{ route('post-language') }}" method="post" id="lang-form">
    {{ csrf_field() }}
    <select name="locale" class="select">
        <option selected disabled hidden>{{ trans('form.label.language') }}</option>
        @foreach(config('languages') as $lang => $language)
            <option value="{{ $lang }}" {{ app()->isLocale($lang) ? 'selected' : '' }}>{{ $language }}</option>
        @endforeach
    </select>
</form>

@endsection

@section('buttons')

<div class="buttons">
    <button class="btn green flex-left" id="lang-button">
        <i class="fa fa-{{ config('glyphicons.save') }} space-right" aria-hidden="true"></i>
        {{ trans('user.dashboard.button.save-changes') }}
    </button>
</div>

@endsection
