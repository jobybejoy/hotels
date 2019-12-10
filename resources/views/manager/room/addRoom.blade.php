@extends('layouts.manager')

@section('content')
    <div class="flex justify-center align-items-center">
        <div class="text-4xl font-black pr-12 py-6">Add Room</div>
    </div>
    <div class="flex justify-center content-center">
      <form class="w-full max-w-md m-auto" method="POST" action="{{ route('add_room',['hotel_id' => $hotel->hotel_id]) }}">
      @csrf
        

        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label for="room_no" class="@error('room_no') text-red-400 @enderror block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
              Room Number
            </label>
          </div>
          <div class="md:w-2/3">
            <input  id="room_no" type="text" name="room_no" value="{{ old('room_no') }}" required autocomplete="room_no" autofocus
            class="@error('room_no') border-red-400 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-red-500" 
            placeholder="102">
            <p class="text-gray-500 text-xs my-1 ">Note | Room Number cannot be change later</p>
            @error('room_no')
            <div><p class="text-red-400 text-xs italic">{{ $message }}</p></div>  
            @enderror
          </div>
        </div>

        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label for="r_type" class="@error('r_type') text-red-400 @enderror block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" >
              Room Type
            </label>
          </div>
          <div class="md:w-2/3">
            <input  id="r_type" type="text" name="r_type" value="{{ old('r_type') }}" required autocomplete="r_type" autofocus
            class="@error('r_type') border-red-400 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-red-500"
             placeholder="Standard">
            @error('r_type')
            <div><p class="text-red-400 text-xs italic">{{ $message }}</p></div>  
            @enderror
          </div>
        </div>

        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label for="price" class="@error('price') text-red-400 @enderror block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" >
              Price
            </label>
          </div>
          <div class="md:w-2/3">
            <input  id="price" type="text" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus
            class="@error('price') border-red-400 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-red-500"
             placeholder="$$$">
            @error('price')
            <div><p class="text-red-400 text-xs italic">{{ $message }}</p></div>  
            @enderror
          </div>
        </div>

        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label for="floor" class="@error('floor') text-red-400 @enderror block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
              Floor
            </label>
          </div>
          <div class="md:w-2/3">
            <input  id="floor" type="text" name="floor" value="{{ old('floor') }}" required autocomplete="floor" autofocus
            class="@error('floor') border-red-400 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-red-500" 
            placeholder="10">
            @error('floor')
            <div><p class="text-red-400 text-xs italic">{{ $message }}</p></div>  
            @enderror
          </div>
        </div>

        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label for="capacity" class="@error('capacity') text-red-400 @enderror block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
              Capacity
            </label>
          </div>
          <div class="md:w-2/3">
            <input  id="capacity" type="text" name="capacity" value="{{ old('capacity') }}" required autocomplete="capacity" autofocus
            class="@error('capacity') border-red-400 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-red-500" 
            placeholder="02">
            @error('capacity')
            <div><p class="text-red-400 text-xs italic">{{ $message }}</p></div>  
            @enderror
          </div>
        </div>

        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label for="description" class="@error('description') text-red-400 @enderror block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
              Description
            </label>
          </div>
          <div class="md:w-2/3">
            <textarea rows="4"  id="description" name="description" required autocomplete="description" autofocus
            class="@error('description') border-red-400 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-red-500" id="inline-full-name" type="text" 
            placeholder="33rd description">{{ old('description') }}</textarea>
            @error('description')
            <div><p class="text-red-400 text-xs italic">{{ $message }}</p></div>  
            @enderror
          </div>
        </div>

        
        <div class="md:flex md:items-center ">
          <div class="md:w-1/3"></div>
          <div class="md:w-2/3">
            <button type="submit" class=" mt-4 shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
              Add Room
            </button>
          </div>
        </div>
      </form>
    </div>
@endsection
