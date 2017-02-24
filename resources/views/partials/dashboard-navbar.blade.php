<div class="dashboard-navbar content {{ isset($border) && $border ? 'border' : '' }}">
    <h1>@yield('title')</h1>
    <ul class="items-inline with-space flex-left">
        <li><a href="{{ route('preferences') }}"{!! request()->route()->getName() == 'preferences' ? ' class="active"' : '' !!}>{{ trans('page.title.preferences') }}</a></li>
        <li><a href="{{ route('subscriptions') }}"{!! request()->route()->getName() == 'subscriptions' ? ' class="active"' : '' !!}>{{ trans('page.title.subscriptions') }}</a></li>
        <li><a href="{{ route('privacy') }}"{!! request()->route()->getName() == 'privacy' ? ' class="active"' : '' !!}>{{ trans('page.title.privacy') }}</a></li>
    </ul>
</div>
