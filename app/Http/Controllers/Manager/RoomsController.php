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
        $hotel = DB::select('SELECT * FROM HOTEL WHERE hotel_id=:id',['id'=>$hotel_id]);
        return view('manager.room.addRoom')->with('hotel',$hotel[0]);
    }

    public function showEditRoom($hotel_id,$room_no){
        $room = DB::select('SELECT * FROM ROOMS WHERE hotel_id=:id AND room_no=:rno',['id'=>$hotel_id,'rno'=>$room_no]);
        return view('manager.room.editRoom')->with('room',$room[0])->with('hotel_id',$hotel_id);
    }

    public function showDeleteRoom($hotel_id,$room_no){
        $room = DB::select('SELECT * FROM ROOMS WHERE hotel_id=:id AND room_no=:rno',['id'=>$hotel_id,'rno'=>$room_no]);
        return view('manager.room.deleteRoom')->with('room',$room[0])->with('hotel_id',$hotel_id);
    }

    public function viewRoom($hotel_id,$room_no){
        $rooms = DB::select('SELECT * FROM ROOMS WHERE hotel_id=:id AND room_no=:rno',['id'=>$hotel_id,'rno'=>$room_no]);
        $reviews = DB::select('SELECT * FROM ROOM_REVIEW WHERE hotel_id=:id AND room_no=:rno',['id'=>$hotel_id,'rno'=>$room_no]);
        return view('manager.room.RoomReview')->with('hotel_id',$hotel_id)->with('room',$rooms[0])->with('reviews',$reviews);
    }

    public function viewRoomReservations($hotel_id,$room_no){
        $rooms = DB::select('SELECT * FROM ROOMS WHERE hotel_id=:id AND room_no=:rno',['id'=>$hotel_id,'rno'=>$room_no]);
        $reservations = DB::select('
            SELECT name,phone_number,email,R.invoice_no,rdate,check_in_date,check_out_date 
            FROM CUSTOMER C,RESERVATION R,ROOM_RESERVATION RR 
            WHERE C.cid = R.cid AND R.invoice_no = RR.invoice_no AND hotel_id=:id AND room_no=:rno'
            ,['id'=>$hotel_id,'rno'=>$room_no]);
        return view('manager.room.RoomReservation')->with('hotel_id',$hotel_id)->with('room',$rooms[0])->with('reservations',$reservations);
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

        $hotels = DB::insert("INSERT INTO ROOMS (hotel_id,room_no,r_type,price,description,floor,capacity) VALUES(:hotel_id,:room_no,:r_type,:price,:description,:floor,:capacity)",
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

        $hotels = DB::insert("UPDATE ROOMS SET r_type=:r_type,price=:price,description=:description,floor=:floor,capacity=:capacity
        WHERE hotel_id=:hotel_id AND room_no=:room_no",
        ['hotel_id'=>$hotel_id,'room_no'=>$room_no,'r_type'=>$r_type,'price'=>$price,'description'=>$description,'floor'=>$floor,'capacity'=>$capacity]);
        $next = "view/hotel/".$hotel_id;
        return redirect($next);
    }

    public function deleteRoom(Request $request,$hotel_id,$room_no){
        $hotels = DB::delete("DELETE from ROOMS WHERE hotel_id=:hid AND room_no=:rno",['hid'=>$hotel_id,'rno'=>$room_no]);
        $next = "view/hotel/".$hotel_id;
        return redirect($next);
    }


}
