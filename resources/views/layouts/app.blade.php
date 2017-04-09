<!DOCTYPE html>
<html lang="{{ App::getLocale() }}" class="@yield('htmlClasses')">
    <head>
        {{-- Configuration --}}
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/png" href="{{ asset('img/logo.png') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/layouts.css') }}">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=PT+Sans:400,700">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/dashboard.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/report.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('css/components/alerts.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/components/animations.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/components/app-logo.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/components/boxes.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/components/buttons.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/components/chat.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/components/content-group.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/components/forms.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/components/items.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/components/navbar.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/components/notifications.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/components/pagination.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/components/panel.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/components/point-group.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/components/tooltip.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/components/uploader.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('css/errors/status.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('css/help/help.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('css/home/explore.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/home/features.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/home/greeting.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('css/topic/creator.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/topic/discussion.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/topic/item-bar.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/topic/media-gallery.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/topic/user-content.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('css/user/community-preview.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/user/dashboard.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/user/picture.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/user/profile.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/user/subscription.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/user/user-preview.css') }}">

        {{-- Display --}}
        @if (isset($post))
            <title>@raw(str_limit($post->body, 70))</title>
        @else
            <title>{{ trans('app.name') }} - @yield('title')</title>
        @endif

        <meta name="application-name"                   content="{{ trans('app.name') }}">
        {{-- <meta name="keywords"                      content="rapidsay, social network, post, image, share, profile, minecraft"> --}}

        {{-- Open Graph --}}
        <meta property="og:url"                         content="{{ request()->url() }}">
        <meta property="og:site_name"                   content="{{ trans('app.name') }}">

        {{-- Twitter --}}
        <meta name="twitter:card"                       content="summary">

        {{-- Default/Post description --}}
        @if (isset($post))
            <meta property="og:type"                    content="article">
            {{-- Post title --}}
            <meta property="og:title"                   content="{{ $post->user->fullName() }}">
            <meta name="twitter:title"                  content="{{ $post->user->fullName() }}">

            @if ($post->images->count())
                @foreach ($post->images as $image)
                    <meta property="og:image"           content="{{ asset('storage/media/img/' . $image->url . '.png') }}">
                @endforeach
                <meta name="twitter:image"              content="{{ asset('storage/media/img/' . $post->images->first()->url . '.png') }}">
            @endif

            {{-- Post description --}}
            <meta name="description"                    content="@raw($post->body)">
            <meta property="og:description"             content="@raw($post->body)">
            <meta name="twitter:description"            content="@raw($post->body)">

            {{-- Post details --}}
            <meta property="article:author"             content="{{ route('user-profile', $post->user->username) }}">
            <meta property="article:published_time"     content="{{ $post->created_at }}">
            @if (!$post->created_at->eq($post->updated_at))
                <meta property="article:modified_time"  content="{{ $post->updated_at }}">
            @endif
        @elseif (isset($user))
            <meta property="og:type"                    content="profile" />
            <meta property="og:title"                   content="{{ $user->fullName() }}">
            <meta name="twitter:title"                  content="{{ $user->fullName() }}">

            @if ($url = $user->profile_picture)
                <meta property="og:image"               content="{{ asset('storage/user/img/' . $url . '.png') }}">
                <meta name="twitter:image"              content="{{ asset('storage/user/img/' . $url . '.png') }}">
            @endif

            @if ($user->description)
                <meta name="twitter:description"        content="@inline($user->description)">
                <meta property="og:description"         content="@inline($user->description)">
            @else
                <meta name="description"                 content="{{ trans('app.tagline') }}">
                <meta name="twitter:description"         content="{{ trans('app.tagline') }}">
                <meta property="og:description"          content="{{ trans('app.tagline') }}">
            @endif

            @if ($user->first_name && $user->last_name)
                <meta propery="profile:first_name"      content="{{ $user->first_name }}">
                <meta propery="profile:last_name"       content="{{ $user->last_name }}">
            @endif

            <meta propery="profile:username"            content="{{ $user->username }}">
        @else
            {{-- Default title --}}
            @if (request()->path() == "/")
                <meta property="og:title"                   content="{{ trans('app.name') }}">
                <meta name="twitter:title"                  content="{{ trans('app.name') }}">
            @else
                <meta property="og:title"                   content="{{ trans('app.name') }} | @yield('title')">
                <meta name="twitter:title"                  content="{{ trans('app.name') }} | @yield('title')">
            @endif

            {{-- Default description --}}
            <meta name="description"                    content="{{ trans('app.tagline') }}">
            <meta name="twitter:description"            content="{{ trans('app.tagline') }}">
            <meta property="og:description"             content="{{ trans('app.tagline') }}">
        @endif

        {{-- Default image --}}
        <meta property="og:image"                       content="{{ asset('img/logo-fb.png') }}">
        <meta name="twitter:image"                      content="{{ asset('img/logo-twitter.png') }}">

        <meta name="notification-updater-url" content="{{ route('post-notifications') }}">
        <meta name="_token" content="{{ csrf_token() }}">
    </head>
    <body class="{{ App::getLocale() }} @yield('bodyClasses')" @yield('attributes')>
        @yield('body')
        @include('partials.analytics')

        <script src="{{ asset('js/lib/jquery-3.1.1.min.js') }}"></script>
        <script src="{{ asset('js/lib/autosize.min.js') }}"></script>
        <script src="{{ asset('js/Config.js') }}"></script>

        <script src="{{ asset('js/Dropdowns.js') }}"></script>
        <script src="{{ asset('js/topic/Rate.js') }}"></script>
        <script src="{{ asset('js/user/Alert.js') }}"></script>
        <script src="{{ asset('js/user/Subscribe.js') }}"></script>


        @if (auth()->check())
            <script src="{{ asset('js/user/AjaxNotificationUpdater.js') }}"></script>
            <script src="{{ asset('js/user/NotificationLoader.js') }}"></script>
        @endif

        <script src="{{ asset('js/Main.js') }}"></script>
        <script src="{{ asset('js/Navbar.js') }}"></script>
        @yield('scripts')
    </body>
</html>
