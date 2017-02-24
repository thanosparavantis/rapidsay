@if ($activity->count())
    @foreach ($activity as $item)
        @include('topic.partials.user-content', ['item' => $item])
    @endforeach
@else
    <div class="empty-content">{{ trans('user.profile.empty') }}</div>
@endif
