@if (isset($expanded) && $expanded && $item instanceof Forum\Comment)
    @foreach ($item->getReplyPaginator() as $reply)
        @include('topic.partials.user-content', [
            'item' => $reply,
            'nested' => true,
        ])
    @endforeach
    {{ $item->getReplyPaginator()->links() }}
@endif
