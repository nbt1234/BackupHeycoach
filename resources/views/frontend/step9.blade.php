@extends('frontend/index')
@section('content')
    <style>
    :root {
    --yellow: #00a19a;
    --light-yellow: #fdf2d2;
    --orange: #00a19a;
    --light-gray: #e3e4e8;
    --gray: #71738b;
    --light-blue: #7a7c93;
    --blue: #34385a;
    --slider-handle-size: 14px;
    --slider-handle-border-radius: 2px;
    --slider-handle-margin-top: -4px;
    --slider-track-height: 6px;
    --slider-track-border-radius: 4px;
    }
 #bl-wrapper {
    position: absolute;
    width: 425px;
    height: 100px;
    top: 250px;
    left: -140px;
}
    #sliderContainer {
    width: 100%;
    max-width: 440px;
    transform: rotate(-90deg);
    }
    .tick-slider-header {
    display: flex;
    justify-content:center;
    margin-bottom: 24px;
    }
    .tick-slider-header>h5 {
    margin: 0;
    font-family: "Poppins", sans-serif;
    background: transparent!important;
     color: #000;
    font-weight: 600;
    font-size: 25px;
    text-align: center;
    }
  
    .tick-slider {
    position: relative;
    width: 100%;
    }
    .tick-slider-value-container {
    position: relative;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-family: "Hind Madurai", sans-serif;
    font-size: 18px;
    top: 25px;
    color: var(--gray);
    }
    div#weightLabelMin::before, div#weightLabelMax::before {
    position: absolute;
    content: 'R';
    left: -13px;
    top: 0px;
    }
    div#weightLabelMin, div#weightLabelMax {
    position: relative;
    }
    .tick-slider-value {
    position: absolute;
    top: 70px;
    left: auto!important;
    transform: rotate(90deg);
    right: -20px;
    font-weight: 600;
    color: var(--gray);
    border-radius: var(--slider-handle-border-radius);
    }
    div#weightLabelMin {
    transform: rotate(90deg);
    top: -28px;
    right: 20px;
}
    div#weightLabelMax {
    transform: rotate(90deg);
    top: -28px;
    right: -37px;
}
    .tick-slider-value>div {
    animation: bulge 0.3s ease-out;
    }
    .tick-slider-background,
    .tick-slider-progress,
    .tick-slider-tick-container {
    position: absolute;
    bottom: 5px;
    left: 0;
    height: var(--slider-track-height);
    pointer-events: none;
    border-radius: var(--slider-track-border-radius);
    z-index: -1;
    }
    div#weightValue div::before {
    position: absolute;
    content: 'R';
    left: -15px;
    }
    div#weightValue div {
    position: relative;
    }
    .tick-slider-background {
    width: 100%;
    background-color: #e9ecef;
    z-index: 999;
    height: 40px;
    border-radius: 50px;
    }
    .tick-slider-progress {
    background-color: var(--yellow);
    z-index: 999;
    height: 40px;
    border-radius: 50px 0 0 50px;
    }
    .tick-slider-tick-container {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 calc(var(--slider-handle-size) / 2);
    }
    .tick-slider-tick {
    width: 2px;
    height: 2px;
    border-radius: 50%;
    background-color: white;
    }
    /*.tick-slider-label {
    opacity: 0.85;
    transition: opacity 0.1s ease;
    }*/
    /*.tick-slider-label.hidden {
    opacity: 0;
    }
    */
    @keyframes bulge {
    0% {
    transform: scale(1);
    }
    25% {
    transform: scale(1.1);
    }
    100% {
    transform: scale(1);
    }
    }
    /*
    REMOVE SLIDER STYLE DEFAULTS
    */
    /*input[type="range"] {
    -webkit-appearance: none;
    width: 100%;
    background: #e9ecef;
    outline: none;
    margin: 5px 0;
    height: 25px;
    border-radius: 50px;
    }*/
    #bl-wrapper input[type="range"] {
    -webkit-appearance: none;
    width: 100%;
    background: #e9ecef;
    outline: none;
    margin: 5px 0;
    height: 25px;
    position: absolute;
    border-radius: 50px;
    opacity: 0;
    }
    #bl-wrapper input[type="range"]::-webkit-slider-thumb {
    -webkit-appearance: none;
    border: none;
    }
    #bl-wrapper input[type="range"]:focus {
    outline: none;
    }
    #bl-wrapper input[type="range"]::-moz-focus-outer {
    border: 0;
    }
    /*
    HANDLE
    */
    #bl-wrapper input[type="range"]::-webkit-slider-thumb {
    -webkit-appearance: none;
    width: var(--slider-handle-size);
    height: var(--slider-handle-size);
    background: var(--orange);
    border-radius: var(--slider-handle-border-radius);
    cursor: pointer;
    margin-top: var(--slider-handle-margin-top);
    
    -webkit-transform: scale(1);
    transform: scale(1);
    transition: transform 0.25s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    #bl-wrapper input[type="range"]:hover::-webkit-slider-thumb,
    #bl-wrapper input[type="range"]:focus::-webkit-slider-thumb {
    transform: scale(1.2);
    }
    #bl-wrapper input[type="range"]::-moz-range-thumb {
    -webkit-appearance: none;
    width: var(--slider-handle-size);
    height: var(--slider-handle-size);
    background: var(--orange);
    border: none;
    border-radius: var(--slider-handle-border-radius);
    cursor: pointer;
    transition: transform 0.25s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    #bl-wrapper input[type="range"]:hover::-moz-range-thumb,
    #bl-wrapper input[type="range"]:focus::-moz-range-thumb {
    transform: scale(1.2);
    }
    /*
    TRACK
    */
    #bl-wrapper input[type="range"]::-webkit-slider-runnable-track {
    width: 100%;
    height: var(--slider-track-height);
    cursor: pointer;
    background: none;
    border-radius: var(--slider-track-border-radius);
    }
    #bl-wrapper input[type="range"]::-moz-range-track {
    width: 100%;
    height: var(--slider-track-height);
    cursor: pointer;
    background: none;
    border-radius: var(--slider-track-border-radius);
    }
    #bl-wrapper input[type="range"]:focus::-webkit-slider-runnable-track {
    background: none;
    }
    #bl-wrapper input[type="range"]:active::-webkit-slider-runnable-track {
    background: none;
    }

    .tick-slider::before {
    position: absolute;
    content: '';
    height: 50%;
    width: 100%;
    bottom: 0;
    right: 0px;
    background: transparent;
    z-index: 9999;
}
    </style>
