@extends('layouts.app2')

@section('content')
    @if(!empty($breakfasts))
      <div class="text-3xl font-black pl-12">
        Breakfast
      </div>
      <div class="flex p-10">
        @foreach ($breakfasts as $breakfast)
            <form name="{{$breakfast->btype}}" method="POST" action="{{ route('select_breakfast',['hotel_id'=>$hotel_id,'btype' => $breakfast->btype]) }}">
            @csrf
            <!-- <div href='/selected/hotel/{{$hotel_id}}/breakfast/{{$breakfast->btype}}' > -->
                  <div class="border-4 border-gray-500 m-2 p-2 hover:cursor-pointer" 
                  onClick="document.forms['{{$breakfast->btype}}'].submit();" >
                      <div class="text-3xl font-black">
                          {{$breakfast->btype}}
                      </div>
                      <div class="text-base">
                          {{$breakfast->bprice}}  <br />
                          {{$breakfast->description}}  <br />
                      </div>
                  </div>
            </form>
          @endforeach
      </div>
    @else
      <p>No Breakfasts Listed Yet</p>
    @endif
@endsection
