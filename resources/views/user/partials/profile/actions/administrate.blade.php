@if (!$user->activated)
    <form action="{{ route('admin-activate', $user->id) }}" method="post">
        {{ csrf_field() }}
        <button type="submit" name="submit" class="btn yellow">
            <i class="fa fa-unlock space-right" aria-hidden="true"></i>{{ trans('admin.button.activate') }}
        </button>
    </form>
@endif

<button type="submit" name="submit" class="btn yellow" id="reputation" data-href="{{ route('admin-reputation', $user->id) }}" data-prompt="{{ trans('admin.user.reputation.prompt') }}" data-success="{{ trans('admin.user.reputation.success') }}" data-error="{{ trans('admin.user.reputation.error') }}">
    <i class="fa fa-{{ config('glyphicons.reputation') }} space-right" aria-hidden="true"></i>{{ trans('admin.button.reputation') }}
</button>

<form action="{{ route('admin-reset', $user->id) }}" method="post" class="hide-mobile">
    {{ csrf_field() }}
    <button type="submit" name="submit" class="btn yellow">
        <i class="fa fa-life-ring space-right" aria-hidden="true"></i>{{ trans('admin.button.reset') }}
    </button>
</form>

<form action="{{ route('admin-ban', $user->id) }}" method="post">
    {{ csrf_field() }}
    <button type="submit" name="submit" class="btn yellow">
        @if ($user->banned)
            <i class="fa fa-times space-right" aria-hidden="true"></i>{{ trans('admin.button.unban') }}
        @else
            <i class="fa fa-user-times space-right" aria-hidden="true"></i>{{ trans('admin.button.ban') }}
        @endif
    </button>
</form>

<form action="{{ route('admin-ban-ip', $user->id) }}" method="post">
    {{ csrf_field() }}
    <button type="submit" name="submit" class="btn yellow">
        @if ($user->banned_ip)
            <i class="fa fa-times space-right" aria-hidden="true"></i>{{ trans('admin.button.unban-ip') }}
        @else
            <i class="fa fa-user-times space-right" aria-hidden="true"></i>{{ trans('admin.button.ban-ip') }}
        @endif
    </button>
</form>
