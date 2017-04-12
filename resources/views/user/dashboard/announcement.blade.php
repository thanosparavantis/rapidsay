@extends('layouts.dashboard-page')
@section('title', trans('page.title.announcement'))

@section('content')

<h1>{{ trans('page.title.announcement') }}</h1>
<p class="tip">{{ trans('user.dashboard.tips.announcement') }}</p>

@if (Cache::has('announcement'))
    <input type="text" class="field" value="{{trans('announcements.' . e(Cache::get('announcement')))}}" disabled>
    <form action="{{ route('post-remove-announcement') }}" method="post" id="announcement-form">
        {{ csrf_field() }}
    </form>
@else
    <form action="{{ route('post-announcement') }}" method="post" id="announcement-form">
        {{ csrf_field() }}
        <input type="text" name="announcement_key" value="{{ old('announcement_key') }}" class="field {{ $errors->has('announcement_key') ? 'error' : '' }}" autocomplete="off" autofocus required>
        @if ($errors->has('announcement_key'))
            <span class="error">{{ $errors->first('announcement_key') }}</span>
        @endif
    </form>
@endif

@endsection

@section('buttons')

<div class="buttons">
    @if (Cache::has('announcement'))
        <button class="btn red flex-left" id="announcement-button">
            <i class="fa fa-times space-right" aria-hidden="true"></i>
            {{ trans('user.dashboard.button.remove-announcement') }}
        </button>
    @else
        <button class="btn green flex-left" id="announcement-button">
            <i class="fa fa-check-circle-o space-right" aria-hidden="true"></i>
            {{ trans('user.dashboard.button.add-announcement') }}
        </button>
    @endif
</div>

@endsection
