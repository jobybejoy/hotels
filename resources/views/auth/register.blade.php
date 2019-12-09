@extends('layouts.app2')

@section('content')
<div class="flex justify-center content-center pt-10">
<form method="POST" action="{{ route('register') }}" class="w-full w-50 max-w-lg">
@csrf
    <div class="text-xl font-semibold mb-6">{{ __('Register') }}</div>
    <div class="flex flex-wrap -mx-3 mb-3">
        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
            <label for="name"
            class="@error('name') text-red-400 @enderror block tracking-wide text-gray-700 text-xs font-bold mb-2">
                Name
            </label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
            class="@error('name') border-red-400 @enderror appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
            placeholder="Name">
            @error('name')
            <p class="text-red-500 text-xs italic">{{$message}}.</p>
            @enderror
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
            <label for="email" class="@error('email')  text-red-400 @enderror block tracking-wide text-gray-700 text-xs font-bold mb-2" >
                Email
            </label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
             class="@error('email') border-red-400 @enderror appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
            placeholder="user@email.com">
            @error('email')
            <p class="text-red-500 text-xs italic">{{$message}}.</p>
            @enderror
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
        <label  for="password" class="@error('password') text-red-400 @enderror block tracking-wide text-gray-700 text-xs font-bold mb-2">
            Password
        </label>
        <input id="password" type="password" name="password" required autocomplete="new-password"
         class="@error('password') border-red-400 @enderror appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
        placeholder="******************">
        @error('password')
            <p class="text-red-500 text-xs italic">{{$message}}.</p>
        @enderror
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
        <label for="password-confirm" class="block tracking-wide text-gray-700 text-xs font-bold mb-2">
            Confirm Password
        </label>
        <input id="password-confirm" type="password" name="password_confirmation"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
             required autocomplete="new-password" placeholder="******************">
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label for="address" class="@error('address') text-red-400 @enderror block tracking-wide text-gray-700 text-xs font-bold mb-2">
                Address
        </label>
        <textarea class="@error('address') border-red-400 @enderror appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
            id="address" name="address" value="{{ old('address') }}" rows="6" required autocomplete="address"
            placeholder="Street     City        State       Country"
            autofocus></textarea>
        @error('address')
                <p class="text-red-500 text-xs italic">{{$message}}.</p>
        @enderror
    </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label for="phone_number" class="@error('phone_number') text-red-400 @enderror block tracking-wide text-gray-700 text-xs font-bold mb-2">
            Phone Number
        </label>
        <input class="@error('phone_number') border-red-400 @enderror appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
            placeholder="3330123456"
            id="phone_number" type="text" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="Phone Number" autofocus>
        @error('phone_number')
            <p class="text-red-500 text-xs italic">{{$message}}.</p>
        @enderror
    </div>
    </div>
    
    <button type="submit" class="mt-3 ml-3 mb-12 shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none focus:border-blue-500 focus:border-4 text-white font-bold py-2 px-4 rounded" type="button">
        Register
    </button>

    </div>
</form>
</div>
@endsection
