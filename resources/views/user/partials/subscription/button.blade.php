@can ('subscribe', $user)
    <button class="btn {{ auth()->user()->subscriptions()->where('subscription_id', $user->id)->count() ? 'green' : 'blue' }}" id="subscribe-button" data-target="{{ route('subscribe', $user->id) }}">
        @if (auth()->user()->subscriptions()->where('subscription_id', $user->id)->count())
            <i class="fa fa-times space-right" aria-hidden="true"></i>{{ trans('user.button.unsubscribe') }}
        @else
            <i class="fa fa-{{ config('glyphicons.subscriber') }} space-right" aria-hidden="true"></i>{{ trans('user.button.subscribe') }}
        @endif
    </button>
@endcan
