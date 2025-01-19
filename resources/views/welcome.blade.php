<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel CRUD App</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
        @endif
    </head>
    <body class="bg-gray-50 text-black dark:bg-black dark:text-white antialiased">
        <!-- Main Content -->
        <div class="min-h-screen flex flex-col justify-center border-2 rounded-full bg-slate-200">
            <header class="flex justify-between items-center px-6 py-4 max-w-7xl mx-auto">
                <!-- Logo -->
                <div class="flex items-center">
                    <img src="logo.png" alt="Laravel Logo" class="w-20">
                </div>
            </header>

            <!-- Hero Section -->
            <div class="flex flex-col justify-center items-center text-center py-24">
                <h1 class="text-5xl font-bold text-black mb-4">Welcome to Laravel CRUD App</h1>
                <p class="text-lg text-black/80 mb-6">Your one-stop solution for building dynamic applications with Laravel. Start by logging in or registering.</p>
                <div class="space-x-4">
                @if(Route::has('login'))
                   @auth
                    <a href="{{ route('login') }}" class="px-6 py-2 bg-white text-black-600 rounded-full shadow-md hover:bg-blue-100 transition duration-300">Dashboard</a>
                   @else 
                    <a href="{{ route('login') }}" class="px-6 py-2 bg-white text-black-600 rounded-full shadow-md hover:bg-blue-100 transition duration-300">Login</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="px-6 py-2 bg-transparent border-2 border-white text-black rounded-full hover:bg-white hover:text-blue-600 hover:shadow-md transition duration-300">Register</a>
                    @endif
                    @endauth
                    @endif
                </div>
            </div>

            <!-- Footer -->
            <footer class="mt-12 bg-gray-800 text-white py-6">
                <div class="text-center">
                    <p>&copy; {{ date('Y') }} Laravel CRUD App. All rights reserved.</p>
                </div>
            </footer>
        </div>

    </body>
</html>
