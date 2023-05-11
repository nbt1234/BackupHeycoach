
@extends('frontend/index')
@section('content')
<style>
    .highlight_goal_amount{
        background: #00a19a;
    }

    .highlight_goal_amount_during_increase{
        background: #00a19a;
    }

</style>
<div class="sing-up">
    <ul class="nav">
        <li class="nav-item">
            <!-- <a class="nav-link active" href="#profile" role="tab" data-toggle="tab">Welcome</a> -->
             <a class="nav-link active" href="{{route('overview')}}">Welcome</a>
        </li>
        <li class="nav-item goals-bg">
            <a class="nav-link" href="#buzz" role="tab" data-toggle="tab">Goals</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#references" role="tab" data-toggle="tab">Know Your Spend</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#Match_Goal" role="tab" data-toggle="tab">Match Goal to Gap</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#Action_Plan" role="tab" data-toggle="tab">Adjust Spending</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#Learn_Action" role="tab" data-toggle="tab">Action Plan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#Learn_Action" role="tab" data-toggle="tab">Goal Tracking</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#Achieve_Goal" role="tab" data-toggle="tab">Achieve Goal</a>
        </li>
    </ul>
    <!-- Tab panes -->

    @php 
    $actual_spend_sum = '';
    $monthly_income = '';
    $goal_amount = '';
    if($step2_pre_filled_data != null && $step2_pre_filled_data->catwise_actual_spend){
        $monthly_income = str_replace(" ", "", $step2_pre_filled_data->earn_after_tax_per_mnth);
        $goal_amount = 'R'.$step2_pre_filled_data->each_month_goal;
        $catwise_actual_spend = $step2_pre_filled_data->catwise_actual_spend;
        $unseri_actual_spend = unserialize($catwise_actual_spend); 

           $arr_actual_spend = array();
            foreach($unseri_actual_spend as $key => $unseri_act_spend){
                $repl_actual_spend = str_replace(" ","",$unseri_act_spend);
                $arr_actual_spend[$key] = $repl_actual_spend;
            } 
            $actual_spend_sum = array_sum($arr_actual_spend);
    @endphp  

    <input  id="monthly_income_step2" type="hidden" value="{{$monthly_income}}">
    <input  id="monthly_spen_step2" type="hidden" value="{{$actual_spend_sum}}">
    <input  id="goal_amount_step2" type="hidden" value="{{$goal_amount}}">

    @php  } @endphp
    


    <div class="tab-content">
        
        <div role="tabpanel" class="tab-pane fade active show" id="buzz">
            <div class="tabs_ineer step2_tab">
                <h2>Well done on choosing your money goal,
                    let's unpack this a little further
                </h2>
                <div class="video-setting mt-5">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-8">
                            <p class="text-white w-100 mb-0 Please-text">
                                Please watch the video on "Setting a smart goal"
                            </p>
                        </div>
                        <div class="col-lg-4 col-md-4">                           
                            <div class="video-box text-right" href="{{asset('public/front-assets/vedio/Setting a smart goal.mp4')}}" data-fancybox data-caption="">
                                <i class="fa fa-play"></i>
                            </div>                           
                        </div>
                    </div>
                </div>
                {{-- dd($selected_cats) --}}
                <form action="{{route('submit_step2')}}" method="post" name="step2_form" class="step2_form" id="step2_form" enctype="multipart/form-data">
                    @csrf

                    <div class="row form-label-text choose_sec mt-3 mt-lg-5">

                        <div class="col-lg-6 my-3 my-lg-2 col-md-6">
                            <!-- <label>Choose your money goal you most want to focus on</label> -->
                            <label>Choose the money goal you most want to focus on</label>

                            <!-- <input type="" name="select_focus_cat" placeholder="Pay of my Debt"> -->

                         
                            <select name="select_focus_cat" class="select_focus_cat step2inputs">         

                                @foreach($selected_cats['choosed_cat'] as $selected_cat)
                                    
                                    <option {{ ($step2_pre_filled_data && $selected_cat == $step2_pre_filled_data->focused_cat) ? 'selected' : ''}} value="{{$selected_cat}}">{{str_replace('_', ' ', ucfirst($selected_cat))}}</option>     

                                @endforeach                                
                            </select>
                        </div>
                        
                        <div class="col-lg-6 my-3 my-lg-2 col-md-6">
                            <label>How much do you want to put towards your goal each month</label>
                            <input type="text" id="{{$step2_pre_filled_data != '' && $step2_pre_filled_data->catwise_actual_spend ? 
                            (str_contains(Request::url(), '/increasegoal') ? 'increase_goal_step2' : 'adjust_goal_step2') : ''}}" name="each_month_goal" class="each_month_goal step2inputs" value="{{ ($step2_pre_filled_data) ? 'R'.$step2_pre_filled_data->each_month_goal : ''}}" data-type="currency"  placeholder="R100">
                        </div>

                        <div class="col-lg-6 my-3 my-lg-2 col-md-6">
                            <label class="d-block">By when would you like to achieve your goal</label>
                            <select name="archive_goal_time" class="archive_goal_time step2inputs">
                                <option {{ ($step2_pre_filled_data && $step2_pre_filled_data->archive_goal_time == '3 month') ? "selected" : ""}} value="3 month">3 months</option>
                                <option {{ ($step2_pre_filled_data && $step2_pre_filled_data->archive_goal_time == '6 month') ? "selected" : ""}} value="6 month">6 months</option>
                                <option {{ ($step2_pre_filled_data && $step2_pre_filled_data->archive_goal_time == '9 month') ? "selected" : ""}} value="9 month">9 months</option>
                                <option {{ ($step2_pre_filled_data && $step2_pre_filled_data->archive_goal_time == '12 month') ? "selected" : ""}} value="12 month">12 months</option>
                            </select>
                        </div>

                    </div>                

                    <div class="row mt-4">

                        <div class="col-lg-8 order-3 order-lg-1">
                            <div class="booking d-flex align-items-center">
                                <!-- <button class="bookin-btn d-flex"><span class="mr-2"><i class="fa fa-calculator"></i></span>Booking</button> -->


                                
                                <!-- <button type="button" class="bookin-btn d-flex"  data-toggle="modal" data-target="#modal-default">Booking</button> -->
                               <!--  <p class="coaching w-100 mb-0 pl-2">
                                    Please join us for a live coaching session. Click here to book your space.
                                </p> -->
                            </div>
                        </div>

                        <div class="col-lg-8 my-3 order-2 order-lg-1">
                            <div class="booking d-flex align-items-center">
                               <!--  <button type="button" class="bookin-btn-1 d-flex " ><span class="mr-2"><i class="fa fa-envelope"></i></span>Email</button> -->

                                <!-- <a href ="mailto: abc@example.com" class="send_email_btnn bookin-btn-1 text-center"><span class="mr-2"><i class="fa fa-envelope"></i></span>Email</a> -->


                                <!-- <p class="coaching w-100 mb-0 pl-2">
                                    We are here to help, please email your coach if you need assistance
                                </p> -->
                            </div>
                        </div>
                        @php                        
                        $userid = Auth::guard('frontuser')->user()->id; 
                        @endphp                        
                        <input type="hidden" name="my_goals_id" value="{{($selected_cats) ? $selected_cats['mygoals_id'] : '';}}">
                        <input type="hidden" name="user_id" value="{{$userid}}">
                        <input type="hidden" name="goal_id" value="{{($step2_pre_filled_data) ? $step2_pre_filled_data['id'] : '';}}">
                        <div class="col-lg-4 text-center text-lg-right order-1 order-lg-2 ">
                            <a class="backbtn" href="{{route('getstep1')}}">Back</a>
                            <button class="next-btn step2">Next</button>
                            <p class="fromvalidation_error"></p>
                            <input type="hidden" name="adjust_goal" value="{{$adjust_goal}}">
                        </div>

                    </div>  

                </form>                              
                
            </div>
        </div>
    </div>
