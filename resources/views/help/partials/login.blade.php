@if (!auth()->check() && isset($login))
    <p class="login">{!! trans('help.login', ['link' => '<a href="' . route('login') . '">' . trans('help.logged-in') . '</a>']) !!}</p>
@endif