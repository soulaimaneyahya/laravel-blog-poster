<?php

namespace App\View\Composers;

use App\Services\PostsStatsData;
use Illuminate\View\View;

class DashboardComposer
{
    public function __construct(
        private PostsStatsData $postsStatsData
    ) {
      //  
    }

    public function compose(View $view)
    {
        // dashboard data
        $totalPosts = auth()->user()->posts()->withTrashed()->get()->count();

        $postsCount = auth()->user()->posts->count();
        $postsCountPercent = round(($totalPosts > 0) ? ($postsCount * 100) / $totalPosts : 0, 2) . '%';

        $postsCountTrashed = auth()->user()->posts()->onlyTrashed()->get()->count();
        $postsCountTrashedPercent =  round(($totalPosts > 0) ? ($postsCountTrashed * 100) / $totalPosts : 0, 2) . '%';

    
        $view->with('totalPosts', $totalPosts);

        $view->with('postsCount', $postsCount);
        $view->with('postsCountPercent', $postsCountPercent);

        $view->with('postsCountTrashed', $postsCountTrashed);
        $view->with('postsCountTrashedPercent', $postsCountTrashedPercent);

        $view->with('postsStatsData', $this->postsStatsData->data());
    }
}
