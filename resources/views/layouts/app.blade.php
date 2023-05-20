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
    <meta property="og:image" content="{{ asset('assets/icon/icon.png') }}" />
    <meta property="og:description" content="{{ config('app.name') }}" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('assets/icon/icon.png') }}" type="image/png">
    @vite(['resources/css/app.css', 'resources/sass/main.scss', 'resources/js/app.js', 'resources/js/jquery.js'])
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-icons.css') }}">
    @yield('styles')
</head>

<body class="bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-300">
    <div>
        <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 w-full">
            <div class="container mx-auto">
                @include('layouts.nav')
            </div>
        </header>

        <main class="container mx-auto p-4">
            @if (session()->has('status'))
                <!-- flash message -->
                <div
                    class="alert_ flex items-center gap-3 mb-4 border rounded-md shadow-sm border-green-200 dark:border-green-800 bg-green-50 dark:bg-green-900 p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                        <path
                            d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                    </svg>
                    <span>{{ session('status') }}</span>
                </div>
            @endif
            <div id="app">
                @yield('content')
            </div>
        </main>
    </div>
    <script src="{{ asset('/assets/js/jquery-3.5.1.min.js') }}"></script>
    @yield('scripts')
</body>

</html>
