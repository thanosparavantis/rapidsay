@if (isset($replyType) && isset($replyId) && $replyType == $item->getType() && $replyId == $item->id)
    @include('topic.partials.form.creator', [
        'nested' => true,
        'action' => route('post-reply', [$replyType, $replyId]),
        'id' => 'reply-creator',
        'bodyName' => 'reply_body',
        'bodyId' => 'reply-body',
        'bodyPlaceholder' => 'reply.creator.body',
        'imagesName' => 'reply_image',
        'imagesSingle' => true,
        'maxLength' => 10000,
        'autofocus' => 'true',
        'spamName' => 'reply_name',
        'spamTime' => 'reply_time',
        'submitIcon' => config('glyphicons.reply'),
        'submitText' => 'reply.button.reply',
    ])
@endif
