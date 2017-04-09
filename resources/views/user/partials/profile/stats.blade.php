<ul class="items-inline">
    @if ($user->show_email)
        <li>
            <i class="fa fa-{{ config('glyphicons.email') }} space-right" aria-hidden="true"></i>{{ $user->email }}
        </li>
    @endif
    <li>
        <i class="fa fa-{{ config('glyphicons.placement') }} space-right" aria-hidden="true"></i><span id="placement-count">{{ number_format($user->placement()) }}</span> {{ trans('user.placement') }}
    </li>
    <li>
        <i class="fa fa-{{ config('glyphicons.reputation') }} space-right" aria-hidden="true"></i><span id="reputation-count">{{ number_format($user->reputation) }}</span> {{ trans('user.reputation') }}
    </li>
    <li>
        <i class="fa fa-{{ config('glyphicons.subscriber') }} space-right" aria-hidden="true"></i><span id="subscriber-count">{{ number_format($subscribers = $user->subscribers->count()) }}</span> {{ trans_choice('user.subscribers', $subscribers) }}
    </li>
</ul>
