<div class="splash-box">
    <div class="header">
        <div class="app-logo small">
            <img src="{{ asset('img/logo.png') }}" alt="{{ trans('app.name') }}">
        </div>
        <h1>{{ trans('home.welcome.title') }}</h1>
    </div>

    <div class="point-group">
        <div class="points">
            <p>{{ trans('about.points.difference') }}</p>
            <p>{{ trans('about.points.alternative') }}</p>
        </div>
        <div class="points">
            <p>{{ trans('about.points.ratings') }}</p>
            <p>{{ trans('about.points.reputation') }}</p>
        </div>
    </div>
    <a href="{{ route('register') }}" class="btn green">
        <i class="fa fa-user-plus space-right" aria-hidden="true"></i>
        {{ trans('about.buttons.register') }}
    </a>
</div>
