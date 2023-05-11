@extends('frontend/index')
@section('content')
<div class="sing-up">
    <ul class="nav justify-content-between">
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
        <li class="nav-item action-plan-bg">
            <a class="nav-link" href="#Action_Plan" role="tab" data-toggle="tab">Action Plan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#Learn_Action" role="tab" data-toggle="tab">Goal Tracking</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#Achieve_Goal" role="tab" data-toggle="tab">Achieve Goal</a>
        </li>
    </ul>


    <div role="tabpanel" class="tab-pane fade in active show" id="profile"> 

    <div class="row">
        
        <div class="col-md-8">
             <div class="heading_step8">
            <div class="pl-4"><!-- Please enter the amount you plan to put aside <b>each week</b> and make notes on how you plan to do this. This will become your <b>weekly action plan.</b> -->
               <h4 >Hey {{ucfirst(GetUserinfo($focused_goal['user_id'], 'username'))}}, well done you have developed an action plan to help you reach your goal.</h4>
            </div>
        </div>
        </div>
        <div class="col-md-4 pl-md-0">
             <div class="first-table table-responsive new-bl-tbl pl-0">
            <table>
                 <tr>
                    <td class="My_Goal">My Goal</td>
                    <td class="debt">{{ucfirst(str_replace("_"," ", $focused_goal->focused_cat))}}</td>
                 </tr>
                 <tr>
                    <td class="Timeframe">Timeframe</td>
                    <td class="TimeframeTO">{{$focused_goal['archive_goal_time']}}</td>
                  </tr>
                  <tr>
                    <td class="Monthly_Goal_Amount">My Monthly Goal Amount</td>
                    <td class="Monthly_Goal_AmountTO">R{{$focused_goal['each_month_goal']}}</td>
                  </tr>
                  <tr>
                    <td class="Monthly_Goal_AmountThree">My Total Goal</td>
                    <td class="TimeframeLast">R{{
                        strstr(number_format(((int)(str_replace(" ", "", $focused_goal['each_month_goal']) * (int) $focused_goal['archive_goal_time'])),"2",","," "), ',' , true)}}</td>
                  </tr>
            </table>
        </div>
        </div>
    </div>       
       
        
         <div class="heading_step8">
            <div class="title_step8"><!-- Please enter the amount you plan to put aside <b>each week</b> and make notes on how you plan to do this. This will become your <b>weekly action plan.</b> -->
                 It can be much easier to reach our goals when we break them down into smaller steps so we have summarised your monthly plan into a weekly action plan to help you out. Remember to log in each week and update your progress to stay on track. 
                
            </div>
        </div>


        <div class="tabs_ineer table-responsive">            
            <form action="{{ route('submit_step8') }}" method="post" name="step8_form" class="step8_form" id="step8_form" >
                @csrf
                <table class="w-100 ">
                    <tbody>
                        <tr>
                            <th class="Saving"><h3> Saving Category</h3></th>
                            <th class="Monthly"><h3>My Budgeted Monthly Spend</h3></th>
                            <th class="Weekly"><h3> My Budgeted Weekly Spend</h3></th>
                            <th class="Weekly"><h3> Planned Monthly Saving</h3></th>
                            <th class="Weekly"><h3> Planned Weekly Saving</h3></th>
                            <th class="Notes"><h3>How I will Achieve This</h3></th>
                        </tr>                        
                        @php        
                        if($goal == "achievable"){  
                            $monthly_saving_amt_total = $focused_goal['each_month_goal'];
                        @endphp

                                <tr>                            
                                    <td class="CategoryOne">
                                        <h6> Goal Savings</h6>
                                    </td>
                                    <td class="CategoryTo">
                                        <h6>R {{$focused_goal['each_month_goal']}}</h6>
                                    </td>
                                    <td class="CategoryThree tttt">                                    
                                        <input type="text" class="step8_inputs" name="Weekly_saving[amount]" data-type="currency" placeholder="R0.00">
                                    </td>
                                    <td class="CategoryFore ddd">                                        
                                        <textarea  class="step8_inputs" placeholder="Enter your note"></textarea>
                                    </td>   
                                    <td class="CategoryFore">                                        
                                        <textarea name="Weekly_saving[note]" class="step8_inputs" placeholder="Enter your note"></textarea>
                                    </td>                            
                                </tr>
                            
                        @php
                        } else {  

                            $each_month_goal = $focused_goal->each_month_goal;
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

                            $achieve_my_goal = unserialize($focused_goal['achieve_my_goal']);  
                            $monthly_saving_amt_total = array_sum(array_column($achieve_my_goal, 'saving_spend_amount'));      
                            //dd($monthly_saving_amt_total, $achieve_my_goal);
                           

                        @endphp

                            @php
                            foreach($achieve_my_goal as $key => $achieve_goal){
                                //print_r($achieve_goal);
                            @endphp

                            @php 
                               $AchieveGoalAmount = $achieve_goal['achieve_goal_amount'];
                               if($AchieveGoalAmount != '' || $AchieveGoalAmount != null){
                                    $achieveGoalAmount = $achieve_goal['achieve_goal_amount'];
                               }else{
                                    $achieveGoalAmount = $achieve_goal['saving_category_name'];
                               }
                            @endphp

                                <tr>                            
                                    <td class="CategoryOne">
                                        <h6>{{ucfirst(str_replace("_"," ",$key))}}</h6>
                                    </td>
                                    <td class="CategoryTo">
                                        <h6>{{$achieveGoalAmount}}</h6>
                                    </td>
                                    <td class="CategoryThree">                                    
                                        <!-- <input type="text" class="step8_inputs" name="Weekly_saving[{{$key}}][my_budgeted_weekly_spend]" data-type="currency" placeholder="R0.00" value="R {{number_format((float) ($achieve_goal['achieve_goal_amount']/4), 2, '.', '')}}" readonly> -->

                                        <input type="text" class="step8_inputs" name="Weekly_saving[{{$key}}][my_budgeted_weekly_spend]" data-type="currency" placeholder="R0.00" value="R {{$achieveGoalAmount/4}}" readonly>


                                    </td>
                                    <td class="CategoryThree">
                                        @php 
                                            $ssAmount = $achieve_goal['saving_spend_amount']; 
                                            if($ssAmount != '' && $ssAmount != null){
                                                $SavingAmount = $ssAmount;
                                            }else{
                                                $SavingAmount = 0;
                                            }
                                        @endphp

                                       

                                        <input type="text" class="step8_inputs" name="Weekly_saving[{{$key}}][amount]" placeholder="R0.00" data-type="currency" value="R {{$SavingAmount}}" readonly>

                                    </td>
                                    <td class="CategoryThree">                                    
                                        <!-- <input type="text" class="step8_inputs" name="Weekly_saving[{{$key}}][amount]" placeholder="R0.00" data-type="currency" value="R {{number_format((float) ($achieve_goal['saving_spend_amount']/4), 2, '.', '')}}" readonly> -->

                                        <input type="text" class="step8_inputs" name="Weekly_saving[{{$key}}][planned_weekly_saving]" placeholder="R0.00" data-type="currency" value="R {{$achieve_goal['saving_spend_amount']/4}}" readonly>

                                    </td>
                                    <td class="CategoryFore">
                                        <!-- <input type="text" class="step8_inputs" name="Weekly_saving[{{$key}}][note]" placeholder="Enter your note"> -->
                                        <textarea name="Weekly_saving[{{$key}}][note]" class="step8_inputs" readonly>@if(isset($achieve_goal['action_note'])){{$achieve_goal['action_note']}}@endif</textarea>
                                    </td>                            
                                </tr>
                            @php
                            } 
                        }
                        @endphp      

                        

                        <tr>
                            <td class="total-part"><h6>Savings Towards Overspend</h6></td>
                            <td class="total-part partto"><h6></h6></td>
                            <td class="total-part Amount"><h6></h6></td>

                            <td class="total-part Amount">
                                <h4>
                                    
                                        R {{$last_goal['monthly_extra_expenditure'] > 0 ? $last_goal['monthly_extra_expenditure'] : 0}}
                                    
                                </h4>
                            </td>
                            
                            <td class="total-part Amount">
                                <h4>
                                   R {{$last_goal['weekly_extra_expenditure'] > 0 ? $last_goal['weekly_extra_expenditure'] : 0 }} 
                            </h4></td>
                            <td class="total-part partto"><h6></h6></td>
                        </tr>

                        <tr>
                            <td class="total-part"><h6>Savings towards Goal</h6></td>
                            <td class="total-part partto"><h6></h6></td>
                            <td class="total-part Amount"><h6></h6></td>
                            <td class="total-part Amount"><h4>R {{$monthly_saving_amt_total - $last_goal['monthly_extra_expenditure']}}</h4></td>
                            
                            <td class="total-part Amount"><h4>
                            R {{($monthly_saving_amt_total/4) - $last_goal['weekly_extra_expenditure']}} 
                            </h4></td>
                            <td class="total-part partto"><h6></h6></td>
                        </tr>

                        <tr>
                            <td class="total-part"><h6>Total Monthly/Weekly Savings</h6></td>
                            <td class="total-part partto">
                                <h6><!-- R{{ ($goal != "achievable") ? strstr(number_format($monthly_saving_amt_total + $remaining_amount,"2",","," "), ',' , true) : $monthly_saving_amt_total;}} --></h6>
                            </td>
                            <td class="total-part Amount"><h6></h6></td>
                            <td class="total-part Amount">
                                
                                <h4>
                                    @if($focused_goal['achieve_my_goal'] != null && $goal != "achievable")  
                                    R {{$monthly_saving_amt_total}}
                                    @endif
                                </h4>

                            </td>


                            <td class="total-part Amount"><h4>
                            

                            @if($focused_goal['achieve_my_goal'] != null && $goal != "achievable")                           
                            {{-- R {{number_format((float) ($monthly_saving_amt_total/4), 2, '.', '')}} --}}


                            R {{$monthly_saving_amt_total/4}}

                            @endif </h4></td>
                            <td class="total-part partto"><h6></h6></td>
                        </tr>
                    </tbody>

                </table>
                @php                        
                    $userid = Auth::guard('frontuser')->user()->id; 
                @endphp
                <input type="hidden" name="my_goals_id" value="{{($last_goal) ? $last_goal['mygoals_id'] : '';}}">
                <input type="hidden" name="user_id" value="{{$userid}}">
                <input type="hidden" name="current_focus_goal" value="{{($last_goal) ? $last_goal['current_focus_goal'] : '';}}">

                <div class="col-lg-12 text-center text-lg-right mt-5">                    
                    <button class="next-btn step8">Goal Tracking
                    </button>
                    <p class="fromvalidation_error"></p>
                </div>

            </form>                       
                            
                                
        </div>
            
    </div>
        
    </div>
</div>

@endsection