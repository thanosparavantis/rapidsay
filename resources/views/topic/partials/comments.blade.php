@if ($post->getCommentPaginator()->count())
    <div class="comments">
        @foreach ($post->getCommentPaginator() as $comment)
            @include('topic.partials.user-content', [
                'item' => $comment,
                'expanded' => true,
            ])
        @endforeach
        {{ $post->getCommentPaginator()->links() }}
    </div>
@endif
