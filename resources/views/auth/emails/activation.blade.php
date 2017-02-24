@extends('layouts.email')

@section('body')

{!! trans('auth.activation.email.body.greeting', ['name' => e($user->fullName())]) !!}
<br>
<br>
{{ trans('auth.activation.email.body.welcome') }}
<br>
{{ trans('app.tagline') }}
<br>
<br>
{{ trans('auth.activation.email.body.info') }}
<br>
<a href="{{ route('activate-account', $token) }}" style="color: #025D8C; text-decoration: none" target="_blank">
    {{ trans('auth.activation.email.body.link') }}
</a>
@endsection