<style>
    .step9_gap_red {
        border: 1px solid red !important;
        border-radius: 5px;
        color: red !important;
    }
    .step9_gap_green {
        border: 1px solid #00a19a !important;
        border-radius: 5px;
        color: #00a19a !important;
    }
    .step9_gap_grey {
        border: 1px solid grey !important;
        border-radius: 5px;
        color: grey !important;
    }

    .validationthisfield{
         border: 1px solid red !important;
        border-radius: 5px;
        color: red !important;
    }

  #chartdiv {
    width: 100%;
    position: relative;
    height: 500px;
    margin-top: 85px;
}
  #chartdiv::before {
    position: absolute;
    content: 'Savings in Rands';
    top: 40%;
    transform: rotate(270deg);
    color: #000;
    font-weight: 600;
    font-size: 25px;
    left: -110px;
}

#chartdiv::after {
    position: absolute;
    content: 'Savings Progress Tracker';
    top: -40px;
    color: #000;
    font-weight: 600;
    font-size: 25px;
    transform: translate(-50%)!important;
    left: 50%;
}
  #slide {
    width: 130px;
    height: 58px;
    display: flex;
    justify-content: space-around;
    padding-left: 15px;
}
#slide span{
    color: #fff !important;
}
</style>
@if (Session::has('flash-success'))
    <p class="step_sweet_alert" onclick="sweet_alert_success('{{ session('flash-successs')}}')"></p>
@endif
@if (Session::has('flash-error'))
    <p class="step_sweet_alert" onclick="sweet_alert_danger('{{ session('flash-errorr')}}')"></p>
@endif  


