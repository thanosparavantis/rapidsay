<h2 id="notifications-toggle">
    {{ trans('help.section.notifications.title') }}
</h2>

<ul class="sub-section" id="notifications" style="{{ request()->section == 'notifications' ? 'display:block' : 'display:none' }}">
    <li>
        <a href="{{ route('help', ['section' => 'notifications', 'article' => 'view']) }}" class="{{ request()->section == 'notifications' && request()->article == 'view' ? 'active' : '' }}">
            {{ trans('help.section.notifications.article.view.title') }}
        </a>
    </li>
    <li>
        <a href="{{ route('help', ['section' => 'notifications', 'article' => 'interact']) }}" class="{{ request()->section == 'notifications' && request()->article == 'interact' ? 'active' : '' }}">
            {{ trans('help.section.notifications.article.interact.title') }}
        </a>
    </li>
</ul>
