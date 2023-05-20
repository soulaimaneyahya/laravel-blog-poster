<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->with(['user', 'likes'])->paginate(5);

        return view('posts.index', compact('posts'));
    }

    public function store(StorePostRequest $request)
    {
        $request->user()->posts()->create($request->validated());

        return back()->with('status', 'Post Created');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        if (Gate::denies('update-post', $post)) {
            return abort(403);
        }
        $post->update($request->validated());
        return back()->with('status', 'Post Updated');
    }

    public function destroy(Post $post)
    {
        if (Gate::denies('delete-post', $post)) {
            return abort(403);
        }

        $post->delete();

        return redirect()->back()->with('status', 'Post Deleted');
    }
}
