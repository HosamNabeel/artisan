<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>profile</title>
    <link rel="stylesheet" href="{{ asset('profileassets/css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('siteasstes/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('siteasstes/css/posts_gallery.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <!-- navbar -->
    @include('site.navbar')


    <div class="container">
        <div class="profile-header">
            <img src="{{ asset('mainassets/img/ahmad.jpg') }}" alt="Profile Picture" class="profile-picture">
            <div class="profile-info">
                <h1 class="profile-name">{{ $user->name }}</h1>
                <p class="profile-bio"><i class="fa-sharp fa-solid fa-tags"></i>Designer | Photographer | Traveler</p>
                <p class="profile-bio"><i class="fa-sharp fa-solid fa-envelope"></i>{{ $user->email }}</p>
                <p class="profile-bio"><i class="fa-sharp fa-solid fa-building"></i>{{ $user->address }}</p>
                <p class="profile-bio"><i class="fa-sharp fa-solid fa-calendar"></i>{{ $user->birthday }}</p>
            </div>
            <div class="buttons">
                {{-- @livewire('follow', ['user' => $user]) --}}
                @if ($user->id != auth()->id())
                    {{-- @livewire('follow', ['user' => $user]) --}}
                    @if (auth()->user()->id != $user->id && !auth()->user()->following()->where('follow_id', $user->id)->exists())
                        <form action="{{ route('follow.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <button class="follow-btn">متابعة</button>
                        </form>
                    @elseif (auth()->user()->id != $user->id)
                        <form action="{{ route('follow.delete') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <button class="unfollow-btn">تتابع</button>
                        </form>
                    @endif
                    <button class="massege-btn"><i class="fa-sharp fa-solid fa-paper-plane"></i>  مراسلة</button>
                @endif
                @if ($user->id == auth()->id())
                    <a href="{{ route('profile.edit', auth()->id()) }}" style="text-decoration: none;">
                        <button  class="post-btn">تعديل الملف الشخصي </button>
                    </a>
                    <a href="{{ route('posts.create') }}" style="text-decoration: none;">
                        <button class="follow-btn"> كتابة منشور</button>
                    </a>
                @endif

            </div>
        </div>

        <!-- Stats Section -->
        <div class="profile-stats">
            <div id="openFollowersModal" class="stat-item">
                <i class="stat-icon fa-sharp fa-solid fa-user-friends" style="color: blue;"></i>
                <strong>{{ $user->following->count() }}</strong>
                <span>متابع</span>
            </div>
            <div id="followersModal" class="modal">
                <div class="modal-content">
                    <span id="closeFollowersModal" class="close-button">&times;</span>
                    <h2>المتابعون ({{ $user->following->count() }})</h2>
                    <ul class="followers-container">
                        @foreach ($user->follows as $follow)
                            <li class="follower-item">
                                <div class="follower-info">
                                    <img src="{{ asset('mainassets/img/ahmad.jpg') }}" alt="User Image" class="follower-avatar">
                                    <div class="follower-details">
                                        <a href="{{ route('profile.show',$follow->id) }}" style="text-decoration: none;">
                                            <p class="follower-name">{{ $follow->name }}</p>
                                        </a>
                                        <p class="follower-count">{{ $follow->following->count() }} متابع</p>
                                    </div>
                                </div>
                                @if (auth()->user()->id != $follow->id && !auth()->user()->following()->where('follow_id', $follow->id)->exists())
                                    <form action="{{ route('follow.add') }}" method="POST" class="follow-form">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $follow->id }}">
                                        <button class="btn follow-btn">متابعة</button>
                                    </form>
                                @elseif (auth()->user()->id != $follow->id)
                                    <form action="{{ route('follow.delete') }}" method="POST" class="unfollow-form">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $follow->id }}">
                                        <button class="btn unfollow-btn">الغاء المتابعة</button>
                                    </form>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div id="openFollowsModal" class="stat-item">
                <i class="stat-icon fa-sharp fa-solid fa-eye" style="color: #00bcd4;"></i>
                <strong>{{ $user->follows->count() }}</strong>
                <span>يتابع</span>
            </div>
            <div id="followsModal" class="modal">
                <div class="modal-content">
                    <span id="closeFollowsModal" class="close-button">&times;</span>
                    <h2>تتابع ({{ $user->follows->count() }})</h2>
                    <ul class="followers-container">
                        @foreach ($user->follows as $follow)
                            <li class="follower-item">
                                <div class="follower-info">
                                    <img src="{{ asset('mainassets/img/ahmad.jpg') }}" alt="User Image" class="follower-avatar">
                                    <div class="follower-details">
                                        <a href="{{ route('profile.show',$follow->id) }}" style="text-decoration: none;">
                                            <p class="follower-name">{{ $follow->name }}</p>
                                        </a>
                                        <p class="follower-count">{{ $follow->following->count() }} متابع</p>
                                    </div>
                                </div>
                                @if (auth()->user()->id != $follow->id && !auth()->user()->following()->where('follow_id', $follow->id)->exists())
                                    <form action="{{ route('follow.add') }}" method="POST" class="follow-form">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $follow->id }}">
                                        <button class="btn follow-btn">متابعة</button>
                                    </form>
                                @elseif (auth()->user()->id != $follow->id)
                                    <form action="{{ route('follow.delete') }}" method="POST" class="unfollow-form">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $follow->id }}">
                                        <button class="btn unfollow-btn">الغاء المتابعة</button>
                                    </form>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="stat-item">
                <i class="stat-icon fa-sharp fa-solid fa-heart" style="color: red;"></i>
                <strong>150</strong>
                <span>اعجاب</span>
            </div>
            <div class="stat-item">
                <i class="stat-icon fa-sharp fa-solid fa-file-alt" style="color: #ff9800;"></i>
                <strong>{{ $user->posts->count() }}</strong>
                <span>منشور</span>
            </div>
            <div class="stat-item">
                <i class="stat-icon fa-sharp fa-solid fa-shopping-bag" style="color: #ff6600;"></i>
                <strong>3</strong>
                <span>الطلبات</span>
            </div>
        </div>

        {{-- <div class="profile-header">
            <img src="{{asset('mainassets/img/abed.JPG')}}" alt="User Image" class="profile-image">
            <div class="profile-info">
                <h2>اسم المستخدم</h2>
                <p>وصف قصير عن المستخدم. يمكن أن يحتوي على معلومات عن الوظيفة أو الهوايات.</p>
            </div>
            <div class="profile-actions">
                <button><i class="fa fa-user-plus"></i> متابعة</button>
                <button><i class="fa fa-envelope"></i> <a
                        href="{{ url('conversations?receiver_id=').base64_encode(5) }}" class="massege-btn">
                        مراسلة</a></button>
                <button><i class="fa fa-pen"></i> كتابة منشور</button>
                <button><i class="fa fa-edit"></i> <a
                        href="{{route('profile.edit', ['profile' => auth()->user()->id])}}" class="follow-btn"> تعديل
                        الصفحة الشخصية </a></button>

            </div>
        </div> --}}
        {{-- <div class="stats">
            <div class="stat-item">
                <h3>300</h3>
                <p><i class="fa fa-users"></i> المتابعين</p>
            </div>
            <div class="stat-item">
                <h3>45</h3>
                <p><i class="fa fa-file-alt"></i> المنشورات</p>
            </div>
            <div class="stat-item">
                <h3>120</h3>
                <p><i class="fa fa-thumbs-up"></i> الإعجابات</p>
            </div>
            <div class="stat-item">
                <h3>20</h3>
                <p><i class="fa fa-shopping-cart"></i> الطلبات</p>
            </div>
            <div class="stat-item">
                <h3>150</h3>
                <p><i class="fa fa-user-friends"></i> يتابع</p>
            </div>
        </div> --}}
    </div>

    <div class="container" id="container4">
        <div class="gallery_work">
            <h2>الأعمال</h2>
            <div class="gallery_work-grid">
                <img src="{{asset('mainassets/img/00228992aaee358292b2bbdf21b91ae4.jpg')}}" alt="صورة 1">
                <img src="{{asset('mainassets/img/1bc824873efc7693476b6ac886dd9ad9.jpg')}}" alt="صورة 1">
                <img src="{{asset('mainassets/img/f09a8c0b30fdbc59d57959c15c10fca6.jpg')}}" alt="صورة 1">
                <img src="{{asset('mainassets/img/e1f6c999fcab91e567948c8930d09f4f.jpg')}}" alt="صورة 1">
            </div>
        </div>
    </div>

    <div class="container" id="container3">
        <div class="timeline">
            <h2>المنشورات</h2>
            <div class="gallery">
                @foreach ($user->posts as $post)
                    <div class="gallery-item">
                        <a href="{{ route('posts.show', $post->id) }}" class="gallery-item-link ">
                            <img src="{{ asset('uploads/postImage/' . $post->images[0]->image) }}" alt="صورة 1" class="post-image">
                        </a>
                        <div class="author-info-posts">
                            <div class="author-info-posts">
                                <img src="{{ asset('mainassets/img/main_1.jpeg') }}" alt="Author">
                                <div class="author-details">
                                    <a href="{{ route('profile.show',$post->user->id) }}" style="text-decoration: none;">
                                        <span class="author-name-posts">{{ $post->user->name }}</span>
                                    </a>
                                    <small class="post-time-posts">{{ $post->created_at ? $post->created_at->diffForHumans() : '' }}</small>
                                </div>
                            </div>
                            {{-- @livewire('follow', ['post' => $post]) --}}
                        </div>

                        <p class="post-title">{{ $post->title }}</p>
                        <p class="post-content">{{ Str::limit($post->content, 18, '...') }}</p>

                        <div class="actions">

                            @livewire('posts-love', ['post' => $post])

                            <div class="comment-button">
                                <a href="{{ route('posts.show', $post->id) }}" style="text-decoration: none;">
                                    <i class="fa-regular fa-comment"></i>
                                </a>
                            </div>
                            <div class="comment-button">
                                <i class="fa fa-share"></i>
                            </div>
                            <div class="bookmark-button">
                                <i class="fa-regular fa-bookmark"></i>
                            </div>

                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container" id="container2">
        <div class="section">
            <h2>القصة والأعمال <i class="fa fa-book"></i></h2>
            <p>
                يعد هذا المستخدم من الأشخاص المميزين في مجاله. بدأ مشواره منذ سنوات طويلة، حيث عمل على تطوير
                نفسه واكتساب الخبرات في مختلف المجالات. من خلال أعماله المبتكرة، استطاع أن يجذب اهتمام العديد من
                المتابعين والعملاء. يركز دائمًا على الجودة والإبداع في كل ما يقدمه.
            </p>
        </div>
    </div>

    <div id="container5" class="container1">
        <div class="section1">
            <h2><i class="fa fa-trophy"></i> الأوسمة والإنجازات</h2>
            <ul>
                <li>وسام الإبداع</li>
                <li>أفضل مصمم للعام</li>
                <li>شهادة احترافية في البرمجة</li>
            </ul>
        </div>
    </div>

    <div id="container7" class="container1">
        <div class="section1">
            <h2><i class="fa fa-share-alt"></i> السوشيال ميديا</h2>
            <p>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
                <a href="#"><i class="fab fa-github"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </p>
        </div>
    </div>

    <div id="container6" class="container1">
        <div class="section1">
            <h2><i class="fa fa-star"></i> التقييمات</h2>
            <p>⭐⭐⭐⭐⭐ تقييم عام: ممتاز</p>
        </div>
    </div>





    <script src="{{ asset('profileassets/js/profile.js') }}"></script>
    <script src="{{ asset('siteasstes/js/navbar.js') }}"></script>
</body>

</html>
