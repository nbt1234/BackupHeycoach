<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MygoalsModel;
use App\Models\MyFocusgoalsModel;

class AdminGoalsController extends Controller
{
    //
    public function get_goals_list(){
        $goals_list = MygoalsModel::all();
        // dd($goals_list);
        return view('admin/goals/all-goals-list', compact('goals_list'));
    }

    public function get_all_focused_goals($goalid){
        // dd($goalid);
        $focused_goals_list = MyFocusgoalsModel::where('mygoal_id', $goalid)->get();
        //dd($focused_goals_list);
        return view('admin/goals/focused-goals', compact('focused_goals_list'));
    }

    public function get_single_focus_goal($focuesdgoalid){
        $focused_single_goal = MyFocusgoalsModel::find($focuesdgoalid);
        //dd($focused_single_goal);
        return view('admin/goals/focused-goal-single', compact('focused_single_goal'));
    }
}
