<nav class="navbar" itemscope itemtype="https://schema.org/SiteNavigationElement">
    <div class="container">
        <ul class="main items-inline">
            <li>
                <a href="{{ route('home') }}" class="logo">
                    {{ trans('app.name') }}
                </a>
            </li>
            <li class="flex-left toggle-menu">
                <i class="fa fa-bars" aria-hidden="true"></i>
                @if (auth()->check())
                    <div class="count space-left first-count" id="notification-counter" @if (!auth()->user()->getUnseenNotificationsCount())style="display: none;"@endif>{{ auth()->user()->getUnseenNotificationsCount() }}</div>
                @endif
            </li>
        </ul>
        <ul class="menu items-inline">
            @if (request()->get('navbar') != 'frame')
                @include('partials.navbar.links')
            @endif

            @if (auth()->check())
                @include('partials.navbar.user')
            @else
                @include('partials.navbar.forms')
            @endif
            <li itemprop="name">
                <a itemprop="url" href="{{ route('help') }}"{!! request()->route()->getName() == 'help' ? ' class="active"' : '' !!}>
                    {{ trans('page.title.help') }}
                </a>
            </li>
            <li>@include('partials.navbar.language')</li>
        </ul>
    </div>
</nav>
