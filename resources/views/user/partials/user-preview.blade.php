<a href="{{ $user->route() }}" class="user-preview">
    @include('partials.profile-picture', ['plain' => true])
    <div class="identity">
        <div class="header">
            <h1>{{ $user->fullName() }}</h1>
            <div class="flex-left">@include('user.partials.subscription.button')</div>
        </div>

        <ul class="stats items-inline with-space">
            <li><i class="fa fa-{{ config('glyphicons.placement') }} space-right" aria-hidden="true"></i>{{ $user->placement() }}</li>
            <li><i class="fa fa-{{ config('glyphicons.reputation') }} space-right" aria-hidden="true"></i>{{ $user->reputation }}</li>
            <li><i class="fa fa-{{ config('glyphicons.subscriber') }} space-right" aria-hidden="true"></i>{{ $user->subscribers->count() }}</li>
            @if ($user->first_name && $user->last_name)<li class="username">{{ $user->username }}</li>@endif
        </ul>
        @if ($user->description)
            <p>@raw($user->description)</p>
        @endif
    </div>
</a>
