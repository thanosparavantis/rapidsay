<form action="{{ route('change-locale') }}" method="post">
    {{ csrf_field() }}
    <select name="locale" onchange="this.form.submit()">
        <option selected disabled hidden>{{ trans('form.label.language') }}</option>
        @foreach(config('languages') as $lang => $language)
            <option value="{{ $lang }}" {{ app()->isLocale($lang) ? 'selected' : '' }}>{{ $language }}</option>
        @endforeach
    </select>
</form>
