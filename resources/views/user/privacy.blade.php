@extends('layouts.dashboard-page')
@section('title', trans('page.title.privacy'))

@section('content')

<form action="{{ route('update-privacy') }}" method="post" class="content">
    {{ csrf_field() }}

    <label class="label checkbox-container">
        <input type="checkbox" name="email_notifications" id="email-notifications" value="true" class="checkbox"{!! auth()->user()->email_notifications ? ' checked="checked"' : '' !!}>
        <span>{{ trans('user.privacy.notifications.title') }}</span>
    </label>
    <label class="checkbox-help" for="email-notifications">{{ trans('user.privacy.notifications.description') }}</label>

    <label class="label checkbox-container">
        <input type="checkbox" name="show_email" id="show-email" value="true" class="checkbox"{!! auth()->user()->show_email ? ' checked="checked"' : '' !!}>
        <span>{{ trans('user.privacy.email.title') }}</span>
    </label>
    <label class="checkbox-help" for="show-email">{!! trans('user.privacy.email.description', ['email' => auth()->user()->email]) !!}</label>

    <label class="label checkbox-container">
        <input type="checkbox" name="show_ratings" id="show-ratings" value="true" class="checkbox"{!! auth()->user()->show_ratings ? ' checked="checked"' : '' !!}>
        <span>{{ trans('user.privacy.ratings.title') }}</span>
    </label>
    <label class="checkbox-help" for="show-ratings">{{ trans('user.privacy.ratings.description') }}</label>

    <label class="label checkbox-container">
        <input type="checkbox" name="show_online" id="show-online" value="true" class="checkbox"{!! auth()->user()->show_online ? ' checked="checked"' : '' !!}>
        <span>{{ trans('user.privacy.online.title') }}</span>
    </label>
    <label class="checkbox-help" for="show-online">{{ trans('user.privacy.online.description') }}</label>

    <button type="submit" name="submit" class="btn blue">
        <i class="fa fa-lock space-right" aria-hidden="true"></i>{{ trans('user.privacy.update') }}
    </button>
</form>

@endsection