<div class="sing-up">
    <ul class="nav  justify-content-between">
        <li class="nav-item">
            <!-- <a class="nav-link active" href="#profile" role="tab" data-toggle="tab">Welcome</a> -->
            <a class="nav-link active" href="{{route('overview')}}">Welcome</a>
        </li>
        <li class="nav-item">
            <!-- <a class="nav-link" href="#buzz" role="tab" data-toggle="tab">Goals</a> -->
            <a class="nav-link" href="{{route('getstep2')}}">Goals</a>

        </li>
        <li class="nav-item">
            <!-- <a class="nav-link" href="#references" role="tab" data-toggle="tab">Know Your Spend</a> -->
            <a class="nav-link" href="{{route('getstep5')}}">Know Your Spend</a>
            
        </li>
        <li class="nav-item">
            <!-- <a class="nav-link" href="#Match_Goal" role="tab" data-toggle="tab">Match Goal to Gap</a> -->
            <a class="nav-link" href="{{route('getstep6')}}">Match Goal to Gap</a>
        </li>
        <li class="nav-item">
            <!-- <a class="nav-link" href="#Action_Plan" role="tab" data-toggle="tab">Adjust Spending</a> -->
            <a class="nav-link" href="{{route('getstep7')}}">Adjust Spending</a>
        </li>
        <li class="nav-item">
            <!-- <a class="nav-link" href="#Learn_Action" role="tab" data-toggle="tab">Action Plan</a> -->
            <a class="nav-link" href="{{route('getstep8')}}">Action Plan</a>

        </li>
        <li class="nav-item learn-action">
            <a class="nav-link" href="#Learn_Action" role="tab" data-toggle="tab">Goal Tracking</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#Achieve_Goal" role="tab" data-toggle="tab">Achieve Goal</a>
        </li>
    </ul>
    <div role="tabpanel" class="tab-pane fade in active show" id="profile">
        <div class="tabs_ineer really ">
    
            

            {{-- dd($focused_goal) --}}
            @php
            $goal_mnth = $focused_goal['archive_goal_time'];             
            $get_mnth = explode(" ", $goal_mnth);




            $total_weeks = $get_mnth[0] * 4;
            $get_parts = 100/$total_weeks;



            //print_r($get_parts);
            $weekwise_track_goal = $focused_goal['weekwise_track_goal'];
            $each_month_goal = str_replace(" ","",$focused_goal['each_month_goal']);
            //dd($get_mnth[0]);
            $total_goal = (int)$each_month_goal * (int)$get_mnth[0];

            $processindicator = ((int)$weekwise_track_goal/(int)$total_goal)*100;

            if($focused_goal['weekwise_track_goal']){
                $process = "width:".$processindicator;
            } else {
                $process = "width:0";
            }

            $achieve_my_goal = unserialize($focused_goal['achieve_my_goal']);
            $weekly_saving = unserialize($focused_goal['weekly_saving']); 
            //dd($weekly_saving);
            @endphp
          
            
            <input type="hidden" class="total_weeks" value="{{$total_weeks}}">
            <input type="hidden" class="current_value_of_the_week" value="{{($focused_goal['weekwise_track_goal']) ? $focused_goal['weekwise_track_goal'] : 0 ;}}">
            <input type="hidden" name="current_focus_goal" class="current_focus_goal" value="{{($focused_goal) ? $focused_goal['id'] : '';}}"> 
            

            <div class="row">
                <div class="col-md-8">
                    <h2 style="font-size: 39px;">Hey {{ucfirst(GetUserinfo($focused_goal['user_id'], 'username'))}}, How are you tracking?</h2>
                   <div class="d-flex align-items-center">
                        <img src="https://img.icons8.com/wired/64/00a19a/planner.png"/>

                    @php 
                        if($focused_goal['extra_month'] > 0){
                            $get_month = $get_mnth[0] ;
                            $total_month = ($get_month[0] + $focused_goal['extra_month']); 
                            $total_weeks = $total_month * 4;
                        }
                    @endphp

                  
                    <h5 class="bg-transparent pl-4">{{$total_weeks - $last_week_of_goal}} Weeks left to complete your goal</h5>
                   </div>
                </div>
                <div class="col-md-4">
                    <div class="first-table new-bl-tbl p-0 table-responsive">
                        <table>
                           <tbody><tr>
                            <td class="My_Goal">My Goal</td>
                            <td class="debt">{{ucfirst(str_replace("_"," ", $focused_goal->focused_cat))}}</td>
                        </tr>
                        <tr>
                            <td class="Timeframe">Timeframe</td>

                            @if($focused_goal['extra_month'] > 0)
                            @php 
                                $get_month = explode(" ",$focused_goal['archive_goal_time']);
                                $get_month = $get_month[0] ;
                                $total_month = ($get_month[0] + $focused_goal['extra_month']); 
                            @endphp

                                <td class="TimeframeTO">{{$total_month}} month</td>
                            @else
                                <td class="TimeframeTO">{{$focused_goal['archive_goal_time']}}</td>

                            @endif

                                
                        </tr>
                        <tr>
                            <td class="Monthly_Goal_Amount">My Monthly Goal Amount</td>
                            <td class="Monthly_Goal_AmountTO">R {{$focused_goal['each_month_goal']}}</td>
                        </tr>
                        <tr>
                            <td class="Monthly_Goal_AmountThree">My Total Goal</td>
                            <td class="TimeframeLast">R  {{(int) str_replace(' ','', $focused_goal['each_month_goal']) * (int)str_replace(' month','', $focused_goal['archive_goal_time'])}}</td>
                        </tr>
                    </tbody></table>

                </div>
                </div>

            </div>
        <!-- @if($weekly_goal_amount) -->
            <div class="progress-bar-graph">
                <div class="row">
                    <div class="col-md-3">

                        <div class="hello">
            <div id="bl-wrapper">
                <div id="sliderContainer">
                    <div class="tick-slider">
                        <div class="tick-slider-header">
                            <h5><label for="weightSlider">Total Goal Tracker</label></h5>
                        </div>
                        <div class="tick-slider-background"></div>
                        <div id="weightProgress" class="tick-slider-progress">
                            <div id="weightValue" class="tick-slider-value"></div>
                        </div>
                        <div id="weightTicks" class="tick-slider-tick-container"></div>
                        <input id="weightSlider" class="tick-slider-input" type="range" min="0" max="{{$total_goal}}" step="1" value="{{$weekwise_track_goal > 0 ? $weekwise_track_goal : 0}}" data-tick-step="5"
                        data-tick-id="weightTicks" data-value-id="weightValue" data-progress-id="weightProgress" data-handle-size="18" data-min-label-id="weightLabelMin"
                        data-max-label-id="weightLabelMax" />
                        <div class="tick-slider-value-container">
                            <div id="weightLabelMin" class="tick-slider-label">0</div>
                            <div id="weightLabelMax" class="tick-slider-label">{{$total_goal}}</div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
                        <!-- <div class="range_slider-section">
                            <h4>Total Goal Tracker</h4>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" {{"style=$process%"}} aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><p class="progress-bar-value">R {{$weekwise_track_goal}}</p></div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center px-3">
                                <span>R 0</span>
                                <span>R {{$total_goal}}</span>
                            </div>
                        </div> -->
                    </div>  
                    <div class="col-md-9">
                         <div id="chartdiv"></div>
                    </div>  
                </div>
            </div>
        <!-- @else
            <div class="range_slider-section">
                <h4>Total Goal Tracker</h4>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" {{"style=$process%"}} aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">R {{$weekwise_track_goal}}</div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center px-3">
                        <span>R 0</span>
                        <span>R {{$total_goal}}</span>
                    </div>
            </div>
        @endif -->


        <div class="mt-4 mt-lg-5 Weekly_Check">
                <!-- <h4>Weekly Check In</h4> -->
                @php
                if(Session::has('flash-success')){                    
                    $weely_check_thumbs_class = 'showthumbs';
                    $thumbsnotes = 'hidenotes_thumbs';
                } elseif(Session::has('flash-error')){
                    $weely_check_thumbs_class = 'hidethumbs';
                    $thumbsnotes = 'shownotes_thumbs';
                } else {                    
                    $weely_check_thumbs_class = 'hidethumbs';
                    $thumbsnotes = '';
                }                
                @endphp

                <h5>
                    Don’t forget to update your weekly spend each week in the table below to see your updated progress.
                </h5>
                
                <div role="tabpanel" class="tab-pane fade in active show" id="profile">
                    <div class="tabs_ineer Action_Second table-responsive">
                    @php
                    if($focused_goal['achieve_my_goal'] != ""){
                    @endphp
                        <form id="step9formsubmitt" action="{{route('step9_trackingamount')}}" method="post">
                    @php 
                    } 
                    @endphp

                        @csrf
                        <table class="w-100">

                            <tbody>

                                <tr>
                                    <th class="Saving"><h3>Saving Category</h3></th>
                                    <th class="Weekly"><h3>My Budgeted Weekly Spend</h3></th>
                                    <th class="Monthly"><h3>My Actual Weekly Spend</h3></th>
                                    <th class="Monthly"><h3>Planned weekly saving</h3></th>
                                    <th class="Monthly"><h3>Actual weekly saving</h3></th>
                                    <th class="Notes_Second"><h3>Action Notes (I)</h3></th>
                                </tr>

                                @php 
                                ////////////////////////////////////////////////////////////////
                                ////////////////////////Monthly Spending///////////////////////
                                //////////////////////////////////////////////////////////////

                                $catwise_actual_spend = $focused_goal->catwise_actual_spend;
                                $unseri_actual_spend = unserialize($catwise_actual_spend); 

                                //unset($unseri_actual_spend['other']);
                                $arr_actual_spend = array();
                                foreach($unseri_actual_spend as $key => $unseri_act_spend){
                                    $repl_actual_spend = str_replace(" ","",$unseri_act_spend);
                                    $arr_actual_spend[$key] = $repl_actual_spend;
                                } 

                                $monthly_spend = array_sum($arr_actual_spend);
                                //echo $monthly_spend;
                                ////////////////////////////////////////////////////////////////
                                ////////////////////////Monthly Spending///////////////////////
                                //////////////////////////////////////////////////////////////
                                $goal_amount = str_replace(" ","",$each_month_goal);
                                $earn_after_tax_per_mnth = str_replace(' ', '', $focused_goal->earn_after_tax_per_mnth);  //Your Income    
                                //$remaining_amount = $goal_amount - ($earn_after_tax_per_mnth - $monthly_spend);
                                $remaining_amount = $earn_after_tax_per_mnth - $monthly_spend;

                                
                                if($focused_goal['achieve_my_goal'] != ""){


                                    $total_monthly_amount =  array_sum(array_column($achieve_my_goal, 'achieve_goal_amount'));
                                    $cat_count = count($achieve_my_goal);



                                    $count = 0;
                                    $weeksavinf_count = 0;
                                    //$total_weely_amt = array(); 
                                    $total_weely_amt = 0;
                                @endphp                             
                                
                                    @php
                                    foreach($achieve_my_goal as $achievekey => $achieve_goal_amt){
                                            $count++;
                                        foreach($weekly_saving as $weekly_cat => $wkly_saving){
                                                $weeksavinf_count++;

                                                if($weeksavinf_count == 1){
                                                    $goalsaving_weelysaving_amt = str_replace(',', '', $wkly_saving['amount']);
                                                }

                                                if($achievekey == $weekly_cat){

                                //$total_weely_amt[] = str_replace(",","",$wkly_saving['amount']);
                                $total_weely_amt += (int) str_replace(",","",$wkly_saving['amount']);
                                                    @endphp                                 
                                                    <tr>
                                                        <td class="CategoryOne">
                                                            <h6>{{ucfirst(str_replace("_"," ",$achievekey))}}</h6>
                                                        </td>
                                                        
                                                        <td class="CategoryThree">
                                                            <input type="text" name="cat_wise[{{ucfirst(str_replace('_',' ',$achievekey))}}][my_budget_weekly_spend]" class="my_budgeted_weekly_spend step9_inputs step9_inputs_required" data-type="currency" achieve_cat="{{$achievekey}}" value="R{{$wkly_saving['my_budgeted_weekly_spend']}}" readonly>
                                                          
                                                        </td>

                                                        <td class="CategoryTo">
                                                            <input type="text" name="cat_wise[{{ucfirst(str_replace('_',' ',$achievekey))}}][my_actual_weekly_spend]" class="my_actual_weekly_spend step9_inputs step9_inputs_required" data-type="currency" achieve_cat="{{$achievekey}}" autocomplete="off">
                                                        </td>



                                                        <td class="CategoryThree">
                                                            <input type="text" name="cat_wise[{{ucfirst(str_replace('_',' ',$achievekey))}}][planned_weekly_saving]" class="planned_weekly_saving step9_inputs" achieve_cat="{{$achievekey}}" value="R {{$wkly_saving['planned_weekly_saving']}}" readonly>
                                                        </td>

                                                       
                                                        <td class="CategoryFore">

                                                            <input type="text" name="cat_wise[{{ucfirst(str_replace('_',' ',$achievekey))}}][actual_weekly_saving]" class="actual_weekly_saving step9_inputs step9_inputs_required" achieve_cat="{{$achievekey}}" data-type="currency" readonly>


                                                            <input type="hidden" class="actual_weekly_saving_hidden step9_inputs step9_inputs_required" achieve_cat="{{$achievekey}}" readonly>

                                                        </td>

                                                        <td class="CategoryFive text-center">
                                                            <textarea class="step9_inputs" achieve_cat="{{$achievekey}}" name="cat_wise[{{ucfirst(str_replace('_',' ',$achievekey))}}][action_note]"></textarea>
                                                        </td>
                                                    @php
                                                    if($count == 1){
                                                        @endphp

                                                    @php
                                                    }
                                                    @endphp
                                                    </tr>
                                                @php 
                                                }
                                            }
                                        }  

                                
                                    @endphp
                               
                                @php
                                } else {

                                 $weely_saving_arr = unserialize($focused_goal['weekly_saving']);
                                 //dd($weely_saving_arr);

                                 $total_monthly_amount = $focused_goal['each_month_goal'];

                                 $total_weely_amt = str_replace(" ","",$weely_saving_arr['amount']);

                                 @endphp

                                    <tr>
                                        <td class="CategoryOne">
                                            <h6>Goal Savings</h6>
                                        </td>
                                        <td class="CategoryTo">
                                            <h6>R {{$focused_goal['each_month_goal']}}</h6>
                                        </td>
                                        <td class="CategoryThree">
                                            <h6>R {{$weely_saving_arr['amount']}}</h6>
                                        </td>
                                        <td class="CategoryFore">
                                            <p class="w-100">{{$weely_saving_arr['note']}}</p>
                                        </td>                                            
                                        <td class="CategoryFive text-center" rowspan="1" >

                                            <form action="{{route('step9_trackingamount')}}" method="post" name="tracking_goalamount" class="tracking_goalamount step9" id="tracking_goalamount">
                                                @csrf
                                                <input type="text" name="trackingamount" class="trackingamount" data-type="currency" placeholder="R0.00">
                                                <p class="trackingamount_error"></p>

                                                <input type="hidden" name="weely_tracking_type" value="amount">

                                                <input type="hidden" name="current_focus_goal" class="current_focus_goal" value="{{($focused_goal) ? $focused_goal['id'] : '';}}">
                                                <input type="hidden" name="current_value_of_amount" class="current_value_of_amount" value="{{($focused_goal['weekwise_track_goal']) ? $focused_goal['weekwise_track_goal'] : 0 ;}}">

                                                <input type="submit" name="submtamount" class="submitamount" id="submitamount">
                                            </form>
                                        </td>                                           
                                    </tr>

                                    @php
                                } 


                                if($focused_goal['achieve_my_goal'] != ""){

                                    if($remaining_amount < 0) {
                                        $weely_saving_total = $total_weely_amt;
                                    } else {
                                        $weely_saving_total = $goalsaving_weelysaving_amt + $total_weely_amt;
                                    }


                                } else {
                                    $weely_saving_total = $total_weely_amt;
                                }
                                @endphp  
                                <input type="hidden" name="total_weekly_goal" class="total_weekly_goal" value="{{$weely_saving_total}}">

                                
                                

                                
                                <tr>
                                    <td class="total-part partto"><h5>Savings Towards Overspend</h5></td>
                                    <td class="total-part Amount"><h5></h5></td>
                                    <td class="total-part partto"><h5></h5></td>
                                    <td class="total-part partto">
                                        <h4>
                                            R {{$weekly_extra_expenditure > 0 ? $weekly_extra_expenditure : 0 }}
                                        </h4>
                                    </td>
                                   
                                    <td class="total-part partto">
                                        <h4 id="weekly_actual_saving_towards_extra_expenditure">R 0</h4>
                                    </td>
                                    <td class="total-part partto"><h5></h5></td>
                                </tr>

                                <tr>
                                    <td class="total-part partto"><h5>Savings towards Goal</h5></td>
                                    <td class="total-part Amount"><h5></h5></td>
                                    <td class="total-part partto"><h5></h5></td>
                                    <td class="total-part partto">
                                        @php $plan_saving_towards_goal = (array_sum(array_column($weekly_saving, 'planned_weekly_saving')) - ($weekly_extra_expenditure)); @endphp
                                        <h4>
                                            R {{$plan_saving_towards_goal > 0 ? $plan_saving_towards_goal : 0}}
                                        </h4>
                                    </td>
                                   
                                    <td class="total-part partto"><h4 id="saving_towards_goal">R 0</h4>
                                    <td class="total-part partto"><h5></h5></td>
                                </tr>

                                <tr>
                                    <td class="total-part partto"><h5>Total</h5></td>
                                    <td class="total-part Amount"><h5></h5></td>
                                    <td class="total-part partto"><h5></h5></td>
                                    <td class="total-part partto"><h4>R {{array_sum(array_column($weekly_saving, 'planned_weekly_saving'))}}</h4></td>
                                    <td class="total-part partto"><h4 id="actual_weekly_savings_total"></h4></td>
                                    <td class="total-part partto"><h5></h5></td>
                                </tr>

                                
                            </tbody>

                        </table> 
                        <input id="current_focus_goal_id" type="hidden" name="current_focus_goal" class="current_focus_goal" value="{{($focused_goal) ? $focused_goal['id'] : '';}}"> 

                        <input type="hidden" name="total_planed_weekly_saving" value="{{array_sum(array_column($weekly_saving, 'planned_weekly_saving'))}}">
                        <input type="hidden" name="weely_tracking_type" value="amount">

                        <input id="actual_weekly_saving_input" type="hidden" name="actual_weekly_saving" value="">

                        <input id="saving_towards_extra_expenditure" type="hidden" name="saving_towards_extra_expenditure" value="{{$weekly_extra_expenditure}}">

                        <input id="saving_towards_goal_input" type="hidden" name="saving_towards_goal_input">

                        <div class="col-lg-12 text-center text-lg-right mt-5">                    
                            <button class="next-btn step9">Submit</button>
                            <p class="fromvalidation_error"
                            ></p>
                        </div>
                    </form>
                    </div>
                </div>
        </div>

        </div>  

                <!-- Show popup for increase month -->
                    <div class="modal fade modal_show_increase_month" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                           
                          </div>
                          <div class="modal-body">
                               "It looks like you might need a little more time to complete your goal. Please click OK to add an extra month. Please remember to check in weekly and track your spending. If you need help we are always here to assist"
                          </div>
                          <div class="modal-footer">
                            <button id="increase_month_ajax" type="button" class="btn alex-popup-btn-second highlight_amount">OK</button>
                          </div>
                        </div>
                      </div>
                    </div>
                <!-- Show popup for increase month -->


    
    </div>        
