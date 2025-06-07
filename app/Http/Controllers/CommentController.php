<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CommentLove;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required',
            'comment' => 'required',
        ]);

        // Store Data To Data base
        Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $request->post_id,
            'content' => $request->comment,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editComment = Comment::find($id); // استرجاع التعليق من قاعدة البيانات بناءً على $id
        $post = Post::find($editComment->post_id); // استرجاع مشاركة التعليق
        return view('site.post.post', compact('editComment', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'post_id' => 'required',
            'comment' => 'required',
        ]);

        $comment = Comment::findOrFail($id);

        $comment->update([
            'content' => $request->comment,
        ]);

        return redirect()->route('posts.show',['post' => $comment->post]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::where('id', $id)->delete();

        return redirect()->back();
    }

    public function createReply(Request $request)
    {
        $request->validate([
            'comment' => 'required',
            'post_id' => 'required|exists:posts,id',
            'comment_id' => 'required|exists:comments,id',
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $request->post_id,
            'content' => $request->comment,
            'parent_id' => $request->comment_id,
        ]);

        return redirect()->back();
    }
}
