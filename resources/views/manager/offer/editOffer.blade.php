@extends('layouts.manager')

@section('content')
    <div class="flex justify-center align-items-center">
        <div class="text-4xl font-black pr-12 py-6">Add Offer</div>
    </div>
    <div class="flex justify-center content-center">
      <form class="w-full max-w-md m-auto" method="POST" action="{{ route('add_offer',['hotel_id' => $hotel_id]) }}">
      @csrf

        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label for="room_no" class="@error('room_no') text-red-400 @enderror block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" >
              Room Number
            </label>
          </div>
          <div class="md:w-2/3">
            <select name="room_no" id="room_no" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
              @foreach($rooms as $room) 
                <option selected>{{$room->room_no}}</option>
              @endforeach
            </select>
            @error('room_no')
            <div><p class="text-red-400 text-xs italic">{{ $message }}</p></div>  
            @enderror
          </div>
        </div>

        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label for="discount" class="@error('discount') text-red-400 @enderror block text-gray-500 font-bold md:text-right mb-1 md:mb-0 py-3 px-4 pr-4" >
              Discount in %
            </label>
          </div>
          <div class="md:w-2/3">
            <input id="discount" type="text" name="discount" value="{{ old('discount') }}" required autocomplete="discount" autofocus
            class="@error('discount') border-red-400 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-red-500"
             placeholder="1%-100%">
            @error('discount')
            <div><p class="text-red-400 text-xs italic">{{ $message }}</p></div>  
            @enderror
          </div>
        </div>

        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label for="start_date" class="@error('start_date') text-red-400 @enderror block text-gray-500 font-bold md:text-right mb-1 md:mb-0 py-3 px-4 pr-4" >
              Start Date
            </label>
          </div>
          <div class="md:w-2/3">
            <input id="start_date" type="date" name="start_date" value="{{ old('start_date') }}" required autocomplete="start_date" autofocus
            class="@error('start_date') border-red-400 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-red-500"
             placeholder="Start Date">
            @error('start_date')
            <div><p class="text-red-400 text-xs italic">{{ $message }}</p></div>  
            @enderror
          </div>
        </div>

        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label for="end_date" class="@error('end_date') text-red-400 @enderror block text-gray-500 font-bold md:text-right mb-1 md:mb-0 py-3 px-4 pr-4" >
              End Date
            </label>
          </div>
          <div class="md:w-2/3">
            <input id="end_date" type="date" name="end_date" value="{{ old('end_date') }}" required autocomplete="end_date" autofocus
            class="@error('end_date') border-red-400 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-red-500"
             placeholder="End Date">
            @error('end_date')
            <div><p class="text-red-400 text-xs italic">{{ $message }}</p></div>  
            @enderror
          </div>
        </div>
        
        <div class="md:flex md:items-center ">
          <div class="md:w-1/3"></div>
          <div class="md:w-2/3">
            <button type="submit" class=" mt-4 shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
              Add Offer
            </button>
          </div>
        </div>
      </form>
    </div>
@endsection
