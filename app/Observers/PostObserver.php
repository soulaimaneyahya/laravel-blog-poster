<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class PostObserver
{
    public function __construct(
        private LikeObserver $likeObserver
    ) {
    }

    /**
     * Handle the Post "creating" event.
     *
     * @return void
     */
    public function creating()
    {
        $this->cacheForget();
    }

    /**
     * Handle the Post "deleting" event.
     *
     * @param  \App\Models\Post $post
     * @return void
     */
    public function deleting(Post $post)
    {
        $this->cacheForget();
        
        if ($post->likes()->delete()) {
            $this->likeObserver->cacheForget();
        }
    }

    /**
     * cache forget
     * 
     * @return void
     */
    public function cacheForget()
    {
        $this->likeObserver->cacheForget();

        Cache::forget("total-posts");
        Cache::forget("posts-count");
        Cache::forget("posts-count-percent");
        Cache::forget("posts-count-trashed");
        Cache::forget("posts-count-trashed-percent");
    }
}
