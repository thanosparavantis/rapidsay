<footer class="footer">
    <ul class="items-inline space">
        <li><a href="{{ route('help') }}">{{ trans('page.title.help') }}</a></li>
        <li class="flex-left">{{ trans('app.last_update', ['time' => $lastAppUpdate->diffForHumans()]) }}</li>
    </ul>
</footer>