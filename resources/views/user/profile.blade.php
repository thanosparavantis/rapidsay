@extends('layouts.full-page')
@section('title', $user->fullName())

@section('content')

<div class="profile">
    @include('user.partials.profile.header')
    @include('user.partials.profile.body')
</div>

@endsection

@section('scripts')
    <script src="{{ asset('js/AjaxPaginator.js') }}"></script>
    <script src="{{ asset('js/user/ProfileLoader.js') }}"></script>
    @if (auth()->check() && auth()->user()->admin)
        <script src="{{ asset('js/admin/Account.js') }}"></script>
    @endif
@endsection
