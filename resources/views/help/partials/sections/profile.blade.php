<h2 id="profile-toggle">{{ trans('help.section.profile.title') }}</h2>
<ul class="sub-section" id="profile" style="{{ request()->section == 'profile' ? 'display:block' : 'display:none' }}">
    <li><a href="{{ route('help', ['section' => 'profile', 'article' => 'customize']) }}" class="{{ request()->section == 'profile' && request()->article == 'customize' ? 'active' : '' }}">{{ trans('help.section.profile.article.customize.title') }}</a></li>
    <li><a href="{{ route('help', ['section' => 'profile', 'article' => 'placement']) }}" class="{{ request()->section == 'profile' && request()->article == 'placement' ? 'active' : '' }}">{{ trans('help.section.profile.article.placement.title') }}</a></li>
    <li><a href="{{ route('help', ['section' => 'profile', 'article' => 'reputation']) }}" class="{{ request()->section == 'profile' && request()->article == 'reputation' ? 'active' : '' }}">{{ trans('help.section.profile.article.reputation.title') }}</a></li>
</ul>
