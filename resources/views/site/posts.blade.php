<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحة منشورات</title>
    <link rel="stylesheet" href="{{ asset('siteasstes/css/posts.css') }}">
    <link rel="stylesheet" href="{{ asset('siteasstes/css/navbar.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    @livewireStyles
</head>

<body>
    <!-- الشريط العلوي -->
    @include('site.navbar')


    <div class="createPost-button">
        <a href="{{ route('posts.create') }}" style="text-decoration: none;">
            <button>
                <i class="fa fa-plus"></i>
            </button>
        </a>
    </div>

    <!-- معرض الصور -->
    <div class="gallery">

        @foreach ($posts as $post)
            <div class="gallery-item">
                <a href="{{ route('posts.show', $post->id) }}" class="gallery-item-link ">
                    <img src="{{ asset('uploads/postImage/' . $post->images[0]->image) }}" alt="صورة 1" class="post-image">
                </a>
                <div class="author-info">
                    <div class="author-info">
                        <img src="{{ asset('mainassets/img/main_1.jpeg') }}" alt="Author">
                        <div class="author-details">
                            <a href="{{ route('profile.show', $post->user->id) }}" style="text-decoration: none;">
                                <span class="author-name">{{ $post->user->name }}</span>
                            </a>
                            <small class="post-time">{{ $post->created_at ? $post->created_at->diffForHumans() : '' }}</small>
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

        <!-- تكرار العناصر الأخرى مع أيقونات الإجراءات أسفل كل صورة -->
    </div>


    {{-- <div class="post-section">
        <div class="post-item">
            <div class="post-header">
                <img src="{{ asset('mainassets/img/abed.JPG') }}" alt="صورة الناشر" class="author-img">
                <a href="#" class="author-name">اسم الناشر</a>
            </div>
            <div class="post-content">
                <p>هذا هو المنشور الذي يكتبه الناشر، يمكنك وضع النصوص هنا.</p>
            </div>
            <div class="post-actions">
                <button class="like-btn">
                    <i class="fa fa-thumbs-up"></i>
                    <span class="like-count">0</span>
                </button>
                <button class="comment-btn">
                    <i class="fa fa-comment"></i>
                    <span class="comment-count">0</span>
                </button>
                <button class="share-btn">
                    <i class="fa fa-share"></i>
                    مشاركة
                </button>
            </div>
            <div class="comments-section">
                <textarea placeholder="اكتب تعليقك هنا..." class="comment-box"></textarea>
                <button class="submit-comment">إرسال</button>
                <ul class="comments-list"></ul>
            </div>

        </div>
        <div class="post-item">
            <div class="post-header">
                <img src="{{ asset('mainassets/img/abed.JPG') }}" alt="صورة الناشر" class="author-img">
                <a href="#" class="author-name">اسم الناشر</a>
            </div>
            <div class="post-content">
                <p>هذا هو المنشور الذي يكتبه الناشر، يمكنك وضع النصوص هنا.</p>
            </div>
            <div class="post-actions">
                <button class="like-btn">
                    <i class="fa fa-thumbs-up"></i>
                    <span class="like-count">0</span>
                </button>
                <button class="comment-btn">
                    <i class="fa fa-comment"></i>
                    <span class="comment-count">0</span>
                </button>
                <button class="share-btn">
                    <i class="fa fa-share"></i>
                    مشاركة
                </button>
            </div>
            <div class="comments-section">
                <textarea placeholder="اكتب تعليقك هنا..." class="comment-box"></textarea>
                <button class="submit-comment">إرسال</button>
                <ul class="comments-list"></ul>
            </div>

        </div>
        <div class="post-item">
            <div class="post-header">
                <img src="{{ asset('mainassets/img/abed.JPG') }}" alt="صورة الناشر" class="author-img">
                <a href="#" class="author-name">اسم الناشر</a>
            </div>
            <div class="post-content">
                <p>هذا هو المنشور الذي يكتبه الناشر، يمكنك وضع النصوص هنا.</p>
            </div>
            <div class="post-actions">
                <button class="like-btn">
                    <i class="fa fa-thumbs-up"></i>
                    <span class="like-count">0</span>
                </button>
                <button class="comment-btn">
                    <i class="fa fa-comment"></i>
                    <span class="comment-count">0</span>
                </button>
                <button class="share-btn">
                    <i class="fa fa-share"></i>
                    مشاركة
                </button>
            </div>
            <div class="comments-section">
                <textarea placeholder="اكتب تعليقك هنا..." class="comment-box"></textarea>
                <button class="submit-comment">إرسال</button>
                <ul class="comments-list"></ul>
            </div>

        </div>
    </div>

    <button class="next-page-btn">الصفحة التالية</button> --}}


    <script>

        function toggleUserMenu() {
            const userDropdown = document.getElementById("userDropdown");
            if (userDropdown.style.display === "none" || userDropdown.style.display === "") {
                userDropdown.style.display = "block";
            } else {
                userDropdown.style.display = "none";
            }
        }

        function toggleMessages() {
            const messagesDropdown = document.getElementById("messagesDropdown");
            if (messagesDropdown.style.display === "none" || messagesDropdown.style.display === "") {
                messagesDropdown.style.display = "block";
            } else {
                messagesDropdown.style.display = "none";
            }
        }

        // تفاعل مع زر الإعجاب
        document.querySelectorAll('.like-btn').forEach(button => {
            button.addEventListener('click', () => {
                const countSpan = button.querySelector('.like-count');
                let count = parseInt(countSpan.textContent, 10);
                count++;
                countSpan.textContent = count;
            });
        });

        // تفاعل مع زر التعليق
        document.querySelectorAll('.submit-comment').forEach(button => {
            button.addEventListener('click', (e) => {
                const postItem = e.target.closest('.post-item');
                const commentBox = postItem.querySelector('.comment-box');
                const commentList = postItem.querySelector('.comments-list');
                const commentCountSpan = postItem.querySelector('.comment-count');

                if (commentBox.value.trim() !== '') {
                    const newComment = document.createElement('li');
                    newComment.textContent = commentBox.value;
                    commentList.appendChild(newComment);

                    // تحديث عدد التعليقات
                    let commentCount = parseInt(commentCountSpan.textContent, 10);
                    commentCount++;
                    commentCountSpan.textContent = commentCount;

                    // تفريغ خانة النص
                    commentBox.value = '';
                }
            });
        });

        // تفاعل مع زر المشاركة
        document.querySelectorAll('.share-btn').forEach(button => {
            button.addEventListener('click', () => {
                alert('تمت مشاركة المنشور!');
            });
        });

        // تفاعل مع زر الإعجاب
        // document.querySelectorAll('.like-btn').forEach(button => {
        //     button.addEventListener('click', () => {
        //         const countSpan = button.querySelector('.like-count');
        //         let count = parseInt(countSpan.textContent, 10);
        //         count++;
        //         countSpan.textContent = count;
        //     });
        // });


        // تفاعل مع زر المشاركة
        document.querySelectorAll('.share-btn').forEach(button => {
            button.addEventListener('click', () => {
                alert('تمت مشاركة المنشور!');
            });
        });
    </script>
    <script src="{{ asset('siteasstes/js/navbar.js') }}"></script>
    @livewireScripts
</body>

</html>
