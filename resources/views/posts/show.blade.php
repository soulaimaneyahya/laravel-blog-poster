@extends('layouts.app')

@section('content')
<section>
    <h3 class="mb-5 text-2xl font-medium dark:text-gray-300">Post</h3>
    <x-post :post="$post" />
</section>
@endsection
