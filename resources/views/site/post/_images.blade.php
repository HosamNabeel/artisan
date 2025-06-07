<div id="postCarousel" class="carousel slide post-image" data-bs-ride="carousel">

    @if ($post->images->count() > 1)
        <!-- عدد الصور  -->
        <div class="carousel-counter">
            <span id="currentSlide">1</span> / <span id="totalSlides">{{ $post->images->count() }}</span>
        </div>

        <!-- عناصر التحكم بالصور-->
        <button class="carousel-control-prev" type="button" data-bs-target="#postCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#postCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    @endif

    <!-- عرض صور المنشور -->
    <div class="carousel-inner">
        @foreach ($post->images as $image)
            <div class="carousel-item @if ($loop->first) active @endif">
                <img src="{{ asset('uploads/postImage/' . $image->image) }}" class="d-block w-100" alt="Post Image 1">
            </div>
        @endforeach
    </div>


</div>
