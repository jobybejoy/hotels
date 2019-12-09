@extends('layouts.manager')

@section('content')
    <div class="flex justify-center align-items-center">
        <div class="text-4xl font-black pr-12 py-6">Add Hotel</div>
    </div>
    <div class="flex justify-center content-center">
      <form class="w-full max-w-md m-auto" method="POST" action="{{ route('add_hotel') }}">
      @csrf
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label for="street" class="@error('street') text-red-400 @enderror block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
              Street
            </label>
          </div>
          <div class="md:w-2/3">
            <textarea rows="4"  id="street" name="street" required autocomplete="street" autofocus
            class="@error('street') border-red-400 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-red-500" id="inline-full-name" type="text" 
            placeholder="33rd Street">{{ old('street') }}</textarea>
            @error('street')
            <div><p class="text-red-400 text-xs italic">{{ $message }}</p></div>  
            @enderror
          </div>
        </div>

        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label for="state" class="@error('state') text-red-400 @enderror block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
              State
            </label>
          </div>
          <div class="md:w-2/3">
            <input  id="state" type="text" name="state" value="{{ old('state') }}" required autocomplete="state" autofocus
            class="@error('state') border-red-400 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-red-500" id="inline-full-name" type="text" placeholder="NY" value="">
            @error('state')
            <div><p class="text-red-400 text-xs italic">{{ $message }}</p></div>  
            @enderror
          </div>
        </div>

        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label for="country" class="@error('country') text-red-400 @enderror block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
              Country
            </label>
          </div>
          <div class="md:w-2/3">
            <input  id="country" type="text" name="country" value="{{ old('country') }}" required autocomplete="country" autofocus
            class="@error('country') border-red-400 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-red-500" id="inline-full-name" type="text" placeholder="USA">
            @error('country')
            <div><p class="text-red-400 text-xs italic">{{ $message }}</p></div>  
            @enderror
          </div>
        </div>

        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label for="zip" class="@error('zip') text-red-400 @enderror block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
              ZIP
            </label>
          </div>
          <div class="md:w-2/3">
            <input  id="zip" type="text" name="zip" value="{{ old('zip') }}" required autocomplete="zip" autofocus
            class="@error('zip') border-red-400 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-red-500" id="inline-full-name" type="text" placeholder="012345">
            @error('zip')
            <div><p class="text-red-400 text-xs italic">{{ $message }}</p></div>  
            @enderror
          </div>
        </div>
        
        <div class="md:flex md:items-center ">
          <div class="md:w-1/3"></div>
          <div class="md:w-2/3">
            <button type="submit" class=" mt-4 shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
              Add New
            </button>
          </div>
        </div>
      </form>
    </div>
@endsection
