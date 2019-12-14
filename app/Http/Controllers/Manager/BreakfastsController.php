<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BreakfastsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function showAllBreakfasts($hotel_id){
        $hotel = DB::select('SELECT * FROM HOTEL WHERE hotel_id=:id',['id'=>$hotel_id]);
        $breakfasts = DB::select('SELECT * FROM BREAKFAST WHERE hotel_id=:id',['id'=>$hotel_id]);
        return view('manager.breakfast.allBreakfast')->with('hotel',$hotel[0])->with('breakfasts',$breakfasts);
    }

    public function viewBreakfast($hotel_id,$btype){
        $breakfast = DB::select('SELECT * FROM BREAKFAST WHERE hotel_id=:id AND btype=:btype',['id'=>$hotel_id,'btype'=>$btype]);
        $reviews = DB::select('SELECT * FROM BREAKFAST_REVIEWS WHERE hotel_id=:id AND btype=:btype',['id'=>$hotel_id,'btype'=>$btype]);
        return view('manager.breakfast.BreakfastReview')->with('hotel_id',$hotel_id)->with('breakfast',$breakfast[0])->with('reviews',$reviews);
    }

    public function showAddBreakfast($hotel_id){
        return view('manager.breakfast.addBreakfast')->with('hotel_id',$hotel_id);
    }

    public function addBreakfast(Request $request,$hotel_id){
        $validatedData = $request->validate([
        'btype' => 'required|max:255',
        'bprice' => 'required|numeric',
        'description' => 'required|max:2048',
        ]);
        $btype = $request['btype'];   $bprice = $request['bprice'];     $description = $request['description'];
        $ser = DB::insert("INSERT INTO BREAKFAST (hotel_id,btype,bprice,description) VALUES(:hotel_id,:btype,:bprice,:description)",
        ['hotel_id'=>$hotel_id,'btype'=>$btype,'bprice'=>$bprice,'description'=>$description]);
        $next = "/breakfasts/hotel/".$hotel_id;
        return redirect($next);
    }

    public function showEditBreakfast($hotel_id,$btype){
        $breakfast = DB::select('SELECT * FROM BREAKFAST WHERE hotel_id=:id AND btype=:btype',['id'=>$hotel_id,'btype'=>$btype]);
        return view('manager.breakfast.editBreakfast')->with('hotel_id',$hotel_id)->with('breakfast',$breakfast[0]);
    }

    public function editBreakfast(Request $request,$hotel_id,$btype){
        $validatedData = $request->validate([
        // 'btype' => 'required|max:255',
        'bprice' => 'required|max:255',
        'description' => 'required|max:2048',
        ]);
        $btype = $request['btype'];   $bprice = $request['bprice']; $description = $request['description'];
        $ser = DB::insert("UPDATE BREAKFAST SET bprice=:bprice, description=:description WHERE hotel_id=:hotel_id AND btype=:btype ",
        ['hotel_id'=>$hotel_id,'btype'=>$btype,'bprice'=>$bprice,'description'=>$description]);
        $next = "/breakfasts/hotel/".$hotel_id;
        return redirect($next);
    }

    public function showDeleteBreakfast($hotel_id,$btype){
        $breakfast = DB::select('SELECT * FROM BREAKFAST WHERE hotel_id=:id AND btype=:btype',['id'=>$hotel_id,'btype'=>$btype]);
        return view('manager.breakfast.deleteBreakfasts')->with('hotel_id',$hotel_id)->with('breakfast',$breakfast[0]);
    }

    public function deleteBreakfast($hotel_id,$btype){
        $hotels = DB::delete("DELETE from BREAKFAST WHERE hotel_id=:hid AND btype=:btype",['hid'=>$hotel_id,'btype'=>$btype]);
        $next = "/breakfasts/hotel/".$hotel_id;
        return redirect($next);
    }

    public function viewBreakfastReservation($hotel_id,$btype){
        $breakfast = DB::select('SELECT * FROM BREAKFAST WHERE hotel_id=:id AND btype=:btype',['id'=>$hotel_id,'btype'=>$btype]);
        $reservations = DB::select('
            SELECT room_no,check_in_date,no_of_orders,bprice 
            FROM resv_breakfast rb,breakfast b 
            WHERE rb.hotel_id=b.hotel_id AND rb.btype=b.btype AND rb.hotel_id=:id AND rb.btype=:btype'
            ,['id'=>$hotel_id,'btype'=>$btype]);
        return view('manager.breakfast.BreakfastReservation')->with('hotel_id',$hotel_id)->with('breakfast',$breakfast[0])->with('reservations',$reservations);
    }


}
