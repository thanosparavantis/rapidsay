<div class="dropdown">
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
            <li id="reset" data-target="{{ route('admin-reset', $user->id) }}">
                <i class="fa fa-life-ring space-right" aria-hidden="true"></i>
                {{ trans('admin.button.reset') }}
            </li>
            <li class="{{ $user->isBanned() ? 'active' : '' }}" id="ban" data-target="{{ route('admin-ban', $user->id) }}">
                @if ($user->isBanned())
                    <i class="fa fa-times space-right" aria-hidden="true"></i>
                    {{ trans('admin.button.unban') }}
                @else
                    <i class="fa fa-user-times space-right" aria-hidden="true"></i>
                    {{ trans('admin.button.ban') }}
                @endif
            </li>
            <li class="{{ $user->isIpBanned() ? 'active' : '' }}" id="ban-ip" data-target="{{ route('admin-ban-ip', $user->id) }}">
                @if ($user->isIpBanned())
                    <i class="fa fa-times space-right" aria-hidden="true"></i>{{ trans('admin.button.unban-ip') }}
                @else
                    <i class="fa fa-user-times space-right" aria-hidden="true"></i>{{ trans('admin.button.ban-ip') }}
                @endif
            </li>
        </ul>
    </div>
</div>

<form action="#" method="post" id="admin-form">
    {{ csrf_field() }}
</form>
