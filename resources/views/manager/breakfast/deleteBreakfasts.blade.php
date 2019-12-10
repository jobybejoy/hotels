@extends('layouts.manager')

@section('content')
    <div class="flex justify-center align-items-center">
        <div class="text-4xl font-black pr-12 py-6">Delete Breakfast</div>
    </div>

    <div class="flex justify-center align-items-center">
          <div class="flex p-2">
            @if(!empty($breakfast))
            <table class="table-fixed">
                <thead>
                    <tr>
                    <th class="w-1/6 px-4 py-4">Type</th>
                    <th class="w-1/8 px-4 py-4">Price</th>
                    <th class="w-1/2 px-4 py-4">Description</th>
                    </tr>
                </thead>
                <tbody>
                      <tr>
                        <td class="border px-4 py-2">{{$breakfast->btype}}</td>
                        <td class="border px-4 py-2">{{$breakfast->bprice}}</td>
                        <td class="border px-4 py-2">{{$breakfast->description}}</td>
                      </tr>
                </tbody>
            </table>
            @else
              <p>Breakfast Not Listed </p>
            @endif
            </div>
        </div>

        <div class="flex justify-center align-items-center ">
          <div class="text-2xl font-medium px-12 mt-16 mb-6">Are you sure, you want to Delete this Breakfast?</div>
        </div>

    <div class="flex justify-center content-center">
      <form class="w-full max-w-md m-auto" method="POST" action="{{ route('delete_breakfast',['hotel_id' => $hotel_id,'btype' => $breakfast->btype]) }}">
      @csrf
        
        <div class="md:flex md:items-center ">
          <div class="md:w-1/3"></div>
          <div class="md:w-2/3">
            <button type="submit" class=" mt-4 shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
              Delete Breakfast
            </button>
          </div>
        </div>
      </form>
    </div>
@endsection
