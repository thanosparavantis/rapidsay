<header class="border">
    @include('partials.profile-picture', ['user' => $user, 'plain' => true, 'size' => 'large'])
    <div class="details">
        <div class="name">
            <div>
                <h1>{{ $user->fullName() }}</h1>
                @if (auth()->check())
                    <div class="buttons">
                        @if (auth()->user()->id != $user->id)
                            @include('user.partials.subscription.button')
                            @if (auth()->user()->admin)
                                @include('user.partials.profile.administrate')
                            @endif
                        @endif
                    </div>
                @endif
            </div>
        </div>
        @include('user.partials.profile.stats')
        <p>@parse($user->description)</p>
    </div>
</header>
