<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\User;
use App\Notifications\NewFollow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    function add(Request $request) {
        Follower::create([
            'follower_id' => Auth::id(),
            'follow_id' => $request->user_id,
        ]);
        $user = User::find($request->user_id);
        $user->notify(new NewFollow(Auth::user()));
        return redirect()->back();
    }

    function delete(Request $request) {
        Follower::where('follower_id', Auth::id())
                ->where('follow_id', $request->user_id)
                ->delete();
        return redirect()->back();
    }
}
