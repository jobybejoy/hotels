<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
    
    <nav class="flex items-center justify-between flex-wrap bg-red-500 p-4 mb-4">
        <a class="flex items-center flex-shrink-0 text-white mr-6 hover:no-underline" href="/">
                <div class="p-2 pr-3 pl-3 tracking-wide border-solid border-4 border-white">
                <span class="font-semibold text-xl">HULTON</span>
            </div>
        </a>
        <div class="block lg:hidden">
            <button class="flex items-center px-3 py-2 border rounded text-white-200 border-red-400 hover:text-white hover:border-white">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
            </button>
        </div>
        <div class="w-full block  flex-grow lg:flex lg:items-center lg:w-auto">
            <div class="text-sm lg:flex-grow">
            <a href="/my/reservations" class="block mt-0 lg:inline-block lg:mt-0 text-red-100 hover:text-white mx-4 mr-4">
                Reservations
            </a>
            <a href="/my/reviews" class="block mt-0 lg:inline-block lg:mt-0 text-red-100 hover:text-white mr-4">
                Reviews
            </a>
            <a href="/manager" class="block mt-0 lg:inline-block lg:mt-0 text-red-100 mx-4 hover:text-white">
                Manager
            </a>
            </div>
            <div>
            @guest
                    <a class="inline-block text-sm px-4 py-2 mr-2 leading-none border rounded text-white border-white mt-0 lg:mt-0"
                    href="{{ route('login') }}">{{ __('Login') }}</a>
            @if (Route::has('register'))
                    <a class="inline-block text-sm px-4 py-2 leading-none border rounded text-red-500 border-white bg-white mt-0 lg:mt-0"
                     href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
            @else
                <a href="{{ route('logout') }}" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-red-500 hover:bg-white mt-0 lg:mt-0"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                >{{ __('Logout') }}</a>
            @endguest
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </nav>

    @yield('content')
    </div>
</body>