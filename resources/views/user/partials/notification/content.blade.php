@if ($notifications->count())
    @foreach ($notifications as $notification)
        @include('user.partials.notification.view')
    @endforeach
@else
    <div class="empty-content">{{ trans('user.notifications.none') }}</div>
@endif
