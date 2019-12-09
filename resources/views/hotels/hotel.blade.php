@extends('layouts.app2')

@section('content')
    <div class="flex align-items-center">
        <div class="flex p-10">
        
        @foreach ($hotels as $hotel)
                <div class="border-4 border-gray-500 m-2 p-2">
                    <div class="text-3xl font-black">
                        {{$hotel->hotel_id}}
                    </div>
                    <div class="text-base">
                        {{$hotel->street}}  <br />
                        {{$hotel->state}}   <br />
                        {{$hotel->country}} <br />
                        {{$hotel->zip}}
                    </div>
                </div>
        @endforeach
        </div>
    </div>
    @if(!empty($rooms))
      <div class="text-3xl font-black pl-12">
        Rooms
      </div>
      <div class="flex p-10">
        @foreach ($rooms as $room)
            <a href='/hotel/{{$hotels[0]->hotel_id}}/room/{{$room->room_no}}' >
                  <div class="border-4 border-gray-500 m-2 p-2">
                      <div class="text-3xl font-black">
                          {{  $room->room_no}}
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
                          {{$room->capacity}}   <br>
                      </div>
                      
                  </div>
            </a>
          @endforeach
      </div>
    @else
      <p>Rooms Not Listed Yet</p>
    @endif
@endsection
