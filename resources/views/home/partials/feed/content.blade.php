@foreach ($feed as $post)
    @include('topic.partials.user-content', ['item' => $post])
@endforeach
