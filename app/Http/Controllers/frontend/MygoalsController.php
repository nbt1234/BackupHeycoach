<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MygoalsModel;
use App\Models\MyFocusgoalsModel;
use App\Models\WeekTrackingModel;
use App\Models\AllSlotsModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\frontuser;

use Mail;
use App\Mail\SettingGoal;
use App\Mail\KnowYourSpend;
use App\Mail\MatchingGoal;
use App\Mail\SetActionPlan;
use App\Mail\FridayNotification;
use App\Mail\WeeklyActionNotes;


class MygoalsController extends Controller
{
    //////Step1 Submition//////
    public function submit_step1(Request $request){

        $formdatas = $request->all();
        //dd($formdatas);        
        $selected_cats = $formdatas['cats'];
        $seralize_cat_data = serialize($selected_cats);
        
        //$mygoal = new MygoalsModel;

        //////Update if row exist otherwise create new row//////        
        $mygoal = MygoalsModel::updateOrCreate([                      
            'id'   => $formdatas['my_goals_id'],
        ],[
            'user_id' => $request->user_id,
            'my_goal_cats' => $seralize_cat_data,  
            'status' => 'incomplete',
            //$mygoal->save();
        ]);        
        //Get Last inserted ID
        if($mygoal->id > 0){  
            return redirect()->route('getstep2');
        }         

    }    

    public function getstep1data(Request $request){
        $current_userid = Auth::guard('frontuser')->user()->id;
        $get_step1_data = MygoalsModel::where('user_id', $current_userid)->where('status', 'incomplete')->first();  //dd($get_step1_data->id); 
        if($get_step1_data){
            $get_goals['mygoal_cat'] = unserialize($get_step1_data->my_goal_cats);  
            $get_goals['goal_id'] =  $get_step1_data->id;   
        } else {
            $get_goals = "";            
        }


        return view('frontend/step1' ,compact('get_goals'));
    }

   
    public function getstep2data(Request $request, $adjust_goal = " "){
        //dd($adjust_goal);
        $current_userid = Auth::guard('frontuser')->user()->id;
        $all_slots = AllSlotsModel::all();

        $get_user_cat = MygoalsModel::where('user_id', $current_userid)->where('status', 'incomplete')->first();  
        

        //dd($get_user_cat);

        // if($adjust_goal == "adjustgoal"){
        //     echo "Skip Next Steps";
        // } else {           
        //    echo "Don't Skip Next Steps";
        // }

        //echo "Don't Skip Next Steps";
        if($get_user_cat){
            // $all_focused_goals = MyFocusgoalsModel::where('mygoal_id', $get_user_cat->id)->where('goal_status', 'incomplete')->get(); 
            $all_focused_goals = MyFocusgoalsModel::where('mygoal_id', $get_user_cat->id)->get(); 
            // dd($all_focused_goals);    
            $used_focused_cats = array();
            $incomplete_focused_cats = '';

            foreach($all_focused_goals as $all_focused_goal){
                //dd($all_focused_goal['focused_cat']);
                if($all_focused_goal['goal_status'] == 'complete'){     
                        $used_focused_cats[] = $all_focused_goal['focused_cat'];            
                } else {
                        $incomplete_focused_cats = $all_focused_goal['focused_cat'];    
                }
                
            }
            // dd($incomplete_focused_cats);

          

            $unserialized_mygoal_cats = unserialize($get_user_cat->my_goal_cats);


            // dd($unserialized_mygoal_cats['other']);
            if($unserialized_mygoal_cats['other'] == null){
                unset($unserialized_mygoal_cats['other']);
            }else{
                $other_key =  array_search("other",$unserialized_mygoal_cats);
                unset($unserialized_mygoal_cats[$other_key]);  
            }
                

            if($incomplete_focused_cats){
                $selected_cats['choosed_cat'] = array($incomplete_focused_cats);
            } else {
                $selected_cats['choosed_cat'] = array_diff($unserialized_mygoal_cats, $used_focused_cats);
            }


            //dd($unserialized_mygoal_cats);
            //$selected_cats['choosed_cat'] = unserialize($get_user_cat->my_goal_cats);
            $selected_cats['mygoals_id'] = $get_user_cat->id;
            $get_step2_data = MyFocusgoalsModel::where('mygoal_id', $get_user_cat->id)->where('goal_status', 'incomplete')->first(); 
        

            if($get_step2_data) {
                $step2_pre_filled_data = $get_step2_data;
            } else {
                $step2_pre_filled_data = "";
            }


            return view( 'frontend/step2',compact('selected_cats', 'step2_pre_filled_data', 'all_slots', 'adjust_goal'));
        
        } else {

            /////Return to Step1 it is not filled///
            return redirect('/step1');
        }

            
        
    }


