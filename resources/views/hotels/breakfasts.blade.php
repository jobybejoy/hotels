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
                  <div class="m-2 rounded relative overflow-hidden shadow-md" style="width:340px;"
                    onClick="document.forms['{{$breakfast->btype}}'].submit();">
                      <div class="w-full bg-gray-200 h-48"></div>
                      <div class="px-6 py-4">
                          <div class="font-bold text-gray-700 text-lg mb-2">{{$breakfast->btype}} </div>
                            <div class="text font-bold my-2">
                              <span class="text-black">${{$breakfast->bprice}}</span>
                            </div>
                          <p class="text-gray-700 text-base my-2">
                            {{$breakfast->description}} 
                          </p>
                      </div>
                  </div>
            </form>
          @endforeach
      </div>
    @else
      <p>No Breakfasts Listed Yet</p>
    @endif
@endsection
