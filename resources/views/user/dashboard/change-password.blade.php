@extends('layouts.dashboard-page')
@section('title', trans('page.title.change-password'))

@section('content')

<h1>{{ trans('page.title.change-password') }}</h1>
<p class="tip">{{ trans('user.dashboard.tips.change-password') }}</p>

<form action="{{ route('change-password') }}" method="post" id="password-form">
    {{ csrf_field() }}
    <label class="label">
        {{ trans('form.label.password-new') }}
        <input type="password" name="password" class="field{{$errors->has('password') ? ' error' : '' }}" required>
    </label>
    @if ($errors->has('password'))
        <span class="error">{{ $errors->first('password') }}</span>
    @endif
    <label class="label">
        {{ trans('form.label.password-new-confirmation') }}
        <input type="password" name="password_confirmation" class="field{{$errors->has('password') ? ' error' : '' }}" required>
    </label>
    @if ($errors->has('password_confirmation'))
        <span class="error">{{ $errors->first('password_confirmation') }}</span>
    @endif
    <label class="label">
        {{ trans('form.label.password-current') }}
        <input type="password" name="current_password" class="field{{$errors->has('password') ? ' error' : '' }}" required>
    </label>
    @if ($errors->has('current_password'))
        <span class="error">{{ $errors->first('current_password') }}</span>
    @endif
</form>

@endsection

@section('buttons')

<div class="buttons">
    <button class="btn green flex-left" id="password-button">
        <i class="fa fa-check-circle-o space-right" aria-hidden="true"></i>
        {{ trans('user.dashboard.button.change-password') }}
    </button>
</div>

@endsection
