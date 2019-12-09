<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function showAddRoom($hotel_id){
        $hotel = DB::select('SELECT * FROM HOTELS WHERE hotel_id=:id',['id'=>$hotel_id]);
        return view('manager.room.addRoom')->with('hotel',$hotel[0]);
    }

    public function showEditRoom($hotel_id,$room_no){
        $room = DB::select('SELECT * FROM ROOM WHERE hotel_id=:id AND room_no=:rno',['id'=>$hotel_id,'rno'=>$room_no]);
        return view('manager.room.editRoom')->with('room',$room[0])->with('hotel_id',$hotel_id);
    }

    public function showDeleteRoom($hotel_id,$room_no){
        $room = DB::select('SELECT * FROM ROOM WHERE hotel_id=:id AND room_no=:rno',['id'=>$hotel_id,'rno'=>$room_no]);
        return view('manager.room.deleteRoom')->with('room',$room[0])->with('hotel_id',$hotel_id);
    }

    public function addRoom(Request $request,$hotel_id){
        $validatedData = $request->validate([
        'room_no' => 'required|numeric',
        'r_type' => 'required|max:255',
        'price' => 'required|numeric',
        'floor' => 'required|numeric',
        'capacity' => 'required|numeric',
        'description'=> 'required|max:2048'
        ]);
        $room_no = $request['room_no'];
        $r_type = $request['r_type'];
        $price = $request['price'];
        $floor = $request['floor'];
        $capacity = $request['capacity'];
        $description = $request['description'];

        $hotels = DB::insert("INSERT INTO ROOM (hotel_id,room_no,r_type,price,description,floor,capacity) VALUES(:hotel_id,:room_no,:r_type,:price,:description,:floor,:capacity)",
        ['hotel_id'=>$hotel_id,'room_no'=>$room_no,'r_type'=>$r_type,'price'=>$price,'description'=>$description,'floor'=>$floor,'capacity'=>$capacity]);
        $next = "view/hotel/".$hotel_id;
        return redirect($next);
    }

    public function editRoom(Request $request,$hotel_id,$room_no){
        $validatedData = $request->validate([
        'r_type' => 'required|max:255',
        'price' => 'required|numeric',
        'floor' => 'required|numeric',
        'capacity' => 'required|numeric',
        'description'=> 'required|max:2048'
        ]);
        // $room_no = $request['room_no'];
        $r_type = $request['r_type'];
        $price = $request['price'];
        $floor = $request['floor'];
        $capacity = $request['capacity'];
        $description = $request['description'];

        $hotels = DB::insert("UPDATE ROOM SET r_type=:r_type,price=:price,description=:description,floor=:floor,capacity=:capacity
        WHERE hotel_id=:hotel_id AND room_no=:room_no",
        ['hotel_id'=>$hotel_id,'room_no'=>$room_no,'r_type'=>$r_type,'price'=>$price,'description'=>$description,'floor'=>$floor,'capacity'=>$capacity]);
        $next = "view/hotel/".$hotel_id;
        return redirect($next);
    }

    public function deleteRoom(Request $request,$hotel_id,$room_no){
        $hotels = DB::delete("DELETE from ROOM WHERE hotel_id=:hid AND room_no=:rno",['hid'=>$hotel_id,'rno'=>$room_no]);
        $next = "view/hotel/".$hotel_id;
        return redirect($next);
    }


}
