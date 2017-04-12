@if ($subscriptions->count())
    @foreach ($subscriptions as $subscription)
        @include('user.partials.user-preview', ['user' => $subscription])
    @endforeach
@else
    <div class="empty-content">{{ trans('user.subscription.none') }}</div>
@endif
