<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الاشعارات</title>
    <link rel="stylesheet" href="{{ asset('siteasstes/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('siteasstes/css/readNotify.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body>
    <!-- الشريط العلوي -->
    @include('site.navbar')

    <div class="notify-container">
        <h3 class="notify_count"> اشعارات غير مقروءة ({{ auth()->user()->unreadnotifications->count() }})</h3>
        <ul class="read-notification-list">
            @foreach (auth()->user()->notifications as $notification)
                <li class="notification-item unread">
                    <a href="{{ route('profile.index') }}" style="text-decoration: none;">
                        <div class="user-avatar-wrapper">
                            <img src="{{ asset('mainassets/img/ahmad.jpg') }}" alt="User" class="user-avatar">
                            <div class="notification-type">
                                @if ($notification->type === 'App\Notifications\NewFollow')
                                    <i class="fa fa-user-plus icon-follow"></i>
                                @elseif ($notification->type === 'App\Notifications\NewComment')
                                    <i class="fa fa-comment icon-commen"></i>
                                @elseif ($notification->type === 'App\Notifications\NewReply')
                                    <i class="fa fa-reply"></i>
                                @else
                                    <i class="fa fa-heart icon-like"></i>
                                @endif
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('read_notify', $notification->id) }}" style="text-decoration: none;">
                        <div class="notification-details">
                            <p>{{ $notification->data['message']  }}</p>
                            <span class="notification-time">{{ $notification->created_at->format('F d ,Y') }}</span>
                        </div>
                    </a>

                    @if (!$notification->read_at)
                        <span class="notification-status"></span>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>


    <script src="{{ asset('siteasstes/js/navbar.js') }}"></script>
</body>

</html>
