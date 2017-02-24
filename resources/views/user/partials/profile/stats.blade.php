<ul class="items-inline">
    @if ($user->show_email)
        <li>
            <i class="fa fa-{{ config('glyphicons.email') }} space-right" aria-hidden="true"></i>{{ $user->email }}
        </li>
    @endif
    <li>
        <i class="fa fa-{{ config('glyphicons.placement') }} space-right" aria-hidden="true"></i>{{ $user->placement() }} {{ trans('user.placement') }}
    </li>
    <li>
        <i class="fa fa-{{ config('glyphicons.reputation') }} space-right" aria-hidden="true"></i>{{ $user->reputation }} {{ trans('user.reputation') }}
    </li>
    <li>
        <i class="fa fa-{{ config('glyphicons.subscriber') }} space-right" aria-hidden="true"></i>{{ $subscribers = $user->subscribers->count() }} {{ trans_choice('user.subscribers', $subscribers) }}
    </li>
</ul>