    //////Step2 Submition//////
    public function submit_step2(Request $request){

        $formdatas = $request->all();     
       
        //dd($formdatas);
        //$focusgoal = new MyFocusgoalsModel;

        $focus_goal_id = $request->goal_id;
        $each_month_goal = str_replace("R","",$request->each_month_goal);

        //////Update if row exist otherwise create new row//////
        // $focusgoal = MyFocusgoalsModel::find($request->goal_id);  
        // $focusgoal->mygoal_id = $request->my_goals_id;
        // $focusgoal->user_id = $request->user_id;
        // $focusgoal->focused_cat = $request->select_focus_cat;
        // $focusgoal->each_month_goal = $request->each_month_goal;
        // $focusgoal->archive_goal_time = $request->archive_goal_time;
        // $focusgoal->current_step = 'step4';
        // $focusgoal->goal_status = 'incomplete';
        // $focusgoal->save(); 


        $focusgoal = MyFocusgoalsModel::updateOrCreate([                      
            'id'   => $request->goal_id,
        ],[
            'mygoal_id' => $request->my_goals_id, 
            'user_id' => $request->user_id,        
            'focused_cat' => $request->select_focus_cat,
            'each_month_goal' => $each_month_goal,
            'archive_goal_time' => $request->archive_goal_time,
            'current_step' => 'step3',
            'goal_status' => 'incomplete'                
        ]);
        
        // dd($focusgoal);

        if($focusgoal->id > 0){  
            ////Send Mail to Register User Email////     
            $user_email = GetUserinfo($formdatas['user_id'], 'email'); 
            Mail::to($user_email)->send(new SettingGoal($formdatas));   
            if($request->adjust_goal == ""){
                return redirect()->route('getstep3');
            } 
            else 
            {
                if ($focusgoal['catwise_actual_spend'] != null)
                {
                    $unseri_actual_spend = unserialize($focusgoal['catwise_actual_spend']); 
                    $arr_actual_spend = array();
                    foreach($unseri_actual_spend as $key => $unseri_act_spend){
                        $repl_actual_spend = str_replace(" ","",$unseri_act_spend);
                        $arr_actual_spend[$key] = $repl_actual_spend;
                    } 
                    $actual_spend_sum = array_sum($arr_actual_spend);
                    $goal_amount = str_replace(" ","",$focusgoal['each_month_goal']); 
                    $your_income = str_replace(" ","",$focusgoal['earn_after_tax_per_mnth']);

                    if($actual_spend_sum + $goal_amount > $your_income){
                            return redirect()->route('getstep7');
                    }else{
                            return redirect()->route('getstep6');
                    }
                }
            }
                        
        }

    }
    
    public function submit_step3(Request $request){

        $formdatas = $request->all();

        $catswise_spend = $formdatas['cats'];
        // dd($catswise_spend);
        $arr_catwsie = array();
        foreach($catswise_spend as $key => $cats_spend){
            $rep_catwise_spend = str_replace("R","",$cats_spend);
            $arr_catwsie[$key] = $rep_catwise_spend;
        }        
        $seralize_catwise_spend = serialize($arr_catwsie);
        

        //////Update if row exist otherwise create new row//////
        $focus_goal = MyFocusgoalsModel::find($request->current_focus_goal);  
        $focus_goal->catwise_spend = $seralize_catwise_spend;
        $focus_goal->spend_think = $request->i_think_i;
        $focus_goal->earn_after_tax_per_mnth = str_replace("R","",$request->earn_after_tax_per_month);
        $focus_goal->per_mnth_amnt_to_achieve_goal = $request->per_mnth_amnt_to_achieve_goal;
        $focus_goal->current_step = 'step4';
        $focus_goal->save(); 
        //dd($focusgoal);
        if($focus_goal->id > 0){  
            return redirect()->route('getstep4');            
        }
        //return redirect()->route('getstep4');
    }

    
    public function getstep3data(Request $request){
        //dd('dsfdsf');
        $current_userid = Auth::guard('frontuser')->user()->id;    



        $all_slots = AllSlotsModel::all();   
        $last_focused_goal = MyFocusgoalsModel::where('user_id', $current_userid)->where('goal_status', 'incomplete')->first();

        if($last_focused_goal){

            $last_goal['user_id'] = $last_focused_goal->user_id;
            $last_goal['mygoals_id'] = $last_focused_goal->mygoal_id;
            $last_goal['current_focus_goal'] = $last_focused_goal->id;

            $last_goal['each_month_goal'] = $last_focused_goal->each_month_goal;
            $last_goal['archive_goal_time'] = $last_focused_goal->archive_goal_time;
            $last_goal['focused_cat'] = $last_focused_goal->focused_cat;
            
            if($last_focused_goal->catwise_spend){
                $step3_pre_filled_data = $last_focused_goal;
            } else {
                $step3_pre_filled_data = "";
            }


            return view( 'frontend/step3',compact('last_goal', 'step3_pre_filled_data', 'all_slots'));

        } else {

            /////Return to Step2 it is not filled///
            return redirect('/step2');

        }
       
    }
    

    public function getstep4data(Request $request){

        $current_userid = Auth::guard('frontuser')->user()->id;
        $all_slots = AllSlotsModel::all();          
        $last_focused_goal = MyFocusgoalsModel::where('user_id', $current_userid)->where('goal_status', 'incomplete')->first();
        // dd($last_focused_goal); earn_after_tax_per_mnth
        if($last_focused_goal){

            $last_goal['user_id'] = $last_focused_goal->user_id;
            $last_goal['mygoals_id'] = $last_focused_goal->mygoal_id;
            $last_goal['current_focus_goal'] = $last_focused_goal->id;

            $last_goal['each_month_goal'] = $last_focused_goal->each_month_goal;
            $last_goal['earn_after_tax_per_mnth'] = $last_focused_goal->earn_after_tax_per_mnth;

            if($last_focused_goal->catwise_spend || $last_focused_goal->catwise_actual_spend){
                $step4_pre_filled_data = $last_focused_goal;

                return view( 'frontend/step4',compact('last_goal', 'step4_pre_filled_data', 'all_slots'));
            } else {
                $step4_pre_filled_data = "";
                return redirect('/step3');
            }
            
            //return view( 'frontend/step4',compact('last_goal', 'step4_pre_filled_data'));

        } else {

            /////Return to Step2 it is not filled///
            return redirect('/step3');

        }
       
    }

