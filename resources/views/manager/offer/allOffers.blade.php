@extends('layouts.manager')

@section('content')
    <div class="flex">
    <div class="w-1/3">
      <div class="text-4xl font-black px-12 py-6 mt-16">
          Hotel #{{$hotel->hotel_id}}
      </div>
      <div class="text-2xl font-normal px-12">{{$hotel->street}}</div>
      <div class="text-2xl font-normal px-12">{{$hotel->state}}</div>
      <div class="text-2xl font-normal px-12">{{$hotel->country}}</div>
      <div class="text-2xl font-normal px-12">{{$hotel->zip}}</div>
      <div class="px-12 py-6">
        <a href="/rooms/hotel/{{$hotel->hotel_id}}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
        Rooms</a>
        <a href="/breakfasts/hotel/{{$hotel->hotel_id}}" class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
        Breakfasts</a>
        <a href="/services/hotel/{{$hotel->hotel_id}}" class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
        Services</a>
      </div>
    </div>
    <div class="w-3/4">
      <div class="flex justify-center align-items-center">
          <div class="text-4xl font-black pr-12 py-6">
          Offers
          </div>
          <a href="/add/hotel/{{$hotel->hotel_id}}/offer" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Add</a>
      </div>
      <div class="flex justify-center align-items-center">
          <div class="flex p-2">
          @if(!empty($offers))
          <table class="table-fixed">
              <thead>
                  <tr>
                  <th class="w-1/12 px-4 py-4">Room Number</th>
                  <th class="w-2/12 px-4 py-4">Room Type</th>
                  <th class="w-1/12 px-4 py-4">Price</th>
                  <th class="w-1/12 px-4 py-4">Discount in %</th>
                  <th class="w-1/12 px-4 py-4 font-semibold">New Price</th>
                  <th class="w-2/12 px-4 py-4">Start Date</th>
                  <th class="w-2/12 px-4 py-4">End Date</th>
                  <th class="w-1/12 px-4 py-4">Actions</th>
                  </tr>
              </thead>
              <tbody>
              <!-- room_no,r_type,,price,discount,start_date,end_date,, -->
                @foreach ($offers as $offer)
                    <tr>
                    <td class="border px-4 py-2">{{$offer->room_no}}</td>
                    <td class="border px-4 py-2">{{$offer->r_type}}</td>
                    <td class="border px-4 line-through py-2">{{$offer->price}}</td>
                    <td class="border px-4 py-2">{{$offer->discount}}</td>
                    <td class="border px-4 py-2 font-semibold ">{{ $offer->price-$offer->price*($offer->discount/100)}}</td>
                    <td class="border px-4 py-2">{{$offer->start_date}}</td>
                    <td class="border px-4 py-2">{{$offer->end_date}}</td>
                    <td class="px-4 py-2">
                        <div class="flex">
                        <!-- <a href="/edit/hotel/{{$hotel->hotel_id}}/offer/{{$offer->room_no}}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold py-2 px-4 border border-blue-500 hover:border-transparent rounded">Edit</a> -->
                        <a href="/delete/hotel/{{$hotel->hotel_id}}/offer/{{$offer->room_no}}/{{$offer->start_date}}/{{$offer->end_date}}" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">Delete</a>
                        </div>
                    </td>
                    </tr>
                @endforeach
              </tbody>
          </table>
          @else
            <p>No Service Listed Yet</p>
          @endif
          </div>
      </div>
    </div>
    </div>
@endsection
