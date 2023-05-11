@extends('frontend/index')
@section('content')

<div class="sing-up steppp6_main">
    <ul class="nav  justify-content-between">
        <li class="nav-item">
            <!-- <a class="nav-link active" href="#profile" role="tab" data-toggle="tab"><span>Welcome</span></a> -->
             <a class="nav-link active" href="{{route('overview')}}">Welcome</a>
        </li>
        <li class="nav-item">
            <!-- <a class="nav-link" href="#buzz" role="tab" data-toggle="tab"><span>Goals</span></a> -->
            <a class="nav-link" href="{{route('getstep2')}}">Goals</a>
        </li>
        <li class="nav-item">
            <!-- <a class="nav-link" href="#references" role="tab" data-toggle="tab"><span>Know Your Spend</span></a> -->
            <a class="nav-link" href="{{route('getstep5')}}">Know Your Spend</a>
        </li>
        <li class="nav-item Match-Goal-bg">
            <a class="nav-link" href="#Match_Goal" role="tab" data-toggle="tab"><span>Match Goal to Gap</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#Action_Plan" role="tab" data-toggle="tab"><span>Adjust Spending</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#Learn_Action" role="tab" data-toggle="tab"><span>Action Plan</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#Learn_Action" role="tab" data-toggle="tab">Goal Tracking</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#Achieve_Goal" role="tab" data-toggle="tab"><span>Achieve Goal</span></a>
        </li>
    </ul>
    <div role="tabpanel" class="tab-pane fade in active show " id="profile">
        <div class="tabs_ineer really ">
            @php
                //dd($last_focused_goal);
                $catwise_actual_spend = $last_focused_goal->catwise_actual_spend;
                $unseri_actual_spend = unserialize($catwise_actual_spend); 
                //unset($unseri_actual_spend['other']);

                $arr_actual_spend = array();
                foreach($unseri_actual_spend as $key => $unseri_act_spend){
                    $repl_actual_spend = str_replace(" ","",$unseri_act_spend);
                    $arr_actual_spend[$key] = $repl_actual_spend;
                } 
                $actual_spend_sum = array_sum($arr_actual_spend);
                //dd($actual_spend_sum);  

                $goal_amount = str_replace(" ","",$last_focused_goal->each_month_goal); //dd($goal_amount);
                $your_income = str_replace(" ","",$last_focused_goal->earn_after_tax_per_mnth);

              
               //$gap = ($actual_spend_sum + $goal_amount) - $your_income 

               // $gap = $goal_amount - $actual_spend_sum; 
    
                $gap = ($actual_spend_sum - $your_income) + $goal_amount;

            @endphp

            <div class="User_Details_TopBar">
                  <p>Hey {{ucfirst(GetUserinfo($last_focused_goal['user_id'], 'username'))}}, now that you have a good sense of how and where you spend your money let’s see how big the gap is between your current  spend and your goal.
                <!-- <b>Is your goal realistic?</b></p> -->
            </div>
            
            <div class="row mt-0 mt-lg-5">
                <div class="col-lg col-sm-6 col-md-4 py-2 md-py-0">
                    <div class="your-goal-section">
                           <h3>Your Goal</h3>
                           <span class="dotted-border">
                            <img src="{{asset('public/front-assets/img/border.png')}}" class="img-fluid w-100">
                           </span>
                        <h4>{{ucwords(str_replace("_"," ", $last_focused_goal->focused_cat));}}<!-- <span>Actual Goal</span> --></h4>
                    </div>
                </div>
                <div class="col-lg col-sm-6 col-md-4 py-2 md-py-0">
                    <div class="your-goal-section">
                           <h3>Your Timeframe</h3>
                           <span class="dotted-border">
                            <img src="{{asset('public/front-assets/img/border.png')}}" class="img-fluid w-100">
                           </span>
                        <h4>{{ str_replace("_"," ", $last_focused_goal->archive_goal_time)}}s<!-- <span>Time Frame</span> --></h4>
                        
                    </div>
                </div>

                <div class="col-lg col-sm-6 col-md-4 py-2 md-py-0">
                    <div class="your-goal-section">
                           <h3>Your Monthly Goal Amount</h3>
                           <span class="dotted-border">
                            <img src="{{asset('public/front-assets/img/border.png')}}" class="img-fluid w-100">
                           </span>
                           {{-- $last_focused_goal->each_month_goal --}}

                        <h4>R {{str_replace("_"," ", $last_focused_goal->each_month_goal)}}<!-- <span>Rand Amount</span> -->

                            @if($gap > ($actual_spend_sum * 10)/100)
                            <div class="bottom-btn Adjust_Goal_Btn  pt-3 ">   
                                <a href="{{route('getstep2', 'adjustgoal')}}" class="footer_Btn_Section-1">Adjust Goal</a>
                            </div>
                            @endif
                        </h4>
                        
                    </div>
                </div>
                
                
                <div class="col-lg col-sm-6 col-md-4 py-2 md-py-0">
                    <div class="your-goal-section">
                           <h3>Your Monthly Income</h3>
                           <span class="dotted-border">
                            <img src="{{asset('public/front-assets/img/border.png')}}" class="img-fluid w-100">
                           </span>
                        <h4>R {{$last_focused_goal->earn_after_tax_per_mnth}}<!-- <span>Income</span> --></h4>
                    </div>
                </div>

                <div class="col-lg col-sm-6 col-md-4 py-2 md-py-0">
                    <div class="your-goal-section">
                           <h3>Your Monthly Spending</h3>
                           <span class="dotted-border">
                            <img src="{{asset('public/front-assets/img/border.png')}}" class="img-fluid w-100">
                           </span>
                        <h4>R {{strstr(number_format($actual_spend_sum,"2",","," "), ',' , true)}}
                          <!--   <span></span> -->

                        @if($actual_spend_sum + $goal_amount > $your_income)
                            <div class="bottom-btn Reduce_Spending_Btn pt-3 "> 
                                <a href="{{route('getstep7')}}" class="footer_Btn_Section-2">Reduce Spending</a>
                            </div>
                        @endif
                       
                        </h4>
                         
                    </div>
                </div>

                 <div class="col-lg col-sm-6 col-md-4 py-2 md-py-0">
                    <div class="your-goal-section">
                           <h3>Gap </h3>
                           <span class="dotted-border">
                            <img src="{{asset('public/front-assets/img/border.png')}}" class="img-fluid w-100">
                           </span>
                        
                        <h4>R {{$gap}}<span></span></h4>
                    </div>
                </div>
                
            </div>                

            <div class="row mt-5">
                <!-- <p class="w-100 mb-0 pt-3 px-3">Now you have a really good sense of where you spend your money. In the next step we will help you to make room in you monthly spending to support your goal, but before we get there, we want to check in and to see if you still believe your money goal is realistic and achievable?</p> -->


                @if(($actual_spend_sum + $goal_amount) > $your_income)
                <div class="bottom-fix">     
                    <div class="row">
                        <div class="col-md-12">
                            <div class="">

                                @if($gap < ($actual_spend_sum * 10)/100)
                                <p>
                                    In order to support your goal you need to reduce your spending by R {{$gap}}.
                                </p>
                                @else
                                <p>You will need to make some adjustments to support your goal.
                                    You either need to reduce your monthly spending by <b>R {{ strstr(number_format((($actual_spend_sum + $goal_amount) - $your_income),"2",","," "), ',' , true)}}</b>, or if you think this is unrealistic please choose to adjust your goal.
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>      
                @endif 
               

            </div>

             
            
        </div>        
    </div>    
