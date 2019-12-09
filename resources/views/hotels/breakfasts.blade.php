@extends('layouts.app2')

@section('content')
    @if(!empty($breakfasts))
      <div class="text-3xl font-black pl-12">
        Breakfast
      </div>
      <div class="flex p-10">
        @foreach ($breakfasts as $breakfast)
            <a href='/selected/hotel/{{$hotel_id}}/breakfast/{{$breakfast->BTYPE}}' >
                  <div class="border-4 border-gray-500 m-2 p-2">
                      <div class="text-3xl font-black">
                          {{$breakfast->BTYPE}}
                      </div>
                      <div class="text-base">
                          {{$breakfast->BPRICE}}  <br />
                          {{$breakfast->DESCRIPTION}}  <br />
                      </div>
                  </div>
            </a>
          @endforeach
      </div>
    @else
      <p>No Breakfasts Listed Yet</p>
    @endif
@endsection