    public function submit_step4(Request $request){

        $formdatas = $request->all();

        $actual_spend = $formdatas['cats'];
        //dd($actual_spend); 
        $arr_actual_spend = array();
        foreach($actual_spend as $key => $act_spend){
            $rep_act_spend = str_replace("R","",$act_spend);
            $arr_actual_spend[$key] = $rep_act_spend;
        }        


        $seralize_actual_spend = serialize($arr_actual_spend);
        //dd($formdatas); 

        //////Update row//////
        $focus_goal = MyFocusgoalsModel::find($request->current_focus_goal);  
        $focus_goal->catwise_actual_spend = $seralize_actual_spend;  
        $focus_goal->current_step = 'step5';

        $focus_goal->save();
        return redirect()->route('getstep5');
    }

    public function getstep5data(Request $request){

        $current_userid = Auth::guard('frontuser')->user()->id;        
        $last_focused_goal = MyFocusgoalsModel::where('user_id', $current_userid)->where('goal_status', 'incomplete')->first();
        //dd($last_focused_goal);
        if($last_focused_goal){

            $last_goal['user_id'] = $last_focused_goal->user_id;
            $last_goal['mygoals_id'] = $last_focused_goal->mygoal_id;
            $last_goal['current_focus_goal'] = $last_focused_goal->id;

            if($last_focused_goal->catwise_actual_spend){
                $step5_pre_filled_data = $last_focused_goal;
                return view( 'frontend/step5',compact('last_goal', 'step5_pre_filled_data'));
            } else {
                $step4_pre_filled_data = "";
                return redirect('/step4');
            }
            // return view( 'frontend/step5',compact('last_goal', 'step5_pre_filled_data'));

        } else {

            /////Return to Step2 it is not filled///
            return redirect('/step4');

        }
       
    }

    public function submit_step5(Request $request){

        $formdatas = $request->all();
        //dd($request->current_focus_goal);
        // dd($formdatas);

        //$get_step6_data = MyFocusgoalsModel::where('user_id', $formdatas['user_id'])->where('id', $formdatas['current_focus_goal'])->first();

        $focus_goal = MyFocusgoalsModel::find($request->current_focus_goal);
        $focus_goal->current_step = 'step6';    
        $focus_goal->save();

        ////Send Mail to Register User Email////     
        $user_email = GetUserinfo($formdatas['user_id'], 'email'); 
        Mail::to($user_email)->send(new KnowYourSpend($formdatas)); 

        return redirect()->route('getstep6');        

    }

    public function getstep6data(Request $request){

        $formdatas = $request->all();
        //dd($formdatas);
        $current_userid = Auth::guard('frontuser')->user()->id;        
        $last_focused_goal = MyFocusgoalsModel::where('user_id', $current_userid)->where('goal_status', 'incomplete')->first();
        //dd($last_focused_goal);
        if($last_focused_goal){

            $last_goal['mygoals_id'] = $last_focused_goal->mygoal_id;
            $last_goal['current_focus_goal'] = $last_focused_goal->id;

            if($last_focused_goal->catwise_actual_spend){                
                return view( 'frontend/step6',compact('last_focused_goal'));
            } else {                
                return redirect('/step5');
            }            

        } else {
            return redirect('/step5');
        }        

    }

    public function step6_like(){

        $current_userid = Auth::guard('frontuser')->user()->id;

        ////Send Mail to Register User Email////     
        $useremail = GetUserinfo($current_userid, 'email'); 
        $username = GetUserinfo($current_userid, 'username');
        Mail::to($useremail)->send(new MatchingGoal($username)); 
        return redirect()->route('getstep7'); 

    }

    public function getstep7data(Request $request){

        $current_userid = Auth::guard('frontuser')->user()->id;
        $all_slots = AllSlotsModel::all();     

                  
        $focused_goal = MyFocusgoalsModel::where('user_id', $current_userid)->where('goal_status', 'incomplete')->first();
        //dd($focused_goal);
        if($focused_goal){

            // $last_goal['mygoals_id'] = $focused_goal->mygoal_id;
            // $last_goal['current_focus_goal'] = $focused_goal->id;

            if($focused_goal->catwise_actual_spend){   
                //$actual_spends = unserialize($focused_goal->catwise_actual_spend);
                return view( 'frontend/step7',compact('focused_goal', 'all_slots'));
            } else {                
                return redirect('/step6');
            }            

        } else {
            return redirect('/step6');
        }        

    }

    public function step7_achieve_cats_submition(Request $request){
        
        $formdata = $request->all();

        // dd($formdata);

        $focuse_goal_id = $formdata['focuse_goal_id'];
        $achieve_cat_wise = serialize($formdata['cat_wise']);
        //dd($achieve_cat_wise);
        
        //////Update row//////
        $focus_goal = MyFocusgoalsModel::find($focuse_goal_id);  
        $focus_goal->achieve_my_goal = $achieve_cat_wise; 
        $focus_goal->current_step = 'step8';          
        $saveSuccess = $focus_goal->save();

        ////Send Mail to Register User Email////     
        $current_userid = Auth::guard('frontuser')->user()->id;
        $useremail = GetUserinfo($current_userid, 'email'); 
        $username = GetUserinfo($current_userid, 'username');
        Mail::to($useremail)->send(new SetActionPlan($username)); 

        if($saveSuccess){
            $sucessResult = [
                'message' => 'success'
            ];
            return response()->json($sucessResult);
        }else{
            $sucessResult = [
                'message' => 'fail'
            ];
            return response()->json($sucessResult);
        }

        // return redirect()->route('getstep8');
    }


