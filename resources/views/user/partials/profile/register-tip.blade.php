<div class="tip-box blue">
    <p>{{ trans('user.register-tip', ['name' => $user->first_name ? $user->first_name : $user->username]) }}</p>
    <a href="{{ route('register') }}" class="btn green flex-left">{{ trans('page.title.register') }}</a>
</div>
