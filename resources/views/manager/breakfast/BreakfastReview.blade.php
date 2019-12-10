@extends('layouts.manager')

@section('content')
    <div class="flex">
    <div class="w-1/4">
      <div class="text-4xl font-black px-12 py-6 ">
          {{$breakfast->btype}}
      </div>
      <div class="text-2xl font-normal px-12">{{$breakfast->bprice}}</div>
    </div>
    <div class="w-3/4">
      <div class="flex justify-center align-items-center">
          <div class="text-4xl font-black pr-12 py-6">
          Breakfast Reviews
          </div>
      </div>
      <div class="flex justify-center align-items-center">
          <div class="flex p-2">
          @if(!empty($reviews))
          <table class="table-fixed">
              <thead>
                  <tr>
                  <th class="w-1/6 px-2 py-4">Review ID</th>
                  <th class="w-1/2 px-4 py-4">Description</th>
                  <th class="w-1/6 px-4 py-4">Customer ID</th>
                  <th class="w-2/3 px-4 py-4">Rating</th>
                  </tr>
              </thead>
              <tbody>
              
                @foreach ($reviews as $review)
                    <tr>
                    <td class="border px-4 py-2">{{$review->brid}}</td>
                    <td class="border px-4 py-2">{{$review->text}}</td>
                    <td class="border px-4 py-2">{{$review->cid}}</td>
                    <td class="border px-4 py-2 ">
                      @for ($i = 0; $i < $review->rating; $i++)
                        <span class="fa fa-star checked text-red-500"></span>
                      @endfor
                      @for ($i = 0; $i < 5-$review->rating; $i++)
                        <span class="fa fa-star-o text-red-500"></span>
                      @endfor
                    </td>
                    <td class="px-4 py-2">
                        <div class="flex">
                      
                        </div>
                    </td>
                    </tr>
                @endforeach
              </tbody>
          </table>
          @else
            <p>No Reviews Listed Yet</p>
          @endif
          </div>
      </div>
    </div>
    </div>
@endsection
