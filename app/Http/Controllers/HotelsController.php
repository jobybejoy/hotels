<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HotelsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hotels = DB::select(DB::raw('SELECT * FROM HOTEL'));
        return view('hotels.hotel_list')->with('hotels',$hotels);
    }

    public function searchHotels(Request $request){
        $validatedData = $request->validate([
        'search' => 'max:255',
        'start_date' => 'required|date|date_format:Y-m-d|after:today',
        'end_date' => 'required|date|date_format:Y-m-d|after:today',
        ]);
        $search = $request['search'];
        $start_date = $request['start_date'];
        $end_date = $request['end_date'];
        session(['start_date' => $start_date,'end_date' => $end_date]);
        if($search){
            $hotels = DB::select("SELECT * FROM HOTEL WHERE state LIKE '%$search%' OR street LIKE '%$search%'");
        }else{
            $hotels = DB::select("SELECT * FROM HOTEL");
        }
        
        return view('hotels.hotel_list')->with('hotels',$hotels);
    }

    public function getHotel($id){
        $hotels = DB::select('SELECT * FROM HOTEL WHERE hotel_id=:id',['id'=>$id]);
        $rooms = DB::select('SELECT * FROM ROOMS WHERE hotel_id=:id',['id'=>$id]);
        for($i=0; $i<count($rooms); $i++){
            $rooms[$i]->discount= ($this->getRoomDiscountPrice($id,$rooms[$i]->room_no)/100)*$rooms[$i]->price ;
        }
        //View Should have to $room->discount to show discount
        return view('hotels.hotel')->with('hotels',$hotels)->with('rooms',$rooms);
    }

    function getRoomDiscountPrice($hotel_id,$room_no){
        $discount = DB::select('SELECT * FROM DISCOUNT_ROOM WHERE hotel_id=:id AND `room_no`=:rno',['id'=>$hotel_id,'rno'=>$room_no]); 
        if(!empty($discount)){
            // $room_price = $rooms[0]->price;
            $room_discount = $discount[0]->discount;
            return $room_discount;
        }else{
            return 0;
        }
    }

    //NOT checking the availablity
    public function getRoom($hotel_id,$room_no){
        // $hotels = DB::select('SELECT * FROM HOTEL WHERE hotel_id=:id',['id'=>$id]);
        $rooms = DB::select('SELECT * FROM ROOMS WHERE hotel_id=:id AND room_no=:rno',['id'=>$hotel_id,'rno'=>$room_no,]);
        // Checking Reservations
        // $rooms = $this->getRoomsAvailable($hotel_id,$room_no);
        // Checking For Discounts
         for($i=0; $i<count($rooms); $i++){
            $rooms[$i]->discount= ($this->getRoomDiscountPrice($hotel_id,$rooms[$i]->room_no)/100)*$rooms[$i]->price ;
        }
        return view('hotels.rooms')->with('rooms',$rooms)->with('hotel_id',$hotel_id);
    }

    //After getting services , Breakfast
    public function setRoom($hotel_id,$room_no){
        session(['hotel_id' => $hotel_id,'room_no' => $room_no]);
        $h_id = session('hotel_id');
        $rno = session('room_no');
        $next = "/hotel/".$hotel_id."/breakfasts";
        return redirect($next);
    }

    public function getBreakfasts($hotel_id){
        $bf = DB::select('SELECT * FROM BREAKFAST WHERE hotel_id=:id',['id'=>$hotel_id]);
        return view('hotels.breakfasts')->with('breakfasts',$bf)->with('hotel_id',$hotel_id);
    }

    public function setBreakfast($hotel_id,$btype){
        session(['btype' => $btype]);
        $next = "/hotel/".$hotel_id."/services";
        return redirect($next);
    }

    public function getServices($hotel_id){
        $services = DB::select('SELECT * FROM SERVICE WHERE hotel_id=:id',['id'=>$hotel_id]);
        return view('hotels.services')->with('services',$services)->with('hotel_id',$hotel_id);
    } 

    public function setService($hotel_id,$stype){
        session(['stype' => $stype]);
        $next = "show/confirmation";
        return redirect($next);
    }

    public function showConfirmation(){
        $hotel_id = session('hotel_id');
        $room_no = session('room_no');
        $btype = session('btype');
        $stype = session('stype');
        $hotel = DB::select('SELECT * FROM HOTEL WHERE hotel_id=:id',['id'=>$hotel_id]);
        $room = DB::select('SELECT * FROM ROOMS WHERE hotel_id=:id AND room_no=:rno',['id'=>$hotel_id,'rno'=>$room_no]);
        for($i=0; $i<count($room); $i++){
            $room[$i]->discount= ($this->getRoomDiscountPrice($hotel_id,$room[$i]->room_no)/100)*$room[$i]->price ;
        }
        $breakfast = DB::select('SELECT * FROM BREAKFAST WHERE hotel_id=:id AND btype=:btype',['id'=>$hotel_id,'btype'=>$btype]);
        $service = DB::select('SELECT * FROM SERVICE WHERE hotel_id=:id AND stype=:stype',['id'=>$hotel_id,'stype'=>$stype]);
        $total = round($room[0]->price - $room[0]->discount + $breakfast[0]->bprice + $service[0]->sprice);
        return view('hotels.confirmation')->with('hotel',$hotel[0])->with('room',$room[0])->with('breakfast',$breakfast[0])->with('service',$service[0])->with('total',$total);
    }

    public function showPayment(){
        $user = Auth::user();
        $hotel_id = session('hotel_id');
        $room_no = session('room_no');
        $btype = session('btype');
        $stype = session('stype');
        // $hotel = DB::select('SELECT * FROM HOTEL WHERE hotel_id=:id',['id'=>$hotel_id]);
        $room = DB::select('SELECT room_no,price FROM ROOMS WHERE hotel_id=:id AND room_no=:rno',['id'=>$hotel_id,'rno'=>$room_no]);
        for($i=0; $i<count($room); $i++){
            $room[$i]->discount= ($this->getRoomDiscountPrice($hotel_id,$room[$i]->room_no)/100)*$room[$i]->price ;
        }
        $breakfast = DB::select('SELECT bprice FROM BREAKFAST WHERE hotel_id=:id AND btype=:btype',['id'=>$hotel_id,'btype'=>$btype]);
        $service = DB::select('SELECT sprice FROM SERVICE WHERE hotel_id=:id AND stype=:stype',['id'=>$hotel_id,'stype'=>$stype]);
        $total = round($room[0]->price - $room[0]->discount + $breakfast[0]->bprice + $service[0]->sprice);
        session(['res_total' => $total]);
        $today_date = date('d-m-Y');
        return view('hotels.payment')->with('user',$user)->with('total',$total)->with('date',$today_date);
    }

    function makeBooking($cnumber){
        $user = Auth::user();
        $hotel_id = session('hotel_id');
        $room_no = session('room_no');
        $btype = session('btype');
        $stype = session('stype');
        $rtotal = session('res_total');
        $check_in_date = session('start_date');
        $check_out_date = session('end_date');
        // $check_in_date = Carbon::now()->add(10, 'day')->toDateString();
        // $check_out_date = Carbon::now()->add(17, 'day')->toDateString();
        $email = $user->email;

        $no_of_orders = 2;
        $rdate = Carbon::now()->toDateString();

        DB::beginTransaction();
        $customer = DB::select('SELECT cid FROM CUSTOMER WHERE email=:email',['email'=>$email]);

        $reservation = DB::insert("INSERT INTO RESERVATION (cid,cnumber,rdate,rprice) VALUES(:cid,:cnumber,:rdate,:rtotal) ",['cid'=>$customer[0]->cid,'cnumber'=>$cnumber,'rdate'=>$rdate,'rtotal'=>$rtotal]);
        $invoice_no = DB::getPdo()->lastInsertId();
        $room_reservation = DB::insert("INSERT INTO ROOM_RESERVATION (invoice_no,hotel_id,room_no,check_in_date,check_out_date) VALUES(:invoice_no,:hotel_id,:room_no,:check_in_date,:check_out_date) ",
        ['invoice_no'=>$invoice_no,'hotel_id'=>$hotel_id,'room_no'=>$room_no,'check_in_date'=>$check_in_date,'check_out_date'=>$check_out_date ]);
        
        $service_reservation = DB::insert("INSERT INTO RRESV_SERVICE (stype,hotel_id,room_no,check_in_date) VALUES(:stype,:hotel_id,:room_no,:check_in_date) ",
        ['stype'=>$stype,'hotel_id'=>$hotel_id,'room_no'=>$room_no,'check_in_date'=>$check_in_date ]);

        $breakfast_reservation = DB::insert("INSERT INTO RESV_BREAKFAST (btype,hotel_id,room_no,check_in_date,no_of_orders) VALUES(:btype,:hotel_id,:room_no,:check_in_date,:no_of_orders) ",
        ['btype'=>$btype,'hotel_id'=>$hotel_id,'room_no'=>$room_no,'check_in_date'=>$check_in_date,'no_of_orders'=>$no_of_orders]);
        
        if($reservation!=1&&$room_reservation!=1&&$service_reservation!=1&&$breakfast_reservation!=1){
            DB::rollBack();
        }else{
            Session::forget('hotel_id');
            Session::forget('room_no');
            Session::forget('btype');
            Session::forget('stype');
            Session::forget('res_total');
            DB::commit();
        }

        if($invoice_no!=null){
            return $invoice_no;
        }else{
            return null;
        }
        
    }
    
    public function pay(Request $request){

        $validatedData = $request->validate([
        'name' => 'required|max:255',
        'ctype' => 'required|max:255',
        'cnumber' => 'required|regex:/[0-9]{16}/',
        'expdate' => 'required|date|date_format:Y-m-d|after:today',
        'cvv' => 'required|regex:/[0-9]{3}/',
        'baddress' => 'required|max:255',
        ]);
        $name = $request['name'];
        $ctype = $request['ctype'];
        $cnumber = $request['cnumber'];
        $expdate = $request['expdate'];
        $code = $request['cvv'];
        $baddress = $request['baddress'];  

        DB::beginTransaction();
        $ser = DB::insert("INSERT INTO CREDIT_CARD (name,ctype,cnumber,expdate,code,baddress) VALUES (:name,:ctype,:cnumber,:expdate,:code,:baddress)",
        ['name'=>$name,'ctype'=>$ctype,'cnumber'=>$cnumber,'expdate'=>$expdate,'code'=>$code,'baddress'=>$baddress]);

        //make booking
        $invoice_no = $this->makeBooking($cnumber);

        if($invoice_no!=null){
            DB::commit();
            return redirect()->route('get_reservation',['invoice_no'=>$invoice_no]); 
        }else{
            DB::rollBack();
            return redirect()->route('checkout',['error'=>"Something went wrong while reserving!! Try Again!!"]);
        }
    } 

    public function getReservation($invoice_no){

        $cid = Auth::user();
        $resv = DB::select('SELECT * FROM RESERVATION WHERE invoice_no=:invoice_no AND cid=:cid',['invoice_no'=>$invoice_no,'cid'=>$cid->id]);
        $reservation = DB::select('SELECT * FROM ROOM_RESERVATION WHERE invoice_no=:invoice_no',['invoice_no'=>$invoice_no]);
        $hotel = DB::select('SELECT * FROM HOTEL WHERE hotel_id=:id',['id'=>$reservation[0]->hotel_id]);
        $room = DB::select('SELECT * FROM ROOMS WHERE hotel_id=:id AND room_no=:rno',['id'=>$reservation[0]->hotel_id,'rno'=>$reservation[0]->room_no ]);
        $breakfast = DB::select('SELECT * FROM RESV_BREAKFAST WHERE hotel_id=:id AND check_in_date=:check_in_date AND room_no=:room_no',['id'=>$reservation[0]->hotel_id,'room_no'=>$reservation[0]->room_no,'check_in_date'=>$reservation[0]->check_in_date]);
        $service = DB::select('SELECT * FROM RRESV_SERVICE WHERE hotel_id=:id AND check_in_date=:check_in_date AND room_no=:room_no',['id'=>$reservation[0]->hotel_id,'room_no'=>$reservation[0]->room_no,'check_in_date'=>$reservation[0]->check_in_date]);
        $total = $resv[0]->rprice;
        
        return view('hotels.reservation')->with('reservation',$reservation[0])->with('hotel',$hotel[0])->with('room',$room[0])->with('breakfast',$breakfast[0])->with('service',$service[0])->with('total',$total);
    }

    public function showUserReservations(){
        $cid = Auth::user();
        $resv = DB::select('SELECT * FROM RESERVATION WHERE cid=:cid',['cid'=>$cid->id]);
        return view('hotels.reservation_list')->with('reservations',$resv);
    }

    public function showUserReviews(){
        $cid = Auth::user();
        $room = DB::select('SELECT * FROM ROOM_REVIEW WHERE cid=:cid',['cid'=>$cid->id]);
        $service = DB::select('SELECT * FROM SERVICE_REVIEW WHERE cid=:cid',['cid'=>$cid->id]);
        $breakfast = DB::select('SELECT * FROM BREAKFAST_REVIEWS WHERE cid=:cid',['cid'=>$cid->id]);

        return view('hotels.reviews_list')->with('room',$room)->with('service',$service)->with('breakfast',$breakfast);
    }
    
}
