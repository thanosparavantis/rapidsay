@if (!$item instanceof Forum\Post && (!isset($expanded) || !$expanded))
    <div class="references">
        @if ($item instanceof Forum\Comment || $item instanceof Forum\Reply)
            <div class="item">
                <i class="fa fa-{{ config('glyphicons.' . $item->getType()) }} space-right" aria-hidden="true"></i>{{ trans($item->getType() . '.reference') }} <a href="{{ method_exists($item, 'post') ? $item->post->route() : $item->comment->route() }}">@raw(str_limit(method_exists($item, 'post') ? $item->post->body : $item->comment->post->body, 200))</a>
            </div>
        @elseif ($item instanceof Forum\Rating)
            @if ($item->rateable instanceof Forum\Comment || $item->rateable instanceof Forum\Reply)
                <div class="item">
                    <i class="fa fa-{{ config('glyphicons.' . $item->getType()) }} space-right" aria-hidden="true"></i>{{ trans($item->getType() . '.reference') }} <a href="{{ method_exists($item->rateable, 'post') ? $item->rateable->post->route() : $item->rateable->comment->route() }}">@raw(str_limit(method_exists($item->rateable, 'post') ? $item->rateable->post->body : $item->rateable->comment->post->body, 200))</a>
                </div>
            @endif
            <div class="item">
                <i class="fa fa-{{ config('glyphicons.rating') }} space-right" aria-hidden="true"></i>{{ trans($item->getType() . '.rated', ['name' => $item->user->fullName()]) }}
            </div>
            @if (auth()->check() && !auth()->user()->show_ratings && auth()->user()->id == $item->user->id)
                <div class="item">
                    <i class="fa fa-{{ config('glyphicons.private') }} space-right" aria-hidden="true"></i>{{ trans('rating.private') }}
                </div>
            @endif
        @endif
    </div>
@endif
