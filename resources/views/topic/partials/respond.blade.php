@if (auth()->check())
    {{-- Show response button only if authenticated. --}}

    @if ($item instanceof Forum\Post)

    <a href="{{ $item->route() }}#comment-creator" class="btn blue">

    @elseif ($item instanceof Forum\Comment)

    <a href="{{ route('reply', [$item->getType(), $item->id]) }}?page={{ $item->getExactPage() }}&comment-{{ $item->id }}-page={{ $item->getReplyPaginator()->currentPage() }}#comment-{{ $item->id }}" class="btn blue">

    @else

    <a href="{{ route('reply', [$item->getType(), $item->id]) }}?page={{ $item->comment->getExactPage() }}&comment-{{ $item->comment->id }}-page={{ $item->getExactPage() }}#reply-{{ $item->id }}" class="btn blue">

    @endif

        <i class="fa fa-{{ config('glyphicons.' . $item->getType()) }} space-right" aria-hidden="true"></i>

        @if ($item instanceof Forum\Post)
            {{ trans('comment.button.comment') }}
        @else
            {{ trans('reply.button.reply') }}
        @endif

        @if (!isset($nested) || !$nested)
            {{-- If not nested, display the comment/reply count. --}}

            <span class="count space-left">
                @if ($item instanceof Forum\Post)
                    {{ $item->comments->count() ? ' (' . number_format($item->comments->count()) . ')' : '' }}
                @elseif ($item instanceof Forum\Comment)
                    {{ $item->replies->count() ? ' (' . number_format($item->replies->count()) . ')' : '' }}
                @else
                    {{ $item->comment->replies->count() ? ' (' . number_format($item->comment->replies->count()) . ')' : '' }}
                @endif
            </span>
        @endif
    </a>
@endif
