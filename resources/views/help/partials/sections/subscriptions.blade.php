<h2 id="subscriptions-toggle">{{ trans('help.section.subscriptions.title') }}</h2>
<ul class="sub-section" id="subscriptions" style="{{ request()->section == 'subscriptions' ? 'display:block' : 'display:none' }}">
    <li><a href="{{ route('help', ['section' => 'subscriptions', 'article' => 'create']) }}" class="{{ request()->section == 'subscriptions' && request()->article == 'create' ? 'active' : '' }}">{{ trans('help.section.subscriptions.article.create.title') }}</a></li>
    <li><a href="{{ route('help', ['section' => 'subscriptions', 'article' => 'delete']) }}" class="{{ request()->section == 'subscriptions' && request()->article == 'delete' ? 'active' : '' }}">{{ trans('help.section.subscriptions.article.delete.title') }}</a></li>
</ul>
