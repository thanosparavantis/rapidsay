@extends('layouts.full-page')
@section('title', trans('page.title.report'))

@section('content')

<div class="content">
    <h1>{{ trans('page.title.report') }}</h1>
    <p>{{ trans('report.creator.description', ['type' => trans('report.about.' . $type)]) }}</p>
    <div class="report-preview">
        @include('topic.partials.user-content', ['item' => $item])
        <form action="{{ route('post-report', [$type, $id]) }}" method="post" id="report-form">
            {{ csrf_field() }}
            <textarea name="description" class="field{{ $errors->has('description') ? ' error' : '' }}" rows="3" placeholder="{{ trans('report.creator.placeholder', ['type' => $type]) }}" maxlength="1000" required></textarea>
            @if ($errors->has('description'))
                <span class="error">{{ $errors->first('description') }}</span>
            @endif
            <div class="btn-group">
                <button class="btn green flex-left" id="report-button">
                    <i class="fa fa-check-circle-o space-right" aria-hidden="true"></i>
                    {{ trans('report.button.submit') }}
                </button>

                <a href="{{ $item->route() }}" class="btn gray">
                    {{ trans('report.button.back') }}
                </a>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')

<script src="{{ asset('js/topic/Report.js') }}"></script>

@endsection
