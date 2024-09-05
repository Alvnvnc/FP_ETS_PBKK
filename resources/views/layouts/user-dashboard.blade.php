<!-- resources/views/layouts/user-dashboard.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">

<div class="min-h-screen flex flex-col">
    <!-- Navbar -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-4 px-6 sm:px-8 flex justify-between items-center">
            <h1 class="text-xl font-semibold text-gray-800">User Dashboard</h1>
            
            <!-- Profile Dropdown -->
            <div class="relative">
                <button id="profileMenuButton" class="flex items-center space-x-2 text-gray-600 hover:text-gray-800 focus:outline-none" onclick="toggleDropdown()">
                    <span>{{ Auth::user()->name }}</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <!-- Dropdown Menu -->
                <div id="profileDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20">
                    <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                    <form method="POST" action="{{ route('logout') }}" class="block">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <div class="flex flex-1">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md px-4 py-6">
            <nav class="space-y-4">
                <a href="{{ route('user.dashboard') }}" class="block py-2 px-4 rounded-md text-gray-700 hover:bg-gray-100 hover:text-blue-500 {{ request()->routeIs('user.dashboard') ? 'bg-gray-100 text-blue-500' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('profile') }}" class="block py-2 px-4 rounded-md text-gray-700 hover:bg-gray-100 hover:text-blue-500 {{ request()->routeIs('profile') ? 'bg-gray-100 text-blue-500' : '' }}">
                    Profile
                </a>
                <!-- Add more sidebar links here -->
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                @yield('content')
            </div>
        </main>
    </div>
</div>

<!-- Scripts -->
<script>
    function toggleDropdown() {
        var dropdown = document.getElementById('profileDropdown');
        dropdown.classList.toggle('hidden');
    }

    // Optional: Close dropdown when clicking outside
    window.addEventListener('click', function(event) {
        var dropdown = document.getElementById('profileDropdown');
        var button = document.getElementById('profileMenuButton');
        if (!dropdown.contains(event.target) && !button.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });
</script>

</body>
</html>
