<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        
        return view('posts.index', compact('posts'));
    }

    public function store(StorePostRequest $request)
    {
        $request->user()->posts()->create($request->validated());
        
        return back()->with('status', 'Post Created');
    }

    public function update(UpdatePostRequest $request)
    {
        dd('ok');
    }
}
