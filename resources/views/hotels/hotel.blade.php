@extends('layouts.app2')

@section('content')
    <div class="flex justify-center align-items-center">
        <div class="flex p-10 w-full ">
        @foreach ($hotels as $hotel)
           <a href='/hotel/{{$hotel->hotel_id}}'>
                <div class="m-2 rounded relative overflow-hidden shadow-md" style="width:400;">
                    <div class="absolute top-0 right-0 pr-2 pt-2">
                        <div class="font-black text-xl">
                        #{{$hotel->hotel_id}}
                        </div>
                    </div>
                    <div class="w-full bg-gray-200 h-48"></div>
                    <div class="px-6 py-4">
                        <div class="font-bold text-lg mb-2">{{$hotel->street}} , {{$hotel->state}}</div>
                        <p class="text-gray-700 text-base">
                        {{$hotel->state}}   <br />
                        {{$hotel->country}} <br />
                        {{$hotel->zip}}
                        </p>
                    </div>
                </div>
           </a>
        @endforeach
        </div>
    </div>
    @if(!empty($rooms))
      <div class="text-3xl font-black pl-12">
        Rooms
      </div>
      <div class="flex justify-center align-items-center">
        <div class="flex p-10 w-full">
        @foreach ($rooms as $room)
           <a href='/hotel/{{$hotel->hotel_id}}/room/{{$room->room_no}}'>
                <div class="m-2 rounded relative overflow-hidden shadow-md" style="width:340px;">
                    <div class="absolute top-0 right-0 pr-2 pt-2">
                        <div class="font-black text-xl">
                        #{{ $room->room_no}}
                        </div>
                    </div>
                    <div class="w-full bg-gray-200 h-48"></div>
                    <div class="px-6 py-4">
                        <div class="font-bold text-lg mb-2">{{$room->r_type}} </div>
                        @if($room->discount>0)
                          <div class="text font-bold my-2">
                            <span class="text-red-500">${{ $room->price - $room->discount }} </span>
                            <span class="ml-4 text-black line-through">${{$room->price}}</span>
                          </div>
                          @else
                          <span class="text-black">${{$room->price}}</span>
                        @endif
                        <p class="text-gray-700 text-base my-2">
                        {{$room->description}} <br> 
                        </p>
                    </div>
                </div>
           </a>
        @endforeach
        </div>
    </div>
    @else
      <p>Rooms Not Listed Yet</p>
    @endif
      
      
@endsection
