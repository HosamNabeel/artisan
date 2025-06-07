<?php

namespace App\Http\Livewire;

use App\Models\Love;
use App\Models\Post;
use App\Notifications\NewPostLike;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostsLove extends Component
{
    public $post;
    public $isLiked;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->isLiked = $this->post->loves->contains('user_id', Auth::id());
    }

    public function toggleLove() {
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
        $this->isLiked = !$this->isLiked;
    }

    public function render()
    {
        return view('livewire.posts-love');
    }
}
