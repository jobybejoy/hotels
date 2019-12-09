@extends('layouts.manager')

@section('content')
    <div class="flex justify-center align-items-center">
        <div class="text-4xl font-black pr-12 py-6">Delete Hotel</div>
    </div>
    <div class="flex justify-center align-items-center">
      <div class="flex p-2">
        <table class="table-fixed">
            <thead>
                <tr>
                <th class="w-1/6 px-2 py-4">Hotel ID</th>
                <th class="w-1/2 px-4 py-4">Street</th>
                <th class="w-1/6 px-4 py-4">State</th>
                <th class="w-1/6 px-4 py-4">Country</th>
                <th class="w-1/6 px-4 py-4">ZIP</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td class="border px-4 py-2">{{$hotel->hotel_id}}</td>
                <td class="border px-4 py-2">{{$hotel->street}}</td>
                <td class="border px-4 py-2">{{$hotel->state}}</td>
                <td class="border px-4 py-2">{{$hotel->country}}</td>
                <td class="border px-4 py-2">{{$hotel->zip}}</td>
                </tr>
            </tbody>
        </table>
      </div>
    </div>
      <div class="flex justify-center align-items-center ">
        <div class="text-2xl font-medium px-12 mt-16 mb-6">Are you sure, you want to Delete this Hotel?</div>
      </div> 
    <div class="flex justify-center content-center">
      <form class="w-full max-w-sm m-auto" method="POST" action="{{ route('delete_hotel',['hotel_id' => $hotel->hotel_id]) }}">
      @csrf
        
        <div class="md:flex md:items-center ">
          <div class="md:w-1/3"></div>
          <div class="md:w-2/3">
            <button type="submit" class=" mt-4 shadow bg-orange-500 hover:bg-orange-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
              Delete
            </button>
          </div>
        </div>
      </form>
    </div>
@endsection
