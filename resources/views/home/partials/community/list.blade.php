@if ($users->count())
    @foreach ($users as $user)
        @include('user.partials.community-preview', ['user' => $user])
    @endforeach
@else
    <div class="empty-content">{{ trans('home.community.none') }}</div>
@endif
