@extends('layouts.form-page')
@section('title', trans('page.title.password_new'))
@section('action', route('post-password-reset'))
@section('button-text', trans('form.button.password-reset'))
@section('button-color', 'blue')

@section('form')

<input type="hidden" name="token" value="{{ $token }}">

<label class="label">
    {{ trans('form.label.email') }}
    <input type="email" name="email" value="{{ $email or old('email') }}" class="field{{$errors->has('email') ? ' error' : '' }}" maxlength="255" required>
</label>
@if ($errors->has('email'))
    <span class="error">{{ $errors->first('email') }}</span>
@endif

<label class="label">
    {{ trans('form.label.password') }}
    <input type="password" name="password" class="field{{$errors->has('password') ? ' error' : '' }}" autofocus required>
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

@endsection
