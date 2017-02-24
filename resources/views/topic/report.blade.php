@extends('layouts.full-page')
@section('title', trans('page.title.report'))

@section('content')

<div class="content">
    <h1>{{ trans('page.title.report') }}</h1>
    <p>{{ trans('report.creator.description', ['type' => trans('report.about.' . $type)]) }}</p>
    <div class="report-preview">
        @include('topic.partials.user-content', ['item' => $item])
        <form action="{{ route('post-report', [$type, $id]) }}" method="post">
            {{ csrf_field() }}
            <textarea name="description" class="field{{ $errors->has('description') ? ' error' : '' }}" rows="3" placeholder="{{ trans('report.creator.placeholder', ['type' => $type]) }}" maxlength="1000" required></textarea>
            @if ($errors->has('description'))
                <span class="error">{{ $errors->first('description') }}</span>
            @endif
            <div class="btn-group">
                <input type="submit" name="submit" value="{{ trans('report.creator.button.submit') }}" class="btn green flex-left">
                <a href="{{ $item->route() }}" class="btn gray">{{ trans('report.creator.button.back') }}</a>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/topic/Report.js') }}"></script>
@endsection
