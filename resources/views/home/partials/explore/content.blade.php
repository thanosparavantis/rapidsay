@if ($amount = $results->count())
    @foreach ($results as $result)
        @if ($result instanceof Forum\User)
            @include('user.partials.user-preview', ['user' => $result])
        @elseif ($result instanceof Forum\Post)
            @include('topic.partials.user-content', ['item' => $result])
        @endif
    @endforeach
@else
    <div class="empty-content">{{ trans('home.explore.none') }}</div>
@endif
