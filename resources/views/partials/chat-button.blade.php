@if (request()->path() != "chat")
    <a href="{{ route('chat') }}" class="chat-button">
        <i class="fa fa-comments space-right" aria-hidden="true"></i>
        {{ trans('page.title.chat') }}
    </a>
@endif
