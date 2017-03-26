<h2 id="posts-toggle">
    {{ trans('help.section.activity.title') }}
</h2>

<ul class="sub-section" id="posts" style="{{ request()->section == 'activity' ? 'display:block' : 'display:none' }}">
    <li>
        <a href="{{ route('help', ['section' => 'activity', 'article' => 'all']) }}" class="{{ request()->section == 'activity' && request()->article == 'all' ? 'active' : '' }}">
            {{ trans('help.section.activity.article.all.title') }}
        </a>
    </li>
    <li>
        <a href="{{ route('help', ['section' => 'activity', 'article' => 'create']) }}" class="{{ request()->section == 'activity' && request()->article == 'create' ? 'active' : '' }}">
            {{ trans('help.section.activity.article.create.title') }}
        </a>
    </li>
    <li>
        <a href="{{ route('help', ['section' => 'activity', 'article' => 'comment']) }}" class="{{ request()->section == 'activity' && request()->article == 'comment' ? 'active' : '' }}">
            {{ trans('help.section.activity.article.comment.title') }}
        </a>
    </li>
    <li>
        <a href="{{ route('help', ['section' => 'activity', 'article' => 'image']) }}" class="{{ request()->section == 'activity' && request()->article == 'image' ? 'active' : '' }}">
            {{ trans('help.section.activity.article.image.title') }}
        </a>
    </li>
    <li>
        <a href="{{ route('help', ['section' => 'activity', 'article' => 'format']) }}" class="{{ request()->section == 'activity' && request()->article == 'format' ? 'active' : '' }}">
            {{ trans('help.section.activity.article.format.title') }}
        </a>
    </li>
</ul>
