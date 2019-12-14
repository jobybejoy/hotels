@extends('layouts.app2')

@section('content')
    <div class="flex">
    <div class="w-full">
      <div class="flex justify-center align-items-center">
          <div class="text-4xl font-black pr-12 py-6">
          Reservations
          </div>
      </div>
      <div class="flex justify-center align-items-center">
          <div class="flex p-2">
          @if(!empty($reservations))
          <table class="table-fixed">
              <thead>
                  <tr>
                  <th class="w-1/6 px-2 py-4">Invoice No</th>
                  <th class="w-1/2 px-4 py-4">Reservation Date</th>
                  <th class="w-1/6 px-4 py-4">Price</th>
                  </tr>
              </thead>
              <tbody>
              
                @foreach ($reservations as $reservation)
                    <tr>
                    <td class="border px-4 py-2"><a href="/booking/{{$reservation->invoice_no}}">{{$reservation->invoice_no}}</a></td>
                    <td class="border px-4 py-2">{{$reservation->rdate}}</td>
                    <td class="border px-4 py-2">{{$reservation->rprice}}</td>
                    </tr>
                @endforeach
              </tbody>
          </table>
          @else
            <p>You have post any reservations reviews.</p>
          @endif
          </div>
      </div>
    </div>
    </div>
@endsection
