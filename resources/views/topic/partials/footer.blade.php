@if (auth()->check() || $item->ratings->count())
    <ul class="footer items-inline with-space">
        <li>
            @include('topic.partials.rating', ['item' => $item instanceof Forum\Rating ? $item->rateable : $item])
        </li>

        @if (!$item instanceof Forum\Post || !isset($expanded) || !$expanded)
            <li>
                @include('topic.partials.respond', ['item' => $item instanceof Forum\Rating ? $item->rateable : $item])
            </li>
        @endif

        @if (auth()->check() && isset($expanded) && $expanded)
            @can ('report', $item)
                <li class="flex-left">
                    <a href="{{ route('report', [$item->getType(), $item->id]) }}" class="btn gray">
                        <i class="fa fa-{{ config('glyphicons.report') }} space-right" aria-hidden="true"></i>
                        {{ trans('report.button.report') }}
                    </a>
                </li>
            @endcan

            @can ('edit', $item)
                <li class="flex-left">
                    @if ($item instanceof Forum\Comment)
                        <a href="{{ route('edit-' . $item->getType(), $item->id) }}?page={{ $item->getExactPage() }}&comment-{{ $item->id }}-page={{ $item->getReplyPaginator()->currentPage() }}#comment-{{ $item->id }}" class="btn gray">
                    @elseif ($item instanceof Forum\Reply)
                        <a href="{{ route('edit-' . $item->getType(), $item->id) }}?page={{ $item->comment->getExactPage() }}&comment-{{ $item->comment->id }}-page={{ $item->getExactPage() }}#reply-{{ $item->id }}" class="btn gray">
                    @else
                        <a href="{{ route('edit-' . $item->getType(), $item->id) }}" class="btn gray">
                    @endif

                        <i class="fa fa-{{ config('glyphicons.edit') }}" aria-hidden="true"></i><span class="hide-mobile space-left">{{ trans('post.button.edit') }}</span>
                    </a>
                </li>
            @endcan

            @can ('delete', $item)
                <li>
                    <a href="{{ route('delete-' . $item->getType(), $item->id) }}" data-confirm-dialog="{{ trans($item->getType() . '.message.confirm-delete') }}" class="btn gray">
                        <i class="fa fa-{{ config('glyphicons.delete') }}" aria-hidden="true"></i><span class="hide-mobile space-left">{{ trans('post.button.delete') }}</span>
                    </a>
                </li>
            @endcan
        @endif
    </ul>
@endif
