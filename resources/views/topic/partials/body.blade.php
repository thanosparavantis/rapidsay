@if (isset($expanded) && $expanded)
    <div class="body">@parse(method_exists($item, 'rateable') ? $item->rateable->body : $item->body)</div>
@else
    <a href="{{ $item->route() }}" class="body">
        @parsesafe(str_limit(method_exists($item, 'rateable') ? $item->rateable->body : $item->body, 1000))
    </a>
@endif
