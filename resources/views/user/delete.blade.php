@extends('layouts.full-page')
@section('title', 'Account Deletion')

@section('content')

<div class="content document">
    <h1>Account Deletion</h1>
    <p>You are about to <strong>permanently delete your account</strong>. By doing so, any data associated with it will be gone forever.</p>
    <ul>
        <li>All of your posts, comments and ratings will be deleted.</li>
        <li>Your preferences, placement, reputation, subscribers and subscriptions will be gone.</li>
        <li>The images you have uploaded will be deleted.</li>
        <li>Your profile page (<a href="{{ route('user-profile', auth()->user()->username) }}">{{ route('user-profile', auth()->user()->username) }})</a> will no longer exist.</li>
        <li>You will no longer receive email notifications.</li>
    </ul>
    <p>After deletion, you will not be able to log in with your account credentials. <strong>This action cannot be undone</strong>, are you sure you want to proceed?</p>
    <div class="btn-group">
        <form action="{{ route('post-delete-account') }}" method="post" class="flex-left">
            {{ csrf_field() }}
            <button type="submit" class="btn red">
                <i class="fa fa-trash space-right" aria-hidden="true"></i>
                Yes, delete my account now
            </button>
        </form>
        <a href="{{ url()->previous() }}" class="btn gray">
            Go Back
        </a>
    </div>
</div>

@endsection
