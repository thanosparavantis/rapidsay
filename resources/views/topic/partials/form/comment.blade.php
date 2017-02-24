@if (!isset($editType) && !isset($editId))
    @include('topic.partials.form.creator', [
        'action' => route('comment', $post->id),
        'id' => 'comment-creator',
        'bodyName' => 'comment_body',
        'bodyId' => 'comment-body',
        'bodyPlaceholder' => 'comment.creator.body',
        'imagesName' => 'comment_image',
        'imagesSingle' => true,
        'maxLength' => 10000,
        'spamName' => 'comment_name',
        'spamTime' => 'comment_time',
        'submitIcon' => config('glyphicons.comment'),
        'submitText' => 'comment.button.comment',
    ])
@endif
