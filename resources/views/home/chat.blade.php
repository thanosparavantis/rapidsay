@extends('layouts.full-page')
@section('title', trans('page.title.chat'))

@section('content')
    <div class="content border">
        <h1>{{ trans('page.title.chat') }}</h1>
        <p>{{ trans('home.chat.description') }}</p>
        <div class="chat">
            <p>{{ trans('app.loading') }}</p>
            <iframe class="chat-box" scrolling="no" src="http://widget.mibbit.com/?settings=a5c06e334cd5891bd052864f570f456f&server=irc.mibbit.net%3A%2B6697&channel=%23rapidsay"></iframe>
        </div>
    </div>
@endsection
