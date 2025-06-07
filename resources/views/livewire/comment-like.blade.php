<div>
    <button class="comment-like-button" wire:click="toggleLike">
        <i class="fa fa-heart {{ $isLiked ? 'liked' : '' }}"></i>
        {{ $loveCount }}
    </button>
</div>
