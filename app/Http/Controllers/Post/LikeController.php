<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;

class LikeController extends Controller
{
    public function store(Post $post)
    {
        if ($post->likedBy(auth()->user())) {
            return abort(500);
        }

        $post->likes()->create([
            'user_id' => auth()->id()
        ]);

        return redirect()->back();
    }

    public function destroy(Post $post)
    {
        if (!$post->likedBy(auth()->user())) {
            return abort(500);
        }

        $post->likes()->where([
            'user_id' => auth()->id()
        ])->delete();

        return redirect()->back();
    }
}
