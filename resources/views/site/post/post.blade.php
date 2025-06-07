<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>منشور</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('siteasstes/css/post.css') }}">
    <link rel="stylesheet" href="{{ asset('siteasstes/css/posts_gallery.css') }}">
    <link rel="stylesheet" href="{{ asset('emojionearea/emojionearea.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @livewireStyles
</head>

<body>

    <div class="back-button">
        <button onclick="window.history.back()">
            <i class="fa fa-arrow-left"></i>
        </button>
    </div>

    <div class="post-container">

        {{-- صور المنشور --}}
        @include('site.post._images')

        {{-- post details --}}
        @include('site.post._details')

        <!-- التعليقات -->
        <div class="comments-section">

            @livewire('comments', ['post' => $post])

            {{-- اضافة وتعديل تعليق --}}
            @livewire('comment-form', ['post' => $post])

        </div>
    </div>


    <div class="related-posts">
        <h3>منشورات مشابهة</h3>
        <div class="gallery">
            @foreach ($posts as $post)
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
                        @livewire('follow', ['post' => $post])
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

    <script src="{{ asset('emojionearea/emojionearea.min.js') }}"></script>
    <script src="{{ asset('siteasstes/js/post.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".emojionearea").emojioneArea();
        });
    </script>

    @livewireScripts
</body>

</html>
