@extends('layouts.app')

@section('content')
<section>
    <h3 class="mb-5 text-2xl font-medium dark:text-gray-300">Edit Post</h3>
    <form action="{{ route('posts.update', $post->id) }}" method="post" class="mb-4">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="content" class="label sr-only">Content</label>
            <textarea type="text" class="input" name="content" id="content" cols="30" rows="4" placeholder="Post something!" >{{$post->content}}</textarea>

            @error('content')
            <div class="input-error">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div>
            <button class="btn-primary" type="submit">Edit Post</button>
        </div>
    </form>
</section>
@endsection
