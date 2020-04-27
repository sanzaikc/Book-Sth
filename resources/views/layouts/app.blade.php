<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Book') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">

    <link type='text/css' href="{{ asset('/font/flaticon.css') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>
    @livewireStyles

</head>
<body class="bg-gray-100">
    {{-- style="background: linear-gradient(to top, #2980b9, #6dd5fa, #ffffff);" --}}
    <div id="app">
        <x-navbar/>

        <main class="container mx-auto flex px-4 my-8">
{{--            <div class="w-64">--}}
{{--                @include('_navigation')--}}
{{--            </div>--}}
            <div class="mx-4 w-full">
                @yield('content')
            </div>
        </main>
    </div>

    @include('sweetalert::alert')

    @livewireScripts

</body>
</html>