</div>


{{-- User Booking --}}

<div class="modal fade book_slot_model" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Select Booking Slot</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{route('user_book_slot')}}" method="POST" name="slot_booking_form" id="slot_booking_form" class="slot_booking_form">
                    @csrf
                    <div class="card-body">
                        <div class="row">

                            <div class='col-sm-12'>
                                <div class="form-group">
                                    <label for="slot_date">Select Date</label>
                                    <select name="selected_slot" class="slot_date user_choose_slote_date">
                                        <option value="">Select Date</option>
                                        @foreach ($all_slots as $all_slot)                
                                            <option value="{{$all_slot->id}}" data-id="{{$all_slot->id}}" class="slot_id">{{$all_slot->date}}</option>
                                        @endforeach                
                                    </select>
                                </div>
                            </div>
                        
                            <div class='col-sm-6'>
                                <div class="form-group">
                                    <label for="start_time">Start Time:</label>
                                    <div class='input-group date'>
                                        <input type='text' class="form-control" name="start_time" value="" id="start_time">                
                                    </div>
                                </div>
                            </div>
                          
                            <div class='col-sm-6'>
                                <div class="form-group">
                                    <label for="end_time">End Time:</label>
                                    <div class='input-group date'>
                                        <input type='text' class="form-control" id="end_time" value="" name="end_time"/>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Book slot</button>
                    </div>        
                </form>
            </div>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!-- show modal during adjust goal amount -->
    <!-- <div class="modal fade step2_popup" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
          </div>
          <div class="modal-footer"> 
               <button type="button" class="btn alex-popup-btn-second highlight_amount" data-dismiss="modal">Ok</button>
          </div>
        </div>
      </div>
    </div>
     -->

<div class="modal fade step2_popup" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>It seems like you have reduced your goal by too much. Without making any changes to your current spending you are already saving this amount.  We want to help you get the most out of your money, so why not increase your goal amount and change your spending to achieve more.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn alex-popup-btn-second highlight_amount" data-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>




<!-- show modal during adjust goal amount -->
@if (str_contains(Request::url(), '/increasegoal')) 
   <script>
        $('#step2_form').on('submit',function(e){e.preventDefault();});
        var num = $('#increase_goal_step2').val();        
        $('#increase_goal_step2').focus().val('').val(num);  
        $('.highlight_amount').addClass('highlight_amount_focus');
        $('.highlight_amount').removeClass('highlight_amount');
   </script>

@endif


@endsection