    public function getstep8data(Request $request, $goal = " "){
        // dd($goal);
        $current_userid = Auth::guard('frontuser')->user()->id;        
        $focused_goal = MyFocusgoalsModel::where('user_id', $current_userid)->where('goal_status', 'incomplete')->first();
        //dd($focused_goal);

        $last_goal['user_id'] = $focused_goal->user_id;
        $last_goal['mygoals_id'] = $focused_goal->mygoal_id;
        $last_goal['current_focus_goal'] = $focused_goal->id;
        $monthly_income = str_replace(" ","", $focused_goal['earn_after_tax_per_mnth']); // monthly income

        $unseri_actual_spend = unserialize($focused_goal['catwise_actual_spend']); 
        $arr_actual_spend = array();
        foreach($unseri_actual_spend as $key => $unseri_act_spend){
            $repl_actual_spend = str_replace(" ","",$unseri_act_spend);
            $arr_actual_spend[$key] = $repl_actual_spend;
        } 

        $actual_spend_sum = array_sum($arr_actual_spend);

        $monthly_extra_expenditure_from_income = $actual_spend_sum - $monthly_income;
        $weekly_extra_expenditure_from_income = $monthly_extra_expenditure_from_income/4;
        $last_goal['monthly_extra_expenditure'] = $monthly_extra_expenditure_from_income;
        $last_goal['weekly_extra_expenditure'] = $weekly_extra_expenditure_from_income;


         if($goal == 'achievable'){

                ///////Skip step7 and go to step8///////
                if($focused_goal){ 
                    if($focused_goal->catwise_actual_spend){   //Now check with step4 bcz step5,step6 not submit any data to database       
                        return view( 'frontend/step8',compact('focused_goal', 'last_goal', 'goal'));
                    } else {                
                        return redirect('/step4');
                    } 
                } else {
                    return redirect('/step7');
                }

        } else {

                ///////Don't Skip step7///////
                if($focused_goal){ 
                    if($focused_goal->achieve_my_goal){   //Now check with step4 bcz step5,step6 not submit any data to database       
                        return view( 'frontend/step8',compact('focused_goal', 'last_goal', 'goal'));
                    } else {                
                        return redirect('/step7');
                    } 
                } else {
                    return redirect('/step7');
                }

        }

    }

    public function submit_step8(Request $request){

        $formdatas = $request->all();

        //dd($request->current_focus_goal);
        // dd($formdatas);

        $weekly_saving = $formdatas['Weekly_saving'];
        //dd($actual_spend); 
        $arr_weekly_saving = array();
        foreach($weekly_saving as $key => $wkly_saving){

            $rep_weekly_saving = str_replace(" ", "", str_replace("R ","",$wkly_saving));
            $arr_weekly_saving[$key] = $rep_weekly_saving;
        }     
        // dd($arr_weekly_saving);
        $seralize_weekly_saving = serialize($arr_weekly_saving);
        //dd($seralize_weekly_saving); 

        //////Update row//////
        $focus_goal = MyFocusgoalsModel::find($request->current_focus_goal);  
        $focus_goal->weekly_saving = $seralize_weekly_saving;  
        $focus_goal->current_step = 'step9';

        $focus_goal->save();
        return redirect()->route('getstep9');

    }

    public function getstep9data(Request $request){

        $current_userid = Auth::guard('frontuser')->user()->id;        
        $focused_goal = MyFocusgoalsModel::where('user_id', $current_userid)->where('goal_status', 'incomplete')->first();

        $get_mnth = explode(" ", $focused_goal['archive_goal_time']);
        $total_months =  $get_mnth[0];
 
        $last_week_of_goal = WeekTrackingModel::where('focused_goal_id', $focused_goal->id)->orderBy('id', 'desc')->max('week');
        

        $monthly_income = str_replace(" ","", $focused_goal['earn_after_tax_per_mnth']); // monthly income

        $unseri_actual_spend = unserialize($focused_goal['catwise_actual_spend']); 
        $arr_actual_spend = array();
        foreach($unseri_actual_spend as $key => $unseri_act_spend){
            $repl_actual_spend = str_replace(" ","",$unseri_act_spend);
            $arr_actual_spend[$key] = $repl_actual_spend;
        } 

        $actual_spend_sum = array_sum($arr_actual_spend);

        $monthly_extra_expenditure_from_income = $actual_spend_sum - $monthly_income;

        $weekly_extra_expenditure_from_income = $monthly_extra_expenditure_from_income/4;
        // $monthly_extra_expenditure = $monthly_extra_expenditure_from_income;
        $weekly_extra_expenditure = $weekly_extra_expenditure_from_income;

        
        $achieve_my_goal = unserialize($focused_goal['achieve_my_goal']);  
        $monthly_saving_amt_total = array_sum(array_column($achieve_my_goal, 'saving_spend_amount'));
        $monthly_saving_amt = $monthly_saving_amt_total - ($monthly_extra_expenditure_from_income);

        //for graph start
        $find_weekly_goal_amount = WeekTrackingModel::select('week', 'weekwise_amount')->where('focused_goal_id', $focused_goal->id)->get();
        // dd($find_weekly_goal_amount);

            $weekly_goal_amount = array();
            $variable = 0;
            $array_key_value = 0;
            foreach($find_weekly_goal_amount as $key => $value){
               
              $intvalue = $value->weekwise_amount;

              $array_in_values[] = $intvalue;

              if($variable == 4){
                $variable = 1;
                ++$array_key_value;
                $weekly_goal_amount[$array_key_value]['month'] = "M-".($array_key_value + 1);
                $weekly_goal_amount[$array_key_value]['week'.$variable] = (float) $intvalue;
              }else{
                ++$variable;    
                $weekly_goal_amount[$array_key_value]['month'] = "M-".($array_key_value + 1);
                $weekly_goal_amount[$array_key_value]['week'.$variable] = (float) $intvalue;
              }

              // echo $variable."<br>";
            }
            


            // $array_count = count($weekly_goal_amount);
            // for($i = 0; $i < $array_count; $i++){
            //     $weekly_goal_amount[$i] = (object) $weekly_goal_amount[$i];
            // }

            $array_count = count($weekly_goal_amount);

            for($i = 0; $i < $total_months; $i++){
                if($i < $array_count){
                    $weekly_goal_amount[$i] = (object) $weekly_goal_amount[$i];
                }else{
                    $weekly_goal_amount[$i] = (object)['month' => "M-".$i+1];
                }
            }

            // dd($weekly_goal_amount);

        //for graph End
            if(!empty($array_in_values)){
                $minimum_value_in_array = min($array_in_values);
            }else{
                $minimum_value_in_array = 0;

            }


        if($focused_goal){ 
            if($focused_goal->weekly_saving){   //Now check with step8           
                return view( 'frontend/step9',compact('focused_goal', 'last_week_of_goal', 'weekly_goal_amount', 'minimum_value_in_array', 'weekly_extra_expenditure', 'monthly_saving_amt'));
            } else {                
                return redirect('/step8');
            }            

        } else {
            return redirect('/step8');
        }        

    }




