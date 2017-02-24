<div class="section">
    <h2>{{ trans('admin.announcement.title') }}</h2>
    @if (Cache::has('announcement'))
        <input type="text" class="field" value="{{trans('announcements.' . e(Cache::get('announcement')))}}" disabled>
        <form action="{{ route('admin-announcement-remove') }}" method="post">
            {{ csrf_field() }}
            <input type="submit" name="submit" value="{{ trans('admin.button.remove') }}" class="btn red">
        </form>
    @else
        <form action="{{ route('admin-announce') }}" method="post">
            {{ csrf_field() }}
            <input type="text" name="announcement_key" value="{{ old('announcement_key') }}" class="field {{ $errors->has('announcement_key') ? 'error' : '' }}" placeholder="{{ trans('admin.announcement.hint') }}" autocomplete="off">
            @if ($errors->has('announcement_key'))
                <span class="error">{{ $errors->first('announcement_key') }}</span>
            @endif
        </form>
    @endif
</div>