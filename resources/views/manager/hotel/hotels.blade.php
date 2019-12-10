@extends('layouts.manager')

@section('content')
    <div class="flex justify-center align-items-center">
        <div class="text-4xl font-black pr-12 py-6">
        Hotels
        </div>
        <a href="/add/hotel" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Add</a>
    </div>
    <div class="flex justify-center align-items-center">
        <div class="flex p-2">
        <table class="table-fixed">
            <thead>
                <tr>
                <th class="w-1/6 px-2 py-4">Hotel ID</th>
                <th class="w-1/2 px-4 py-4">Street</th>
                <th class="w-1/6 px-4 py-4">State</th>
                <th class="w-1/6 px-4 py-4">Country</th>
                <th class="w-1/6 px-4 py-4">ZIP</th>
                <th class="w-1/6 px-4 py-4">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($hotels as $hotel)
                <tr>
                <td class="border px-4 py-2">{{$hotel->hotel_id}}</td>
                <td class="border px-4 py-2">{{$hotel->street}}</td>
                <td class="border px-4 py-2">{{$hotel->state}}</td>
                <td class="border px-4 py-2">{{$hotel->country}}</td>
                <td class="border px-4 py-2">{{$hotel->zip}}</td>
                <td class="px-4 py-2">
                    <div class="flex">
                    <a href="/rooms/hotel/{{$hotel->hotel_id}}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold py-2 px-4 border border-blue-500 hover:border-transparent rounded">View</a>
                    <a href="/edit/hotel/{{$hotel->hotel_id}}" class="ml-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold py-2 px-4 border border-blue-500 hover:border-transparent rounded">Edit</a>
                    <a href="/delete/hotel/{{$hotel->hotel_id}}" class="ml-2 bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">Delete</a>
                    </div>
                </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection
