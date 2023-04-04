<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Mail\PostLiked;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

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

        if (!$post->hasLiked($post, auth()->user())) {
            Mail::to($post->user)->send(new PostLiked(auth()->user(), $post));
        }

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
