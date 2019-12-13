@extends('layouts.app2')

@section('content')
    <div class="flex justify-center align-items-center">
        <div class="flex p-10">
        @foreach ($hotels as $hotel)
           <a href='/hotel/{{$hotel->hotel_id}}' >
                <div class="m-2 rounded overflow-hidden shadow-md">
                    <!-- <img class="w-full" src="/img/card-top.jpg" alt="Sunset in the mountains"> -->
                    <div class="w-full bg-gray-200 h-48"></div>
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">The Coldest Sunset</div>
                        <p class="text-gray-700 text-base">
                        {{$hotel->hotel_id}}
                        {{$hotel->street}}  <br />
                        {{$hotel->state}}   <br />
                        {{$hotel->country}} <br />
                        {{$hotel->zip}}
                        <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil. -->
                        </p>
                    </div>
                </div>
                <!-- <div class="border-4 border-gray-500 m-2 p-2">
                    <div class="text-3xl font-black">
                        {{$hotel->hotel_id}}
                    </div>
                    <div class="text-base">
                        {{$hotel->street}}  <br />
                        {{$hotel->state}}   <br />
                        {{$hotel->country}} <br />
                        {{$hotel->zip}}
                    </div>
                    
                </div> -->
           </a>
        @endforeach
        </div>
    </div>
@endsection
