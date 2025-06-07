<nav class="navbar">
    <!-- اليمين -->
    <div class="navbar-right">
        <a href="{{ route('profile.show',auth()->id()) }}" style="text-decoration: none;">
            <img src="{{ asset('mainassets/img/ahmad.jpg') }}" alt="User" class="user-profile">
        </a>
        <form class="search-form">
            <input type="text" placeholder="ابحث هنا...">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>

    <!-- المنتصف -->
    <div class="navbar-center">
        <a href="{{ route('posts.index') }}" style="text-decoration: none;">
            <h1 class="site-name">لمسات زخرفية</h1>
        </a>
    </div>

    <!-- اليسار -->
    <div class="navbar-left" style="position: relative;">
        <a href="#" class="nav-icon notification-icon" onclick="toggleNotifications()">
            <i class="fa fa-bell"></i>
            @if (auth()->user()->unreadnotifications->count() != 0)
                <span class="badge">{{ auth()->user()->unreadnotifications->count() }}</span>
            @endif
        </a>

        <div id="notification-menu" style="display: none;">
            <div class="notification-header">
                <h4>الاشعارات</h4>
                <i class="fa fa-cog settings-icon"></i>
            </div>
            @if(auth()->user()->notifications->count() !== 0)
                <ul class="notification-list">
                    @foreach (auth()->user()->notifications as $notification)
                        <li class="notification-item unread">
                            <a href="{{ route('profile.show',$notification->data['user_id']) }}" style="text-decoration: none;">
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

                <div class="notification-footer">
                    <a href="{{ route('all_notifications') }}">عرض كل الاشعارات</a>
                </div>
            @else
                <h3 class="no-notifications">لا يوجد اشعارات</h3>
            @endif
        </div>

        <a href="#" class="nav-icon messages-icon" onclick="toggleMessages()">
            <i class="fa fa-envelope"></i><span class="badge">5</span>
        </a>
        <a href="{{ route('posts.index') }}" class="nav-icon"><i class="fa fa-home"></i></a>
    </div>
</nav>
