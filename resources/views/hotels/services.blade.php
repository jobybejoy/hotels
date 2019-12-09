@extends('layouts.app2')

@section('content')
    @if(!empty($services))
      <div class="text-3xl font-black pl-12">
        Service
      </div>
      <div class="flex p-10">
        @foreach ($services as $service)
            <a href='/selected/hotel/{{$hotel_id}}/service/{{$service->STYPE}}' >
                  <div class="border-4 border-gray-500 m-2 p-2">
                      <div class="text-3xl font-black">
                          {{$service->STYPE}}
                      </div>
                      <div class="text-base">
                          {{$service->SPRICE}}  <br />
                      </div>
                  </div>
            </a>
          @endforeach
      </div>
    @else
      <p>No services Listed Yet</p>
    @endif
@endsection
