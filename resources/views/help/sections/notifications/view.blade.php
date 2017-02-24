@extends('layouts.help-page', ['login' => true])
@section('title', trans('help.section.notifications.article.view.title'))

@section('content')

<p>{!! trans('help.section.notifications.article.view.body') !!}</p>

@endsection
