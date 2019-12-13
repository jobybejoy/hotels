@extends('layouts.app2')

@section('content')
      <div class="px-12 py-6">
        <div class="text-3xl font-black pb-6">
          Confirmation
        </div>
        <div class="flex flex-column w-1/2 justify-center">
            <div class="flex align-items-center justify-between mb-10">
              <div class="text-4xl">
                Hotel # {{$hotel->hotel_id}}
              </div>
              <div class="text-lg">
              {{$hotel->street}}  {{$hotel->state}}   {{$hotel->country}}   {{$hotel->zip}}  
              </div>
            </div>
            <div class="flex align-items-center justify-between">
              <div class="text-4xl">
                Room # {{$room->room_no}}
              </div>
              <div class="text-lg">
              {{$room->r_type}}  
              </div>
              <div class="text-lg">
              {{$room->capacity}}  
              </div>
              <div class="text text-lg">
              @if($room->discount>0)
                <span class="line-through pr-2">${{ round($room->price) }}</span><span class="text-red-500">${{ round($room->price - $room->discount) }}</span>
              @else
                ${{$room->price}}
              @endif
              </div>
            </div>
            <div class="flex align-items-center justify-between">
              <div class="text-4xl">
                 {{$breakfast->btype}}
              </div>
              <div class="text-lg">
              ${{$breakfast->bprice}}  
              </div>
            </div>
            <div class="flex align-items-center justify-between">
              <div class="text-4xl">
                 {{$service->stype}}
              </div>
              <div class="text-lg">
                ${{$service->sprice}}  
              </div>
            </div>
            <div class="flex align-items-center justify-between mt-5">
              <div class="text-xl font-bold">
                 Total
              </div>
              <div class="text-lg font-bold">
                ${{$total}}  
              </div>
            </div>
            <form method="POST" action="{{ route('checkout') }}">
            @csrf
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
              Checkout
            </button>
            </form>
          </div>
      </div>
@endsection
