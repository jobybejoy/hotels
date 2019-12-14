@extends('layouts.app2')

@section('content')
      <div class="flex justify-center flex-col align-items-center px-12 py-6">
        <div class="text-3xl font-black pb-6">
          Payment 
        </div>
        <div class="flex flex-column w-full max-w-lg">
            <form method="POST" action="{{ route('payment') }}">
            @csrf

            <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                    <label for="name"
                    class="@error('name') text-red-400 @enderror block tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Name on card
                    </label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="cname" autofocus
                    class="@error('name') border-red-400 @enderror appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
                    placeholder="Name">
                    @error('name')
                    <p class="text-red-500 text-xs italic">{{$message}}.</p>
                    @enderror
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                    <label for="ctype"
                    class="@error('ctype') text-red-400 @enderror block tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Card Type
                    </label>
                   <select name="ctype" id="ctype" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 mb-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option selected>Credit</option>
                        <option >Debit</option>
                    </select>
                    @error('ctype')
                    <p class="text-red-500 text-xs italic">{{$message}}.</p>
                    @enderror
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                    <label for="cnumber"
                    class="@error('cnumber') text-red-400 @enderror block tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Card Number
                    </label>
                    <input id="cnumber" type="text" name="cnumber" value="{{ old('cnumber') }}" required autocomplete="cnumber" autofocus
                    class="@error('cnumber') border-red-400 @enderror appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
                    placeholder="**** **** **** ****">
                    @error('cnumber')
                    <p class="text-red-500 text-xs italic">{{$message}}.</p>
                    @enderror
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-1/2 md:w-1/2 px-3 mb-6 md:mb-0 flex">
                    <div class="">
                      <label for="expdate"
                      class="@error('expdate') text-red-400 @enderror block tracking-wide text-gray-700 text-xs font-bold mb-2">
                          Expiry Date
                      </label>
                      <input id="expdate" type="date" name="expdate" value="{{ old('expdate') }}" required autocomplete="expdate" autofocus
                    class="@error('expdate') border-red-400 @enderror appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
                    placeholder="2020">

                      @error('expdate')
                      <p class="text-red-500 text-xs italic">{{$message}}.</p>
                      @enderror
                    </div>
                </div>
            
                <div class="w-1/2 md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="cvv"
                    class="@error('cvv') text-red-400 @enderror block tracking-wide text-gray-700 text-xs font-bold mb-2">
                        CVV
                    </label>
                    <input id="cvv" type="text" name="cvv" value="{{ old('cvv') }}" required autocomplete="cvv" autofocus
                    class="@error('cvv') border-red-400 @enderror appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
                    placeholder="***">
                    @error('cvv')
                    <p class="text-red-500 text-xs italic">{{$message}}.</p>
                    @enderror
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                    <label for="baddress"
                    class="@error('baddress') text-red-400 @enderror block tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Bank Address
                    </label>
                    <input id="baddress" type="text" name="baddress" value="{{ old('baddress') }}" required autocomplete="baddress" autofocus
                    class="@error('baddress') border-red-400 @enderror appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
                    placeholder="Bank Address">
                    @error('baddress')
                    <p class="text-red-500 text-xs italic">{{$message}}.</p>
                    @enderror
                </div>
            </div>

            <div class="flex align-items-center justify-between">
              <div class="text-xl font-bold">Total</div>
              <div class="text-lg font-bold">${{$total}}</div>
            </div>
            <button type="submit" class="mt-6 bg-blue-500 hover:bg-blue-700 w-100 text-white font-bold py-2 px-4 my-8 rounded">
              Pay
            </button>
            </form>
          </div>
      </div>
@endsection
