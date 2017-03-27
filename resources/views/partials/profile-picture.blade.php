<div class="profile-picture-container">
    @if ($online = $user->isOnline() && (!auth()->check() || auth()->user()->username !== $user->username))<div class="online-container">@endif
        @if ($online)
            <div class="online {{ $size or '' }}" title="{{ trans('user.profile.online') }}"></div>
        @endif
        @if (!isset($plain))<a href="{{ route('user-profile', $user->username) }}" target="_blank">@endif
            <img src="{{ $user->profile_picture && !$user->banned ? asset('storage/user/img/' . $user->profile_picture . '.png') : asset('img/default-image.png') }}" class="profile-picture {{ $size or '' }}" title="{{ trans('user.profile.picture', ['name' => $user->fullName()]) }}">
        @if (!isset($plain))</a>@endif
    @if ($online)</div>@endif
</div>
