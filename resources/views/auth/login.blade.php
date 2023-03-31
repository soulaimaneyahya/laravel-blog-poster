@extends('layouts.app')

@section('content')
<section class="w-1/2 mx-auto">
    <h3 class="mb-5 text-2xl font-medium dark:text-gray-300">Login</h3>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="username" class="label">Username</label>
            <input type="text" class="input" name="username" id="username" placeholder="Username" value="{{ old('username') }}" required />

            @error('username')
            <div class="input-error">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="label">Password</label>
            <input type="password" class="input" name="password" id="password" placeholder="Choose a password" required />

            @error('password')
            <div class="input-error">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-4">
            <button class="btn-primary w-full" type="submit">Register</button>
        </div>

        <div class="mb-4">
            <a href="{{ route('register') }}" class="text-dark-500 dark:text-gray-300 underline text-sm">Don't have an account yet? Register</a>
        </div>
    </form>
</section>
@endsection
