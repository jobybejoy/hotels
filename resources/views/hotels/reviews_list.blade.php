@extends('layouts.app2')

@section('content')
    <div class="w-full">
      <div class="flex flex-no-wrap justify-center align-items-center">
          <div class="text-4xl font-black pr-12 py-6">
          Room Reviews
          </div>
      </div>
      <div class="flex justify-center align-items-center">
          <div class="flex p-2 w-1/2">
          @if(!empty($room))
          <table class="table-fixed">
              <thead>
                  <tr>
                  <th class="w-1/12 px-2 py-4">Review ID</th>
                  <th class="w-6/12 px-4 py-4">Review</th>
                  <th class="w-1/12 px-4 py-4">Hotel ID</th>
                  <th class="w-1/12 px-4 py-4">Room No</th>
                  <th class="w-4/12 px-4 py-4">Rating</th>
                  </tr>
              </thead>
              <tbody>
              
                @foreach ($room as $review)
                    <tr>
                    <td class="border px-4 py-2">{{$review->rid}}</td>
                    <td class="border px-4 py-2">{{$review->text}}</td>
                    <td class="border px-4 py-2">{{$review->hotel_id}}</td>
                    <td class="border px-4 py-2">{{$review->room_no}}</td>
                    
                    <td class="border px-4 py-2 ">
                      @for ($i = 0; $i < $review->rating; $i++)
                        <span class="fa fa-star checked text-red-500"></span>
                      @endfor
                      @for ($i = 0; $i < 5-$review->rating; $i++)
                        <span class="fa fa-star-o text-red-500"></span>
                      @endfor
                    </td>
                    </tr>
                @endforeach
              </tbody>
          </table>
          @else
            <p>No Reservation So Far</p>
          @endif
          </div>
      </div>
      <div class="mt-10 flex justify-center align-items-center">
          <div class="text-4xl font-black pr-12 py-6">
          Service Reviews
          </div>
      </div>
      <div class="flex justify-center align-items-center">
          <div class="flex p-2 w-1/2">
          @if(!empty($service))
          <table class="table-fixed">
              <thead>
                  <tr>
                  <th class="w-1/12 px-2 py-4">Review ID</th>
                  <th class="w-6/12 px-4 py-4">Review</th>
                  <th class="w-1/12 px-4 py-4">Hotel ID</th>
                  <th class="w-1/12 px-4 py-4">Service Type</th>
                  <th class="w-4/12 px-4 py-4">Rating</th>
                  </tr>
              </thead>
              <tbody>
              
                @foreach ($service as $review)
                    <tr>
                    <td class="border px-4 py-2">{{$review->srid}}</td>
                    <td class="border px-4 py-2">{{$review->text}}</td>
                    <td class="border px-4 py-2">{{$review->hotel_id}}</td>
                    <td class="border px-4 py-2">{{$review->stype}}</td>
                    
                    <td class="border px-4 py-2 ">
                      @for ($i = 0; $i < $review->rating; $i++)
                        <span class="fa fa-star checked text-red-500"></span>
                      @endfor
                      @for ($i = 0; $i < 5-$review->rating; $i++)
                        <span class="fa fa-star-o text-red-500"></span>
                      @endfor
                    </td>
                    </tr>
                @endforeach
              </tbody>
          </table>
          @else
            <p>No Reservation So Far</p>
          @endif
          </div>
      </div>
      <div class="mt-10 flex justify-center align-items-center">
          <div class="text-4xl font-black pr-12 py-6">
          Breakfast Reviews
          </div>
      </div>
      <div class="flex justify-center align-items-center">
          <div class="flex p-2 w-1/2">
          @if(!empty($breakfast))
          <table class="table-fixed">
              <thead>
                  <tr>
                  <th class="w-1/12 px-2 py-4">Review ID</th>
                  <th class="w-6/12 px-4 py-4">Review</th>
                  <th class="w-1/12 px-4 py-4">Hotel ID</th>
                  <th class="w-1/12 px-4 py-4">Breakfast Type</th>
                  <th class="w-4/12 px-4 py-4">Rating</th>
                  </tr>
              </thead>
              <tbody>
              
                @foreach ($breakfast as $review)
                    <tr>
                    <td class="border px-4 py-2">{{$review->rid}}</td>
                    <td class="border px-4 py-2">{{$review->text}}</td>
                    <td class="border px-4 py-2">{{$review->hotel_id}}</td>
                    <td class="border px-4 py-2">{{$review->btype}}</td>
                    
                    <td class="border px-4 py-2 ">
                      @for ($i = 0; $i < $review->rating; $i++)
                        <span class="fa fa-star checked text-red-500"></span>
                      @endfor
                      @for ($i = 0; $i < 5-$review->rating; $i++)
                        <span class="fa fa-star-o text-red-500"></span>
                      @endfor
                    </td>
                    </tr>
                @endforeach
              </tbody>
          </table>
          @else
            <p>No Reservation So Far</p>
          @endif
          </div>
      </div>
    </div>
@endsection
