<?php

namespace App\Services;

class PostsStatsData
{
    /**
     * posts state data
     *
     * @return array
     */
    public function data(): array
    {
        $current_date = date('Y-m-d');
        // $last_15_days_date = date('Y-m-d', strtotime('-15 days'));

        // Create an empty array to hold the dates
        $postsStatsData = [];
        // Get the current date
        $current_date = strtotime(date('Y-m-d'));
        // Loop through the last 15 days
        for ($i = 0; $i < 15; $i++) {
            // Get the date for the current iteration
            $date = strtotime("-$i day", $current_date);
            // Add the date to the array in the desired format
            $count = auth()->user()->recievedLikes()->whereDate('likes.created_at', '=', date('Y-m-d', $date))->get()->count();
            $formattedDate = date('F j', $date);

            // $postsStatsData[] = $formattedDate;
            $postsStatsData[$formattedDate] = $count;
        }

        // Filter out the dates with count <= 0
        // $postsStatsData = array_filter($postsStatsData, function($value, $key) {
        //     return $value > 0;
        // }, ARRAY_FILTER_USE_BOTH);

        // dd($postsStatsData);

        // Reverse the array so that the dates are in chronological order
        $postsStatsData = array_reverse($postsStatsData, true);
        // end dashboard data

        return $postsStatsData;
    }
}
