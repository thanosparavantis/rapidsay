@extends('layouts.form-page')
@section('title', trans('page.title.password_reset'))
@section('action', route('post-password-reset-email'))
@section('button-text', trans('form.button.send-reset'))
@section('button-color', 'blue')

@section('form')

<label class="label">
    {{ trans('form.label.email') }}
    <input type="email" name="email" value="{{ old('email') }}" class="field{{$errors->has('email') ? ' error' : '' }}" maxlength="255" autofocus required>
</label>

@if ($errors->has('email'))
    <span class="error">{{ $errors->first('email') }}</span>
@endif

@endsection
