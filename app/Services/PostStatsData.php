<?php

namespace App\Services;

class PostStatsData
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
        $PostStatsData = [];
        // Get the current date
        $current_date = strtotime(date('Y-m-d'));
        // Loop through the last 15 days
        for ($i = 0; $i < 15; $i++) {
            // Get the date for the current iteration
            $date = strtotime("-$i day", $current_date);
            // Add the date to the array in the desired format
            $count = auth()->user()->recievedLikes()->whereDate('likes.created_at', '=', date('Y-m-d', $date))->get()->count();
            $formattedDate = date('F j', $date);

            // $PostStatsData[] = $formattedDate;
            $PostStatsData[$formattedDate] = $count;
        }

        // Filter out the dates with count <= 0
        // $PostStatsData = array_filter($PostStatsData, function($value, $key) {
        //     return $value > 0;
        // }, ARRAY_FILTER_USE_BOTH);

        // dd($PostStatsData);

        // Reverse the array so that the dates are in chronological order
        $PostStatsData = array_reverse($PostStatsData, true);
        // end dashboard data

        return $PostStatsData;
    }
}
