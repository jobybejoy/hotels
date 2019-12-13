<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HotelsController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }
    
    public function index()
    {
        $hotels = DB::select(DB::raw('SELECT * FROM HOTEL'));
        return view('manager.hotel.hotels')->with('hotels',$hotels);
    }

    public function viewHotel($hotel_id)
    {
        $hotel = DB::select('SELECT * FROM HOTEL WHERE hotel_id=:id',['id'=>$hotel_id]);
        $rooms = DB::select('SELECT * FROM ROOMS WHERE hotel_id=:id',['id'=>$hotel_id]);
        return view('manager.hotel.viewHotel')->with('hotel',$hotel[0])->with('rooms',$rooms);
    }

    public function showAddHotel(){
        return view('manager.hotel.addHotel');
    }

    public function showEditHotel($hotel_id){
        $hotel = DB::select('SELECT * FROM HOTEL WHERE hotel_id=:id',['id'=>$hotel_id]);
        return view('manager.hotel.editHotel')->with('hotel',$hotel[0]);
    }

    public function showDeleteHotel($hotel_id){
        $hotel = DB::select('SELECT * FROM HOTEL WHERE hotel_id=:id',['id'=>$hotel_id]);
        return view('manager.hotel.deleteHotel')->with('hotel',$hotel[0]);
    }

    public function addHotel(Request $request){
        $validatedData = $request->validate([
        'street' => 'required|max:255',
        'state' => 'required|max:255',
        'country' => 'required|max:255',
        'zip'=> 'required|max:255'
        ]);
        $street = $request['street'];   $state = $request['state']; $country = $request['country']; $zip = $request['zip'];
        $hotels = DB::insert("INSERT INTO HOTEL (street,country,state,zip) VALUES(:street,:country,:state,:zip)",
        ['street'=>$street,'country'=>$country,'state'=>$state,'zip'=>$zip]);
        $next = "/manager";
        return redirect($next);
    }

    public function editHotel(Request $request,$hotel_id){
        $validatedData = $request->validate([
        'street' => 'required|max:255',
        'state' => 'required|max:255',
        'country' => 'required|max:255',
        'zip'=> 'required|max:255'
        ]);

        $street = $request['street'];   $state = $request['state']; $country = $request['country']; $zip = $request['zip'];
        
        $hotels = DB::update("UPDATE HOTEL SET street=:street,country=:country,state=:state,zip=:zip WHERE hotel_id=:hid",
        ['street'=>$street,'country'=>$country,'state'=>$state,'zip'=>$zip,'hid'=>$hotel_id]);
        $next = "/manager";
        return redirect($next);
    }

    public function deleteHotel(Request $request,$hotel_id){
        $hotels = DB::delete("DELETE from HOTEL WHERE hotel_id=:hid",['hid'=>$hotel_id]);
        $next = "/manager";
        return redirect($next);
    }

    


}
