<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <!-- Link ke file CSS Tailwind yang dikompilasi -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Link ke file CSS kustom -->
    <link rel="stylesheet" href="{{ asset('css/users_view.css') }}">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    @yield('content')
    @yield('scripts')
</body>
</html>
    