    function step9_update_tracking_amount(Request $request)
    {
        $formdata = $request->all();
        // dd($formdata['saving_towards_goal_input']);

        $current_focus_goal = $formdata['current_focus_goal'];
      
        $focus_goal = MyFocusgoalsModel::find($current_focus_goal);  
        $focusedgoal = WeekTrackingModel::where('focused_goal_id' , $focus_goal['id'])->orderBy('id', 'DESC')->first();


        $userId = Auth::guard('frontuser')->user()->id;
        $user_email = GetUserinfo($userId, 'email'); 
        $formdata['firstname'] = GetUserinfo($userId, 'first_name'); 
        $formdata['lastname'] = GetUserinfo($userId, 'last_name'); 
        $formdata['current_goal_id'] = $current_focus_goal; 



        $each_mnth_goal = str_replace(" ","",$focus_goal['each_month_goal']);  
        $get_mnth = explode(" ", $focus_goal['archive_goal_time']);
        $total_weeks = $get_mnth[0] * 4;

        if($focus_goal['extra_month'] > 0){
           $total_weeks = $total_weeks + ($focus_goal['extra_month'] * 4);
           $total_months = $get_mnth[0] + $focus_goal['extra_month'];
        }else{
            $total_months = $get_mnth[0];
        }
        
     

        $goal_amount = $get_mnth[0] * $each_mnth_goal;  //15000
        $current_amount = $focus_goal['weekwise_track_goal'] != '' ? $focus_goal['weekwise_track_goal'] : 0; //total week amount
        $monthly_income = str_replace(" ","",$focus_goal['earn_after_tax_per_mnth']); // monthly income
        $unseri_weekly_saving = unserialize($focus_goal['weekly_saving']); 

        $weekly_saving_total_amt = array_sum(array_column($unseri_weekly_saving, 'planned_weekly_saving'));

        $get_user_cat = MygoalsModel::where('user_id', $userId)->where('status', 'incomplete')->first();

        $unserialized_mygoal_cats = unserialize($get_user_cat->my_goal_cats);

        foreach($unserialized_mygoal_cats as $key => $value){
            if($value == 'other'){
                unset($unserialized_mygoal_cats[$key]);
            }
            if($key == 'other' && $value == null){
                unset($unserialized_mygoal_cats[$key]);
            }
        }  


        if($current_amount > $goal_amount){
            $currentgoal_status = MyFocusgoalsModel::find($current_focus_goal);      
            $currentgoal_status->goal_status = 'complete';
            $currentgoal_status->current_step = 'step2'; 
            $currentgoal_status->save();   

            if($focus_goal['focused_cat'] == end($unserialized_mygoal_cats)){
                $get_user_cat->status = 'complete';
                $get_user_cat->save();

                return redirect('/step1')->with('flash-success', 'You have successfully completed your goal. Well Done!');    
            } 

            return redirect('/step2')->with('flash-success', 'You have already completed your weekly tracking.');
        }else{

            if($focusedgoal){
                $last_weeklytracking_id = $focusedgoal['id'];
                $weeknumber = $focusedgoal['week'];
            } else {
                $weeknumber = 0;
            }  
            
            if($weeknumber < $total_weeks){

                $trackingamount = $formdata['saving_towards_goal_input'];
                $total_weekamount = $trackingamount;
                $total_amount = $current_amount + $trackingamount;

                $focus_goal->weekwise_track_goal = $total_amount;        
                $focus_goal->save();

                //////Insert Weekly Tracking data//////
                $weely_tracking = new WeekTrackingModel; 
                $weely_tracking->user_id = $focus_goal['user_id'];        
                $weely_tracking->mygoal_id = $focus_goal['mygoal_id'];       
                $weely_tracking->focused_goal_id = $focus_goal['id'];
                $weely_tracking->week = $weeknumber + 1;                
                $weely_tracking->weekwise_amount = $total_weekamount; //add new by amit sir
                $weely_tracking->weekwise_note = null;
                $weely_tracking->weekly_category_data = isset($formdata['cat_wise']) ? serialize($formdata['cat_wise']) : '';
                $weely_tracking_save =  $weely_tracking->save();

                if($weely_tracking_save){
                    
                    Mail::to($user_email)->send(new WeeklyActionNotes($formdata));  

                    $lasttracking_week = $weeknumber + 1;
                    if($lasttracking_week == $total_weeks && $total_amount < $goal_amount){
      
                        if($total_months < 12){
                            return redirect('/step9')->with('increase-month', 'You have to reset your goal because you have not reach to your goal amount.');
                        }

                        $weeklytracking = WeekTrackingModel::where('focused_goal_id' , $current_focus_goal);
                        $weeklytracking->delete();

                        $currentfocusedgoal = MyFocusgoalsModel::find($current_focus_goal);
                        $currentfocusedgoal->weekwise_track_goal = null;   
                        $currentfocusedgoal->current_step = 'step2';     
                        $currentfocusedgoal->extra_month = '0';     
                        $currentfocusedgoal->save();

                        return redirect('/step2')->with('flash-error', 'You have to reset your goal because you have not reach to your goal amount.');

                    }elseif($total_amount >= $goal_amount){
                        $currentgoal_status = MyFocusgoalsModel::find($current_focus_goal);      
                        $currentgoal_status->goal_status = 'complete';
                        $currentgoal_status->current_step = 'step2'; 
                        $currentgoal_status->save();

                        
                        if($focus_goal['focused_cat'] == end($unserialized_mygoal_cats)){
                            $get_user_cat->status = 'complete';
                            $get_user_cat->save();

                            return redirect('/step1')->with('flash-success', 'You have successfully completed your goal. Well Done!');    
                        }

                            return redirect('/step2')->with('flash-success', 'You have successfully completed your goal. Well Done!');    
                    }else{
                        $t_planned_ws = $formdata['total_planed_weekly_saving'];
                        $t_actual_ws = $formdata['actual_weekly_saving'];

                        if($t_actual_ws > $t_planned_ws){
                            return redirect()->back()->with('flash-success', 'Well done! Great week you have saved more than you planned.');
                        }elseif($t_actual_ws == $t_planned_ws){
                            return redirect()->back()->with('flash-success', 'Well done you are on track for the week');
                        }else{
                            return redirect()->back()->with('flash-error', 'You have fallen behind this week. Take some time to think about how you can get back on track.  Making a tangible commitment can help so don’t forget to capture your planned actions in the Action Notes.');
                        }   
                    }

                }else{
                    return redirect('/step9')->with('flash-error', 'Some error.');

                }

            }else{

                if($weeknumber == $total_weeks && $current_amount < $goal_amount){

                    if($total_months < 12){
                        return redirect('/step9')->with('increase-month', 'You have to reset your goal because you have not reach to your goal amount.');
                    }

                    return redirect('/step9')->with('increase-month', 'Increase month');

                    $weeklytracking = WeekTrackingModel::where('focused_goal_id' , $current_focus_goal);
                    $weeklytracking->delete();
                    $currentfocusedgoal = MyFocusgoalsModel::find($current_focus_goal);
                    $currentfocusedgoal->weekwise_track_goal = null;   
                    $currentfocusedgoal->current_step = 'step2'; 
                    $currentfocusedgoal->extra_month = '0';
                    $currentfocusedgoal->save();

                    return redirect('/step2')->with('flash-error', 'You have to reset your goal because you have not reach to your goal amount.');
                }elseif($current_amount > $goal_amount){
                    $currentgoal_status = MyFocusgoalsModel::find($current_focus_goal);      
                    $currentgoal_status->goal_status = 'complete';
                    $currentgoal_status->current_step = 'step2'; 
                    $currentgoal_status->save();  

                        if($focus_goal['focused_cat'] == end($unserialized_mygoal_cats)){
                            $get_user_cat->status = 'complete';
                            $get_user_cat->save();

                            return redirect('/step1')->with('flash-success', 'You have successfully completed your goal. Well Done!');    
                        }
                            return redirect('/step2')->with('flash-success', 'You have already completed your weekly tracking.');
                }else{
                    return redirect('/step9');
                }
            }
        }
    }


    // public function step9_update_tracking_amount(Request $request){

    //     $formdata = $request->all();
    //     //dd($formdata);
    //     $current_focus_goal = $formdata['current_focus_goal'];
        
    //     $focus_goal = MyFocusgoalsModel::find($current_focus_goal);  
    //     $focusedgoal = WeekTrackingModel::where('focused_goal_id' , $focus_goal['id'])->orderBy('id', 'DESC')->first();
        
    //     //dd($focusedgoal['id']);
    //     if($focusedgoal){
    //         $last_weeklytracking_id = $focusedgoal['id'];
    //         $weeknumber = $focusedgoal['week'];
    //     } else {
    //         $weeknumber = 0;
    //     }

    //     $weekly_saving_amountss = unserialize($focus_goal['weekly_saving']); 
    //     // $weekly_saving_total_amt = array_sum(array_column($weekly_saving_amountss, 'amount'));
    //     // //dd($etetrt);
    //     // dd($weekly_saving_amountss);

    //     $arr_weekly_total = array();
    //     foreach($weekly_saving_amountss as $key => $weekly_saving_amount){ //print_r($weekly_saving_amount);
    //         $repl_actual_spend = str_replace(" ","",$weekly_saving_amount['amount']);
    //         $arr_weekly_total[$key] = $repl_actual_spend;
    //     } 
    //     $weekly_saving_total_amt = array_sum($arr_weekly_total);
    //     //dd($weekly_saving_total_amt);

