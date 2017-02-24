<ul class="items-inline stats">
    <li><i class="fa fa-{{ config('glyphicons.user') }} space-right" aria-hidden="true"></i>{{ $userCount }} {{ trans_choice('admin.stats.users', $userCount) }}</li>
    <li><i class="fa fa-{{ config('glyphicons.post') }} space-right" aria-hidden="true"></i>{{ $postCount }} {{ trans_choice('admin.stats.posts', $postCount) }}</li>
    <li><i class="fa fa-{{ config('glyphicons.image') }} space-right" aria-hidden="true"></i>{{ $imageCount }} {{ trans_choice('admin.stats.images', $imageCount) }}</li>
    <li><i class="fa fa-{{ config('glyphicons.rating') }} space-right" aria-hidden="true"></i>{{ $ratingCount }} {{ trans_choice('admin.stats.ratings', $ratingCount) }}</li>
</ul>