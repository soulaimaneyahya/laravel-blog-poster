<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li>
                <a href="/" class="p-3">Home</a>
            </li>
            <li>
                <a href="/" class="p-3">Dashboard</a>
            </li>
            <li>
                <a href="{{ route('posts.index') }}" class="p-3">Posts</a>
            </li>
        </ul>

        <ul class="flex items-center">
            <li>
                <a href="/" class="p-3">Welcome Back</a>
            </li>
            <li>
                <a href="/" class="p-3">Logout</a>
            </li>

            <li>
                <a href="/" class="p-3">Login</a>
            </li>
            <li>
                <a href="/" class="p-3">Register</a>
            </li>
        </ul>
    </nav>
    @yield('content')
</body>

</html>