    //     //dd($focus_goal);
    //     $each_mnth_goal = str_replace(" ","",$focus_goal['each_month_goal']);  
    //     $goal_mnth = $focus_goal['archive_goal_time'];             
    //     $get_mnth = explode(" ", $goal_mnth);
    //     $total_weeks = $get_mnth[0] * 4;

    //     $total_goalamount = $get_mnth[0] * $each_mnth_goal;
    //     $total_weekamnt = $focus_goal['weekwise_track_goal'];         
    //     //dd($total_weekamnt);
    //     if($weeknumber <  $total_weeks ){   //As it is      

    //             if($formdata['weely_tracking_type'] == 'amount'){ //Remove

    //                 $weekly_saving_amt = $weekly_saving_total_amt;
    //                 $trackingamount = str_replace("R","",str_replace(" ","",$formdata['trackingamount'])); //str_replace(" ","",$formdata['trackingamount']);
    //                 //dd($trackingamount);
    //                 $current_amount = $formdata['current_value_of_amount'];  
    //                 $total_amount = $current_amount + $trackingamount;

    //                 if($total_amount <= $total_goalamount){     //As it is
                        
    //                     $focus_goal->weekwise_track_goal = $total_amount;        
    //                     $focus_goal->save();

    //                     //////Insert Weekly Tracking data//////
    //                     $weely_tracking = new WeekTrackingModel; 
    //                     $weely_tracking->user_id = $focus_goal['user_id'];        
    //                     $weely_tracking->mygoal_id = $focus_goal['mygoal_id'];       
    //                     $weely_tracking->focused_goal_id = $focus_goal['id'];
    //                     $weely_tracking->week = $weeknumber + 1;                
    //                     $weely_tracking->weekwise_amount = $trackingamount;
    //                     $weely_tracking->weekwise_note = null;
    //                     $weely_tracking->save();

    //                     if($trackingamount < $weekly_saving_amt){ //As it is
    //                         // $last_inserted_id_weektracking = $weely_tracking->id;
    //                         // return view( 'step9',compact('last_inserted_id_weektracking'));
    //                         return redirect()->back()->with('flash-error', 'You goal was a bit short this week.');
    //                     } else {
    //                         return redirect()->back()->with('flash-success', 'Well done you are on track for the week.');
    //                     }
                        

    //                 } else { //As it is
    //                     return redirect()->back()->with('flash-error', 'Your total tracking amount greather-than to the total goal amount, please try with less amount.');
    //                 }

    //             } else {     //Remove

    //                     //dd($formdata);
    //                     //$last_weeklytracking_id;

    //                     //////Insert Weekly Tracking data//////
    //                     /*
    //                     $weely_tracking = new WeekTrackingModel;
    //                     $weely_tracking->user_id = $focus_goal['user_id'];        
    //                     $weely_tracking->mygoal_id = $focus_goal['mygoal_id'];       
    //                     $weely_tracking->focused_goal_id = $focus_goal['id'];
    //                     $weely_tracking->week = $weeknumber + 1;                
    //                     $weely_tracking->weekwise_amount = null;
    //                     $weely_tracking->weekwise_note = $formdata['unlike_note'];
    //                     $weely_tracking->save();
    //                     */

    //                     /////Update Weekly Tracking Data////// 
    //                     // $get_weely_tracking = WeekTrackingModel::where('focused_goal_id' , $last_weeklytracking_id)->orderBy('id', 'DESC')->first();
    //                     // dd($get_weely_tracking);

    //                     $weely_tracking = WeekTrackingModel::find($last_weeklytracking_id);
    //                     //dd($formdata['unlike_note']);
    //                     $weely_tracking->weekwise_note = $formdata['unlike_note'];
    //                     $weely_tracking->save(); 
                       

    //             }
    //             $lasttracking = WeekTrackingModel::latest()->first();
    //             $lastfocusedgoal = MyFocusgoalsModel::latest()->first();
    //             $total_weekamount = $lastfocusedgoal['weekwise_track_goal']; 

    //             if($lasttracking->week == $total_weeks){
    //                 if($total_goalamount != $total_weekamount){
    //                     ///////////////////////////////////////////////////////////////////////////////////////////////
    //                     ////Empty the "week_tracking" data and "weekwise_track_goal" and update the "current_step"////
    //                         $weeklytracking = WeekTrackingModel::where('focused_goal_id' , $current_focus_goal);
    //                         $weeklytracking->delete();
    //                         $currentfocusedgoal = MyFocusgoalsModel::find($current_focus_goal);
    //                         $currentfocusedgoal->weekwise_track_goal = null;   
    //                         $currentfocusedgoal->current_step = 'step2';     
    //                         $currentfocusedgoal->save();
    //                     ////Empty the "week_tracking" data and "weekwise_track_goal" and update the "current_step"////
    //                     /////////////////////////////////////////////////////////////////////////////////////////////
    //                     return redirect('/step2')->with('flash-error', 'You have to reset your goal because you have not reach to your goal amount.');

    //                 } else {

