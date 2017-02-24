@extends('layouts.form-page')
@section('title', trans('page.title.login'))
@section('action', route('post-login'))
@section('button-text', trans('form.button.login'))
@section('button-color', 'blue')

@section('tip', trans('form.forgot_password', ['link' => route('password-reset')]))

@section('form')

<label class="label">
    {{ trans('form.label.email') }}
    <input type="email" name="email" value="{{ old('email') }}" class="field{{$errors->has('email') ? ' error' : '' }}" maxlength="255" autofocus required>
</label>

@if ($errors->has('email'))
    <span class="error">{{ $errors->first('email') }}</span>
@endif

<label class="label">
    {{ trans('form.label.password') }}
    <input type="password" name="password" class="field{{$errors->has('password') ? ' error' : '' }}" required>
</label>

@if ($errors->has('password'))
    <span class="error">{{ $errors->first('password') }}</span>
@endif

<label class="label checkbox-container">
    <input type="checkbox" name="remember" class="checkbox">
    <span>{{ trans('form.label.remember_me') }}</span>
</label>

@endsection
