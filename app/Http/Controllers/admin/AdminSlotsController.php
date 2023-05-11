<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AllSlotsModel;
use App\Models\AllBookingModel;


class AdminSlotsController extends Controller
{
    //
    public function get_slots_list(){
        $all_slots_list = AllSlotsModel::orderBy('id', 'desc')->get();
        // dd($all_slots_list);
        return view('admin/slots/all-slots-list', compact('all_slots_list'));
    }

    public function insert_slot(Request $request){
        $formdata = $request->all();
        // dd($formdata);
        $date = date('d-M-Y', strtotime($formdata['slotdate']));        
        //////////////Insert Data////////////////
        $insert_slot = new AllSlotsModel; 
        $insert_slot->date = $date;        
        $insert_slot->start_time = $formdata['start_time'];      
        $insert_slot->end_time = $formdata['end_time'];
        $insert_slot->status = $formdata['slot_status'];
        $insert_slot->save();
        //Last inserted ID
        if($insert_slot->id > 0){
            return back()->with('flash-success', 'You Have Successfully Added New Slot.');
        } else{
            return back()->with('flash-error', 'something went wrong.');
        }        
    }

    public function edit_slot(Request $request){

        $formdata = $request->all();
        $hidden_slot_id = $formdata['hidden_slot_id'];
        // dd($formdata);
        $date = date('d-M-Y', strtotime($formdata['slotdate'])); 
        //////////////Update Data////////////////        
        $edit_slot = AllSlotsModel::find($hidden_slot_id);
        $edit_slot->date = $date;        
        $edit_slot->start_time = $formdata['start_time'];   
        $edit_slot->end_time = $formdata['end_time'];  
        $edit_slot->status = $formdata['slot_status'];  
        $edit_slot->save();

        //Last inserted ID
        if($edit_slot->id > 0){
            return back()->with('flash-success', 'You Have Successfully Edit Slot.');
        } else{
            return back()->with('flash-error', 'something went wrong.');
        }
    }

    public function delete_slot($id){
        $delteSlot = AllSlotsModel::destroy($id);


        //Last inserted ID
        if($delteSlot){
            AllBookingModel::where('slot_id', $id)->delete();
            return back()->with('flash-success', 'You Have Successfully Delte Slot.');
        } else{
            return back()->with('flash-error', 'something went wrong.');
        }
    }

}
