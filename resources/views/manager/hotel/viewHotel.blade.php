@extends('layouts.manager')

@section('content')
    <div class="flex">
    <div class="w-1/4">
      <div class="text-4xl font-black px-12 py-6 mt-16">
          Hotel #{{$hotel->hotel_id}}
      </div>
      <div class="text-2xl font-normal px-12">{{$hotel->street}}</div>
      <div class="text-2xl font-normal px-12">{{$hotel->state}}</div>
      <div class="text-2xl font-normal px-12">{{$hotel->country}}</div>
      <div class="text-2xl font-normal px-12">{{$hotel->zip}}</div>
      <div class="px-12 py-6">
        <a href="/services/hotel/{{$hotel->hotel_id}}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
        Services</a>
        <a href="/breakfasts/hotel/{{$hotel->hotel_id}}" class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
        Breakfasts</a>
      </div>
      <a href="/offers/hotel/{{$hotel->hotel_id}}" class="ml-12 bg-blue-500 hover:bg-blue-700 text-white font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
        Offers</a>
    </div>
    <div class="w-3/4">
      <div class="flex justify-center align-items-center">
          <div class="text-4xl font-black pr-12 py-6">
          Rooms
          </div>
          <a href="/add/hotel/{{$hotel->hotel_id}}/room" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Add</a>
      </div>
      <div class="flex justify-center align-items-center">
          <div class="flex p-2">
          @if(!empty($rooms))
          <table class="table-auto">
              <thead>
                  <tr>
                  <th class="w-1/12 px-2 py-4">Room No.</th>
                  <th class="w-2/12 px-4 py-4">Type</th>
                  <th class="w-1/12 px-4 py-4">Price</th>
                  <th class="w-6/12 px-4 py-4">Description</th>
                  <th class="w-1/12 px-4 py-4">Floor</th>
                  <th class="w-1/12 px-4 py-4">Capacity</th>
                  <th class="w-1/12 px-4 py-4">Actions</th>
                  <th class="w-1/12      py-4">Others</th>
                  </tr>
              </thead>
              <tbody>
              
                @foreach ($rooms as $room)
                    <tr>
                    <td class="border px-4 py-2">{{$room->room_no}}</td>
                    <td class="border px-4 py-2">{{$room->r_type}}</td>
                    <td class="border px-4 py-2">{{$room->price}}</td>
                    <td class="border px-4 py-2">{{$room->description}}</td>
                    <td class="border px-4 py-2">{{$room->floor}}</td>
                    <td class="border px-4 py-2">{{$room->capacity}}</td>
                    <td class="px-4 py-2">
                        <div class="flex">
                        <a href="/edit/hotel/{{$hotel->hotel_id}}/room/{{$room->room_no}}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold py-2 px-4 border border-blue-500 hover:border-transparent rounded">Edit</a>
                        <a href="/delete/hotel/{{$hotel->hotel_id}}/room/{{$room->room_no}}" class="ml-2 bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">Delete</a>
                        </div>
                    </td>
                    <td class=" py-2">
                        <div class="flex">
                        <a href="/review/hotel/{{$hotel->hotel_id}}/room/{{$room->room_no}}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold py-2 px-4 border border-blue-500 hover:border-transparent rounded">Review</a>
                        <a href="/reservation/hotel/{{$hotel->hotel_id}}/room/{{$room->room_no}}" class="ml-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold py-2 px-4 border border-blue-500 hover:border-transparent rounded">Reservation</a>
                        </div>
                    </td>
                    </tr>
                @endforeach
              </tbody>
          </table>
          @else
            <p>Rooms Not Listed Yet</p>
          @endif
          </div>
      </div>
    </div>
    </div>
@endsection
