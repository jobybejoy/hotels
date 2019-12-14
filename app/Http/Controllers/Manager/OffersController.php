<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OffersController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function showAllOffers($hotel_id){
        $hotel = DB::select('SELECT * FROM HOTEL WHERE hotel_id=:id',['id'=>$hotel_id]);
        $offers = DB::select('
        SELECT r.room_no,discount,start_date,end_date,r_type,price FROM DISCOUNT_ROOM dr,ROOMS r WHERE dr.hotel_id=r.hotel_id AND dr.room_no=r.room_no AND dr.hotel_id=:id ',
        ['id'=>$hotel_id]);
        return view('manager.offer.allOffers')->with('hotel',$hotel[0])->with('offers',$offers);
    }

    public function showAddOffers($hotel_id){
        $rooms = DB::select('SELECT * FROM ROOMS WHERE hotel_id=:id',['id'=>$hotel_id]);
        return view('manager.offer.addOffer')->with('hotel_id',$hotel_id)->with('rooms',$rooms);
    }

    public function addOffers(Request $request,$hotel_id){
      // return $request;
        $validatedData = $request->validate([
        'room_no' => 'required|numeric',
        'discount' => 'required|numeric|min:1|max:100',
        'start_date' => 'required|date|date_format:Y-m-d|after:today',
        'end_date' => 'required|date|date_format:Y-m-d|after:start_date',
        ]);
        $room_no = $request['room_no'];   $discount = $request['discount'];    $start_date = $request['start_date'];     $end_date = $request['end_date'];
        $ser = DB::insert("INSERT INTO DISCOUNT_ROOM (hotel_id,room_no,discount,start_date,end_date) VALUES(:hotel_id,:room_no,:discount,:start_date,:end_date)",
        ['hotel_id'=>$hotel_id,'room_no'=>$room_no,'discount'=>$discount,'start_date'=>$start_date,'end_date'=>$end_date]);
        $next = "/offers/hotel/".$hotel_id;
        return redirect($next);
    }

    public function showDeleteOffer($hotel_id,$room_no,$start_date,$end_date){
        $offer = DB::select('SELECT * FROM DISCOUNT_ROOM WHERE hotel_id=:id AND room_no=:room_no AND start_date=:start_date AND end_date=:end_date',
        ['id'=>$hotel_id,'room_no'=>$room_no,'start_date'=>$start_date,'end_date'=>$end_date]);
        return view('manager.offer.deleteOffer')->with('hotel_id',$hotel_id)->with('room_no',$room_no)->with('offer',$offer[0]);
    }

    public function deleteOffer($hotel_id,$room_no,$start_date,$end_date){
        $offers = DB::delete("DELETE from DISCOUNT_ROOM WHERE hotel_id=:id AND room_no=:room_no AND start_date=:start_date AND end_date=:end_date",
        ['id'=>$hotel_id,'room_no'=>$room_no,'start_date'=>$start_date,'end_date'=>$end_date]);
        $next = "/offers/hotel/".$hotel_id;
        return redirect($next);
    }

}
