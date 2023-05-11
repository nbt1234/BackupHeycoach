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
        <li class="nav-item ">
            <!-- <a class="nav-link" href="#references" role="tab" data-toggle="tab">Know Your Spend</a> -->
            <a class="nav-link" href="{{route('getstep3')}}" >Know Your Spend</a>
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
                  <!--   <p><span class="cusername">Hey {{ucfirst(GetUserinfo($last_goal['user_id'], 'username'))}},</span> your monthly goal is R<span class="cusermonthlygoal">{{$last_goal['each_month_goal']}}</span> and your total income after tax is R<span class="cuserincometax">{{$last_goal['earn_after_tax_per_mnth']}}.</span></p> -->
                <p><span class="cusername">Hey {{ucfirst(GetUserinfo($last_goal['user_id'], 'username'))}},</span> your monthly goal is R<span class="cusermonthlygoal">{{$last_goal['each_month_goal']}}</span> to {{$step4_pre_filled_data ? ucfirst(str_replace('_', ' ',$step4_pre_filled_data->focused_cat)) : ''}} and your total income after tax is R<span class="cuserincometax">{{$last_goal['earn_after_tax_per_mnth']}}.</span></p>
                </div> 
                <h2>What do you actually spend ?</h2>

                <div class="video-setting mt-5">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-8">
                            <p class="text-white w-100 mb-0 Please-text">
                                Please watch the video on "Know your spend"
                            </p>
                        </div>
                        <div class="col-lg-4 col-md-4">                            
                            <div class="video-box text-right" href="{{asset('public/front-assets/vedio/Know your spend.mp4')}}" data-fancybox data-caption="">
                                <i class="fa fa-play"></i>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="months-section">
                   <!--  <p class=" mb-0 pt-3 statements">“Use your last 6 months bank statements to understand where you are actually spending your money. Capture these in the categories below” <a href="{{asset('public/22SevenProcess.docx')}}" download="process.docx"><u>Click here</u></a> to see how to do this.   
 -->
                    <p class=" mb-0 pt-3 statements">
                        Use your last 6 months bank statements to understand where you are actually spending your money.
                    </p>
                    <p class=" mb-0 pt-3 statements">
                        You can use your banking app to categorise your average monthly spend or alternatively the 22seven app. <a href="{{asset('public/22SevenProcess.docx')}}" download="process.docx"><u>Click here</u></a> to see how to do this.
                    </p>
                    <p class=" mb-0 pt-3 statements">
                        Capture your spend in the categories below.
                    </p>

                </div>

                <form action="{{route('submit_step4')}}" method="post" name="step4_form" class="step4_form" id="step4_form" enctype="multipart/form-data">
                @csrf  

                    @if($step4_pre_filled_data)
                        @php
                            $pre_filled_data = unserialize($step4_pre_filled_data->catwise_actual_spend); 
                            //print_r($pre_filled_data);
                        @endphp
                    @endif
                    @php
                    
                    @endphp
                    <div class="row form-label-text choose_sec mt-3 mt-lg-5">                    
                        
                        <div class="col-lg-12">
                            <div class="thought" style="background: transparent;padding: 0px;">

                                <div class="row">

                                    <div class="col-lg-3 col-md-4 col-sm-6 my-2 transport">
                                        <label class="d-block">Transport</label>
                                        <input type="text" name="cats[transport]" class="transport step4_inputs" value="{{ ($pre_filled_data) ? 'R'.$pre_filled_data['transport'] : ''}}" data-type="currency"  placeholder="R100">
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-6 my-2 transport">
                                        <label class="d-block">Food</label>
                                        <input type="text" name="cats[food]" class="food step4_inputs" value="{{ ($pre_filled_data) ? 'R'.$pre_filled_data['food'] : ''}}" data-type="currency"  placeholder="R100">
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-6 my-2 transport">
                                        <label class="d-block">Pets</label>
                                        <input type="text" name="cats[pets]" class="pets step4_inputs" value="{{ ($pre_filled_data) ? 'R'.$pre_filled_data['pets'] : ''}}" data-type="currency"  placeholder="R100">
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-6 my-2 transport">
                                        <label class="d-block">Health</label>
                                        <input type="text" name="cats[health]" class="health step4_inputs" value="{{ ($pre_filled_data) ? 'R'.$pre_filled_data['health'] : ''}}" data-type="currency"  placeholder="R100">                                    
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-6 my-2 transport">
                                        <label class="d-block">Schooling</label>
                                        <input type="" name="cats[schooling]" class="schooling step4_inputs" value="{{ ($pre_filled_data) ? 'R'.$pre_filled_data['schooling'] : ''}}" data-type="currency"  placeholder="R100">                                    
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-6 my-2 transport">
                                        <label class="d-block">Clothes</label>
                                        <input type="" name="cats[clothes]" class="clothes step4_inputs" value="{{ ($pre_filled_data) ? 'R'.$pre_filled_data['clothes'] : ''}}" data-type="currency"  placeholder="R100">
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-6 my-2 transport">
                                        <label class="d-block">Fun</label>
                                        <input type="" name="cats[fun]" class="fun step4_inputs" value="{{ ($pre_filled_data) ? 'R'.$pre_filled_data['fun'] : ''}}" data-type="currency"  placeholder="R100">
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-6 my-2 transport">
                                        <label class="d-block">Saving</label>
                                        <input type="" name="cats[saving]" class="saving step4_inputs" value="{{ ($pre_filled_data) ? 'R'.$pre_filled_data['saving'] : ''}}" data-type="currency"  placeholder="R100">
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-6 my-2 transport">
                                        <label class="d-block">Phone and Data</label>
                                        <input type="" name="cats[phone_and_data]" class="phone_and_data step4_inputs" value="{{ ($pre_filled_data) ? 'R'.$pre_filled_data['phone_and_data'] : ''}}" data-type="currency"  placeholder="R100">                                    
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-6 my-3 transport">
                                        <label class="d-block">Housing</label>
                                        <input type="text" name="cats[housing]" class="housing step4_inputs" value="{{ ($pre_filled_data) ? 'R'.$pre_filled_data['housing'] : ''}}" data-type="currency"  placeholder="R100">
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-6 my-2 transport">
                                        <label class="d-block">Other</label>
                                        <input type="" name="cats[other]" class="other step4_inputs" value="{{ ($pre_filled_data) ? 'R'.$pre_filled_data['other'] : ''}}" data-type="currency"  placeholder="R100">
                                    </div>                                
                                    
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="row mt-4">

                        <div class="col-lg-8 order-3 order-lg-1">
                            <div class="booking d-flex align-items-center">
                                <!-- <button class="bookin-btn d-flex"><span class="mr-2"><i class="fa fa-calculator"></i></span>Booking</button> -->

                                <!-- <button type="button" class="bookin-btn d-flex"  data-toggle="modal" data-target="#modal-default">Help</button>
                                <p class="coaching w-100 mb-0 pl-2">
                                    Please join us for a live coaching session. Click here to book your space.
                                </p> -->
                            </div>
                        </div>

                        <div class="col-lg-8 my-3 order-2 order-lg-1">
                            <div class="booking d-flex align-items-center">
                                <!-- <button class="bookin-btn-1 d-flex mt-3 mt-md-0"><span class="mr-2"><i class="fa fa-envelope"></i></span>Email</button> -->
                                <!-- <a href ="mailto: abc@example.com" class="send_email_btnn bookin-btn-1 text-center"><span class="mr-2"><i class="fa fa-envelope"></i></span>Email</a>
                                <p class="coaching w-100 mb-0 pl-2">
                                    We are here to help, please email your coach if you need assistance
                                </p> -->
                            </div>
                        </div>

                        @php
                            $serialized_arr = $step4_pre_filled_data->catwise_spend;
                            $unserialized_arr = unserialize($serialized_arr);
                            //print_r($unserialized_arr);
                        @endphp
                        <input type="hidden" class="prev_step_spends transport" value="{{str_replace(' ','',$unserialized_arr['transport']);}}">
                        <input type="hidden" class="prev_step_spends food" value="{{str_replace(' ','',$unserialized_arr['food'])}}">
                        <input type="hidden" class="prev_step_spends pets" value="{{str_replace(' ','',$unserialized_arr['pets'])}}">
                        <input type="hidden" class="prev_step_spends health" value="{{str_replace(' ','',$unserialized_arr['health'])}}">
                        <input type="hidden" class="prev_step_spends schooling" value="{{str_replace(' ','',$unserialized_arr['schooling'])}}">
                        <input type="hidden" class="prev_step_spends clothes" value="{{str_replace(' ','',$unserialized_arr['clothes'])}}">
                        <input type="hidden" class="prev_step_spends fun" value="{{str_replace(' ','',$unserialized_arr['fun'])}}">
                        <input type="hidden" class="prev_step_spends saving" value="{{str_replace(' ','',$unserialized_arr['saving'])}}">
                        <input type="hidden" class="prev_step_spends phone_and_data" value="{{str_replace(' ','',$unserialized_arr['phone_and_data'])}}">
                        <input type="hidden" class="prev_step_spends housing" value="{{str_replace(' ','',$unserialized_arr['housing'])}}">
                        <input type="hidden" class="prev_step_spends other" value="{{str_replace(' ','',$unserialized_arr['other'])}}">

                        @php                        
                            $userid = Auth::guard('frontuser')->user()->id; 
                        @endphp

                        <input type="hidden" name="my_goals_id" value="{{($last_goal) ? $last_goal['mygoals_id'] : '';}}">
                        <input type="hidden" name="user_id" value="{{$userid}}">
                        <input type="hidden" name="current_focus_goal" value="{{($last_goal) ? $last_goal['current_focus_goal'] : '';}}">

                        <div class="col-lg-4 text-center text-lg-right order-1 order-lg-2">   
                            <a class="backbtn" href="{{route('getstep3')}}">Back</a>                                                
                            <button class="next-btn step4">Next</button>
                            <p class="fromvalidation_error"></p>
                        </div>
                    </div>
                </form>


                
                
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="references">ccc</div>
    </div>
</div>



{{-- User Booking --}}

<!-- <div class="modal fade book_slot_model" id="modal-default">
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
 
    </div>

</div> -->


@endsection