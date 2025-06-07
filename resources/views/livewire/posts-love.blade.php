{{-- الاعجاب على منشور في صفحة عرض المنشورات --}}
<div class="like-button">
    <i class="{{ $isLiked ? 'fa fa-heart liked' : 'fa-regular fa-heart' }}" wire:click="toggleLove"></i>
</div>
