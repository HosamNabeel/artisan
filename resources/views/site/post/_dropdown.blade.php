{{-- edite and delete dropdown  --}}
@if ($reply->user->id == auth()->id())
    <div class="dropdown">
        <i class="fa fa-ellipsis-h" onclick="toggleDropdown(this)"></i>
        <div class="dropdown-menu">
            <a class="dropdown-link" wire:click.prevent='editComment'>تعديل</a>
            <button wire:click.prevent='deleteComment'>حذف</button>
        </div>
    </div>
@endif
