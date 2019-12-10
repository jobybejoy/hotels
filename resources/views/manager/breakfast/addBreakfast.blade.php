@extends('layouts.manager')

@section('content')
    <div class="flex justify-center align-items-center">
        <div class="text-4xl font-black pr-12 py-6">Add Breakfast</div>
    </div>
    <div class="flex justify-center content-center">
      <form class="w-full max-w-lg m-auto" method="POST" action="{{ route('add_breakfast',['hotel_id' => $hotel_id]) }}">
      @csrf

        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label for="btype" class="@error('btype') text-red-400 @enderror block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" >
              Breakfast Name
            </label>
          </div>
          <div class="md:w-2/3">
            <input  id="btype" type="text" name="btype" value="{{ old('btype') }}" required autocomplete="btype" autofocus
            class="@error('btype') border-red-400 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-red-500"
             placeholder="Breakfast Name">
             <p class="text-gray-500 text-xs my-1 ">Note | Breakfast Name cannot be change later</p>
            @error('btype')
            <div><p class="text-red-400 text-xs italic">{{ $message }}</p></div>  
            @enderror
          </div>
        </div>

        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label for="bprice" class="@error('bprice') text-red-400 @enderror block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" >
              Price
            </label>
          </div>
          <div class="md:w-2/3">
            <input  id="bprice" type="text" name="bprice" value="{{ old('bprice') }}" required autocomplete="bprice" autofocus
            class="@error('bprice') border-red-400 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-red-500"
             placeholder="$$$">
            @error('bprice')
            <div><p class="text-red-400 text-xs italic">{{ $message }}</p></div>  
            @enderror
          </div>
        </div>

        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label for="description" class="@error('description') text-red-400 @enderror block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" >
              Description
            </label>
          </div>
          <div class="md:w-2/3">
            <textarea  id="description" rows="8"  name="description" required autocomplete="description" autofocus
            class="@error('description') border-red-400 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-red-500"
             placeholder="Description">{{ old('description') }}</textarea>
            @error('description')
            <div><p class="text-red-400 text-xs italic">{{ $message }}</p></div>  
            @enderror
          </div>
        </div>
        
        <div class="md:flex md:items-center ">
          <div class="md:w-1/3"></div>
          <div class="md:w-2/3">
            <button type="submit" class=" mt-4 shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
              Add Breakfast
            </button>
          </div>
        </div>
      </form>
    </div>
@endsection