    //                     $current_userid = Auth::guard('frontuser')->user()->id;
    //                     $get_user_cat = MygoalsModel::where('user_id', $current_userid)->where('status', 'incomplete')->first();
    //                     $all_focused_goals = MyFocusgoalsModel::where('mygoal_id', $get_user_cat->id)->get(); 
    //                     echo $total_selected_maincats = count(unserialize($get_user_cat->my_goal_cats));
    //                     //dd($all_focused_goals);  

    //                     //////Update Goal Status to Complete//////
    //                     $currentgoal_status = MyFocusgoalsModel::find($current_focus_goal);      
    //                     $currentgoal_status->goal_status = 'complete';        
    //                     $currentgoal_status->save();
    //                     //return redirect()->route('step9');
    //                     return redirect('/step10');
    //                 }
    //             } else {
    //                 if($total_goalamount != $total_weekamount){
    //                     return redirect('/step9');
    //                 } else {

    //                     $current_userid = Auth::guard('frontuser')->user()->id;
    //                     $get_user_cat = MygoalsModel::where('user_id', $current_userid)->where('status', 'incomplete')->first();
    //                     $all_focused_goals = MyFocusgoalsModel::where('mygoal_id', $get_user_cat->id)->get(); 
    //                     $total_selected_maincats = count(unserialize($get_user_cat->my_goal_cats));
    //                     // echo '<br>';
    //                     $focued_goal_count = count($all_focused_goals);
    //                     //dd($all_focused_goals); 

    //                     //////Update Focued-Goal Status to Complete//////
    //                     $currentgoal_status = MyFocusgoalsModel::find($current_focus_goal);      
    //                     $currentgoal_status->goal_status = 'complete';        
    //                     $currentgoal_status->save();
                                               

    //                     if($focued_goal_count == $total_selected_maincats){
                            
    //                         // echo 'Reached';

    //                         //////Update Main-Goal Status to Complete//////
    //                         $maingoal_status = MygoalsModel::find($current_userid);      
    //                         $maingoal_status->status = 'complete';        
    //                         $maingoal_status->save();

    //                     } else {
    //                         //echo 'Not Reached';
    //                     }                           
                        

    //                     return redirect('/step10');
                        
    //                 }
    //             }
                

    //     } elseif($weeknumber == $total_weeks && $total_goalamount == $total_weekamnt) {

    //             return redirect('/step10')->with('flash-success', 'You have already completed your weekly tracking.');
    //             // return back()->with('flash-success', 'You have already completed your weekly tracking.');

    //     } elseif($weeknumber == $total_weeks && $total_goalamount != $total_weekamnt) {
    //             return redirect('/step2');
    //     } else {
    //             return redirect('/step10');
    //     }

    //     // if($weeknumber == $total_weeks){   
    //     //     return redirect('/step9');
    //     // } else {
    //     //     return redirect('/step8');
    //     // }


    // }



    /*
    public function getstep9data(Request $request){

        $current_userid = Auth::guard('frontuser')->user()->id;
        ///$focused_goal = MyFocusgoalsModel::where('user_id', $current_userid)->where('weekwise_track_goal', '!=', '')->where('goal_status', 'complete')->first();
        /////Get Last goal of the user/////
        $focused_goal = MyFocusgoalsModel::where('user_id' , $current_userid)->orderBy('id', 'DESC')->first();
        //dd($focused_goal);
        if($focused_goal){

            $archive_goal_time = $focused_goal->archive_goal_time;
            $each_month_goal = $focused_goal->each_month_goal;

            $get_mnth = explode(" ", $archive_goal_time);
            //dd($each_month_goal);
            $total_goal_amnt = str_replace(" ","",$each_month_goal) * $get_mnth[0];
            //dd($total_goal_amnt);
            if($total_goal_amnt == $focused_goal->weekwise_track_goal){    
                return view( 'frontend/step9',compact('archive_goal_time','each_month_goal'));
            } else {
                return redirect('/step8');
            }

        } else {

            return redirect('/step8');
            
        }
        

    }
    */


    public function all_my_goals(){

        $current_userid = Auth::guard('frontuser')->user()->id;
        $get_my_goals = MygoalsModel::where('user_id', $current_userid)->get();

        $currentStep = MyFocusgoalsModel::select('current_step')->where('user_id', $current_userid)->orderBy('id', 'desc')->take(1)->first();

        return view( 'frontend/my-goals',compact('get_my_goals', 'currentStep'));
    }

    public function my_focused_goal($mygoalid){

        $current_userid = Auth::guard('frontuser')->user()->id;
        $get_focused_goals = MyFocusgoalsModel::where('user_id', $current_userid)->where('mygoal_id', $mygoalid)->get();
        //dd($get_focused_goals);
        return view( 'frontend/my-focused-goal',compact('get_focused_goals'));
    }
    public function overview(){
        $current_userid = Auth::guard('frontuser')->user()->id;
        $username = GetUserinfo($current_userid, 'username');
        return view('frontend/overview',compact('username'));
    }

    public function increase_month(Request $request){
        $userId = Auth::guard('frontuser')->user()->id;
        $focus_goal = MyFocusgoalsModel::where(['id' => $request->focuse_goal_id, 'user_id' => $userId])->first();  

        $archive_goal_time = explode(" ", $focus_goal['archive_goal_time']);
        $get_mnth = $archive_goal_time[0];

        $total_month = $get_mnth + $focus_goal['extra_month'];

        if($total_month < 12){
            $focus_goal->extra_month = $focus_goal['extra_month'] + 1;
            $focus_goal->save();
        }

        return response()->json([
            'message' => 'success'
        ]);
    }
}
