<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/essentials/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/essentials/left-sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/essentials/logout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/essentials/dropdown.css') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @yield('styles') <!-- For additional styles specific to pages -->
</head>
<body>
    @include('partials.header') <!-- Include header partial -->
    @include('partials.sidebar') <!-- Include sidebar partial -->

    <div class="container">
        @yield('content') <!-- Main content will be injected here -->
    </div>

    @yield('scripts') <!-- For additional scripts specific to pages -->

    <!-- Include essential JavaScript files -->
    <script src="{{ asset('js/essentials/logout.js') }}"></script>
    <script src="{{ asset('js/essentials/sidebar.js') }}"></script>
</body>
</html>