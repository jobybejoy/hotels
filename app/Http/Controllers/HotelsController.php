<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HotelsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hotels = DB::select(DB::raw('SELECT * FROM HOTELS'));
        return view('hotels.hotel_List')->with('hotels',$hotels);
    }

    public function getHotel($id){
        $hotels = DB::select('SELECT * FROM HOTELS WHERE hotel_id=:id',['id'=>$id]);
        $rooms = DB::select('SELECT * FROM ROOM WHERE hotel_id=:id',['id'=>$id]);
        for($i=0; $i<count($rooms); $i++){
            $rooms[$i]->discount= $this->getRoomDiscountPrice($id,$rooms[$i]->room_no);
        }
        //View Should have to $room->discount to show discount
        return view('hotels.hotel')->with('hotels',$hotels)->with('rooms',$rooms);
    }

    // public function getRoomByType($hotel_id,$room_type){
    //     $rooms = DB::select('SELECT * FROM ROOM WHERE hotel_id=:id AND r_type=:type',['id'=>$hotel_id,'type'=>$room_type]);
    //     return view('hotels.rooms')->with('rooms',$rooms)->with('hotel_id',$hotel_id);
    // }

    function getRoomDiscountPrice($hotel_id,$room_no){
        $discount = DB::select('SELECT * FROM DISCOUNTED_ROOM WHERE hotelid=:id AND `room no`=:rno',['id'=>$hotel_id,'rno'=>$room_no]); 
        if(!empty($discount)){
            // $room_price = $rooms[0]->price;
            $room_discount = $discount[0]->DISCOUNT;
            return $room_discount;
        }else{
            return 0;
        }
    }

    // function getRoomsAvailable($hotel_id,$room_no){
    //     $rooms = DB::select("
    //     SELECT * FROM ROOM WHERE (hotel_id,room_no) 
    //     IN ( SELECT `HOTEL ID` as hotel_id, `ROOM NO` as room_no 
    //         from ROOM_RESERVATION 
    //         WHERE `HOTEL ID`=:id AND `ROOM NO`=:rno AND 
    //         `CHECK IN DATE`>='2019-12-26' AND `CHECK OUT DATE`<='2019-12-31' )"
    //         ,['id'=>$hotel_id,'rno'=>$room_no]);
    //     return $rooms;
    // }

    //NOT checking the availablity
    public function getRoom($hotel_id,$room_no){
        // $hotels = DB::select('SELECT * FROM HOTELS WHERE hotel_id=:id',['id'=>$id]);
        $rooms = DB::select('SELECT * FROM ROOM WHERE hotel_id=:id AND room_no=:rno',['id'=>$hotel_id,'rno'=>$room_no,]);
        // Checking Reservations
        // $rooms = $this->getRoomsAvailable($hotel_id,$room_no);
        // Checking For Discounts
         for($i=0; $i<count($rooms); $i++){
            $rooms[$i]->discount= $this->getRoomDiscountPrice($hotel_id,$rooms[$i]->room_no);
        }
        return view('hotels.rooms')->with('rooms',$rooms)->with('hotel_id',$hotel_id);
    }

    //After getting services , Breakfast
    public function setRoom($hotel_id,$room_no){
        session(['hotel_id' => $hotel_id,'room_no' => $room_no]);
        $h_id = session('hotel_id');
        $rno = session('room_no');
        $next = "/hotel/".$h_id."/breakfasts";
        return redirect($next);
    }

    public function getBreakfasts($hotel_id){
        $bf = DB::select('SELECT * FROM BREAKFAST WHERE hotel_id=:id',['id'=>$hotel_id]);
        return view('hotels.breakfasts')->with('breakfasts',$bf)->with('hotel_id',$hotel_id);
    }

    public function setBreakfast($hotel_id,$b_type){
        session(['b_type' => $b_type]);
        $next = "/hotel/".$h_id."/services";
        return redirect($next);
    }

    public function getServices($hotel_id){
        $services = DB::select('SELECT * FROM SERVICE WHERE hotel_id=:id',['id'=>$hotel_id]);
        return view('hotels.services')->with('services',$services)->with('hotel_id',$hotel_id);
    } 
    
}
