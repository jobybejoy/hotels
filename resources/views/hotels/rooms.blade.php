@extends('layouts.app2')

@section('content')
    @if(!empty($rooms))
      <div class="text-3xl font-black pl-12">
        Rooms
      </div>
      <div class="flex p-10">
        @foreach ($rooms as $room)
            <a href='/hotel/{{$hotel_id}}/room/{{$room->room_no}}' >
                  <div class="border-4 border-gray-500 m-2 p-2">
                      <div class="text-3xl font-black">
                          {{$room->room_no}}
                      </div>
                      <div class="text-base">
                          {{$room->r_type}}  <br />
                          @if($room->discount>0)
                          <div class="text text-red-500">
                            {{ $room->price - $room->discount }}  <br>
                          </div>
                          @else
                            {{$room->price}}   <br />
                          @endif
                          
                          {{$room->description}} <br />
                          {{$room->floor}}  <br />
                          {{$room->capacity}}
                      </div>

                      <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded"
                      href="/selected/hotel/{{$hotel_id}}/room/{{$room->room_no}}"
                      >SELECT</a>
                      
                  </div>
            </a>
          @endforeach
      </div>
    @else
      <p>Rooms Not Listed Yet</p>
    @endif
@endsection
