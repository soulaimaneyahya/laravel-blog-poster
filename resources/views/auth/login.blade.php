@extends('layouts.app')

@section('content')
<h3 class="mb-5 text-2xl font-medium dark:text-gray-300">Login</h3>

<section class="flex align-start justify-between gap-5">
    <div class="w-full md:w-2/3">
        <form action="{{ route('login') }}" method="POST" class="mb-4">
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
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember">Remember me</label>
                </div>
            </div>

            <div class="mb-4">
                <button class="btn-primary w-full" type="submit">Login</button>
            </div>

            <div>
                <a href="{{ route('register') }}" class="text-dark-500 dark:text-gray-300 underline text-sm">Don't have an account yet? Register</a>
            </div>
        </form>
    </div>
    <div class="hidden sm:block md:w-1/3">
        <img src="{{ asset('assets/svg/undraw_mobile_login_re_9ntv.svg') }}" alt="login-img" />
    </div>
</section>
@endsection
