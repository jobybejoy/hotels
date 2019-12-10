<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function showAllServices($hotel_id){
        $hotel = DB::select('SELECT * FROM HOTEL WHERE hotel_id=:id',['id'=>$hotel_id]);
        $services = DB::select('SELECT * FROM SERVICE WHERE hotel_id=:id',['id'=>$hotel_id]);
        return view('manager.service.allServices')->with('hotel',$hotel[0])->with('services',$services);
    }

    public function showAddService($hotel_id){
        return view('manager.service.addService')->with('hotel_id',$hotel_id);
    }

    public function addService(Request $request,$hotel_id){
        $validatedData = $request->validate([
        'stype' => 'required|max:255',
        'sprice' => 'required|max:255',
        ]);
        $stype = $request['stype'];   $sprice = $request['sprice'];
        $ser = DB::insert("INSERT INTO SERVICE (hotel_id,stype,sprice) VALUES(:hotel_id,:stype,:sprice)",
        ['hotel_id'=>$hotel_id,'stype'=>$stype,'sprice'=>$sprice]);
        $next = "/services/hotel/".$hotel_id;
        return redirect($next);
    }

    public function showEditService($hotel_id,$stype){
        $service = DB::select('SELECT * FROM SERVICE WHERE hotel_id=:id AND stype=:stype',['id'=>$hotel_id,'stype'=>$stype]);
        return view('manager.service.editServices')->with('hotel_id',$hotel_id)->with('service',$service[0]);
    }

    public function editService(Request $request,$hotel_id,$stype){
        $validatedData = $request->validate([
        // 'stype' => 'required|max:255',
        'sprice' => 'required|max:255',
        ]);
        $stype = $request['stype'];   $sprice = $request['sprice'];
        $ser = DB::insert("UPDATE SERVICE SET sprice=:sprice WHERE hotel_id=:hotel_id AND stype=:stype ",
        ['hotel_id'=>$hotel_id,'stype'=>$stype,'sprice'=>$sprice]);
        $next = "/services/hotel/".$hotel_id;
        return redirect($next);
    }

    public function showDeleteService($hotel_id,$stype){
        $service = DB::select('SELECT * FROM SERVICE WHERE hotel_id=:id AND stype=:stype',['id'=>$hotel_id,'stype'=>$stype]);
        return view('manager.service.deleteServices')->with('hotel_id',$hotel_id)->with('service',$service[0]);
    }

    public function deleteService($hotel_id,$stype){
        $hotels = DB::delete("DELETE from SERVICE WHERE hotel_id=:hid AND stype=:stype",['hid'=>$hotel_id,'stype'=>$stype]);
        $next = "/services/hotel/".$hotel_id;
        return redirect($next);
    }

    public function viewService($hotel_id,$stype){
        $service = DB::select('SELECT * FROM SERVICE WHERE hotel_id=:id AND stype=:stype',['id'=>$hotel_id,'stype'=>$stype]);
        $reviews = DB::select('SELECT * FROM SERVICE_REVIEW WHERE hotel_id=:id AND stype=:stype',['id'=>$hotel_id,'stype'=>$stype]);
        return view('manager.service.ServiceReview')->with('hotel_id',$hotel_id)->with('service',$service[0])->with('reviews',$reviews);
    }

    public function viewServiceReservation($hotel_id,$stype){
        $service = DB::select('SELECT * FROM SERVICE WHERE hotel_id=:id AND stype=:stype',['id'=>$hotel_id,'stype'=>$stype]);
        $reservations = DB::select('
            SELECT room_no,check_in_date,sprice
            FROM RRESV_SERVICE RS,SERVICE S
            WHERE RS.hotel_id=S.hotel_id AND RS.stype=S.stype AND RS.hotel_id=:id AND RS.stype=:stype'
            ,['id'=>$hotel_id,'stype'=>$stype]);
        return view('manager.service.ServiceReservation')->with('hotel_id',$hotel_id)->with('service',$service[0])->with('reservations',$reservations);
    }


}
