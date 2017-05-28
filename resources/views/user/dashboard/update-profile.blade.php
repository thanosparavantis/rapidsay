@extends('layouts.dashboard-page')
@section('title', trans('page.title.dashboard'))

@section('content')

<h1>{{ trans('page.title.update-profile') }}</h1>
<p class="tip">{{ trans('user.dashboard.tips.update-profile') }}</p>

<form action="{{ route('post-update-profile') }}" method="post" id="profile-form" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="content-group">
        <div class="section">
            <label class="label">
                {{ trans('form.label.first-name') }}
                <input type="text" name="first_name" class="field{{$errors->has('first_name') ? ' error' : '' }}" value="{{ auth()->user()->first_name }}" maxlength="35" autofocus>
            </label>
            @if ($errors->has('first_name'))
                <span class="error">{{ $errors->first('first_name') }}</span>
            @endif
        </div>
        <div class="section">
            <label class="label">
                {{ trans('form.label.last-name') }}
                <input type="text" name="last_name" class="field{{$errors->has('last_name') ? ' error' : '' }}" value="{{ auth()->user()->last_name }}" maxlength="35">
            </label>
            @if ($errors->has('last_name'))
                <span class="error">{{ $errors->first('last_name') }}</span>
            @endif
        </div>
    </div>

    <label class="label">
        {{ trans('form.label.description') }}
        <textarea name="description" id="description" class="field{{$errors->has('description') ? ' error' : '' }}" maxlength="300" rows="2">{{ auth()->user()->description }}</textarea>
    </label>
    @if ($errors->has('description'))
        <span class="error">{{ $errors->first('description') }}</span>
    @endif

    <label class="label">
        {{ trans('form.label.profile-picture') }}
        <div class="profile-picture-update">
            @include('partials.profile-picture', ['user' => auth()->user()])
            <div class="upload">
                <input type="file" name="profile_picture">
                @if (auth()->user()->profile_picture)
                    <a href="{{ route('delete-profile-picture') }}">{{ trans('form.label.remove-profile-picture') }}</a>
                @endif
            </div>
        </div>
    </label>
    @if ($errors->has('profile_picture'))
        <span class="error">{{ $errors->first('profile_picture') }}</span>
    @endif
</form>

@endsection

@section('buttons')

<div class="buttons">
    <button class="btn green flex-left" id="profile-button">
        <i class="fa fa-{{ config('glyphicons.save') }} space-right" aria-hidden="true"></i>
        {{ trans('user.dashboard.button.save-changes') }}
    </button>
</div>

@endsection
