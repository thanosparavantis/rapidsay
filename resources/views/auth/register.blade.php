@extends('layouts.form-page')
@section('title', trans('page.title.register'))
@section('action', route('post-register'))
@section('button-text', trans('form.button.register'))
@section('button-color', 'green')

@section('tip', trans('form.already-registered', ['link' => route('login')]))

@section('form')

<label class="label">
    {{ trans('form.label.username') }}
    <input type="text" name="username" value="{{ old('username') }}" class="field{{$errors->has('username') ? ' error' : '' }}" maxlength="255" autofocus required>
</label>

@if ($errors->has('username'))
    <span class="error">{{ $errors->first('username') }}</span>
@endif

<label class="label">
    {{ trans('form.label.email') }}
    <input type="email" name="email" value="{{ old('email') }}" class="field{{$errors->has('email') ? ' error' : '' }}" maxlength="255" required>
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

<label class="label">
    {{ trans('form.label.password-confirmation') }}
    <input type="password" name="password_confirmation" class="field{{$errors->has('password_confirmation') ? ' error' : '' }}" required>
</label>

@if ($errors->has('password_confirmation'))
    <span class="error">{{ $errors->first('password_confirmation') }}</span>
@endif

{!! Captcha::display() !!}

@if ($errors->has('g-recaptcha-response'))
    <span class="error">{{ $errors->first('g-recaptcha-response') }}</span>
@endif

@endsection
