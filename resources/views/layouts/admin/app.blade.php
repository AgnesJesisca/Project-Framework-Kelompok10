<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Argon Dashboard Tailwind</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets-admin-volt/img/favicon.ico') }}">

    <!-- CSS BARU -->
    @include('layouts.admin.css')
</head>

<body class="bg-gray-100">
    <!-- Sidebar -->
    @include('layouts.admin.sidebar')

    <main class="main-content">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('layouts.admin.footer')

    <!-- JS BARU -->
    @include('layouts.admin.js')
</body>
</html>
