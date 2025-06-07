<div>
    @if (auth()->user()->id != $post->user->id && !auth()->user()->following()->where('follow_id', $post->user->id)->exists())
        <button class="follow-btn" wire:click="addFollow">متابعة</button>
    @elseif (auth()->user()->id != $post->user->id)
        <button class="unfollow-btn" wire:click="deleteFollow">تتابع</button>
    @endif
</div>
