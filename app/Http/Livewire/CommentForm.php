<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Notifications\NewComment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CommentForm extends Component
{
    public $post; // المنشور الحالي
    public $commentContent; // محتوى التعليق الجديد أو المعدل
    public $editCommentId = null;
    protected $listeners = ['editComment' => 'editComment'];

    public function addComment(){

        if ($this->editCommentId) {
            // تعديل التعليق
            $comment = Comment::findOrFail($this->editCommentId);
            if ($comment) {
                $comment->update([
                    'content' => $this->commentContent,
                ]);
            }
            $this->editCommentId = null; // إعادة ضبط حالة التعديل
        } else {
            // إضافة تعليق جديد
            Comment::create([
                'user_id' => auth()->id(),
                'post_id' => $this->post->id,
                'content' => $this->commentContent,
            ]);
            $this->post->user->notify(new NewComment(Auth::user(), $this->post, $this->commentContent));
        }

        $this->commentContent = ''; // تفريغ الحقل
        $this->emit('commentUpdated'); // حدث لتحديث التعليقات
    }

    public function editComment($commentId){
        $comment = $this->post->comments()->find($commentId);
        if ($comment) {
            $this->editCommentId = $comment->id;
            $this->commentContent = $comment->content;

            $this->dispatchBrowserEvent('focusInput'); // حدث JavaScript لتركيز الحقل
        }
    }

    public function render()
    {
        return view('livewire.comment-form');
    }
}
