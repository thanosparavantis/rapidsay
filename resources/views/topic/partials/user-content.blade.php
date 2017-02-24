@if (isset($editType) && isset($editId) && $editType == $item->getType() && $editId == $item->id)
    @include('topic.partials.form.edit')
@else
    <div class="user-content {{ (isset($expanded) && $expanded) ? 'expanded' : '' }} {{ (isset($nested) && $nested) ? 'nested' : '' }}" id="{{ $item->getType() }}-{{ $item->id }}">
        @include('topic.partials.media.gallery', [
            'item' => $item instanceof Forum\Rating ? $item->rateable : $item,
            'link' => !isset($expanded) || !$expanded,
        ])
        @if (!isset($expanded) || !$expanded)<div class="main">@endif
            <div class="text">
                @include('topic.partials.header')
                @include('topic.partials.body')
                @include('topic.partials.references')
            </div>
            @include('topic.partials.footer')
        @if (!isset($expanded) || !$expanded)</div>@endif
    </div>
@endif

@include('topic.partials.form.reply')
@include('topic.partials.replies')
