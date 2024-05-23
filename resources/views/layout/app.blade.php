<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="emerald">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>
    <meta content="{{ config('app.name') }}" name="description">
    <meta content="{{ config('app.name') }}" name="keywords">

    <!-- css -->
    @vite('resources/css/app.css')
    @stack('css')
</head>

<body class="antialiased">

    @yield('content')
    <!-- js -->
    @stack('js')
</body>

</html>
