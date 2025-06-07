<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifyController extends Controller
{
    function all_notifications() {
        return view('site.readNotify');
    }
    function read_notify($id) {
        $notification = Auth::user()->notifications->find($id);
        $notification->markAsRead();
        $type = $notification->type;
        if ($type === 'App\Notifications\NewFollow') {
            // $url = route('profile.index', ['user' => $notification->data['follower_id'] ?? null]);
            return view('profile.profile');
        } elseif ($type === 'App\Notifications\NewCommentLike' || $type === 'App\Notifications\NewReply') {
            $comment = Comment::findOrFail($notification->data['comment_id']);
            if ($comment && $comment->post) {
                $posts = Post::all();
                $post = $comment->post;
                return view('site.post.post', compact('post','posts'));
            } else {
                $url = '#';
            }
        } else {
            $posts = Post::all();
            $post = Post::findOrFail($notification->data['post_id']);
            return view('site.post.post', compact('post','posts'));
        }
    }
}
