<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

class LikeObserver
{
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
     * @return void
     */
    public function deleting()
    {
        $this->cacheForget();
    }

    /**
     * cache forget
     * 
     * @return void
     */
    public function cacheForget()
    {
        Cache::forget("posts-stats-data");
        Cache::forget("user-recieved-likes");
    }
}
