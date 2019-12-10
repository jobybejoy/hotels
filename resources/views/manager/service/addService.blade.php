@extends('layouts.manager')

@section('content')
    <div class="flex justify-center align-items-center">
        <div class="text-4xl font-black pr-12 py-6">Add Service</div>
    </div>
    <div class="flex justify-center content-center">
      <form class="w-full max-w-md m-auto" method="POST" action="{{ route('add_service',['hotel_id' => $hotel_id]) }}">
      @csrf

        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label for="stype" class="@error('stype') text-red-400 @enderror block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" >
              Service Type
            </label>
          </div>
          <div class="md:w-2/3">
            <input  id="stype" type="text" name="stype" value="{{ old('stype') }}" required autocomplete="stype" autofocus
            class="@error('stype') border-red-400 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-red-500"
             placeholder="Service Name">
            @error('stype')
            <div><p class="text-red-400 text-xs italic">{{ $message }}</p></div>  
            @enderror
          </div>
        </div>

        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label for="sprice" class="@error('sprice') text-red-400 @enderror block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" >
              Price
            </label>
          </div>
          <div class="md:w-2/3">
            <input  id="sprice" type="text" name="sprice" value="{{ old('sprice') }}" required autocomplete="sprice" autofocus
            class="@error('sprice') border-red-400 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-red-500"
             placeholder="$$$">
            @error('sprice')
            <div><p class="text-red-400 text-xs italic">{{ $message }}</p></div>  
            @enderror
          </div>
        </div>
        
        <div class="md:flex md:items-center ">
          <div class="md:w-1/3"></div>
          <div class="md:w-2/3">
            <button type="submit" class=" mt-4 shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
              Add Service
            </button>
          </div>
        </div>
      </form>
    </div>
@endsection
