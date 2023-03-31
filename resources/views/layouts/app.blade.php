<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- CSRF Token -->
    <meta property="og:title" content="{{ config('app.name') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ config('app.url') }}" />
    <meta property="og:image" content="https://pngimg.com/uploads/circle/circle_PNG36.png" />
    <meta property="og:description" content="{{ config('app.name') }}" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="https://pngimg.com/uploads/circle/circle_PNG36.png" type="image/png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-300">
    <div>
        <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 w-full">
            <div class="container mx-auto">
                <nav class="p-4 flex items-center justify-between">
                    <ul class="flex items-center">
                        <li>
                            <a href="/" class="p-3">Home</a>
                        </li>
                        @auth
                        <li>
                            <a href="{{ route('dashboard') }}" class="p-3">Dashboard</a>
                        </li>
                        @endauth
                        <li>
                            <a href="{{ route('posts.index') }}" class="p-3">Posts</a>
                        </li>
                    </ul>

                    <ul class="flex items-center">
                        @auth
                        <li>
                            <a href="/" class="p-3">Welcome Back <span class="font-bold">{{ auth()->user()->name }}</span></a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="post" class="p-3 inline">
                                @csrf
                                <button type="submit" class="p-3">Logout</button>
                            </form>
                        </li>
                        @endauth

                        @guest
                        <li>
                            <a href="{{ route('login') }}" class="p-3">Login</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="p-3">Register</a>
                        </li>
                        @endguest
                    </ul>
                </nav>
            </div>
        </header>

        <main class="container mx-auto p-4">
            @yield('content')
        </main>
    </div>
</body>

</html>