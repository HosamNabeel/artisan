{{-- اضافة رد لتعليق او رد --}}
<div id="reply-form-{{ $reply->id }}" class="reply-form" style="display: none; margin-top: 10px;">
    <div class="add-reply-section">
        <img src="{{ asset('mainassets/img/main_1.jpeg') }}" alt="User Avatar" class="user-avatar">
        <input name="comment" type="text" class="comment-input " wire:model.lazy="commentContent" placeholder=" رد على {{ $reply->user->name }} ...">
        <button type="submit" class="send-comment-button" wire:click.prevent='addReply'>
            <i class="fa fa-paper-plane"></i>
        </button>
    </div>
</div>
{{-- emojionearea --}}
