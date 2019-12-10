@extends('layouts.manager')

@section('content')
    <div class="flex justify-center align-items-center">
        <div class="text-4xl font-black pr-12 py-6">Delete Offer</div>
    </div>

    <div class="flex justify-center align-items-center">
          <div class="flex p-2">
            @if(!empty($offer))
            <table class="table-fixed">
                <thead>
                    <tr>
                    <th class="w-1/8 px-4 py-4">Hotel ID</th>
                    <th class="w-1/8 px-4 py-4">Room No</th>
                    <th class="w-1/8 px-4 py-4">Discount</th>
                    <th class="w-2/8 px-4 py-4">Start Date</th>
                    <th class="w-2/8 px-4 py-4">End Date</th>
                    </tr>
                </thead>
                <tbody>
                      <tr>
                        <td class="border font-semibold px-4 py-2">{{$offer->hotel_id}}</td>
                        <td class="border font-semibold px-4 py-2">{{$offer->room_no}}</td>
                        <td class="border px-4 py-2">{{$offer->discount}}</td>
                        <td class="border px-4 py-2">{{$offer->start_date}}</td>
                        <td class="border px-4 py-2">{{$offer->end_date}}</td>
                      </tr>
                </tbody>
            </table>
            @else
              <p>Service Not Listed </p>
            @endif
            </div>
        </div>

        <div class="flex justify-center align-items-center ">
          <div class="text-2xl font-medium px-12 mt-16 mb-6">Are you sure, you want to Delete this Room?</div>
        </div>

    <div class="flex justify-center content-center">
      <form class="w-full max-w-md m-auto" method="POST" action="{{ route('delete_offer',['hotel_id' => $hotel_id,'room_no' => $offer->room_no,'start_date' => $offer->start_date,'end_date' => $offer->end_date]) }}">
      @csrf
        
        <div class="md:flex md:items-center ">
          <div class="md:w-1/3"></div>
          <div class="md:w-2/3">
            <button type="submit" class=" mt-4 shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
              Delete Service
            </button>
          </div>
        </div>
      </form>
    </div>
@endsection
