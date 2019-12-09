@extends('layouts.app2')

@section('content')
    <div class="flex justify-center align-items-center">
        <div class="flex p-10">
        @foreach ($hotels as $hotel)
           <a href='/hotel/{{$hotel->hotel_id}}' >
                <div class="border-4 border-gray-500 m-2 p-2">
                    <div class="text-3xl font-black">
                        {{$hotel->hotel_id}}
                    </div>
                    <div class="text-base">
                        {{$hotel->street}}  <br />
                        {{$hotel->state}}   <br />
                        {{$hotel->country}} <br />
                        {{$hotel->zip}}
                    </div>
                    
                </div>
           </a>
        @endforeach
        </div>
    </div>
@endsection
