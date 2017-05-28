@extends('layouts.dashboard-page')
@section('title', 'Account Deletion')

@section('content')

<h1>{{ trans('page.title.account-deletion') }}</h1>
{!! trans('user.dashboard.account-deletion') !!}

@endsection

@section('buttons')

<div class="buttons">
    <form action="{{ route('post-delete-account') }}" method="post">
        {{ csrf_field() }}
        <button type="submit" class="btn red flex-left">
            <i class="fa fa-{{ config('glyphicons.delete') }} space-right" aria-hidden="true"></i>
            {{ trans('user.dashboard.button.delete-account') }}
        </button>
    </form>
</div>

@endsection
