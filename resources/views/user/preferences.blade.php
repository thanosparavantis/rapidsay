@extends('layouts.dashboard-page')
@section('title', trans('page.title.preferences'))

@section('content')

<div class="content">
    <div class="content-group">
        @include('user.partials.preferences.update-profile')
        @include('user.partials.preferences.change-password')
    </div>

    @include('user.partials.preferences.form-buttons')
</div>

@endsection
