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
        Cache::forget("posts-stats-data");
        Cache::forget("user-recieved-likes");
    }

    /**
     * Handle the Post "deleting" event.
     *
     * @return void
     */
    public function deleting()
    {
        Cache::forget("posts-stats-data");
        Cache::forget("user-recieved-likes");
    }
}
