@if (auth()->check())
    {{-- If authenticated show button. --}}
    <a href="{{ route('rate', [$item->getType(), $item->id])  }}" class="btn {{ auth()->check() && $item->hasRated() ? 'green' : 'blue' }}" id="rate-button">
        <i class="fa fa-{{ config('glyphicons.rating') }} space-right" aria-hidden="true"></i>
        {{ auth()->check() && $item->hasRated() ? trans('rating.button.rated') : trans('rating.button.rate') }}
        <span class="count space-left">{{ $item->ratings->count() ? '(' . number_format($item->ratings->count()) . ')' : '' }}</span>
    </a>
@elseif ($item->ratings->count())
    {{-- If guest show simple rating count. --}}
    <i class="fa fa-{{ config('glyphicons.rating') }} space-right" aria-hidden="true"></i>{{ number_format($item->ratings->count()) }}
@endif
