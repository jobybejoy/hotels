@extends('layouts.manager')

@section('content')
    <div class="flex justify-center align-items-center">
        <div class="text-4xl font-black pr-12 py-6">Delete Room</div>
    </div>

    <div class="flex justify-center align-items-center">
          <div class="flex p-2">
            @if(!empty($room))
            <table class="table-fixed">
                <thead>
                    <tr>
                    <th class="w-1/6 px-2 py-4">Room No.</th>
                    <th class="w-1/2 px-4 py-4">Type</th>
                    <th class="w-1/6 px-4 py-4">Price</th>
                    <th class="w-1/6 px-4 py-4">Description</th>
                    <th class="w-1/6 px-4 py-4">Floor</th>
                    <th class="w-1/6 px-4 py-4">Capacity</th>
                    </tr>
                </thead>
                <tbody>
                      <tr>
                      <td class="border px-4 py-2">{{$room->room_no}}</td>
                      <td class="border px-4 py-2">{{$room->r_type}}</td>
                      <td class="border px-4 py-2">{{$room->price}}</td>
                      <td class="border px-4 py-2">{{$room->description}}</td>
                      <td class="border px-4 py-2">{{$room->floor}}</td>
                      <td class="border px-4 py-2">{{$room->capacity}}</td>
                      </tr>
                </tbody>
            </table>
            @else
              <p>Rooms Not Listed Yet</p>
            @endif
            </div>
        </div>

        <div class="flex justify-center align-items-center ">
          <div class="text-2xl font-medium px-12 mt-16 mb-6">Are you sure, you want to Delete this Room?</div>
        </div>

    <div class="flex justify-center content-center">
      <form class="w-full max-w-md m-auto" method="POST" action="{{ route('delete_room',['hotel_id' => $hotel_id,'room_no' => $room->room_no]) }}">
      @csrf
        
        <div class="md:flex md:items-center ">
          <div class="md:w-1/3"></div>
          <div class="md:w-2/3">
            <button type="submit" class=" mt-4 shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
              Delete Room
            </button>
          </div>
        </div>
      </form>
    </div>
@endsection
