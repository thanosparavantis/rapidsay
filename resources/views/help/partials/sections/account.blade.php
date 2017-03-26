<h2 id="account-toggle">
    {{ trans('help.section.account.title') }}
</h2>

<ul class="sub-section" id="account" style="{{ request()->section == 'account' ? 'display:block' : 'display:none' }}">
    <li>
        <a href="{{ route('help', ['section' => 'account', 'article' => 'not-activated']) }}" class="{{ request()->section == 'account' && request()->article == 'not-activated' ? 'active' : '' }}">
            {{ trans('help.section.account.article.not-activated.title') }}
        </a>
    </li>
    <li>
        <a href="{{ route('help', ['section' => 'account', 'article' => 'forgot-password']) }}" class="{{ request()->section == 'account' && request()->article == 'forgot-password' ? 'active' : '' }}">
            {{ trans('help.section.account.article.forgot-password.title') }}
        </a>
    </li>
    <li>
        <a href="{{ route('help', ['section' => 'account', 'article' => 'blocked']) }}" class="{{ request()->section == 'account' && request()->article == 'blocked' ? 'active' : '' }}">
            {{ trans('help.section.account.article.blocked.title') }}
        </a>
    </li>
</ul>
