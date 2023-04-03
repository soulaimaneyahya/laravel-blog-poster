@extends('layouts.app')

@section('content')
<section>
    <div class="bg-gray-100 rounded-md p-3 mb-4">
        <div>
            <span class="text-xs text-gray-500">Username</span>
            <h3 class="text-md font-medium dark:text-gray-300">{{ '@'. $user->username }}</h3>
        </div>
        <div>
            <span class="text-xs text-gray-500">Name</span>
            <h3 class="text-md font-medium dark:text-gray-300">{{ '@'. $user->name }}</h3>
        </div>
        <div class="mt-2">
            <p class="text-sm text-gray-500 font-semibold p-0 m-0">Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }}, and recieve {{ $user->recievedLikes->count() }} {{ Str::plural('like', $user->recievedLikes->count()) }}</p>
        </div>
    </div>

    @if ($posts->count())
    @foreach ($posts as $post)
    <x-post :post="$post" />
    @endforeach

    <div class="my-2">
        {{ $posts->links('pagination::tailwind') }}
    </div>
    @else
    <p>There are no posts</p>
    @endif

</section>
@endsection