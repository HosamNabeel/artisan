{{-- الردود على التعليقات وردودهم --}}
<div class="reply">

    @livewire('comment-edit-delete', ['reply' => $reply], key('edit-delete-'.$reply->id))

    <img src="{{ asset('mainassets/img/main_1.jpeg') }}" alt="User Avatar" class="user-avatar">
    <div class="comment-content">
        <div class="author-details">
            <a href="{{ route('profile.show',$reply->user->id) }}" style="text-decoration: none;">
                <span class="re-author-name">{{ $reply->user->name }}</span>
            </a>
            <small class="comment-time">{{ $reply->created_at ? $reply->created_at->diffForHumans() : '' }}</small>
        </div>
        <p class="reply-text">{{ $reply->content }}</p>
        <div class="comment-actions">

            @livewire('comment-like', ['comment' => $reply], key('like-'.$reply->id))

            <button class="reply-button" onclick="toggleReplyForm({{ $reply->id }})">
                <i class="fa fa-reply"></i> رد
            </button>
        </div>
        @include('site.post._replyForm')
    </div>
</div>

{{-- recurstion  --}}
@if ($reply->children->isNotEmpty())
    @foreach ($reply->children as $child)
        @include('site.post._reply', ['reply' => $child])
    @endforeach
@endif
