<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class CommentEditDelete extends Component
{
    public $reply;

    function deleteComment(){
        Comment::where('id', $this->reply->id)->delete();
        $this->emit('commentDeleted');
    }

    function editComment(){
        $this->emit('editComment', $this->reply->id);
    }

    public function render()
    {
        return view('livewire.comment-edit-delete');
    }
}