</div>
@php
    ////Check condition (Goal amount + Monthly spend > Total income)////
    if(($actual_spend_sum + $goal_amount) > $your_income){       
        $main = $your_income - ($actual_spend_sum + $goal_amount);
        $text = 'You will need to make some adjustments to support your goal';  
        $class = "negative_response";      
    } else {        
        $main = $your_income - ($actual_spend_sum + $goal_amount);
        //$text = 'Amazing your goal is achievable, lets keep going ';
        //$text = 'Amazing your goal is achievable and you don’t need to adjust your spending to support your goal, lets keep going';
        //$text = 'Amazing your goal is achievable and you have R '.$main.' left over each month. No need to adjust your spending, let’s keep going.';

        $text = 'Amazing your goal is achievable and you have R '.$main.' left over each month. Does this sound right?  If so,do you want to create a new goal or work on one of the others you set? If not, perhaps something went wrong when you captured your actual spend?';
        $class = "positive_response";
    }
@endphp


{{-- Popup Show --}}
@if(($actual_spend_sum + $goal_amount) <= $your_income){ 

<div class="modal fade step6_popup" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
      </div>
      <div class="modal-body step3_popup_body">
            <p class="{{$class}}">R {{$main}}</p>
            <p>{{$text}}</p>
      </div>
      <div class="modal-footer">
       
            <a href="{{route('getstep2', 'increasegoal')}}" class="footer_Btn_Section-1">Increase Goal</a>
            <a href="{{route('getstep4')}}" class="footer_Btn_Section-1">Recapture Spend</a>
            <!-- <a href="{{route('getstep4')}}" class="footer_Btn_Section-2">Recapture Spend</a> -->

            <!-- <a href="{{route('getstep8', 'achievable')}}" class="footer_Btn_Section-1">Ok</a>            
            <button type="button" class="btn alex-popup-btn-second " data-dismiss="modal">Close</button> -->

      </div>
    </div>
  </div>
</div>



    <!-- <div class="modal fade step6_popup" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body step3_popup_body">
            <p class="{{$class}}">R {{$main}}</p>
            <p>{{$text}}</p>
          </div>
          <div class="modal-footer">    

            @if(($actual_spend_sum + $goal_amount) > $your_income)     
                <a href="{{route('getstep2')}}" class="footer_Btn_Section-1">Adjust Goal</a>
                <a href="{{route('getstep7')}}" class="footer_Btn_Section-2">Reduce Spending</a>
            @else
                <a href="{{route('getstep8', 'achievable')}}" class="footer_Btn_Section-1">Ok</a>            
                <button type="button" class="btn alex-popup-btn-second " data-dismiss="modal">Close</button>
            @endif
          </div>
        </div>
      </div>
    </div> -->
@endif

<script type="text/javascript">
    $(window).on('load', function() {
        $('.step6_popup').modal({backdrop: 'static', keyboard: false});
        $('.step6_popup').modal('show');
    });
</script>
@endsection