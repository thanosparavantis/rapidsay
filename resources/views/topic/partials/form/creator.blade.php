@if (isset($item))
    <span id="{{ $item->getType() }}-{{ $item->id }}"></span>
@endif

<form action="{{ $action }}" method="post" class="creator {{ (isset($nested) && $nested) ? 'nested' : '' }}" id="{{ $id }}" enctype="multipart/form-data" data-discard-message="{{ trans('user.data-loss') }}">
    {{ csrf_field() }}

    <div class="input">
        {{-- Identity --}}
        <ul class="identity items-inline with-space">
            <li>
                @include('partials.profile-picture', ['user' => auth()->user(), 'size' => 'small', 'plain' => true])
            </li>
            <li>
                <h1>{{ auth()->user()->fullName() }}</h1>
            </li>
        </ul>

        {{-- Body --}}
        <textarea
            name="{{ $bodyName }}"
            id="{{ $bodyId }}"
            class="field {{$errors->has('body') ? 'error' : '' }}"
            placeholder="{{ trans($bodyPlaceholder) }}"
            maxlength="{{ $maxLength }}"
            rows="2"
            autocomplete="off"
            required
            {{ (isset($autofocus) && $autofocus) ? 'autofocus' : '' }}
        >{{ isset($relativeItem) ? $relativeItem->body : old($bodyName) }}</textarea>
    </div>

    {{-- Anti-Spam --}}
    {!! Honeypot::generate($spamName, $spamTime) !!}

    @if (isset($relativeItem))
        @include('topic.partials.media.gallery', ['item' => $relativeItem, 'deleteImages' => true])
    @endif

    {{-- Footer --}}
    <ul class="items-inline with-space">
        <li id="word-count" class="counter">{{ $maxLength }}</li>
        <li id="{{ $imagesName }}{{ (!isset($imagesSingle) || !$imagesSingle) ? '[]' : '' }}-processing" style="display: none;" class="full">
            <span>{{ trans('app.processing') }}</span>
        </li>
        @if ($errors->has($bodyName) || $errors->has($spamName) || $errors->has($spamTime))
        <li>
            <span class="error">{{ $errors->first() }}</span>
        </li>
        @endif
        <li class="flex-left">
            <button type="button" class="btn blue media tooltip">
                @include('topic.partials.media.image-button', [
                    'name' => $imagesName . ((!isset($imagesSingle) || !$imagesSingle) ? '[]' : ''),
                    'single' => isset($imagesSingle) && $imagesSingle,
                ])
                <div class="tooltip-text">{{ trans('image.tooltip.upload') }}</div>
            </button>
        </li>
        <li>
            <button type="submit" name="submit" class="btn blue" id="post-create-button">
                <i class="fa fa-{{ $submitIcon }} space-right" aria-hidden="true"></i>{{ trans($submitText) }}
            </button>
        </li>
    </ul>
</form>
