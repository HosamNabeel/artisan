<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostImage;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('site.posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('site.createPost', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate The Data
        $request->validate([
            'description' => 'required',
            'category_id' => 'required',
        ]);

        // Store Data To Data base
        $post = Post::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'content' => $request->description,
            'category_id' => $request->category_id,
        ]);

        PostCategory::create([
            'post_id' => $post->id,
            'category_id' => $request->category_id,
        ]);

        // Upload Album to images table if exists
        if($request->has('images')) {
            foreach($request->images as $item) {
                $img_name = rand().time().$item->getClientOriginalName();
                $item->move(public_path('uploads/postImage'), $img_name);
                PostImage::create([
                    'image' => $img_name,
                    'post_id' => $post->id
                ]);
            }
        }

        // Redirect
        return redirect()->route('posts.index')->with('msg', 'Product created successfully')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::all();
        $post = Post::findOrFail($id);
        return view('site.post.post', compact('post', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
