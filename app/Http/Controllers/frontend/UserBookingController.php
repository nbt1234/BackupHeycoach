<?php
namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AllSlotsModel;
use App\Models\AllBookingModel;
use App\Models\MyFocusgoalsModel;

use Illuminate\Support\Facades\Auth;

use Mail;
use App\Mail\SloatBookingMailToAdmin;


class UserBookingController extends Controller
{

	public function user_book_slot(Request $request){
		$current_userid = Auth::guard('frontuser')->user()->id;

		$formdatas = $request->all();

        // dd($formdatas);    

        $slot_id = $formdatas['selected_slot'];
        $slot_detail = AllSlotsModel::find($slot_id);

        $booking_slot = new AllBookingModel; 
        $booking_slot->user_id = $current_userid;        
        $booking_slot->slot_id = $slot_id; 
        $booking_slot->save();


        $formdata = [
            'user_id' => $current_userid,
            'slot_date' => $slot_detail['date'],
            'start_time' => $slot_detail['start_time'],
            'end_time' => $slot_detail['end_time'],
        ];


        Mail::to('coach@heycoach.co.za')->send(new SloatBookingMailToAdmin($formdata));   


        if($booking_slot->id > 0){
            return back()->with('flash-success', 'You have successfully booked your slot.');
        } else{
            return back()->with('flash-error', 'Something went wrong.');
        }    

	}

	public function fetch_slot_timming(Request $request){
		$formdatas = $request->all();       
        $getslot = AllSlotsModel::where('id',$formdatas['slot_id'])->first();
        //dd($getslot); 
        return json_encode($getslot);
	}
	
	public function all_my_booking(){
		$current_userid = Auth::guard('frontuser')->user()->id;
        $get_my_bookings = AllBookingModel::where('user_id', $current_userid)->with('bookings_belongs_slots')->get();
        $currentStep = MyFocusgoalsModel::select('current_step')->where('user_id', $current_userid)->orderBy('id', 'desc')->take(1)->first();
  
        //dd($get_my_bookings);
        return view( 'frontend/my-bookings',compact('get_my_bookings', 'currentStep'));
	}

}