</div>


<script type="text/javascript">
    //graph for step9 start
am5.ready(function() {

var root = am5.Root.new("chartdiv");

root.setThemes([
  am5themes_Animated.new(root)
]);

// root.setThemes([
//   am5themes_Responsive.new(root)
// ]);

var chart = root.container.children.push(am5xy.XYChart.new(root, {
  panX: false,
  panY: false,
  wheelX: "panX",
  wheelY: "zoomX",
  layout: root.verticalLayout
}));



// chart.set("scrollbarX", am5.Scrollbar.new(root, {
//   orientation: "horizontal"
// }));



var data = <?php  echo json_encode($weekly_goal_amount); ?>

// var data = [{
//   "month": "month1",
//   "week1": 500,
//   "week2": 600,
//   "week3": 800,
//   "week4": 500,
  
// }, {
//   "month": "month2",
//   "week1": 600,
//   "week2": 700,
//   "week3": 550,
//   "week4": 400,
// }, {
//   "month": "month3",
//   "week1": 900,
//   "week2": 844,
//   "week3": 500,
//   "week4": 644,
// }, {
//   "month": "month4",
//   "week1": 900,
//   "week2": 844,
//   "week3": 500,
//   "week4": 644,
// }]

/* code for x value vertically
var xRenderer = am5xy.AxisRendererX.new(root, { minGridDistance: 30 });
xRenderer.labels.template.setAll({
  rotation: -90,
  centerY: am5.p50,
  centerX: am5.p100,
  paddingRight: 15
});

var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
  maxDeviation: 0.3,
  categoryField: "month",
  renderer: xRenderer,
  tooltip: am5.Tooltip.new(root, {})

}));

code end for x value vertically
*/




var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
    categoryField: "month",
    renderer: am5xy.AxisRendererX.new(root, {minGridDistance: 35 }),
    tooltip: am5.Tooltip.new(root, {}),
    unit : "$",
    unitPosition : "left"
}));


