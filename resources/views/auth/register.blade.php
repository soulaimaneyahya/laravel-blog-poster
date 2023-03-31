@extends('layouts.app')

@section('content')
<h3 class="mb-5 text-2xl font-medium dark:text-gray-300">Register</h3>

<section class="flex align-start justify-between">
    <div class="w-full md:w-1/2">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="label">Name</label>
                <input type="text" class="input" name="name" id="name" placeholder="Your name" value="{{ old('name') }}" required />

                @error('name')
                <div class="input-error">
                    {{ $message }}
                </div>
                @enderror
            </div>

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
                <label for="email" class="label">Email</label>
                <input type="text" class="input" name="email" id="email" placeholder="Your email" value="{{ old('email') }}" required />

                @error('email')
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
                <label for="password_confirmation" class="label">Password again</label>
                <input type="password" class="input" name="password_confirmation" id="password_confirmation" placeholder="Repeat your password" required />

                @error('password_confirmation')
                <div class="input-error">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <button class="btn-primary w-full" type="submit">Register</button>
            </div>

            <div class="mb-4">
                <a href="{{ route('login') }}" class="text-dark-500 dark:text-gray-300 underline text-sm">Already have an account? Login</a>
            </div>
        </form>
    </div>
    <div class="hidden sm:block md:w-1/3">
        <img src="{{ asset('assets/svg/undraw_sign_up_n6im.svg') }}" alt="login-img" />
    </div>
</section>
@endsection