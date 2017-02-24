<div class="search content border">
    <h1>{{ trans('page.title.explore') }}</h1>

    <div class="form">
        <input type="text" name="query" id="query" {!! isset($query) ?  'value="'. $query .'"' : '' !!} class="field{{ $errors->has('query') ? ' error' : '' }}" placeholder="{{ trans('home.explore.tip') }}" maxlength="2000" autocomplete="off" autofocus>
        <a href="{{ route('post-explore') }}" class="btn blue" id="search">
            <i class="fa fa-search space-right" aria-hidden="true"></i>
        </a>
    </div>
</div>
