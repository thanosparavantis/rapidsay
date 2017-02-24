@extends('layouts.email')

@section('body')

{!! trans('passwords.email.greeting', ['name' => e($user->fullName())]) !!}
<br><br>
{{ trans('passwords.email.info') }}
<br><br>
<a href="{{ route('password-reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}" style="color: #025D8C; text-decoration: none" target="_blank">
    {{ trans('passwords.email.link') }}
</a>

@endsection