xAxis.data.setAll(data);


var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
    min: 0,
    
    // <?php 
    // if($minimum_value_in_array >= 0){
    //    echo "min:0,";
    // }
    // ?>

  // max: {{$each_month_goal}},
  renderer: am5xy.AxisRendererY.new(root, {})
}));




// yAxis.children.push(am5.Label.new(root, {
//     text: "Savings in Rands",
//     rotation : 270,
//     fontSize: 25,
//     dy: 250,
//     fontWeight : 600,
// }));

    // fontSize: 25,
    // fontWeight: "500",
    // textAlign: "center",
    // x: am5.percent(50),
    // centerX: am5.percent(50),
    // paddingTop: 0,
    // paddingBottom: 30

// yAxis.children.push(am5.Label.new(root, {
//  text : "Something",
// rotation : 0,
// align : "center",
// valign : "top",
// dy : -40,
// fontWeight : 600
// }));

// yAxis.children.push(am5.Label.new(root, {
//     text : "Something",
//     dy : -40,
// }));



var legend = chart.children.push(am5.Legend.new(root, {
  centerX: am5.p50,
  x: am5.p50
}));

function makeSeries(name, fieldName, color) {
  var series = chart.series.push(am5xy.ColumnSeries.new(root, {
    name: name,
    stacked: true,
    xAxis: xAxis,
    yAxis: yAxis,
    valueYField: fieldName,
    categoryXField: "month",
    fill:color,
  }));


  series.columns.template.setAll({
    tooltipText: "{name}, {categoryX}: R {valueY}",
    tooltipY: am5.percent()
  });
  series.data.setAll(data);
  series.appear();

  series.bullets.push(function () {
    return am5.Bullet.new(root, {
      sprite: am5.Label.new(root, {
        text: "R {valueY}",
        fill: root.interfaceColors.get("alternativeText"),
        centerY: am5.p50,
        centerX: am5.p50,
        populateText: true
      })
    });
  });

  legend.data.push(series);
}

