@extends('layouts.full-page')
@section('title', trans('about.privacy-policy'))

@section('content')

<div class="content document">
    <div class="back">
        <h1>{{ trans('about.privacy-policy') }}</h1>
        <a href="{{ route('help') }}">&#8249; {{ trans('about.back') }}</a>
        <a href="{{ route('terms-of-use') }}">{{ trans('about.terms-of-use') }}</a>
    </div>
    <p>Last update: 1/5/2017</p>
    <p>By using this website, you agree to this privacy policy.</p>
    <p>Rapidsay uses a database to store information related to accounts, posts, comments, replies and subscriptions. All sensitive data such as emails, passwords (hashed) and preferences are kept private and confidential.</p>
    <p>Rapidsay does not run ads nor does it share any data with advertisers or other third parties. Personal information may be disclosed if requested formally by relevant prosecuting or police authorities and according to law. Rapidsay does not disclose information under any other circumstances.</p>
    <p>The Rapidsay server logs some basic information about each computer connected to the site, such as IP address, device characteristics and browser type. Rapidsay also uses cookies for sessions, language preference, remember me and app related tokens. Rapidsay uses Google Analytics, which also stores cookies.</p>
    <p>Each registered user has the option to enable or disable the following privacy settings:</p>
    <ul>
        <li>Email notifications: An email is sent to the user’s email on Fridays, when there are unread notifications. This option is enabled by default.</li>
        <li>Email Address: The email address used during registration is publicly shown on user’s profile. This option is disabled by default.</li>
        <li>Ratings: When the user rates a post, comment or reply, it will be listed under the user’s activities on his profile. Even when turned off, the creator of the post, comment or reply will receive a notification. This option is disabled by default.</li>
        <li>Online status: A green circle is publicly visible near the profile picture when the user is online. This option is disabled by default.</li>
    </ul>
    <p>Some areas of this website can only be visited by registered users. User profiles, posts, comments and replies are public and can also be accessed by non-registered users.</p>
    <p>For the convenience of Rapidsay users, any links submitted in the text of posts, comments etc. are displayed as links to third party websites. These websites may have their own privacy policies which one should check. Rapidsay does not accept any responsibility or liability for their policies whatsoever and has no control over them.</p>
    <p>Lastly, data related with closing announcements and alerts as well as online status updates are stored in the server’s cache.</p>
    <p>This privacy policy may occasionally be revised, any changes will be posted here.</p>
</div>

@endsection
