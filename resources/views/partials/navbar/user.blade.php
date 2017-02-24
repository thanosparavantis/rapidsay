<li class="flex-left with-picture">
    <a href="{{ route('user-profile', auth()->user()->username) }}" class="{{ request()->route()->getName() == 'user-profile' && request()->username == auth()->user()->username ? 'active' : '' }}">
        @include('partials.profile-picture', ['user' => auth()->user(), 'plain' => true, 'size' => 'small']){{ auth()->user()->fullName() }}
    </a>
</li>
<li>
    <a href="{{ route('notifications') }}" class="{{ request()->route()->getName() == 'notifications' ? 'active' : '' }}">
        <i class="fa fa-{{ config('glyphicons.notification') }}" aria-hidden="true"></i>@if (auth()->check())<div class="count space-left" id="notification-counter" @if (!auth()->user()->getUnseenNotificationsCount())style="display: none;"@endif>{{ auth()->user()->getUnseenNotificationsCount() }}</div>@endif<span class="mobile-only space-left">{{ trans('page.title.notifications') }}</span>
    </a>
</li>
@if (auth()->user()->admin)
    <li>
        <a href="{{ route('admin-dashboard') }}" class="{{ request()->route()->getName() == 'admin-dashboard' ? 'active' : '' }}">
            <i class="fa fa-{{ config('glyphicons.administration') }}{{ Forum\Report::getPendingCount() ? ' space-right' : '' }}" aria-hidden="true"></i>@if ($pending = Forum\Report::getPendingCount())<span class="count">{{ $pending }}</span>@endif<span class="mobile-only space-left">{{ trans('page.title.dashboard') }}</span>
        </a>
    </li>
@endif
