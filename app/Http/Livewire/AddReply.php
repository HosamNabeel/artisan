<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Notifications\NewReply;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddReply extends Component
{
    public $reply;
    public $post;
    public $commentContent;

    function addReply() {

        Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $this->post->id,
            'content' => $this->commentContent,
            'parent_id' => $this->reply->id,
        ]);
        $this->post->user->notify(new NewReply(Auth::user(), $this->commentContent, $this->reply));
        $this->commentContent = ''; // تفريغ الحقل
        $this->emit('commentUpdated'); // حدث لتحديث التعليقات
    }

    public function render()
    {
        return view('livewire.add-reply');
    }
}
