@extends('layouts.app2')

@section('content')
    <div class="flex justify-center align-items-center">
        
        <div class="p-10 w-full h-screen bg-red-200 max-w-4xl">
        <div class="w-full border-2 border-gray-600 h-12"></div>
        @foreach ([1,2,5] as $hotel)
        <div class="w-full bg-gray-500 h-12 mt-5">
            {{$hotel}}
        </div>
        @endforeach
        @foreach ([3,4,6] as $hotel)
            <label for=""></label>
            <input class="bg-white focus:outline-none focus:shadow-outline h-12 mt-5 border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="email" placeholder="jane@example.com">
        @endforeach
        
        </div>
    </div>
    

@endsection
