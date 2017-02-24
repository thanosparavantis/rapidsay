<h2 id="reports-toggle">{{ trans('help.section.reports.title') }}</h2>
<ul class="sub-section" id="reports" style="{{ request()->section == 'reports' ? 'display:block' : 'display:none' }}">
    <li><a href="{{ route('help', ['section' => 'reports', 'article' => 'create']) }}" class="{{ request()->section == 'reports' && request()->article == 'create' ? 'active' : '' }}">{{ trans('help.section.reports.article.create.title') }}</a></li>
</ul>
