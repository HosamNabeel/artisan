<?php

namespace App\Http\Livewire;

use App\Models\Follower;
use App\Notifications\NewFollow;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Follow extends Component
{
    public $post;
    public $listeners = ['followUpdated' => 'handleFollowUpdated'];

    function addFollow() {
        Follower::create([
            'follower_id' => Auth::id(),
            'follow_id' => $this->post->user->id,
        ]);
        $this->post->user->notify(new NewFollow(Auth::user()));
        $this->emit('followUpdated', $this->post->user->id);
    }

    function deleteFollow() {
        Follower::where('follower_id', Auth::id())
                ->where('follow_id', $this->post->user->id)
                ->delete();
        $this->emit('followUpdated', $this->post->user->id);
    }

    public function handleFollowUpdated($userId)
    {
        if ($this->post->user->id == $userId) {
            $this->emitSelf('$refresh');
        }
    }

    public function render()
    {
        return view('livewire.follow');
    }
}
