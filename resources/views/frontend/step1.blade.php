@extends('frontend/index')
@section('content')

<div class="sing-up">

    @php                        
        $userid = Auth::guard('frontuser')->user()->id; 
    @endphp

    <ul class="nav  justify-content-between">
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

    <div role="tabpanel" class="tab-pane fade in active show" id="profile">
        <div class="tabs_ineer step1_tab">
            <h2>Hey {{ucfirst(GetUserinfo($userid, 'username'))}}</h2>
            <p class="lg-pt-3">It's time to set some goals so you know what you're working towards.
                What goals would you like to focus on (choose one or more)?
            </p>

            <form action="{{route('submit_step1')}}" method="post" name="step1_form" class="step1_form" id="step1_form" enctype="multipart/form-data">
                @csrf
                    @php
                        //print_r($get_goals);
                    @endphp
               
                <div class="row mt-5">
                    <div class="col-lg-3 col-sm-6 my-3 section-padding-custome">
                        <div class="Pay_Of">
                            <img src="{{asset('public/front-assets/img/pay.JPG')}}">
                        </div>
                        <label class="form-check-label  pt-2 payment-method">
                            <input type="checkbox" name="cats[]" value="pay_off_my_debt" class="form-check-input" {{($get_goals && in_array('pay_off_my_debt', $get_goals['mygoal_cat'])) ? 'checked' : '';}}>Pay off my debt
                        </label>
                    </div>
                    <div class="col-lg-3 col-sm-6 my-3 section-padding-custome">
                        <div class="Pay_Of">
                            <img src="{{asset('public/front-assets/img/pay-5.JPG')}}">
                        </div>
                        <label class="form-check-label  pt-2 payment-method">
                            <input type="checkbox" name="cats[]" value="make_my_money_last_longer_than_my_month" class="form-check-input" {{($get_goals && in_array('make_my_money_last_longer_than_my_month', $get_goals['mygoal_cat'])) ? 'checked' : '';}}>Make my money
                            last longer than
                            my month
                        </label>
                    </div>
                    <!-- <div class="col-lg-3 col-sm-6 my-3 section-padding-custome">
                        <div class="Pay_Of">
                            <img src="{{asset('public/front-assets/img/pay-2.png')}}">
                        </div>
                        <label class="form-check-label  pt-2 payment-method">
                            <input type="checkbox" name="cats[]" value="help,_i_am_broke" class="form-check-input" {{($get_goals && in_array('help,_i_am_broke', $get_goals['mygoal_cat'])) ? 'checked' : '';}}>Help, I am broke
                        </label>
                    </div> -->
                    <div class="col-lg-3 col-sm-6 my-3 section-padding-custome">
                        <div class="Pay_Of">
                            <img src="{{asset('public/front-assets/img/pay-3.png')}}">
                        </div>
                        <label class="form-check-label  pt-2 payment-method">
                            <input type="checkbox" name="cats[]" value="save_for_my_retirement" class="form-check-input" {{($get_goals && in_array('save_for_my_retirement', $get_goals['mygoal_cat'])) ? 'checked' : '';}}>Save for my
                            retirement
                        </label>
                    </div>
                    <div class="col-lg-3 col-sm-6 my-3 section-padding-custome">
                        <div class="Pay_Of">
                            <img src="{{asset('public/front-assets/img/pay-4.png')}}">
                        </div>
                        <label class="form-check-label  pt-2 payment-method">
                            <input type="checkbox" name="cats[]" value="save_for_my_kids_education" class="form-check-input" {{($get_goals && in_array('save_for_my_kids_education', $get_goals['mygoal_cat'])) ? 'checked' : '';}}>Save for my kids
                            education
                        </label>
                    </div>
                    <div class="col-lg-3 col-sm-6 my-3 section-padding-custome">
                        <div class="Pay_Of">
                            <img src="{{asset('public/front-assets/img/pay-4.JPG')}}">
                        </div>
                        <label class="form-check-label  pt-2 payment-method">
                            <input type="checkbox" name="cats[]" value="saving_for_big_purchase_or_holiday" class="form-check-input" {{($get_goals && in_array('saving_for_big_purchase_or_holiday', $get_goals['mygoal_cat'])) ? 'checked' : '';}}>Saving for big
                            purchase or
                            holiday
                        </label>
                    </div>
                    <div class="col-lg-3 col-sm-6 my-3 section-padding-custome">
                        <div class="Pay_Of">
                            <img src="{{asset('public/front-assets/img/pay-6.png')}}">
                        </div>
                        <label class="form-check-label  pt-2 payment-method">
                            <input type="checkbox" name="cats[]" value="other" class="form-check-input other_checkbox" {{($get_goals && in_array('other', $get_goals['mygoal_cat'])) ? 'checked' : '';}}>Other
                        </label>
                    </div>
                    @php
                    if($get_goals && in_array('other', $get_goals['mygoal_cat'])){
                        $show_Class = "display: block";
                    } else {
                        $show_Class = "display: none";
                    }
                    //print_r($get_goals['mygoal_cat']);
                    //echo $get_goals['mygoal_cat']['other'];
                    @endphp

                    <div class="col-lg-3 col-sm-6 my-3 section-padding-custome other_textare_show" style="{{$show_Class}}">
                        <textarea name="cats[other]" class="other_text" id="other_text_id" placeholder="Give your goal a better name than Other here">{{($get_goals && in_array('other', $get_goals['mygoal_cat'])) ? $get_goals['mygoal_cat']['other'] : '';}}</textarea>
                    </div>
                    
                    <div class="col-lg-12 text-right">
                        <input type="hidden" name="user_id" value="{{$userid}}">
                        <input type="hidden" name="my_goals_id" value="{{($get_goals) ? $get_goals['goal_id'] : '';}}">
                        <button class="next-btn step1">Next</button>
                        <p class="fromvalidation_error"></p>
                    </div>
                </div>

            </form>
        </div>
        
    </div>
    
</div>

@endsection