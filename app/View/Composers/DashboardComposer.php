<?php

namespace App\View\Composers;

use Illuminate\Support\Facades\Cache;
use App\Services\PostStatsData;
use Illuminate\View\View;

class DashboardComposer
{
    public function __construct(
        private PostStatsData $PostStatsData
    ) {
    }

    public function compose(View $view)
    {
        // dashboard data
        $totalPosts = Cache::remember('total-posts', now()->addSeconds(20), function () {
            return auth()->user()->posts()->withTrashed()->get()->count();
        });

        $postsCount = Cache::remember('posts-count', now()->addSeconds(20), function () {
            return auth()->user()->posts->count();
        });

        $postsCountPercent = Cache::remember('posts-count-percent', now()->addSeconds(20), function () use ($totalPosts, $postsCount) {
            return round(($totalPosts > 0) ? ($postsCount * 100) / $totalPosts : 0, 2);
        });

        $postsCountTrashed = Cache::remember('posts-count-trashed', now()->addSeconds(20), function () {
            return auth()->user()->posts()->onlyTrashed()->get()->count();
        });
        
        $postsCountTrashedPercent = Cache::remember('posts-count-trashed-percent', now()->addSeconds(20), function () use ($totalPosts, $postsCountTrashed) {
            return round(($totalPosts > 0) ? ($postsCountTrashed * 100) / $totalPosts : 0, 2);
        });

        $postStatsData = Cache::remember('posts-stats-data', now()->addSeconds(20), function () {
            return $this->PostStatsData->data();
        });

        $userRecievedLikes = Cache::remember('user-recieved-likes', now()->addSeconds(20), function () {
            return auth()->user()->recievedLikes->count();
        });

        $view->with([
            'totalPosts' => $totalPosts,
            'postsCount' => $postsCount,
            'postsCountPercent' => $postsCountPercent,
            'postsCountTrashed' => $postsCountTrashed,
            'postsCountTrashedPercent' => $postsCountTrashedPercent,
            'postStatsData' => $postStatsData,
            'userRecievedLikes' => $userRecievedLikes
        ]);
    }
}
