<div class="dropdown" id="admin-actions">
    <div class="text">
        Actions
    </div>
    <div class="toggle">
        <i class="button fa fa-chevron-down" aria-hidden="true"></i>
        <ul class="items">
            @if (!$user->activated)
                <li id="activate" data-target="{{ route('admin-activate', $user->id) }}">
                    <i class="fa fa-unlock space-right" aria-hidden="true"></i>
                    {{ trans('admin.button.activate') }}
                </li>
            @endif
            <li id="reputation" data-target="{{ route('admin-reputation', $user->id) }}" data-prompt="{{ trans('admin.user.reputation.prompt') }}" data-success="{{ trans('admin.user.reputation.success') }}" data-error="{{ trans('admin.user.reputation.error') }}">
                <i class="fa fa-{{ config('glyphicons.reputation') }} space-right" aria-hidden="true"></i>
                {{ trans('admin.button.reputation') }}
            </li>
            <li class="{{ $user->isBanned() ? 'active' : '' }}" id="ban" data-target="{{ route('admin-ban', $user->id) }}">
                <i class="fa fa-user-times space-right" aria-hidden="true"></i>
                @if ($user->isBanned())
                    {{ trans('admin.button.unban') }}
                @else
                    {{ trans('admin.button.ban') }}
                @endif
            </li>
            <li class="{{ $user->isIpBanned() ? 'active' : '' }}" id="ban-ip" data-target="{{ route('admin-ban-ip', $user->id) }}">
                <i class="fa fa-laptop space-right" aria-hidden="true"></i>
                @if ($user->isIpBanned())
                    {{ trans('admin.button.unban-ip') }}
                @else
                    {{ trans('admin.button.ban-ip') }}
                @endif
            </li>
            <li id="delete-account" data-target="{{ route('admin-delete-account', $user->id) }}" data-confirm="Are you sure you want to delete this account?">
                <i class="fa fa-trash space-right" aria-hidden="true"></i>
                Delete
            </li>
        </ul>
    </div>
</div>
