<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        NUST Attendance System
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        &copy; 2024 NUST Attendance System
    </footer>
</body>
</html>
