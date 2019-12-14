@extends('layouts.app2')

@section('content')
      <div class="flex justify-center flex-col align-items-center px-12 py-6 mb-10">
        <div class="text-3xl font-black pb-6">
          Reservation #{{$reservation->invoice_no}}
        </div>
        <div class="flex flex-column w-1/2 justify-center">

            <div class="flex align-items-center justify-between my-4">
              <div class="text-lg">
                From ( {{$reservation->check_in_date}} ) 
              </div>
              <div class="text-lg">
                To  ( {{$reservation->check_out_date}} )
              </div>
            </div>

            <div class="flex flex-column justify-center">
            <div class="flex align-items-center justify-between">
              <div class="text-4xl font-bold">
                Hotel #{{$hotel->hotel_id}}
              </div>
              <div class="text-lg">
                {{$hotel->street}} , {{$hotel->state}} , {{$hotel->country}} , {{$hotel->zip}}  
              </div>
            </div>
            <div class="flex align-items-center justify-between my-10">
              <div class="text-3xl font-bold">
                Room #{{$room->room_no}}
              </div>
              <div class="text-lg">
              {{$room->r_type}}  
              </div>
            </div>
            <div class="flex align-items-center justify-between mb-10">
              <div class="text-2xl font-bold">
                 {{$breakfast->btype}}
              </div>
             
            </div>
            <div class="flex align-items-center justify-between">
              <div class="text-2xl font-bold">
                 {{$service->stype}}
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
            
          </div>
      </div>
@endsection
