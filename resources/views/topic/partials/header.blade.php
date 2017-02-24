<div class="header">
    <ul class="identity items-inline with-space">
        <li>@include('partials.profile-picture', [
            'user' => $item instanceof Forum\Rating ? $item->rateable->user : $item->user,
            'size' => 'small'
        ])</li>
        <li><a href="{{ route('user-profile', $item->user->username) }}" class="name">{{ $item instanceof Forum\Rating ? $item->rateable->user->fullName() : $item->user->fullName() }}</a></li>
        <li class="flex-left time">
            <a href="{{ $item->route() }}">
                {{ $item->created_at->diffForHumans() }}
            </a>
        </li>
    </ul>
</div>
