@extends('layouts.manager')

@section('content')
    <div class="flex">
    <div class="w-1/4">
      <div class="text-4xl font-black px-12 py-6 ">
          {{$breakfast->btype}}
      </div>
      <div class="text-2xl font-normal px-12">{{$breakfast->bprice}}</div>
    </div>
    <div class="w-3/4">
      <div class="flex justify-center align-items-center">
          <div class="text-4xl font-black pr-12 py-6">
          {{$breakfast->btype}} Reservations
          </div>
      </div>
      <div class="flex justify-center align-items-center">
          <div class="flex py-2 px-4">
          @if(!empty($reservations))
          <table class="table-fixed ">
              <thead>
                  <tr>
                  <th class="w-1/8 px-2 py-4">Room Number</th>
                  <th class="w-4/8 px-4 py-4">Date</th>
                  <th class="w-1/8 px-4 py-4">No of Orders</th>
                  <th class="w-1/8 px-4 py-4">Price</th>
                  <th class="w-1/8 px-4 py-4 font-semibold">Total</th>
                  </tr>
              </thead>
              <tbody>
                <!-- room_no,check_in_date,nooforders,bprice,description -->
              
                @foreach ($reservations as $reservation)
                    <tr>
                    <td class="border px-4 py-2">{{$reservation->room_no}}</td>
                    <td class="border px-4 py-2">{{$reservation->check_in_date}}</td>
                    <td class="border px-4 py-2">{{$reservation->no_of_orders}}</td>
                    <td class="border px-4 py-2">{{$reservation->bprice}}</td>
                    <td class="border px-4 py-2"><span class="font-semibold">{{$reservation->bprice*$reservation->no_of_orders}}</span></td>
                    </tr>
                @endforeach
              </tbody>
          </table>
          @else
            <p>No Reservations Listed Yet</p>
          @endif
          </div>
      </div>
    </div>
    </div>
@endsection
