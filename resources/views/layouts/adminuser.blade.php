<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Billiard')</title>

    <!-- Link to Tailwind CSS file compiled -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Include Bootstrap CSS from a CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Include Livewire Styles -->
    @livewireStyles
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <header class="bg-white shadow">
        <div class="container-fluid px-4 sm:px-6 lg:px-8 d-flex justify-content-between align-items-center py-4">
            <div class="d-flex align-items-center">
                <!-- Logo or Home Link -->
                <a href="{{ route('user.dashboard') }}" class="navbar-brand text-xl font-semibold text-gray-800">Billiard</a>
            </div>
            
            <!-- Navbar Right Side -->
            <div class="d-flex align-items-center space-x-4">
                 <!-- Profile Dropdown -->
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1">
        <div class="container-fluid py-6 px-4 sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow mt-8">
        <div class="container-fluid px-4 sm:px-6 lg:px-8 py-4">
            <p class="text-sm text-gray-500">&copy; 2024 Billiard. All rights reserved.</p>
        </div>
    </footer>

    <!-- Include Livewire Scripts -->
    @livewireScripts

    <!-- Include Bootstrap JS and Popper.js from a CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <!-- Alpine.js for Dropdown Functionality (if still needed) -->
    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- Additional Scripts -->
    @yield('scripts')

</body>
</html>
