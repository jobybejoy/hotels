@extends('layouts.manager')

@section('content')
    <div class="flex">
    <div class="w-1/4">
      <div class="text-4xl font-black px-12 py-6 ">
          {{$service->stype}} Service
      </div>
      <div class="text-2xl font-normal px-12">{{$service->sprice}}</div>
    </div>
    <div class="w-3/4">
      <div class="flex justify-center align-items-center">
          <div class="text-4xl font-black pr-12 py-6">
          {{$service->stype}} Reservations
          </div>
      </div>
      <div class="flex justify-center align-items-center">
          <div class="flex p-2">
          @if(!empty($reservations))
          <table class="table-fixed ">
              <thead>
                  <tr>
                  <th class="w-1/8 px-2 py-4">Room Number</th>
                  <th class="w-2/8 px-4 py-4">Date</th>
                  <th class="w-1/8 px-4 py-4">Price</th>
                  </tr>
              </thead>
              <tbody>
              
                @foreach ($reservations as $reservation)
                    <tr>
                    <td class="border px-4 py-2">{{$reservation->room_no}}</td>
                    <td class="border px-4 py-2">{{$reservation->check_in_date}}</td>
                    <td class="border px-4 py-2">{{$reservation->sprice}}</td>
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
