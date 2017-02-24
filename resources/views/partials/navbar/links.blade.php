<li>
    <a href="{{ route('home') }}" class="{{ request()->route()->getName() == 'home' ? 'active' : '' }}">
        <i class="fa fa-home space-right" aria-hidden="true"></i>{{ trans('page.title.home') }}
    </a>
</li>
<li itemprop="name">
    <a itemprop="url" href="{{ route('explore') }}" class="{{ request()->route()->getName() == 'explore' ? 'active' : '' }}">
        <i class="fa fa-map-o space-right" aria-hidden="true"></i>{{ trans('page.title.explore') }}
    </a>
</li>
<li itemprop="name">
    <a itemprop="url" href="{{ route('community') }}" class="{{ request()->route()->getName() == 'community' ? 'active' : '' }}">
        <i class="fa fa-trophy space-right" aria-hidden="true"></i>{{ trans('page.title.community') }}
    </a>
</li>
