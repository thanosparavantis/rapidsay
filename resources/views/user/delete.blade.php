@extends('layouts.full-page')
@section('title', 'Account Deletion')

@section('content')

<div class="content document">
    <h1>{{ trans('page.title.account-deletion') }}</h1>
    {!! trans('user.delete.text') !!}
    <div class="btn-group">
        <form action="{{ route('post-delete-account') }}" method="post" class="flex-left">
            {{ csrf_field() }}
            <button type="submit" class="btn red">
                <i class="fa fa-trash space-right" aria-hidden="true"></i>
                {{ trans('user.delete.button.proceed') }}
            </button>
        </form>
        <a href="{{ route('preferences') }}" class="btn gray">
            {{ trans('user.delete.button.back') }}
        </a>
    </div>
</div>

@endsection
