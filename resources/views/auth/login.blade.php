@extends('layouts.app2')

@section('content')
<div class="flex justify-center content-center pt-20">
<form class="w-full max-w-sm m-auto" method="POST" action="{{ route('login') }}">
@csrf
  <div class="m-10 text-xl font-semibold">{{ __('Login') }}</div>
  <div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
      <label for="email" class="@error('email') text-red-400 @enderror block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
        Email Address
      </label>
    </div>
    <div class="md:w-2/3">
      <input  id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
      class="@error('email') border-red-400 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-red-500" id="inline-full-name" type="text" placeholder="Email" value="">
      @error('email')
      <div><p class="text-red-400 text-xs italic">{{ $message }}</p></div>  
      @enderror
    </div>
  </div>
  <div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
      <label for="password" class="@error('password') text-red-400 @enderror block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-username">
        Password
      </label>
    </div>
    <div class="md:w-2/3">
      <input  id="password" type="password" name="password" required autocomplete="current-password" 
      class="@error('password') border-red-400 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-red-500" id="inline-username" type="password" placeholder="******************">
      @error('password')
      <div><p class="text-red-400 text-xs italic">{{ $message }}</p></div>  
      @enderror
    </div>
  </div>
  <div class="md:flex md:items-center">
    <div class="md:w-1/3"></div>
    <div class="md:w-2/3">
      <button type="submit" class="shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
        Login
      </button>
        @if (Route::has('password.request'))
        <a class="ml-3" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
        @endif
    </div>
  </div>
</form>
</div>
@endsection
