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
                  <div class="border-4 border-gray-500 m-2 p-2 hover:cursor-pointer"
                  onClick="document.forms['{{$service->stype}}'].submit();">
                      <div class="text-3xl font-black">
                          {{$service->stype}}
                      </div>
                      <div class="text-base">
                          {{$service->sprice}}  <br />
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
