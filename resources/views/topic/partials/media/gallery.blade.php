@if (method_exists($item, 'images') && $item->images()->count())
    @if (isset($link) && $link)
        <a href="{{ $item->route() }}" class="media-gallery {{ (isset($expanded) && $expanded) ? 'expanded' : '' }}">
    @else
        <div class="media-gallery {{ (isset($expanded) && $expanded) ? 'expanded' : '' }}">
    @endif
        @if (isset($expanded) && $expanded)
            @foreach ($item->images()->get() as $image)
                <div class="container">
                    <div class="image" style="background-image: url({{ $url = asset('storage/media/img/' . $image->url . '.png') }})"></div>
                    <meta itemprop="image" content="{{ $url }}">
                    @if (isset($deleteImages) && $deleteImages)
                        <a href="{{ route('delete-image', [$item->getType(), $image->imageable_id, $image->url]) }}" class="delete tooltip">
                            <i class="fa fa-times" aria-hidden="true"></i>
                            <div class="tooltip-text">{{ trans('image.tooltip.delete') }}</div>
                        </a>
                    @endif
                </div>
            @endforeach
        @else
            <div class="image" style="background-image: url({{ asset('storage/media/img/' . $item->images()->first()->url . '.png') }})"></div>
        @endif
    @if (isset($link) && $link)
        </a>
    @else
        </div>
    @endif
@endif
