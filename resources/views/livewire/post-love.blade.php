<div class="like-button">
    <i class="{{ $isLiked ? 'fa fa-heart liked' : 'fa-regular fa-heart' }}" wire:click="toggleLove"></i> <!-- أيقونة القلب -->
    <span id="lovesCount" class="like-count">{{ $loveCount }}</span>
</div>

