@extends('layouts.app')

@section('content')
<h3 class="mb-5 text-2xl font-medium dark:text-gray-300">Login</h3>

<section class="flex align-start justify-between">
    <div class="w-full md:w-1/2">
        <form action="{{ route('login') }}" method="POST">
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
                <button class="btn-primary w-full" type="submit">Login</button>
            </div>

            <div class="mb-4">
                <a href="{{ route('register') }}" class="text-dark-500 dark:text-gray-300 underline text-sm">Don't have an account yet? Register</a>
            </div>
        </form>
    </div>
    <div class="hidden sm:block md:w-1/3">
        <img src="{{ asset('assets/svg/undraw_mobile_login_re_9ntv.svg') }}" alt="login-img" />
    </div>
</section>
@endsection