<div class="notification items-inline {{ $unread->contains($notification) ? 'unseen' : '' }}">
    <div class="body">
        @if ($notification->from_id)
            @include('partials.profile-picture', ['user' => Forum\User::find($notification->from_id), 'size' => 'small'])
        @endif
        <p><i class="fa fa-{{ $notification->getIcon() }} space-right" aria-hidden="true"></i>{!! $notification->getMessage() !!}</p>
    </div>

    <span class="time flex-left">{{ $notification->created_at->diffForHumans() }}</span>
</div>
