<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $post = Post::all();
        return view('post.index')->with('post', $post);
    }


    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $request->validate([ //with web
            "title" => ['required'],
            'description' => ['required']
        ]);

        Post::query()->create([
            "title" => $request->title,
            'description' => $request->description,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('post.update', compact('post'));
    }


    public function update(Request $request, Post $post)
    {
        $request->validate([
            "title" => ['required'],
            'description' => ['required']
        ]);

        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        return redirect()->route('post.index');
    }


    public function destroy(Post $post)
    {
        $post = Post::query()->find($post->id);
        if (!is_null($post))
            $post->delete();
        return redirect()->route('post.index');
    }
}
