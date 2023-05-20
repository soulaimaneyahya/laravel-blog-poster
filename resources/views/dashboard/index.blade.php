@extends('layouts.app')

@section('content')
    <section>
        <div class="flex justify-between align-center">
            <div>
                <h3 class="mb-2 text-lg text-2xl font-medium dark:text-gray-300">Dashboard</h3>
                <h4 class="mb-5 text-xs md:text-lg dark:text-gray-300">Posted <span
                        class="font-medium">{{ $postsCount }}</span>
                    {{ Str::plural('post', $postsCount) }}, and recieve
                    <span class="font-medium">{{ $userRecievedLikes }}</span>
                    {{ Str::plural('like', $userRecievedLikes) }}
                </h4>
            </div>
            <div>
                <div class="mb-4">
                    <a href="/dashboard/audience" class="btn-primary text-xs">Audience Stats</a>
                </div>
            </div>
        </div>
        <section class="my-4">
            <div class="grid gap-5 lg:flex">
                <div class="lg:w-3/4">
                    <div class="outer-block">
                        <div class="outer-block-header">
                            <h3 class="font-medium">Your posts impact (last 15 days)</h3>
                        </div>
                        <dashboard
                            :post-stats-data="{{ json_encode($postStatsData) }}"
                        ></dashboard>
                    </div>
                </div>
                <div class="lg:w-1/4">
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
                                <div class="grid gap-5 grid-cols-4 md:grid-cols-3 lg:grid-cols-2 text-center">
                                    <div class="stats-box">
                                        <h3 class="title">Published</h3>
                                        <span class="value">{{ $postsCount }}</span>
                                    </div>
                                    <div class="stats-box">
                                        <h3 class="title">Deleted</h3>
                                        <span class="value">{{ $postsCountTrashed }}</span>
                                    </div>
                                    <div class="stats-box lg:flex items-center justify-center">
                                        <h3 class="title block lg:hidden">Published</h3>
                                        <span class="value">{{ $postsCountPercent . '%' }}</span>
                                    </div>
                                    <div class="stats-box lg:flex items-center justify-center">
                                        <h3 class="title block lg:hidden">Deleted</h3>
                                        <span class="value">{{ $postsCountTrashedPercent . '%' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <h4 class="mb-5 text-lg underline font-medium dark:text-gray-300">Your Posts Stats</h4>
            @if ($posts->count())
                @foreach ($posts as $post)
                    <div class="py-5 border-b border-gray-200">
                        <p class="p-0 m-0">{{ $post->content }} <span><b>({{ $post->likes->count() }}
                                    {{ Str::plural('like', $post->likes->count()) }})</b></span></p>
                    </div>
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
{{-- <script src="{{ asset('assets/js/Chart.min.js') }}"></script> --}}
@endsection
