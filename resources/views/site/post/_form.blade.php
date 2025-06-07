{{-- اضافة وتعديل تعليق --}}
<div class="add-comment-section">
    <img src="{{ asset('mainassets/img/main_1.jpeg') }}" alt="User Avatar" class="user-avatar">
    <input id="commentInput" name="comment" type="text" class="comment-input " wire:model="commentContent" placeholder="اكتب تعليق...">
    <button wire:click.prevent='addComment' class="send-comment-button">
        <i class="fa fa-paper-plane"></i>
    </button>
</div>
