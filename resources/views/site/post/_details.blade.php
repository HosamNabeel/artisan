{{-- صاحب المنشور وعنوان ومحتوى المنشور والتفاعلات مع المنشور --}}
<div class="post-details">
    <div class="author-info">
        <a href="{{ route('profile.show',$post->user->id) }}" style="text-decoration: none;">
            <div class="author-info">
                <img src="{{ asset('mainassets/img/main_1.jpeg') }}" alt="Author">
                <div class="author-details">
                    <span class="author-name">{{ $post->user->name }}</span>
                    <small class="post-time">{{ $post->created_at ? $post->created_at->diffForHumans() : '' }}</small>
                </div>
            </div>
        </a>
        {{-- @if (auth()->user()->id != $post->user->id &&
                !auth()->user()->follows()->where('follow_id', $post->user->id)->exists())
            <button class="follow-btn"><i class="fa-sharp fa-solid fa-user-plus"></i> متابعة </button>
        @endif --}}
        @livewire('follow', ['post' => $post])
    </div>
    <h2>{{ $post->title }}</h2>
    <p class="post-description">{{ $post->content }}</p>
    <div class="post-actions">

        @livewire('post-love', ['post' => $post])

        <!-- loves Modal -->
        @include('site.post._lovesModal')

        <button class="action-btn save-btn">
            <i class="fa fa-bookmark"></i>
        </button>

        <button class="action-btn share-btn">
            <i class="fa fa-share"></i>
        </button>
    </div>
</div>
