@extends('frontend/index')
@section('content')

<div class="sing-up">
    <ul class="nav">
        <li class="nav-item">
            <!-- <a class="nav-link active" href="#profile" role="tab" data-toggle="tab">Welcome</a> -->
            <a class="nav-link active" href="{{route('overview')}}">Welcome</a>
        </li>
        <li class="nav-item">
            <!-- <a class="nav-link" href="#buzz" role="tab" data-toggle="tab">Goals</a> -->
            <a class="nav-link" href="{{route('getstep2')}}">Goals</a>
        </li>
        <li class="nav-item your-spend-bg">
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
    <div class="tab-content">
        
        <div role="tabpanel" class="tab-pane fade active show" id="buzz">

            <div class="tabs_ineer">
                <div class="User_Details_TopBar">
                    <p><span class="cusername">Hey {{ucfirst(GetUserinfo($last_goal['user_id'], 'username'))}},</span> your monthly goal is R<span class="cusermonthlygoal">{{$last_goal['each_month_goal']}}</span></p>
                </div>
                <h2>Do you know where your money is going today?</h2>
                <p class="d-block working">How is it working for you?</p>


                <h6 class="enter-amount pt-0 pt-lg-3">Please enter the amount you think that you spend each month for each of the categories below.</h6>
                
                <form action="{{route('submit_step3')}}" method="post" name="step3_form" class="step3_form" id="step3_form" enctype="multipart/form-data">
                @csrf                

                @php 
                    if($step3_pre_filled_data) {                   
                        
                            $pre_filled_data = unserialize($step3_pre_filled_data->catwise_spend); 
                            //print_r($pre_filled_data);                                             
                    }

                    //$month = explode(" ",$step3_pre_filled_data->archive_goal_time);
                    //print_r($month[0]);   
                    $month = explode(" ",$last_goal['archive_goal_time']);
                    
                @endphp                
                                

                    <div class="row form-label-text choose_sec mt-3 mt-lg-5">
                        
                        
                        <div class="col-lg-12">
                            <div class="thought" style="background: transparent;padding: 0px;">

                                

                                <div class="row">

                                    <div class="col-lg-3 col-md-4 col-sm-6 my-3 transport">
                                        <label class="d-block">Transport<span class="transport-icon">
                                            <img src="{{asset('public/front-assets/img/icon_img.png')}}" class="ml-1"></span>
                                            <div class="hover_popup">
                                                <div class="toltip"></div>
                                                <p class="text-white w-100 mb-0">
                                                    Input, in the expense buckets below, what you think you are spending on each bucket every month.
                                                </p>
                                            </div>
                                        </label>
                                        <input type="text" name="cats[transport]" class="transport step3_inputs step3_cats_inputs" value="{{ ($step3_pre_filled_data) ? 'R'.$pre_filled_data['transport'] : ''}}" data-type="currency"  placeholder="R100">        
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-6 my-3 transport">
                                        <label class="d-block">Food</label>
                                        <input type="text" name="cats[food]" class="food step3_inputs step3_cats_inputs" value="{{ ($step3_pre_filled_data) ? 'R'.$pre_filled_data['food'] : ''}}" data-type="currency" placeholder="R100">
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-6 my-3 transport">
                                        <label class="d-block">Pets</label>
                                        <input type="text" name="cats[pets]" class="pets step3_inputs step3_cats_inputs" value="{{ ($step3_pre_filled_data) ? 'R'.$pre_filled_data['pets'] : ''}}" data-type="currency" placeholder="R100">
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-6 my-3 transport">
                                        <label class="d-block">Health</label>
                                        <input type="text" name="cats[health]" class="health step3_inputs step3_cats_inputs" value="{{ ($step3_pre_filled_data) ? 'R'.$pre_filled_data['health'] : ''}}" data-type="currency" placeholder="R100">
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-6 my-3 transport">
                                        <label class="d-block">Schooling</label>
                                        <input type="text" name="cats[schooling]" class="schooling step3_inputs step3_cats_inputs" value="{{ ($step3_pre_filled_data) ? 'R'.$pre_filled_data['schooling'] : ''}}" data-type="currency" placeholder="R100">
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-6 my-3 transport">
                                        <label class="d-block">Clothes</label>
                                        <input type="text" name="cats[clothes]" class="clothes step3_inputs step3_cats_inputs" value="{{ ($step3_pre_filled_data) ? 'R'.$pre_filled_data['clothes'] : ''}}" data-type="currency"  placeholder="R100">
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-6 my-3 transport">
                                        <label class="d-block">Fun</label>
                                        <input type="" name="cats[fun]" class="fun step3_inputs step3_cats_inputs" value="{{ ($step3_pre_filled_data) ? 'R'.$pre_filled_data['fun'] : ''}}" data-type="currency"  placeholder="R100">
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-6 my-3 transport">
                                        <label class="d-block">Saving</label>
                                        <input type="text" name="cats[saving]" class="saving step3_inputs step3_cats_inputs" value="{{ ($step3_pre_filled_data) ? 'R'.$pre_filled_data['saving'] : ''}}" data-type="currency"  placeholder="R100">
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-6 my-3 transport">
                                        <label class="d-block">Phone and Data</label>
                                        <input type="text" name="cats[phone_and_data]" class="phone_and_data step3_inputs step3_cats_inputs" value="{{ ($step3_pre_filled_data) ? 'R'.$pre_filled_data['phone_and_data'] : ''}}" data-type="currency"  placeholder="R100">
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-6 my-3 transport">
                                        <label class="d-block">Housing</label>
                                        <input type="text" name="cats[housing]" class="housing step3_inputs step3_cats_inputs" value="{{ ($step3_pre_filled_data) ? 'R'.$pre_filled_data['housing'] : ''}}" data-type="currency"  placeholder="R100">
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-6 my-3 transport">
                                        <label class="d-block">Other</label>
                                        <input type="text" name="cats[other]" class="other step3_inputs" value="{{ ($step3_pre_filled_data) ? 'R'.$pre_filled_data['other'] : ''}}" data-type="currency"  placeholder="R100">
                                    </div>                                                
                                    
                                </div>

                                <div class="row form-label-text think choose_sec mt-3 mt-lg-4 ">

                                    <div class="col-lg-12 my-3 my-lg-2 col-md-6">
                                        <label class="d-block">I think I</label>
                                        <select name="i_think_i" class="i_think_i step3_inputs" id="i_think_i">
                                            <option value="">---Please Select---</option>
                                            <option {{ ($step3_pre_filled_data && $step3_pre_filled_data['spend_think'] == 'spend_more_than_i_earn') ? "selected" : ""}} value="spend_more_than_i_earn">Spend more than I earn</option>
                                            <option {{ ($step3_pre_filled_data && $step3_pre_filled_data['spend_think'] == 'spend_what_i_earn') ? "selected" : ""}} value="spend_what_i_earn">Spend what I earn</option>                                           
                                            <option {{ ($step3_pre_filled_data && $step3_pre_filled_data['spend_think'] == 'spend_less_than_i_earn') ? "selected" : ""}} value="spend_less_than_i_earn">Spend less than I earn</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 my-3 my-lg-2 col-md-6">
                                        <label>What do I earn after tax each month</label>
                                        <input type="text" name="earn_after_tax_per_month" class="earn_after_tax_per_month step3_inputs" value="{{ ($step3_pre_filled_data) ? 'R'.$step3_pre_filled_data['earn_after_tax_per_mnth'] : ''}}" data-type="currency"  placeholder="R100">
                                    </div>

                                    <!-- <div class="col-lg-6 my-3 my-lg-2 col-md-6">
                                        <label>How much can I set aside each month to achieve my goals</label>
                                        <input type="text" name="per_mnth_amnt_to_achieve_goal" class="per_mnth_amnt_to_achieve_goal step3_inputs" value="{{ ($step3_pre_filled_data) ? $step3_pre_filled_data['per_mnth_amnt_to_achieve_goal'] : ''}}">
                                    </div> -->

                                </div>

                                

                            </div>
                        </div>

                    </div>

                    <div class="row mt-5">

                        <div class="col-lg-8 order-3 order-lg-1">
                            <div class="booking d-flex align-items-center">
                                <!-- <button class="bookin-btn d-flex"><span class="mr-2"><i class="fa fa-calculator"></i></span>Booking</button> -->


                                <!-- <button type="button" class="bookin-btn d-flex"  data-toggle="modal" data-target="#modal-default">Booking</button>
                                <p class="coaching w-100 mb-0 pl-2">
                                    Please join us for a live coaching session. Click here to book your space.
                                </p> -->
                            </div>
                        </div>

                        <div class="col-lg-8 my-3 order-2 order-lg-1">
                            <div class="booking d-flex align-items-center">
                                <!-- <button class="bookin-btn-1 d-flex mt-3 mt-md-0"><span class="mr-2"><i class="fa fa-envelope"></i></span>Email</button> -->

                               <!--  <a href ="mailto: abc@example.com" class="send_email_btnn bookin-btn-1 text-center"><span class="mr-2"><i class="fa fa-envelope"></i></span>Email</a>
                                <p class="coaching w-100 mb-0 pl-2">
                                    We are here to help, please email your coach if you need assistance
                                </p> -->
                            </div>
                        </div>

                        @php                        
                        $userid = Auth::guard('frontuser')->user()->id; 
                        @endphp
                        <input type="hidden" name="my_goals_id" value="{{($last_goal) ? $last_goal['mygoals_id'] : '';}}">
                        <input type="hidden" name="user_id" value="{{$userid}}">
                        <input type="hidden" name="current_focus_goal" value="{{($last_goal) ? $last_goal['current_focus_goal'] : '';}}">
                        @php
                        if($step3_pre_filled_data) {    
                            $filled_data = unserialize($step3_pre_filled_data->catwise_spend); 
                            //print_r($filled_data); 
                            //$new_array = array_pop($filled_data); 
                            
                        }
                        @endphp
                        <input type="hidden" name="think_of_spend_total" value="{{ ($step3_pre_filled_data) ? array_sum($filled_data) : 0}}" class="think_of_spend_total">
                        <input type="hidden" id="current_goal_name" value="{{ucfirst(str_replace('_', ' ',$last_goal['focused_cat']))}}">
                        <input type="hidden" name="actual_goal_amount" value="{{str_replace(' ','',$last_goal['each_month_goal']);}}" class="actual_goal_amount">

                        <div class="col-lg-4 text-center text-lg-right order-1 order-lg-2">
                            <a class="backbtn" href="{{route('getstep2')}}">Back</a>
                            <button class="next-btn step3">Next</button>
                            <p class="fromvalidation_error"></p>
                        </div>
                    
                    </div>

                </form>                               
                
            </div>

        </div>
        
    </div>
</div>



<!-- <div class="modal fade step3_popup" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">              
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body step3_popup_body">
                
            </div>
        </div>     
    </div>    
</div> -->

{{-- Validation Popup --}}
<div class="modal step3_popup" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title">Modal title</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body step3_popup_body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn alex-popup-btn-first  step3_popup_submit">OK</button>
        <button type="button" class="btn alex-popup-btn-second " data-dismiss="modal">Close</button>
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

@endsection