@extends('layouts.manager')

@section('content')
    <div class="flex">
    <div class="w-1/4">
      <div class="text-4xl font-black px-12 py-6 ">
          Room #{{$room->room_no}}
      </div>
      <div class="text-2xl font-normal px-12">{{$room->room_no}}</div>
      <div class="text-2xl font-normal px-12">{{$room->r_type}}</div>
      <div class="text-2xl font-normal px-12">{{$room->price}}</div>
      <div class="text-2xl font-normal px-12">{{$room->description}}</div>
      <div class="text-2xl font-normal px-12">{{$room->floor}}</div>
      <div class="text-2xl font-normal px-12">{{$room->capacity}}</div>
      <div class="px-12 py-6">
       
      </div>
    </div>
    <div class="w-3/4">
      <div class="flex justify-center align-items-center">
          <div class="text-4xl font-black pr-12 py-6">
          Room Reservations
          </div>
      </div>
      <div class="flex justify-center align-items-center">
          <div class="flex p-2">
          @if(!empty($reservations))
          <table class="table-fixed ">
            <!-- name,phone_number,email,R.invoice_no,rdate,check_in_date,check_out_date -->
              <thead>
                  <tr>
                  <th class="w-1/8 px-2 py-4">Invoice No.</th>
                  <th class="w-2/8 px-4 py-4">Customer</th>
                  <th class="w-1/8 px-4 py-4">Reserved on</th>
                  <th class="w-1/8  px-4 py-4">From</th>
                  <th class="w-1/8 px-4 py-4">To</th>
                  </tr>
              </thead>
              <tbody>
              
                @foreach ($reservations as $reservation)
                    <tr>
                    <td class="border px-4 py-2">{{$reservation->invoice_no}}</td>
                    <td class="border px-4 py-2">
                      <div class="font-bold color-grey-500 text-md">{{$reservation->name}}</div>
                      <div class="font-normal color-grey-500 text-sm"> {{$reservation->email}}</div>
                      <div class="font-normal color-grey-500 text-sm">{{$reservation->phone_number}}</div>
                    </td>
                    <td class="border px-4 py-2">{{$reservation->rdate}}</td>
                    <td class="border px-4 py-2">{{$reservation->check_in_date}}</td>
                    <td class="border px-4 py-2">{{$reservation->check_out_date}}</td>
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
