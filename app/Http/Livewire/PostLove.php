<?php

namespace App\Http\Livewire;

use App\Models\Love;
use App\Models\Post;
use App\Notifications\NewPostLike;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostLove extends Component
{
    public $post;
    public $isLiked;
    public $loveCount;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->isLiked = $this->post->loves->contains('user_id', Auth::id());
        $this->loveCount = $this->post->loves->count();
    }

    public function toggleLove()
    {
        if ($this->isLiked) {
            Love::where('post_id', $this->post->id)
                ->where('user_id', Auth::id())
                ->delete();
        } else {
            Love::create([
                'user_id' => Auth::id(),
                'post_id' => $this->post->id,
            ]);
            $this->post->user->notify(new NewPostLike(Auth::user(), $this->post));
        }

        // تحديث الحالة وعدد الإعجابات
        $this->isLiked = !$this->isLiked;
        $this->loveCount = $this->post->loves()->count();
    }

    public function render()
    {
        return view('livewire.post-love');
    }
}
