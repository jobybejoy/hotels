@extends('layouts.raw')

@section('content')
    <div class="h-screen bg-cover bg-center " style="background-image: url({{url('/images/banner.png')}})">
        <nav class="flex items-center fixed w-full justify-between flex-wrap p-4 z-10">
            <div class="flex items-center flex-shrink-0 text-white mr-6">
                    <div class="p-2 pr-3 pl-3 tracking-wide border-solid border-4 border-white">
                    <span class="font-semibold text-xl">HULTON</span>
                </div>
            </div>
            <div class="block lg:hidden">
                <button class="flex items-center px-3 py-2 border rounded text-white-200 border-red-400 hover:text-white hover:border-white">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                </button>
            </div>
            <div class="w-full block  flex-grow lg:flex lg:items-center lg:w-auto">
                <div class="text-sm lg:flex-grow">
                <!-- <a href="#responsive-header" class="block mt-0 lg:inline-block lg:mt-0 text-red-100 hover:text-white mr-4">
                    Docs
                </a>
                <a href="#responsive-header" class="block mt-0 lg:inline-block lg:mt-0 text-red-100 hover:text-white mr-4">
                    Examples
                </a>
                <a href="#responsive-header" class="block mt-0 lg:inline-block lg:mt-0 text-red-100 hover:text-white">
                    Blog
                </a> -->
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
        
        <div class="flex justify-center items-center w-100 h-screen">
        <form method="POST" action="{{ route('search_hotel') }}">
        @csrf
            <div class="max-w-sm rounded max-h-md bg-white shadow-lg px-8 py-4">
                <div class="text-xl font-bold text-gray-700 pr-12 py-6 ml-2">Search for Hotel</div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/4">
                        <label for="start_date" class="@error('start_date') text-red-400 @enderror block text-gray-500 font-bold md:text-right mb-1 md:mb-0 py-3  pr-4" >
                        From
                        </label>
                    </div>
                    <div class="md:w-3/4">
                        <input id="start_date" type="date" name="start_date" value="{{ old('start_date') }}" required autocomplete="start_date" autofocus
                        class="@error('start_date') border-red-400 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-red-500"
                        placeholder="Start Date">
                        @error('start_date')
                        <div><p class="text-red-400 text-xs italic">{{ $message }}</p></div>  
                        @enderror
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/4">
                        <label for="end_date" class="@error('end_date') text-red-400 @enderror block text-gray-500 font-bold md:text-right mb-1 md:mb-0 py-3  pr-4" >
                        To
                        </label>
                    </div>
                    <div class="md:w-3/4">
                        <input id="end_date" type="date" name="end_date" value="{{ old('end_date') }}" required autocomplete="end_date" autofocus
                        class="@error('end_date') border-red-400 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-red-500"
                        placeholder="Start Date">
                        @error('end_date')
                        <div><p class="text-red-400 text-xs italic">{{ $message }}</p></div>  
                        @enderror
                    </div>
                </div>

                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/4">
                        <label for="search" class="@error('search') text-red-400 @enderror block text-gray-500 font-bold md:text-right mb-1 md:mb-0 py-3  pr-4" >
                        Search
                        </label>
                    </div>
                    <div class="md:w-3/4">
                        <input id="search" type="text" name="search" value="{{ old('search') }}" autocomplete="search" autofocus
                        class="@error('search') border-red-400 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-red-500"
                        placeholder="New York">
                        @error('search')
                        <div><p class="text-red-400 text-xs italic">{{ $message }}</p></div>  
                        @enderror
                    </div>
                </div>

                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/4">

                    </div>
                    <div class="md:w-3/4">
                        <input id="submit" type="submit" name="submit" value="Search" required autocomplete="submit" autofocus
                        class="@error('submit') border-red-400 @enderror bg-red-500 border-red-500  appearance-none border-2 rounded w-full py-2 px-4 text-white font-semibold leading-tight focus:outline-none focus:bg-white focus:border-red-500"
                        placeholder="New York">
                        @error('submit')
                        <div><p class="text-red-400 text-xs italic">{{ $message }}</p></div>  
                        @enderror
                    </div>
                </div>

            </div>
        </div>
        
    </div>
@endsection
