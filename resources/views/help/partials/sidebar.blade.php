<div class="sidebar">
    <div class="logo-container">
        <img src="{{ asset('img/logo.png') }}">
    </div>
    <h1><a href="{{ route('help') }}">{{ trans('help.title') }}</a></h1>
    <ul class="sections">
        <li>@include('help.partials.sections.account')</li>
        <li>@include('help.partials.sections.profile')</li>
        <li>@include('help.partials.sections.activity')</li>
        <li>@include('help.partials.sections.notifications')</li>
        <li>@include('help.partials.sections.subscriptions')</li>
        <li>@include('help.partials.sections.reports')</li>
        <li>@include('help.partials.sections.legal')</li>
    </ul>
</div>
