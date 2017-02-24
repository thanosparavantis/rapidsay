@extends('layouts.full-page')

@section('content')

@include('topic.partials.user-content', [
    'item' => $post,
    'expanded' => true,
])

@if (!isset($editType) || $editType != $post->getType())
    <div class="discussion">

        @if (auth()->guest())
            @include('topic.partials.register-tip')
        @endif

        <h2>{{ trans('post.comments') }}</h2>

        @if (auth()->check())
            @include('topic.partials.form.comment')
        @endif

        @include('topic.partials.comments')

        @if ($post->hasSimilar())
            <h2>{{ trans('post.recommended') }}</h2>
            @include('topic.partials.user-content', ['item' => $post->getSimilar()])
        @endif
    </div>
@endif

@endsection

@section('scripts')
<script src="{{ asset('js/topic/Creator.js') }}"></script>
<script src="{{ asset('js/topic/Topic.js') }}"></script>

@endsection
