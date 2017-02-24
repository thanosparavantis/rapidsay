<a href="{{ $user->route() }}" class="community-preview">
    <div class="profile">
        @include('partials.profile-picture', ['plain' => true])
        <h1>{{ $user->fullName() }}</h1>
        <p class="reputation">
            <i class="fa fa-{{ config('glyphicons.reputation') }} space-right" aria-hidden="true"></i>{{ number_format($user->reputation) }}
        </p>
        @if ($user->description)
            <p class="description">@raw(str_limit($user->description, 150))</p>
        @endif
    </div>
    @include('user.partials.subscription.button')
</a>