// chart.children.unshift(am5.Label.new(root, {
//   text: "Savings Progress Tracker",
//   fontSize: 25,
//   fontWeight: "500",
//   textAlign: "center",
//   x: am5.percent(50),
//   centerX: am5.percent(50),
//   paddingTop: 0,
//   paddingBottom: 30
// }));

makeSeries("Week1", "week1",am5.color("#3e6dc7"));
makeSeries("Week2", "week2",am5.color("#f47a27"));
makeSeries("Week3", "week3",am5.color("#a0a1a3"));
makeSeries("Week4", "week4",am5.color("#ffc631"));
chart.appear(1000, 100);

}); // end am5.ready()
//graph for step9 end

// $(document).ready(function(){
//    $('#chartdiv div div div canvas').next().remove();
// });
</script>

<script>
    function init() {
    const sliders = document.getElementsByClassName("tick-slider-input");
    for (let slider of sliders) {
    slider.oninput = onSliderInput;
    updateValue(slider);
    updateValuePosition(slider);
    updateLabels(slider);
    updateProgress(slider);
    setTicks(slider);
    }
    }
    function onSliderInput(event) {
    updateValue(event.target);
    updateValuePosition(event.target);
    updateLabels(event.target);
    updateProgress(event.target);
    }
    function updateValue(slider) {
    let value = document.getElementById(slider.dataset.valueId);
    value.innerHTML = "<div>" + slider.value + "</div>";
    }
    function updateValuePosition(slider) {
    let value = document.getElementById(slider.dataset.valueId);
    const percent = getSliderPercent(slider);
    const sliderWidth = slider.getBoundingClientRect().width;
    const valueWidth = value.getBoundingClientRect().width;
    const handleSize = slider.dataset.handleSize;
    let left = percent * (sliderWidth - handleSize) + handleSize / 2 - valueWidth / 2;
    left = Math.min(left, sliderWidth - valueWidth);
    left = slider.value === slider.min ? 0 : left;
    value.style.left = left + "px";
    }
    function updateLabels(slider) {
    const value = document.getElementById(slider.dataset.valueId);
    const minLabel = document.getElementById(slider.dataset.minLabelId);
    const maxLabel = document.getElementById(slider.dataset.maxLabelId);
    const valueRect = value.getBoundingClientRect();
    const minLabelRect = minLabel.getBoundingClientRect();
    const maxLabelRect = maxLabel.getBoundingClientRect();
    const minLabelDelta = valueRect.left - (minLabelRect.left);
    const maxLabelDelta = maxLabelRect.left - valueRect.left;
    const deltaThreshold = 32;
    if (minLabelDelta < deltaThreshold) minLabel.classList.add("hidden");
    else minLabel.classList.remove("hidden");
    if (maxLabelDelta < deltaThreshold) maxLabel.classList.add("hidden");
    else maxLabel.classList.remove("hidden");
    }
    function updateProgress(slider) {
    let progress = document.getElementById(slider.dataset.progressId);
    const percent = getSliderPercent(slider);
    progress.style.width = percent * 100 + "%";
    }
    function getSliderPercent(slider) {
    const range = slider.max - slider.min;
    const absValue = slider.value - slider.min;
    return absValue / range;
    }
    function setTicks(slider) {
    let container = document.getElementById(slider.dataset.tickId);
    const spacing = parseFloat(slider.dataset.tickStep);
    const sliderRange = slider.max - slider.min;
    const tickCount = sliderRange / spacing + 1; // +1 to account for 0
    for (let ii = 0; ii < tickCount; ii++) {
    let tick = document.createElement("span");
    tick.className = "tick-slider-tick";
    container.appendChild(tick);
    }
    }
    function onResize() {
    const sliders = document.getElementsByClassName("tick-slider-input");
    for (let slider of sliders) {
    updateValuePosition(slider);
    }
    }
    window.onload = init;
    window.addEventListener("resize", onResize);
    </script>
@endsection