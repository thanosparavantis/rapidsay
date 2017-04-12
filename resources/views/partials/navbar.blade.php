
{{-- Desktop Navigation --}}

<nav class="navbar">
    <div class="wrapper">
        <ul class="items-inline">
            <li>
                <a href="{{ route('home') }}" class="{{ request()->route()->getName() == 'home' ?  'active' : '' }}">
                    <i class="fa fa-{{ config('glyphicons.home') }} space-right" aria-hidden="true"></i>
                    {{ trans('app.name') }}
                </a>
            </li>
            <li>
                <a href="{{ route('explore') }}" class="{{ request()->route()->getName() == 'explore' ?  'active' : '' }}">
                    <i class="fa fa-{{ config('glyphicons.explore') }} space-right" aria-hidden="true"></i>
                    {{ trans('page.title.explore') }}
                </a>
            </li>
            <li>
                <a href="{{ route('community') }}" class="{{ request()->route()->getName() == 'community' ?  'active' : '' }}">
                    <i class="fa fa-{{ config('glyphicons.community') }} space-right" aria-hidden="true"></i>
                    {{ trans('page.title.community') }}
                </a>
            </li>
            <li>
                <a href="{{ route('chat') }}" class="{{ request()->route()->getName() == 'chat' ? 'active' : '' }}">
                    <i class="fa fa-{{ config('glyphicons.chat') }} space-right" aria-hidden="true"></i>
                    {{ trans('page.title.chat') }}
                </a>
            </li>
        </ul>
        <ul class="items-inline flex-left">
            @if (auth()->check())
                <li>
                    <a href="{{ route('user-profile', auth()->user()->username) }}" class="{{ request()->route()->getName() == 'user-profile'  && request()->username == auth()->user()->username ?  'active' : '' }}">
                        @include('partials.profile-picture', [
                            'user' => auth()->user(),
                            'size' => 'preview',
                            'plain' => true,
                        ])
                        {{ auth()->user()->fullName() }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}" class="{{ auth()->user()->admin ? 'notification-holder' : '' }} {{ request()->route()->getName() == 'dashboard' ?  'active' : '' }}" title="{{ trans('page.title.dashboard') }}">
                        <i class="fa fa-{{ config('glyphicons.dashboard') }}" aria-hidden="true"></i>

                        @if (auth()->user()->admin)
                            <div class="count {{ Forum\Report::getPendingCount() > 0 ? 'visible' : '' }}">{{ Forum\Report::getPendingCount() }}</div>
                        @endif
                    </a>
                </li>
                <li>
                    <a href="{{ route('notifications') }}" class="notification-holder {{ request()->route()->getName() == 'notifications' ?  'active' : '' }}" title="{{ trans('page.title.notifications') }}">
                        <i class="fa fa-{{ config('glyphicons.notifications') }}" aria-hidden="true"></i>
                        <div class="count {{ auth()->user()->getUnreadNotificationCount() > 0 ? 'visible' : '' }}">{{ auth()->user()->getUnreadNotificationCount() }}</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" title="{{ trans('page.title.logout') }}">
                        <i class="fa fa-{{ config('glyphicons.logout') }}" aria-hidden="true"></i>
                    </a>
                </li>
            @else
                <li>
                    <a href="{{ route('login') }}" class="{{ request()->route()->getName() == 'login' ?  'active' : '' }}">
                        <i class="fa fa-{{ config('glyphicons.login') }} space-right" aria-hidden="true"></i>
                        {{ trans('page.title.login') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="{{ request()->route()->getName() == 'register' ?  'active' : '' }}">
                        <i class="fa fa-{{ config('glyphicons.register') }} space-right" aria-hidden="true"></i>
                        {{ trans('page.title.register') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('help') }}" class="{{ request()->route()->getName() == 'help' ?  'active' : '' }}">
                        <i class="fa fa-{{ config('glyphicons.help') }} space-right" aria-hidden="true"></i>
                        {{ trans('page.title.help') }}
                    </a>
                </li>
            @endif
        </ul>
    </div>
</nav>

{{-- Mobile Navigation --}}

<nav class="navbar mobile" id="mobile-navbar">
    <div class="wrapper">
        <ul class="items-inline">
            <li>
                <a href="{{ route('home') }}">
                    <i class="fa fa-home space-right" aria-hidden="true"></i>
                    {{ trans('app.name') }}
                </a>
            </li>
        </ul>
        <ul class="items-inline flex-left">
            <li>
                <div id="menu-toggle">
                    <i class="fa fa-{{ config('glyphicons.menu') }}" aria-hidden="true" id="open"></i>
                    <i class="fa fa-{{ config('glyphicons.close') }}" aria-hidden="true" id="close"></i>
                </div>
            </li>
        </ul>
    </div>
</nav>

{{-- Mobile Expanded Menu --}}

<div class="navbar-menu">
    @if (auth()->check())
        <a href="{{ route('user-profile', auth()->user()->username) }}">
            @include('partials.profile-picture', [
                'user' => auth()->user(),
                'size' => 'medium',
                'plain' => true,
            ])
            {{ auth()->user()->fullName() }}
        </a>
    @endif

    <a href="{{ route('explore') }}">
        <i class="fa fa-{{ config('glyphicons.explore') }}" aria-hidden="true"></i>
        {{ trans('page.title.explore') }}
    </a>
    <a href="{{ route('community') }}">
        <i class="fa fa-{{ config('glyphicons.community') }}" aria-hidden="true"></i>
        {{ trans('page.title.community') }}
    </a>

    @if (auth()->guest())
        <a href="{{ route('help') }}">
            <i class="fa fa-{{ config('glyphicons.help') }}" aria-hidden="true"></i>
            {{ trans('page.title.help') }}
        </a>
        <a href="{{ route('login') }}">
            <i class="fa fa-{{ config('glyphicons.login') }}" aria-hidden="true"></i>
            {{ trans('page.title.login') }}
        </a>
        <a href="{{ route('register') }}">
            <i class="fa fa-{{ config('glyphicons.register') }}" aria-hidden="true"></i>
            {{ trans('page.title.register') }}
        </a>
    @endif

    @if (auth()->check())
        <a href="{{ route('dashboard') }}">
            <i class="fa fa-{{ config('glyphicons.dashboard') }}" aria-hidden="true"></i>
            {{ trans('page.title.dashboard') }}
        </a>
        <a href="{{ route('notifications') }}">
            <div class="notification-holder">
                <i class="fa fa-{{ config('glyphicons.notifications') }}" aria-hidden="true"></i>
                <div class="count {{ auth()->user()->getUnreadNotificationCount() > 0 ? 'visible' : '' }}">{{ auth()->user()->getUnreadNotificationCount() }}</div>
            </div>
            {{ trans('page.title.notifications') }}
        </a>
        <a href="{{ route('logout') }}">
            <i class="fa fa-{{ config('glyphicons.logout') }}" aria-hidden="true"></i>
            {{ trans('page.title.logout') }}
        </a>
    @endif
</div>
