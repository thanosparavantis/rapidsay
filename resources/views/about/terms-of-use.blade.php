@extends('layouts.full-page')
@section('title', trans('about.terms-of-use'))

@section('content')

<div class="content document">
    <div class="back">
        <h1>{{ trans('about.terms-of-use') }}</h1>
        <a href="{{ route('help') }}">&#8249; {{ trans('about.back') }}</a>
        <a href="{{ route('privacy-policy') }}">{{ trans('about.privacy-policy') }}</a>
    </div>
    <p>Last update: 1/2/2016</p>
    <p>By using this website you agree to these Terms of Use.</p>
    <p>Submitted content may be inappropriate if it:</p>
    <ul>
        <li>is illegal</li>
        <li>is pornography</li>
        <li>promotes violence or terrorism</li>
        <li>is threatening towards others</li>
        <li>is harassment or bullying</li>
        <li>is personal or confidential information</li>
        <li>is spam or repetitive</li>
        <li>is an advertisement</li>
        <li>is copyrighted material.</li>
    </ul>
    <p>Users may not:</p>
        <ul>
            <li>Visit parts of the website that are not visible in the user interface or not intended to be visited.</li>
            <li>Reproduce bugs in an attempt to break the website.</li>
            <li>Share their account password with others or have multiple users logging in on the same account.</li>
            <li>Create a new account because they were banned.</li>
            <li>Pretend to be administrators.</li>
            <li>Post something that has already been deleted.</li>
            <li>Roll back changes by an administrator.</li>
        </ul>
    <p>Inappropriate content can be edited or deleted and the account who submitted this content may also be banned. When an account is banned, it can no longer be accessed and will not receive email notifications.</p>
    <p>These Terms of Use may occasionally be revised, any changes will be posted here.</p>

</div>

@endsection
