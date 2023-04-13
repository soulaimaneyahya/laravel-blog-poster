@extends('layouts.app')

@section('content')
<section>
    <div class="flex justify-between align-center">
        <div>
            <h3 class="mb-2 text-2xl font-medium dark:text-gray-300">Dashboard</h3>
            <h4 class="mb-5 text-lg font-medium dark:text-gray-300">Your Posts stats</h4>
        </div>
        <div>
            <div class="mb-4">
                <a href="/dashboard/audience" class="btn-primary w-full" type="submit">Audience Stats</a>
            </div>
        </div>
    </div>
    <section class="my-4">
        <div class="flex align-start justify-between gap-5">
            <div class="md:w-3/4">
                <div class="outer-block">
                    <div class="outer-block-header">
                        <h3 class="font-medium">Your posts impact (last 15 days)</h3>
                    </div>
                    <canvas class="outer-block-body" id="lineChart"></canvas>
                </div>
            </div>
            <div class="md:w-1/4">
                <div class="outer-block">
                    <div class="outer-block-header">
                        <h3 class="font-medium">Total</h3>
                    </div>
                    <div class="outer-block-body">
                        <div class="is-grid">
                            <div class="stats-box">
                                <h3 class="title">Total posts</h3>
                                <span class="value">{{ $totalPosts }}</span>
                            </div>
                            <div class="flex items-center justify-between w-full gap-5 text-center">
                                <div class="stats-box w-1/2">
                                    <h3 class="title">Published</h3>
                                    <span class="value">{{ $postsCount }}</span>
                                </div>
                                <div class="stats-box w-1/2">
                                    <h3 class="title">Deleted</h3>
                                    <span class="value">{{ $postsCountTrashed }}</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-between w-full gap-5 text-center">
                                <div class="stats-box w-1/2 flex items-center justify-center">
                                    <span class="value">{{ $postsCountPercent }}</span>
                                </div>
                                <div class="stats-box w-1/2 flex items-center justify-center">
                                    <span class="value">{{ $postsCountTrashedPercent }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <h4 class="mb-5 text-lg underline font-medium dark:text-gray-300">Your Posts</h4>
        @if ($posts->count())
            @foreach ($posts as $post)
            <p class="py-3 border-b border-gray-200">{{ $post->content }}</p>
            @endforeach

            <div class="my-2">
                {{ $posts->links('pagination::tailwind') }}
            </div>
        @else
        <p>You don't have any posts</p>
        @endif
    </section>
</section>
@endsection

@section('scripts')
<script src="{{ asset('assets/js/Chart.min.js') }}"></script>

<script>
    const lineChart = document.getElementById('lineChart').getContext('2d');

    new Chart(lineChart, {
        type: 'bar',
        data: {
            labels: <?= json_encode(array_keys($postsStatsData)) ?>,
            datasets: [{
                label: 'Total Likes',
                backgroundColor: 'rgba(108, 113, 249, 0.3)',
                borderColor: 'rgba(108, 113, 249, 0.9)',
                borderWidth: 2,
                fill: true,
                data: <?= json_encode(array_values($postsStatsData)) ?>
            }],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
