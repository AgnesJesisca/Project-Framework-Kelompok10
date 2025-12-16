<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard')</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="icon" href="{{ asset('assets-admin/img/favicon.png') }}">

    @include('layouts.admin.css')
</head>

<body class="font-sans bg-[#f8fafd]">

<div class="flex h-screen overflow-hidden relative">

    {{-- BACKGROUND BIRU (DIAM) --}}
    <div class="absolute inset-x-0 top-0 h-[260px] md:h-[330px] bg-[#6259ff] rounded-b-3xl z-0">
        <img src="{{ asset('assets-admin/img/shapes/wave-up.svg') }}"
             class="w-full h-full object-cover opacity-40">
    </div>

    {{-- SIDEBAR (FIXED) --}}
   <aside class="w-[240px] fixed top-6 bottom-6 left-6 z-40">
        @include('layouts.admin.sidebar')
    </aside>

    {{-- MAIN AREA --}}
    <div class="flex-1 ml-64 flex flex-col relative z-10">

        {{-- HEADER (FIXED) --}}
        <header class="h-20 fixed top-0 left-64 right-0 z-30">
            @include('layouts.admin.header')
        </header>

        {{-- CONTENT (SCROLL DI SINI AJA) --}}
        <main class="mt-20 p-6 overflow-y-auto h-[calc(100vh-5rem)]">
            @yield('content')
        </main>

         @include('layouts.admin.footer')
    </div>
</div>

@include('layouts.admin.js')
</body>
</html>
