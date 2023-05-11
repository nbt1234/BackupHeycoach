<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AllBookingModel;

class AdminBookingController extends Controller
{
    //
    public function view_slot_booking($slot_id){
        
        $all_booking = AllBookingModel::where('slot_id', $slot_id)->get();
        return view('admin/slots/slotwise-booking', compact('all_booking'));
    }

}
