@extends('layouts.email')

@section('body')

{!! trans('user.email.notifications.greeting', ['name' => e($user->fullName())]) !!}
<br>
<br>
{!! trans_choice('user.email.notifications.about', number_format($user->getUnseenNotificationsCount()), ['unread' => $user->getUnseenNotificationsCount()]) !!}
<br>
<a href="{{ route('notifications') }}" style="color: #025D8C" target="_blank">{{ trans('user.email.notifications.about-link') }}</a>
<br>
<br>
<span style="color: #666;">
    {!! trans('user.email.notifications.unsubscribe', [
        'link' => '<a href="' . route('privacy') . '?email_notifications=false" style="color: #025D8C" target="_blank">' . trans('user.email.notifications.unsubscribe-link') . '</a>',
    ]) !!}
</span>

@endsection