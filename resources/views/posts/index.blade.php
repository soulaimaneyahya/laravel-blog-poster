@extends('layouts.app')

@section('content')
<section>
    <h3 class="mb-5 text-2xl font-medium dark:text-gray-300">Posts</h3>
    @auth
    <form action="{{ route('posts.store') }}" method="post" class="mb-4">
        @csrf
        <div class="mb-4">
            <label for="content" class="label sr-only">Content</label>
            <textarea type="text" class="input" name="content" id="content" cols="30" rows="4" placeholder="Post something!" value="{{ old('content') }}" required></textarea>

            @error('content')
            <div class="input-error">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div>
            <button class="btn-primary" type="submit">Post</button>
        </div>
    </form>
    @endauth

    @forelse ($posts as $post)
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim error quod repudiandae at, harum velit optio autem placeat saepe dolores.</p>
    @empty
        <p>There are no posts</p>
    @endforelse
</section>
@endsection
