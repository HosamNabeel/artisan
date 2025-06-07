<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\CommentLove;
use App\Notifications\NewCommentLike;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CommentLike extends Component
{
    public $comment;
    public $isLiked;
    public $loveCount;

    public function mount(Comment $comment)
    {
        $this->comment = $comment;
        $this->isLiked = $this->comment->commentLoves->contains('user_id', Auth::id());
        $this->loveCount = $this->comment->commentLoves->count();
    }

    public function toggleLike()
    {
        if ($this->isLiked) {
            CommentLove::where('comment_id', $this->comment->id)
                ->where('user_id', Auth::id())
                ->delete();
        } else {
            CommentLove::create([
                'user_id' => Auth::id(),
                'comment_id' => $this->comment->id,
            ]);
            $this->comment->user->notify(new NewCommentLike(Auth::user(), $this->comment));
        }

        // Update properties
        $this->isLiked = !$this->isLiked;
        $this->loveCount = $this->comment->commentLoves()->count();
    }

    public function render()
    {
        return view('livewire.comment-like');
    }
}
