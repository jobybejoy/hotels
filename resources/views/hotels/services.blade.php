@extends('layouts.app2')

@section('content')
    @if(!empty($services))
      <div class="text-3xl font-black pl-12">
        Service
      </div>
      <div class="flex p-10">
        @foreach ($services as $service)
          <form name="{{$service->stype}}" method="POST" action="{{ route('select_service',['hotel_id'=>$hotel_id,'stype' => $service->stype]) }}">
            @csrf
            <!-- <a href='/selected/hotel/{{$hotel_id}}/service/{{$service->stype}}' > -->
                  <div class="m-2 rounded relative overflow-hidden shadow-md" style="width:340px;"
                    onClick="document.forms['{{$service->stype}}'].submit();">
                      <div class="w-full bg-gray-200 h-48"></div>
                      <div class="px-6 py-4">
                          <div class="font-bold text-gray-700 text-lg mb-2">{{$service->stype}} </div>
                            <div class="text font-bold my-2">
                              <span class="text-black text-2xl">${{$service->sprice}}</span>
                            </div>
                      </div>
                  </div>
            <!-- </a> -->
            </form>
          @endforeach
      </div>
    @else
      <p>No services Listed Yet</p>
    @endif
@endsection
