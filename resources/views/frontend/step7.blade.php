@extends('frontend/index')
@section('content')
<style>
.actually-transport p:after{
display: none;
}
.actually-transport p {
display: flex;
justify-content: space-between;
}
.actually-transport p img {
cursor: pointer;
}
.bl [data-title] {
position: relative;
cursor: pointer;
}
.bl [data-title]:hover::before {
content: attr(data-title);
position: absolute;
width:120px;
height:auto;
padding:10px;
border-radius:20px;
top: 50px;
display: inline-block;
padding: 3px 6px;
border-radius: 2px;
background: green;
color: #fff;
font-size: 12px;
font-family: sans-serif;
}
.bl [data-title]:hover::after {
content: '';
position: absolute;
bottom: -10px;
left: 8px;
display: inline-block;
color: #fff;
border: 8px solid transparent;
border-bottom: 8px solid green;
}
</style>
<div class="sing-up">
    <style>
    /*.show_saving_tips_text{
    position: fixed;
    left: 30%;
    top: 50%;
    width: auto;
    z-index: 9;
    display: none;
    background: #00a19a;
    cursor: pointer;
    color:white;
    padding: auto;
    }
    .show_saving_tips_text_div{
    padding: 10%;
    }
    */
    .popup-on-hover .img{
    position: relative;
    z-index: 99;
    /*         cursor: pointer;*/
    }
    .popup-on-hover .img:hover .hello {
    display: block!important;
    }
    .popup-on-hover {
    background: #00a19a;
    padding: 20px 22px;
    color: #fff;
    font-size: 18px;
    align-items: center;
    display: flex;
    height: 68px;
    justify-content: space-between;
    }
    .popup-on-hover .hello {
    position: absolute;
    height: auto;
    width: 800px;
    z-index: 2;
    padding-left: 45px;
    left: 0px;
    top: 0;
    }
    .popup-on-hover .hello span {
    background: #00a19a;
    font-size: 14px;
    line-height: 20px;
    border-radius: 20px;
    display: block;
    padding: 30px;
    width: 100%;
    text-align: justify;
    }
    .popup-on-hover .hello li{
    margin: 10px 0;
    }
    .popup-on-hover .hello ol{
    margin-left: 50px;
    margin-top: 20px;
    }
    .bottom .popup-on-hover .hello{
    bottom: 0px!important;
    top: auto;
    }
    </style>
    <div class="show_saving_tips_text">
        <div class="show_saving_tips_text_div">
        </div>
    </div>
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
        <li class="nav-item action-plan-bg">
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
        <div class="tabs_ineer">
            <h2 class="monthly_heding">We now need to make space in your monthly spending to achieve your goals.
            </h2>
            <div class="video-setting mt-5">
                <div class="row align-items-center">
                    <div class="col-lg-10 col-md-8">
                        <p class="text-white w-100 mb-0 Please-text">
                            “Please watch the video which explains making room in your spending to support your goal”
                        </p>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <div class="video-box text-right" href="{{asset('public/front-assets/vedio/Set your action plan.mp4')}}" data-fancybox data-caption="">
                            <i class="fa fa-play"></i>
                        </div>
                    </div>
                </div>
            </div>
            @php
            //dd($focused_goal);
            $actual_spends = unserialize($focused_goal->catwise_actual_spend);
            //$actuarl_Arr = array_pop($actual_spends);
            //print_r($actual_spends);
            $each_month_goal = $focused_goal->each_month_goal;
            $archive_goal_time = $focused_goal->archive_goal_time;
            $month = explode(" ",$archive_goal_time);
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
            $earn_after_tax_per_mnth = str_replace(' ', '', $focused_goal->earn_after_tax_per_mnth);      //Your Income
            //$remaining_amount = $goal_amount - ($earn_after_tax_per_mnth - $monthly_spend);
            $remaining_amount = $earn_after_tax_per_mnth - $monthly_spend;
            //echo $earn_after_tax_per_mnth."<br>";
            //echo $monthly_spend;
            @endphp
            <p class="Adjust_spending_paragraph w-100">Using the table below capture where you think you can make the savings required to meet your goal.  You will need to save a total of R{{ strstr(number_format(($goal_amount - $remaining_amount),"2",","," "), ',' , true)}} per month.
                <!-- You have R {{$earn_after_tax_per_mnth - $monthly_spend}} left over each month. Your goal is R {{$goal_amount}}. You will need to move R {{$goal_amount - $remaining_amount}} from your Actual Spend column into you Achieve Goal column in the table below to move to the next step. --></p>
                <div class="main-table-bl">
                    <div class="row mt-3 mt-lg-5  table-bl align-items-center">
                        <div class="col-lg-4   actual-spend">
                            <h3>Savings Categories</h3>
                        </div>
                        <div class="col-lg-4 col-12    actual-spend">
                            <h3>My Actual Spend</h3>
                        </div>
                        <div class="col-lg-4 col-12   actual-spend actual-spend-2">
                            <h3>My Adjusted Spend</h3>
                        </div>
                        <div class="col-lg-4 col-12   actual-spend actual-spend-2">
                            <h3>My Saving</h3>
                        </div>
                        <div class="col-lg-4 col-12   actual-spend actual-spend-2">
                            <h3>Action Notes (i)</h3>
                        </div>
                    </div>
                    
                    <div class="row table-bl">
                        <!-----Transport---->
                        <div class="col-lg-4 col-12  actually-transport ">
                            <div class="mb-0 popup-on-hover">Transport
                                <div class="img">
                                    <img class="text_show_in_popup" src='https://urlsdemo.xyz/heycoachnew/public/front-assets/img/actual.png'>
                                    <div class="hello" style="display: none;">
                                        <span> <strong>Owning a car can be heavy on your pocket from repayments, to maintenance, to insurance and increasing fuel costs, the lists go on and the costs go up. Here are a few ideas that could help you reduce your costs.</strong>
                                            <ol type="a">
                                                <li>  Use public transportation. Public transportation saves you money on fuel, parking, car maintenance, and more.</li>
                                                <li>  Carpool. Recruit some co-workers and try carpooling. If you drive the average commute (25km’s one way), splitting the cost of fuel with even one additional passenger can save you more than R10,000 per year.</li>
                                                <li>Rent or car share. If you need a car to get around but won't drive it every day, consider renting or signing up for a car share network. You'll still have access to a vehicle but you'll pay only when you need it. And you'll avoid maintenance and repair costs.</li>
                                                <li> Limit your financing. The more financing you need, the more interest you'll pay. And since a car is not an investment that appreciates in value, you never want to pay more than it's worth.</li>
                                                <li> Compare insurance costs. Prices vary, so shop around. Some insurance companies offer discounted rates if you have a good credit rating, if you're a safe driver, if your mileage is low, and more… be sure to ask.</li>
                                                <li>Don't speed. Speeding decreases the fuel economy of your car, meaning you'll get fewer km’s to the litre the faster you drive. Keep money in your pocket and drive within the speed limit.</li>
                                                <li> Take care of your car. Keeping your tyres full of air, getting regular oil checks, and other basic car maintenance helps your car run more efficiently and, therefore, more affordably. Plus, a well-maintained vehicle has a better resale value.</li>
                                                <li> Skip the carwash. By the time you leave a carwash, you may have drained your bank account by more than R70.</li>
                                            </ol>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12  actually-transport-2">
                            <p class="w-100 mb-0">R <span class="actual_spend_amount step7_inputs" achieve_cat="transport" name="saving_category_name">{{str_replace(" ","",$actual_spends['transport'])}}</span></p>
                        </div>
                        <div class="col-lg-4 col-12  actually-transport-3 My_Adjusted_Spend">
                            <p class="w-100 mb-0"><input type="text" name="achieve_goal_amount" data-type="currency" class="achieve_goal_amount step7_inputs" achieve_cat="transport"></p>
                        </div>
                        <div class="col-lg-4 col-12   actually-transport-3 My_Saving">
                            <p class="w-100 mb-0"><input type="text" name="saving_spend_amount" data-type="currency" class="saving_spend_amount step7_inputs" achieve_cat="transport" readonly></p>
                        </div>
                        <div class="col-lg-4 col-12  actually-transport-3 Action_Notes">
                            <p class="w-100 mb-0"><textarea name="action_note" class="action_note step7_inputs" achieve_cat="transport"></textarea></p>
                        </div>
                    </div>
                    <div class="row table-bl">
                        <!-----Health---->
                        <div class="col-lg-4 col-12  actually-transport">
                            <div class="mb-0 popup-on-hover">Health
                                <div class="img">
                                    <img class="text_show_in_popup" src='https://urlsdemo.xyz/heycoachnew/public/front-assets/img/actual.png'>
                                    <div class="hello" style="display: none;">
                                        <span>
                                            <ol type="a">
                                                <li>
                                                    To keep your health care costs low, stay active and physically fit. And you don't need to spend money at a gym to start your day with a few sit-ups and push-ups, followed by a walk or a run.
                                                </li>
                                                <li>
                                                    Eat well. Good nutrition equals good health. And good health is great for the budget.
                                                </li>
                                                <li>
                                                    If you smoke, stop. You'll not only save your cash, you'll save your lungs.
                                                </li>
                                                <li>
                                                    Lose weight. Maintaining a healthy weight can reduce your grocery costs, your health care costs, and possibly even your life insurance!
                                                </li>
                                                <li>
                                                    If you require medication, buy generic.
                                                </li>
                                            </ol>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12 actually-transport-2">
                            <p class="w-100 mb-0">R <span class="actual_spend_amount step7_inputs" achieve_cat="health" name="saving_category_name">{{str_replace(" ","",$actual_spends['health'])}}</span></p>
                        </div>
                        <div class="col-lg-4 col-12  actually-transport-3 My_Adjusted_Spend">
                            <p class="w-100 mb-0"><input type="text" name="achieve_goal_amount" data-type="currency" class="achieve_goal_amount step7_inputs" achieve_cat="health"></p>
                        </div>
                        <div class="col-lg-4 col-12  actually-transport-3 My_Saving">
                            <p class="w-100 mb-0"><input type="text" name="saving_spend_amount" data-type="currency" class="saving_spend_amount step7_inputs" achieve_cat="health" readonly></p>
                        </div>
                        <div class="col-lg-4 col-12  actually-transport-3 Action_Notes">
                            <p class="w-100 mb-0"><textarea name="action_note" class="action_note step7_inputs" achieve_cat="health"></textarea></p>
                        </div>
                    </div>
                    <div class="row table-bl">
                        <!-----Clothes---->
                        <div class="col-lg-4 col-12 actually-transport">
                            <div class="mb-0 popup-on-hover">Clothes
                                <div class="img">
                                    <img class="text_show_in_popup" src='https://urlsdemo.xyz/heycoachnew/public/front-assets/img/actual.png'>
                                    
                                    <div class="hello" style="display: none;">
                                        <span>
                                            <ol type="a">
                                                <li>
                                                    Buy used… many communities have upscale consignment shops that sell gently worn garments. You are sure to find something stylish!
                                                </li>
                                                <li>
                                                    Start a clothing exchange. Most people wear only 25% of the clothes in their closet on a regular basis, so call up some friends who are the same size and swap.
                                                </li>
                                                <li>
                                                    Shop end of season or off season. A winter coat will cost you much less when the temperatures outside are soaring.
                                                </li>
                                                <li>
                                                    Take care of your clothes to make them last longer. Read the labels and launder appropriately.
                                                </li>
                                                <li>
                                                    Learn to sew. Fixing the wears and tears in your wardrobe is much less expensive than replacing it.
                                                </li>
                                            </ol>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12  actually-transport-2">
                            <p class="w-100 mb-0">R <span class="actual_spend_amount step7_inputs" achieve_cat="clothes" name="saving_category_name">{{str_replace(" ","",$actual_spends['clothes'])}}</span></p>
                        </div>
                        <div class="col-lg-4 col-12  actually-transport-3  My_Adjusted_Spend">
                            <p class="w-100 mb-0"><input type="text" name="achieve_goal_amount" data-type="currency" class="achieve_goal_amount step7_inputs" achieve_cat="clothes"></p>
                        </div>
                        <div class="col-lg-4 col-12  actually-transport-3 My_Saving">
                            <p class="w-100 mb-0"><input type="text" name="saving_spend_amount" data-type="currency" class="saving_spend_amount step7_inputs" achieve_cat="clothes" readonly></p>
                        </div>
                        <div class="col-lg-4 col-12  actually-transport-3 Action_Notes">
                            <p class="w-100 mb-0"><textarea name="action_note" class="action_note step7_inputs" achieve_cat="clothes"></textarea></p>
                        </div>
                    </div>
                    <div class="row table-bl">
                        <!-----Saving---->
                        <div class="col-lg-4 col-12  actually-transport">
                            <div class="mb-0 popup-on-hover">Saving
                                <div class="img">
                                    <img class="text_show_in_popup" src='https://urlsdemo.xyz/heycoachnew/public/front-assets/img/actual.png'>
                                    <div class="hello" style="display: none;">
                                        <span>
                                            <ol type="a">
                                                <li>
                                                    Pay yourself first by putting a portion of your salary into an investment on the day you are paid. If you never see the money, you won’t miss it!
                                                </li>
                                                <li>
                                                    Create an emergency fund of at least 3 – 6 months if living expenses. In the event that you have unforeseen costs you can use your emergency fund as opposed to using expensive credit.
                                                </li>
                                            </ol>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12 actually-transport-2">
                            <p class="w-100 mb-0">R <span class="actual_spend_amount step7_inputs" achieve_cat="saving" name="saving_category_name">{{str_replace(" ","",$actual_spends['saving'])}}</span></p>
                        </div>
                        <div class="col-lg-4 col-12  actually-transport-3 My_Adjusted_Spend">
                            <p class="w-100 mb-0"><input type="text" name="achieve_goal_amount" data-type="currency" class="achieve_goal_amount step7_inputs" achieve_cat="saving"></p>
                        </div>
                        <div class="col-lg-4 col-12  actually-transport-3 My_Saving">
                            <p class="w-100 mb-0"><input type="text" name="saving_spend_amount" data-type="currency" class="saving_spend_amount step7_inputs" achieve_cat="saving" readonly></p>
                        </div>
                        <div class="col-lg-4 col-12  actually-transport-3 Action_Notes">
                            <p class="w-100 mb-0"><textarea name="action_note" class="action_note step7_inputs" achieve_cat="saving"></textarea></p>
                        </div>
                    </div>
                    <div class="row table-bl">
                        <!------Food----->
                        <div class="col-lg-4 col-12 actually-transport">
                            <div class="mb-0 popup-on-hover">Food
                                <div class="img">
                                    <img class="text_show_in_popup" src='https://urlsdemo.xyz/heycoachnew/public/front-assets/img/actual.png'>
                                    <div class="hello" style="display: none;">
                                        <span>
                                            <strong>
                                            If you're spending more than 14% of your take-home pay on food, try to cut back. It's easy to fill your belly without breaking the budget
                                            </strong>
                                            <ol type="a">
                                                <li>
                                                    Make a grocery list. Having a list will help prevent impulse buying, and you'll purchase only what you need.
                                                </li>
                                                <li>
                                                    Get a store loyalty card. These free reward cards entitle you to store discounts and rebates just for signing up. The more you shop at the same grocery store, the more you can earn back a portion of what you spend.
                                                </li>
                                                <li>
                                                    Buy in bulk. Don't need so much? Buy with a friend so you can split your purchases and your bill.
                                                </li>
                                                <li>
                                                    Make your own lunch. Packing your lunch every day can save you anywhere between R20 and R100 a day.
                                                </li>
                                                <li>
                                                    Brew your own coffee. Coffee is the most popular beverage worldwide. If you drink at least one cup a day, every day, you can save more than R500 a month by brewing it at home… that's more than R6,000 a year!
                                                </li>
                                                <li>
                                                    Say no to bottled water. Tap water is free, not only is tap water wallet-friendly, it's eco-friendly too.
                                                </li>
                                                <li>
                                                    Plant a garden. Harvest your own fruits and veggies this year. Berries, lettuce, herbs—they're all cheaper to grow on your own.
                                                </li>
                                                <li>
                                                    Learn to cook. It's much more affordable to cook your meals using fresh ingredients than it is to buy pre-packaged processed foods.
                                                </li>
                                            </ol>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12 actually-transport-2">
                            <p class="w-100 mb-0">R <span class="actual_spend_amount step7_inputs" achieve_cat="food" name="saving_category_name">{{str_replace(" ","",$actual_spends['food'])}}</span></p>
                        </div>
                        <div class="col-lg-4 col-12 actually-transport-3 My_Adjusted_Spend">
                            <p class="w-100 mb-0"><input type="text" name="achieve_goal_amount" data-type="currency" class="achieve_goal_amount step7_inputs" achieve_cat="food"></p>
                        </div>
                        <div class="col-lg-4 col-12 actually-transport-3 My_Saving">
                            <p class="w-100 mb-0"><input type="text" name="saving_spend_amount" data-type="currency" class="saving_spend_amount step7_inputs" achieve_cat="food" readonly></p>
                        </div>
                        <div class="col-lg-4 col-12 actually-transport-3 Action_Notes">
                            <p class="w-100 mb-0"><textarea name="action_note" class="action_note step7_inputs" achieve_cat="food"></textarea></p>
                        </div>
                    </div>
                    <div class="row table-bl">
                        <!------Pets----->
                        <div class="col-lg-4 col-12  actually-transport">
                            <div class="mb-0 popup-on-hover">Pets
                                <div class="img">
                                    <img class="text_show_in_popup" src='https://urlsdemo.xyz/heycoachnew/public/front-assets/img/actual.png'>
                                    <div class="hello" style="display: none;">
                                        <span>
                                            <ol type="a">
                                                <li>Buy food in bulk and keep in an airtight container.</li>
                                                <li>
                                                    Buy good-quality food. Low-quality food generally has fewer nutrients and more preservatives, which can lead to frequent veterinarian visits. A healthy diet is important.
                                                </li>
                                                <li>
                                                    Find a good veterinarian. Just like doctors, veterinarians charge different fees for services. Check around and find out what's most affordable. Ask if the vet waives fees for follow-up visits.
                                                </li>
                                                <li>
                                                    Brush your animal's coat regularly, trim nails, clean ears, and practice good hygiene to reduce frequent trips to the groomer. If you do go to the groomer, a midweek visit can cost 20% lower than a weekend visit.
                                                </li>
                                            </ol>
                                            
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12 actually-transport-2">
                            <p class="w-100 mb-0">R <span class="actual_spend_amount step7_inputs" achieve_cat="pets" name="saving_category_name">{{str_replace(" ","",$actual_spends['pets'])}}</span></p>
                        </div>
                        <div class="col-lg-4 col-12  actually-transport-3 My_Adjusted_Spend">
                            <p class="w-100 mb-0"><input type="text" name="achieve_goal_amount" data-type="currency" class="achieve_goal_amount step7_inputs" achieve_cat="pets"></p>
                        </div>
                        <div class="col-lg-4 col-12  actually-transport-3 My_Saving">
                            <p class="w-100 mb-0"><input type="text" name="saving_spend_amount" data-type="currency" class="saving_spend_amount step7_inputs" achieve_cat="pets"  readonly></p>
                        </div>
                        <div class="col-lg-4 col-12  actually-transport-3 Action_Notes">
                            <p class="w-100 mb-0"><textarea name="action_note" class="action_note step7_inputs" achieve_cat="pets"></textarea></p>
                        </div>
                    </div>
                    <div class="row table-bl">
                        <!------Fun----->
                        <div class="col-lg-4 col-12 actually-transport">
                            <div class="mb-0 popup-on-hover">Fun
                                <div class="img">
                                    <img class="text_show_in_popup" src='https://urlsdemo.xyz/heycoachnew/public/front-assets/img/actual.png'>
                                    <div class="hello" style="display: none;">
                                        <span>
                                            <ol type="a">
                                                <li>
                                                    Consider cancelling some of your TV services like DSTV, Netflix and Disney+
                                                </li>
                                                <li>
                                                    Cut down of eating out, its far cheaper to prepare your own meals
                                                </li>
                                                <li>
                                                    Make a budget for your monthly entertainment and plan carefully
                                                </li>
                                            </ol>
                                            
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12 actually-transport-2">
                            <p class="w-100 mb-0">R <span class="actual_spend_amount step7_inputs" achieve_cat="fun" name="saving_category_name">{{str_replace(" ","",$actual_spends['fun'])}}</span></p>
                        </div>
                        <div class="col-lg-4 col-12  actually-transport-3 My_Adjusted_Spend">
                            <p class="w-100 mb-0"><input type="text" name="achieve_goal_amount" data-type="currency" class="achieve_goal_amount step7_inputs" achieve_cat="fun"></p>
                        </div>
                        <div class="col-lg-4 col-12  actually-transport-3 My_Saving">
                            <p class="w-100 mb-0"><input type="text" name="saving_spend_amount" data-type="currency" class="saving_spend_amount step7_inputs" achieve_cat="fun" readonly></p>
                        </div>
                        <div class="col-lg-4 col-12  actually-transport-3 Action_Notes">
                            <p class="w-100 mb-0"><textarea name="action_note" class="action_note step7_inputs" achieve_cat="fun"></textarea></p>
                        </div>
                    </div>
                    <div class="row table-bl">
                        <!------Schooling----->
                        <div class="col-lg-4 col-12  actually-transport">
                            <div class="mb-0 popup-on-hover">Schooling
                                <div class="img">
                                    <img class="text_show_in_popup" src='https://urlsdemo.xyz/heycoachnew/public/front-assets/img/actual.png'>
                                    <div class="hello" style="display: none;">
                                        <span>
                                            <ol type="a">
                                                <li>
                                                    Create a savings plan so that you don’t have to borrow to pay for your kids schooling
                                                </li>
                                                <li>
                                                    Pay annually in advance – many schools offer a 10% discount for upfront payment.
                                                </li>
                                                <li>
                                                    Get your kids school clothes from the school swap shop or exchange with other parents
                                                </li>
                                                <li>
                                                    Limit the number of extra mural activities your children do, this not only saves you money it also saves you time and fuel.
                                                </li>
                                                <li>
                                                    Pack lunch boxes instead of using the school tuck shop.
                                                </li>
                                                <li>
                                                    Arrange lift clubs with the other parents to cut down on transportation costs.
                                                </li>
                                            </ol>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12 actually-transport-2">
                            <p class="w-100 mb-0">R <span class="actual_spend_amount step7_inputs" achieve_cat="schooling" name="saving_category_name">{{str_replace(" ","",$actual_spends['schooling'])}}</span></p>
                        </div>
                        <div class="col-lg-4 col-12  actually-transport-3 My_Adjusted_Spend">
                            <p class="w-100 mb-0"><input type="text" name="achieve_goal_amount" data-type="currency" class="achieve_goal_amount step7_inputs" achieve_cat="schooling"></p>
                        </div>
                        <div class="col-lg-4 col-12  actually-transport-3 My_Saving">
                            <p class="w-100 mb-0"><input type="text" name="saving_spend_amount" data-type="currency" class="saving_spend_amount step7_inputs" achieve_cat="schooling" readonly></p>
                        </div>
                        <div class="col-lg-4 col-12  actually-transport-3 Action_Notes">
                            <p class="w-100 mb-0"><textarea name="action_note" class="action_note step7_inputs" achieve_cat="schooling"></textarea></p>
                        </div>
                    </div>
                    <div class="row table-bl">
                        <!------Phone and Data----->
                        <div class="col-lg-4 col-12 actually-transport">
                            <div class="mb-0 popup-on-hover">Phone and Data
                                <div class="img">
                                    <img class="text_show_in_popup" src='https://urlsdemo.xyz/heycoachnew/public/front-assets/img/actual.png'>
                                    <div class="hello" style="display: none;">
                                        <span>
                                            <ol type="a">
                                                <li>
                                                    Take time to figure out your usage—How many minutes do you need? Do you require airtime & data? What time of day do use your phone the most?—and find a plan that fits.
                                                </li>
                                                <li>
                                                    Switch your carrier. It goes without saying that you should check out different plans and packages to make sure you're getting the lowest rate.
                                                </li>
                                                <li>
                                                    Look for discounts. Many carriers offer family plans, employee discounts, student packages, and more.
                                                </li>
                                                <li>
                                                    Consider a prepaid plan. Because there's no monthly bill, there are no surprises.
                                                </li>
                                                <li>
                                                    Stay away from unnecessary bells and whistles. Do you really need to spend money on a ringtone? These small expenses can add up fast.
                                                </li>
                                            </ol>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12 actually-transport-2">
                            <p class="w-100 mb-0">R <span class="actual_spend_amount step7_inputs" achieve_cat="phone_and_data" name="saving_category_name">{{str_replace(" ","",$actual_spends['phone_and_data'])}}</span></p>
                        </div>
                        <div class="col-lg-4 col-12  actually-transport-3 My_Adjusted_Spend">
                            <p class="w-100 mb-0"><input type="text" name="achieve_goal_amount" data-type="currency" class="achieve_goal_amount step7_inputs" achieve_cat="phone_and_data"></p>
                        </div>
                        <div class="col-lg-4 col-12  actually-transport-3 My_Saving">
                            <p class="w-100 mb-0"><input type="text" name="saving_spend_amount" data-type="currency" class="saving_spend_amount step7_inputs" achieve_cat="phone_and_data" readonly></p>
                        </div>
                        <div class="col-lg-4 col-12  actually-transport-3 Action_Notes">
                            <p class="w-100 mb-0"><textarea name="action_note" class="action_note step7_inputs" achieve_cat="phone_and_data"></textarea></p>
                        </div>
                    </div>
                    <div class="row table-bl">
                        <!------Housing----->
                        <div class="col-lg-4 col-12 actually-transport bottom">
                            <div class="mb-0 popup-on-hover">Housing
                                <div class="img">
                                    <img class="text_show_in_popup" src='https://urlsdemo.xyz/heycoachnew/public/front-assets/img/actual.png'>
                                    <div class="hello" style="display: none;">
                                        <span>
                                            <strong>
                                            Home loans or rent (and all of the associated costs that go along with housing) eats up the largest percentage of most budgets… up to 30%! If putting a roof over your head is costing too much, here are some tips to explore:
                                            </strong>
                                            <ol type="a">
                                                <li>
                                                    <strong>If You Have a Home Loan</strong>
                                                </li>
                                                <ol type="i">
                                                    <li>
                                                        Refinance. You may be able to lower your monthly payments by changing the type of Home Loan you have (fixed rate, adjustable rate, balloon) or finding a lower interest rate. Do some comparison shopping to see if refinancing can save you some money.
                                                    </li>
                                                    <li>
                                                        Rent a room. If you have extra living space, why not rent it out? For example, if your home is near a university, consider renting a room to a student.
                                                    </li>
                                                    <li>
                                                        Move to a smaller place. If you don't need all of the space, downsize.
                                                    </li>
                                                    <li>
                                                        Move further from the city. Home prices are usually higher in metropolitan areas than in suburban and rural areas. Moving away from where the action is can add up to big bucks in savings.
                                                    </li>
                                                    <li>
                                                        Find a place with lower taxes. Property taxes vary by neighbourhood.
                                                    </li>
                                                    <li>
                                                        Raise your insurance excess. A higher excess means lower monthly payments. But keep in mind that if you ever file a claim, you'll pay more out of pocket.
                                                    </li>
                                                </ol>
                                                <li>
                                                    <strong> If You Rent</strong>
                                                </li>
                                                <ol type="i">
                                                    <li>
                                                        Get a roommate. Having a roommate not only saves you money on your rent, you can split the costs of your utility payments, too!
                                                    </li>
                                                    <li>
                                                        Move to a more-affordable place. Rents can vary tremendously depending on the age and location of the rental property. Shop around. Most neighbourhoods have lots of rental options.
                                                    </li>
                                                    <li>
                                                        Negotiate. Rent is negotiable. If you've always paid on time and you are responsible, your landlord may be willing to lower your rent to keep you as a tenant. Call your landlord today.
                                                    </li>
                                                </ol>
                                            </ol>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12 actually-transport-2 ">
                            <p class="w-100 mb-0">R <span class="actual_spend_amount step7_inputs" achieve_cat="housing" name="saving_category_name">{{str_replace(" ","",$actual_spends['housing'])}}</span></p>
                        </div>
                        <div class="col-lg-4 col-12  actually-transport-3 My_Adjusted_Spend">
                            <p class="w-100 mb-0"><input type="text" name="achieve_goal_amount" data-type="currency" class="achieve_goal_amount step7_inputs" achieve_cat="housing"></p>
                        </div>
                        <div class="col-lg-4 col-12  actually-transport-3 My_Saving">
                            <p class="w-100 mb-0"><input type="text" name="saving_spend_amount" data-type="currency" class="saving_spend_amount step7_inputs" achieve_cat="housing" readonly></p>
                        </div>
                        <div class="col-lg-4 col-12  actually-transport-3 Action_Notes">
                            <p class="w-100 mb-0"><textarea name="action_note" class="action_note step7_inputs" achieve_cat="housing"></textarea></p>
                        </div>
                    </div>
                    <div class="row table-bl">
                        <!------Other----->
                        <div class="col-lg-4 col-12 actually-transport">
                            <div class="mb-0 popup-on-hover">Other
                                <div class="img">
                                    <img class="text_show_in_popup" src='https://urlsdemo.xyz/heycoachnew/public/front-assets/img/actual.png'>
                                    <div class="hello" style="display: none;">
                                        <span>
                                            <ol type="a">
                                                <li>
                                                    Become a "conscious" spender. This may be hard to do at first, but don't buy anything without asking yourself if it's something you need (versus something you want).
                                                </li>
                                                <li>
                                                    Don't spend more than you have. This seems like an unnecessary tip, yet many people rely on credit every month.
                                                </li>
                                                <li>
                                                    Keep receipts for everything you purchase. If you need to return something, you want to make sure you get the full refund.
                                                </li>
                                                <li>
                                                    Do a free credit report once a year. Having a good credit score is of benefit if you ever want to buy a car, buy a home, or even get a cell phone.
                                                </li>
                                            </ol>
                                            
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12  actually-transport-2">
                            <p class="w-100 mb-0">R <span class="actual_spend_amount step7_inputs" achieve_cat="other" name="saving_category_name">{{str_replace(" ","",$actual_spends['other'])}}</span></p>
                        </div>
                        <div class="col-lg-4 col-12  actually-transport-3 My_Adjusted_Spend">
                            <p class="w-100 mb-0"><input type="text" name="achieve_goal_amount" data-type="currency" class="achieve_goal_amount step7_inputs" achieve_cat="other"></p>
                        </div>
                        <div class="col-lg-4 col-12  actually-transport-3 My_Saving">
                            <p class="w-100 mb-0"><input type="text" name="saving_spend_amount" data-type="currency" class="saving_spend_amount step7_inputs" achieve_cat="other" readonly></p>
                        </div>
                        <div class="col-lg-4 col-12  actually-transport-3 Action_Notes">
                            <p class="w-100 mb-0"><textarea name="action_note" class="action_note step7_inputs" achieve_cat="other"></textarea></p>
                        </div>
                    </div>
                    <!-- Total -->
                    <!--  <div class="col-lg-4 col-12 px-1 pr-lg-0 my-1 actually-transport">
                        <p class="mb-0">Total</p>
                    </div>
                    <div class="col-lg-4 col-12 px-1 my-1 px-lg-1 actually-transport-2">
                        <p class="w-100 mb-0"><span class="actual_spend_amount step7_inputs"></span></p>
                    </div>
                    <div class="col-lg-4 col-12 px-1 my-1 pl-lg-0 actually-transport-2 actually-transport-3 actually-transport-12">
                        <p class="w-100 mb-0"></p>
                    </div>
                    <div class="col-lg-4 col-12 px-1 my-1 pl-lg-0 actually-transport-2 actually-transport-3 actually-transport-12">
                        <p class="w-100 mb-0"></p>
                    </div>
                    <div class="col-lg-4 col-12 px-1 my-1 pl-lg-0 actually-transport-2 actually-transport-3 actually-transport-12">
                        <p class="w-100 mb-0"></p>
                    </div> -->
                    
                    
                    <div class="col-lg-12 px-0" style="display: none;">
                        <div class="total-section">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <!-- <h4 class="mb-0">Total</h4> -->
                                    <h4 class="mb-0">Left Over Each Month (Goal Savings)</h4>
                                </div>
                                <div class="col-4">
                                    <h3 class="mb-0 text-center text-white total_amt_of_goal1">R{{strstr(number_format($remaining_amount,"2",","," "), ',' , true)}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 px-0 mt-1" >
                        <div class="total-section">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <!-- <h4 class="mb-0">Amount Left</h4> -->
                                    <!-- <h4 class="mb-0">Take From Actual Spend to Achieve My Goal</h4> -->
                                    <h4 class="mb-0">Total Savings</h4>
                                    <input type="hidden" class="step7_actual_spends transport" value="{{str_replace(' ','',$actual_spends['transport']);}}">
                                    <input type="hidden" class="step7_actual_spends health" value="{{str_replace(' ','',$actual_spends['health'])}}">
                                    <input type="hidden" class="step7_actual_spends clothes" value="{{str_replace(' ','',$actual_spends['clothes'])}}">
                                    <input type="hidden" class="step7_actual_spends saving" value="{{str_replace(' ','',$actual_spends['saving'])}}">
                                    <input type="hidden" class="step7_actual_spends food" value="{{str_replace(' ','',$actual_spends['food'])}}">
                                    <input type="hidden" class="step7_actual_spends pets" value="{{str_replace(' ','',$actual_spends['pets'])}}">
                                    <input type="hidden" class="step7_actual_spends fun" value="{{str_replace(' ','',$actual_spends['fun'])}}">
                                    <input type="hidden" class="step7_actual_spends schooling" value="{{str_replace(' ','',$actual_spends['schooling'])}}">
                                    <input type="hidden" class="step7_actual_spends phone_and_data" value="{{str_replace(' ','',$actual_spends['phone_and_data'])}}">
                                    <input type="hidden" class="step7_actual_spends housing" value="{{str_replace(' ','',$actual_spends['housing'])}}">
                                    <input type="hidden" class="step7_actual_spends other" value="{{str_replace(' ','',$actual_spends['other'])}}">
                                    
                                    <input type="hidden" name="current_focus_goal" class="current_focus_goal" value="{{($focused_goal) ? $focused_goal['id'] : '';}}">
                                    <input type="hidden" class="achieve_total_amt" value="{{$remaining_amount}}">
                                    <input type="hidden" class="main_goal_amount" name="goal_amount" value="{{str_replace(" ","",$each_month_goal)}}">
                                </div>
                                <div class="col-4">
                                    <!-- <h3 class="mb-0 text-center text-white total_amt_of_goal">R{{$goal_amount - $remaining_amount}} </h3> -->
                                    <h3 class="mb-0 text-center text-white total_amt_of_goal">R<span>0</span> </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-1" style="display: none;">
                        <div class="total-section">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <!-- <h4 class="mb-0">Out of (Goal Amount)</h4> -->
                                    <h4 class="mb-0">Goal Amount</h4>
                                </div>
                                <div class="col-4">
                                    <h3 class="mb-0 text-center text-white total_amt_of_goal1">R{{ strstr(number_format($goal_amount,"2",","," "), ',' , true) }}</h3>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row booking_email px-5">
                <div class="col-lg-8 order-3 order-lg-1">
                    <div class="booking d-flex align-items-center">
                        <!-- <button class="bookin-btn d-flex"><span class="mr-2"><i class="fa fa-calculator"></i></span>Booking</button> -->
                        <!-- <button type="button" class="bookin-btn d-flex"  data-toggle="modal" data-target="#modal-default">Booking</button> -->
                        <!--  <p class="coaching w-100 mb-0 pl-2">
                            Please join us for a live coaching session. Click here to book your space.
                        </p> -->
                    </div>
                </div>
                
                <div class="col-lg-8 my-1 order-2 order-lg-1">
                    <div class="booking d-flex align-items-center">
                        <!-- <button class="bookin-btn-1 d-flex mt-3 mt-md-0"><span class="mr-2"><i class="fa fa-envelope"></i></span>Email</button> -->
                        <a href ="{{route('getstep2', 'adjustgoal')}}" class="send_email_btnn bookin-btn-1 text-center">Adjust Goal</a>
                        <p class="coaching w-100 mb-0 pl-2">
                            If you are not able to reduce your spending to meet your goal, we suggest you adjust your goal to be more realistic.
                        </p>
                    </div>
                </div>
                <div id="add_form_submit_next_button" class="col-lg-4 py-4 text-center text-lg-right order-1 order-lg-2">
                    <a class="backbtn" href="{{route('getstep6')}}">Back</a>
                    <!-- <button class="next-btn step7">Next</button> -->
                </div>
            </div>
            
            
        </div>
        
    </div>
</div>
<!-- The Modal -->
<div class="modal" id="step-7-success-popup" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
           <!--  <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div> -->

            <div class="modal-body">
                <h3>Great work!</h3>
                <p class="w-100 ">
                    You have successfully made space in your monthly spending to achieve your goals
                </p>
                <a href="javascript:void(0);" class="success_step7"> <button class="success_step7" style="cursor:pointer;" data-dismiss="modal" aria-label="Close">ok</button></a>
            </div>
        </div>
    </div>
</div>


<div class="modal" id="step_7_data_saving_popup" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h3>Data is saving ...</h3>
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
                        <button type="submit" class= "btn btn-primary">Book slot</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--
<div class="modal fade step7SavingTips" id="exampleModalCenterstep7" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="show_saving_tips_text" class="modal-body">
            </div>
        </div>
    </div>
</div> -->
<!-- <script>
$('.text_show_in_popup').hover(function() {
var info = $(this).parent().next().html();
var position = $(this).offset();
$('.show_saving_tips_text_div').html(info);
$('.show_saving_tips_text').show();
}, function(){
$('.show_saving_tips_text').hide();
});
</script> -->
<!-- <script>
$('.text_show_in_popup').click(function() {
var info = $(this).parent().next().html();
// alert(test);
$('#show_saving_tips_text').html(info);
$('.step7SavingTips').modal('show');
console.log('ok');
});
</script> -->
@endsection