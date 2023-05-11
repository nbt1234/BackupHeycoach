@extends('frontend/index')
@section('content')

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
    <div role="tabpanel" class="tab-pane fade in active show step5" id="profile">
        <div class="tabs_ineer">
                

                <form action="{{route('submit_step5')}}" method="post" name="step5_form" class="step5_form" id="step5_form" enctype="multipart/form-data">
                    @csrf

                    @if($step5_pre_filled_data)
                        @php
                            $unserialize_catwise_spends = unserialize($step5_pre_filled_data->catwise_spend);
                            $catwise_thought_spend = array();
                            foreach($unserialize_catwise_spends as $key=>$unserialize_catwise_spend){
                                $catwise_thought_spend[$key] = str_replace(' ','',$unserialize_catwise_spend);
                            }
                            //$catwise_thought_spend = unserialize($step5_pre_filled_data->catwise_spend); 
                            //print_r($catwise_thought_spend);

                             
                            $unserialize_actual_spends = unserialize($step5_pre_filled_data->catwise_actual_spend);
                            $catwise_actual_spend = array();
                            foreach($unserialize_actual_spends as $key=>$unserialize_actual_spnd){
                                $catwise_actual_spend[$key] = str_replace(' ','',$unserialize_actual_spnd);
                            }
                            //$catwise_actual_spend = unserialize($step5_pre_filled_data->catwise_actual_spend);

                            //unset($catwise_thought_spend['other']);
                            //unset($catwise_actual_spend['other']);
                            //print_r($catwise_thought_spend);
                            //print_r($catwise_actual_spend);
                        @endphp
                    @endif  

                    <div class="User_Details_TopBar">
                  <p>  Hey {{ucfirst(GetUserinfo($last_goal['user_id'], 'username'))}}, this is such a powerful step in your journey. You now have a really good understanding of where and how you spend your money.  Armed with this knowledge let’s move to the next step and see if your initial goal makes sense and where we need to make changes to your spending to support your goal.</p>
                </div>
                    <div class="row">

                        <div class="col-lg-6 col-6 pr-1">
                            <h3 class="spent-1 text-center"  >How you thought you spend your money <br><span> Total = R{{array_sum($catwise_thought_spend)}}</span></h3>
                            <div class="thought">
                                <div class="row">

                                    <div class="col-lg-6 my-2 transport">
                                        <label class="d-block">Transport</label>
                                        <input type="text" placeholder="R 550" value="{{ ($step5_pre_filled_data) ? 'R'.strstr(number_format($catwise_thought_spend['transport'],"2",","," "), ',' , true)  : '' ;}}" readonly >
                                    </div>

                                    <div class="col-lg-6 my-2 transport">
                                        <label class="d-block">Food</label>
                                        <input type="text" placeholder="R 550" value="{{ ($step5_pre_filled_data) ? 'R'.strstr(number_format($catwise_thought_spend['food'],"2",","," "), ',' , true) : '' ;}}" readonly>
                                    </div>

                                    <div class="col-lg-6 my-2 transport">
                                        <label class="d-block">Pets</label>
                                        <input type="text" placeholder="R 550" value="{{ ($step5_pre_filled_data) ? 'R'.strstr(number_format($catwise_thought_spend['pets'],"2",","," "), ',' , true) : '' ;}}" readonly>                                
                                    </div>

                                    <div class="col-lg-6 my-2 transport">
                                        <label class="d-block">Health</label>
                                        <input type="text" placeholder="R 550" value="{{ ($step5_pre_filled_data) ? 'R'.strstr(number_format($catwise_thought_spend['health'],"2",","," "), ',' , true) : '' ;}}" readonly>                                
                                    </div>

                                    <div class="col-lg-6 my-2 transport">
                                        <label class="d-block">Schooling</label>
                                        <input type="text" placeholder="R 550" value="{{ ($step5_pre_filled_data) ? 'R'.strstr(number_format($catwise_thought_spend['schooling'],"2",","," "), ',' , true) : '' ;}}" readonly>                                
                                    </div>

                                    <div class="col-lg-6 my-2 transport">
                                        <label class="d-block">Clothes</label>
                                        <input type="text" placeholder="R 550" value="{{ ($step5_pre_filled_data) ? 'R'.strstr(number_format($catwise_thought_spend['clothes'],"2",","," "), ',' , true) : '' ;}}" readonly>                                
                                    </div>

                                    <div class="col-lg-6 my-2 transport">
                                        <label class="d-block">Fun</label>
                                        <input type="text" placeholder="R 550" value="{{ ($step5_pre_filled_data) ? 'R'.strstr(number_format($catwise_thought_spend['fun'],"2",","," "), ',' , true) : '' ;}}" readonly>                                
                                    </div>

                                    <div class="col-lg-6 my-2 transport">
                                        <label class="d-block">Saving</label>
                                        <input type="text" placeholder="R 550" value="{{ ($step5_pre_filled_data) ? 'R'.strstr(number_format($catwise_thought_spend['saving'],"2",","," "), ',' , true) : '' ;}}" readonly>                                
                                    </div>

                                    <div class="col-lg-6 my-2 transport">
                                        <label class="d-block">Phone and Data</label>
                                        <input type="text" placeholder="R 550" value="{{ ($step5_pre_filled_data) ? 'R'.strstr(number_format($catwise_thought_spend['phone_and_data'],"2",","," "), ',' , true) : '' ;}}" readonly>                                
                                    </div>   

                                    <div class="col-lg-6 my-2 transport">
                                        <label class="d-block">Housing</label>
                                        <input type="text" placeholder="R 550" value="{{ ($step5_pre_filled_data) ? 'R'.strstr(number_format($catwise_thought_spend['housing'],"2",","," "), ',' , true) : '' ;}}" readonly>                                
                                    </div>  

                                    <div class="col-lg-6 my-2 transport">
                                        <label class="d-block">Other</label>
                                        <input type="text" placeholder="R 550" value="{{ ($step5_pre_filled_data) ? 'R'.strstr(number_format($catwise_thought_spend['other'],"2",","," "), ',' , true) : '' ;}}" readonly>                                
                                    </div>                          
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-6 pl-0">
                            <h3 class="spent-1 spent-2 text-center">How you actually spend your money <br><span> Total = R{{array_sum($catwise_actual_spend)}}</span></h3>
                            <div class="thought thought-1"> 

                                <div class="row">

                                    <div class="col-lg-6 my-2 transport ">                                        
                                        <!-- <label class="d-block">Transport @if($catwise_actual_spend['transport'] != $catwise_thought_spend['transport'])  <span><i class='fa fa-star'></i></span> @endif</label> -->
                                        <!-- <input type="" placeholder="R 550" value="{{ ($step5_pre_filled_data) ? 'R'.$catwise_actual_spend['transport'] : '' ;}}" class="{{ ($catwise_actual_spend['transport'] != $catwise_thought_spend['transport']) ? 'unmatched_spend' : '' ; }}" readonly> -->   
                                        <label class="d-block">Transport </label>
                                        <input type="" placeholder="R 550" value="{{ ($step5_pre_filled_data) ? 'R'.strstr(number_format($catwise_actual_spend['transport'],"2",","," "), ',' , true) : '' ;}}" class="{{ str_replace(" ","",$catwise_actual_spend['transport']) > str_replace(" ","",$catwise_thought_spend['transport']) ? 'greather_then_equal_to_ten' : (str_replace(" ","",$catwise_actual_spend['transport']) < str_replace(" ","",$catwise_thought_spend['transport']) ? 'less_then_ten' : '') }}" readonly>   
                                                                             
                                    </div>

                                    <div class="col-lg-6 my-2 transport">
                                        <!-- <label class="d-block">Food @if($catwise_actual_spend['food'] != $catwise_thought_spend['food'])  <span><i class='fa fa-star'></i></span> @endif</label>
                                        <input type="" placeholder="R 550" value="{{ ($step5_pre_filled_data) ? 'R'.$catwise_actual_spend['food'] : '' ;}}" class="{{ ($catwise_actual_spend['food'] != $catwise_thought_spend['food']) ? 'unmatched_spend' : '' ; }}" readonly> -->
                                        <label class="d-block">Food</label>
                                        <input type="" placeholder="R 550" value="{{ ($step5_pre_filled_data) ? 'R'.strstr(number_format($catwise_actual_spend['food'],"2",","," "), ',' , true) : '' ;}}" class="{{str_replace(" ","",$catwise_actual_spend['food']) > str_replace(" ","",$catwise_thought_spend['food']) ? 'greather_then_equal_to_ten' : (str_replace(" ","",$catwise_actual_spend['food']) < str_replace(" ","",$catwise_thought_spend['food']) ? 'less_then_ten' : '') }}" readonly>
                                    </div>

                                    <div class="col-lg-6 my-2 transport">
                                        <!-- <label class="d-block">Pets @if($catwise_actual_spend['pets'] != $catwise_thought_spend['pets'])  <span><i class='fa fa-star'></i></span> @endif
                                        </label>
                                        <input type="" placeholder="R 550" value="{{ ($step5_pre_filled_data) ? 'R'.$catwise_actual_spend['pets'] : '' ;}}" class="{{ ($catwise_actual_spend['pets'] != $catwise_thought_spend['pets']) ? 'unmatched_spend' : '' ; }}" readonly> -->
                                         <label class="d-block">Pets</label>
                                        <input type="" placeholder="R 550" value="{{ ($step5_pre_filled_data) ? 'R'.strstr(number_format($catwise_actual_spend['pets'],"2",","," "), ',' , true) : '' ;}}" class="{{str_replace(" ","",$catwise_actual_spend['pets']) > str_replace(" ","",$catwise_thought_spend['pets']) ? 'greather_then_equal_to_ten' : (str_replace(" ","",$catwise_actual_spend['pets']) < str_replace(" ","",$catwise_thought_spend['pets']) ? 'less_then_ten' : '') }}" readonly>
                                    </div>


                                    <div class="col-lg-6 my-2 transport">
                                        <!-- <label class="d-block">Health @if($catwise_actual_spend['health'] != $catwise_thought_spend['health'])  <span><i class='fa fa-star'></i></span> @endif</label>
                                        <input type="" placeholder="R 550" value="{{ ($step5_pre_filled_data) ? 'R'.$catwise_actual_spend['health'] : '' ;}}" class="{{ ($catwise_actual_spend['health'] != $catwise_thought_spend['health']) ? 'unmatched_spend' : '' ; }}" readonly>  -->  
                                        <label class="d-block">Health</label>
                                        <input type="" placeholder="R 550" value="{{ ($step5_pre_filled_data) ? 'R'.strstr(number_format($catwise_actual_spend['health'],"2",","," "), ',' , true) : '' ;}}" class="{{str_replace(" ","",$catwise_actual_spend['health']) > str_replace(" ","",$catwise_thought_spend['health']) ? 'greather_then_equal_to_ten' : (str_replace(" ","",$catwise_actual_spend['health']) < str_replace(" ","",$catwise_thought_spend['health']) ? 'less_then_ten' : '') }}" readonly>                              
                                    </div>


                                    <div class="col-lg-6 my-2 transport">
                                        <!-- <label class="d-block">Schooling @if($catwise_actual_spend['schooling'] != $catwise_thought_spend['schooling'])  <span><i class='fa fa-star'></i></span> @endif</label>
                                        <input type="" placeholder="R 550" value="{{ ($step5_pre_filled_data) ? 'R'.$catwise_actual_spend['schooling'] : '' ;}}" class="{{ ($catwise_actual_spend['schooling'] != $catwise_thought_spend['schooling']) ? 'unmatched_spend' : '' ; }}" readonly>   --> 
                                        <label class="d-block">Schooling</label>
                                        <input type="" placeholder="R 550" value="{{ ($step5_pre_filled_data) ? 'R'.strstr(number_format($catwise_actual_spend['schooling'],"2",","," "), ',' , true) : '' ;}}" class="{{str_replace(" ","",$catwise_actual_spend['schooling']) > str_replace(" ","",$catwise_thought_spend['schooling']) ? 'greather_then_equal_to_ten' : (str_replace(" ","",$catwise_actual_spend['schooling']) < str_replace(" ","",$catwise_thought_spend['schooling']) ? 'less_then_ten' : '') }}" readonly>                               
                                    </div>

                                    <div class="col-lg-6 my-2 transport">
                                        <!-- <label class="d-block">Clothes @if($catwise_actual_spend['clothes'] != $catwise_thought_spend['clothes'])  <span><i class='fa fa-star'></i></span> @endif</label>
                                        <input type="" placeholder="R 550" value="{{ ($step5_pre_filled_data) ? 'R'.$catwise_actual_spend['clothes'] : '' ;}}" class="{{ ($catwise_actual_spend['clothes'] != $catwise_thought_spend['clothes']) ? 'unmatched_spend' : '' ; }}" readonly> -->
                                        
                                         <label class="d-block">Clothes @if(((str_replace(" ","",$catwise_actual_spend['clothes'])/str_replace(" ","",$catwise_thought_spend['clothes']))*100)-100 >= 10)  <!-- <span><i class='fa fa-star'></i></span> --> @endif</label>
                                        <input type="" placeholder="R 550" value="{{ ($step5_pre_filled_data) ? 'R'.strstr(number_format($catwise_actual_spend['clothes'],"2",","," "), ',' , true) : '' ;}}" class="{{str_replace(" ","",$catwise_actual_spend['clothes']) > str_replace(" ","",$catwise_thought_spend['clothes']) ? 'greather_then_equal_to_ten' : (str_replace(" ","",$catwise_actual_spend['clothes']) < str_replace(" ","",$catwise_thought_spend['clothes']) ? 'less_then_ten' : '') }}" readonly>
                                    </div>

                                    <div class="col-lg-6 my-2 transport">
                                        <!-- <label class="d-block">Fun @if($catwise_actual_spend['fun'] != $catwise_thought_spend['fun'])  <span><i class='fa fa-star'></i></span> @endif</label>
                                        <input type="" placeholder="R 550" value="{{ ($step5_pre_filled_data) ? 'R'.$catwise_actual_spend['fun'] : '' ;}}" class="{{ ($catwise_actual_spend['fun'] != $catwise_thought_spend['fun']) ? 'unmatched_spend' : '' ; }}" readonly> -->
                                        <label class="d-block">Fun</label>
                                        <input type="" placeholder="R 550" value="{{ ($step5_pre_filled_data) ? 'R'.strstr(number_format($catwise_actual_spend['fun'],"2",","," "), ',' , true) : '' ;}}" class="{{str_replace(" ","",$catwise_actual_spend['fun']) > str_replace(" ","",$catwise_thought_spend['fun']) ? 'greather_then_equal_to_ten' : (str_replace(" ","",$catwise_actual_spend['fun']) < str_replace(" ","",$catwise_thought_spend['fun']) ? 'less_then_ten' : '') }}" readonly>
                                    </div>

                                    <div class="col-lg-6 my-2 transport">
                                        <!-- <label class="d-block">Saving @if($catwise_actual_spend['saving'] != $catwise_thought_spend['saving'])  <span><i class='fa fa-star'></i></span> @endif</label>
                                        <input type="" placeholder="R 550" value="{{ ($step5_pre_filled_data) ? 'R'.$catwise_actual_spend['saving'] : '' ;}}" class="{{ ($catwise_actual_spend['saving'] != $catwise_thought_spend['saving']) ? 'unmatched_spend' : '' ; }}" readonly> -->   
                                        <label class="d-block">Saving </label>
                                        
                                        <input type="" placeholder="R 550" value="{{ ($step5_pre_filled_data) ? 'R'.strstr(number_format($catwise_actual_spend['saving'],"2",","," "), ',' , true) : '' ;}}" class="{{ str_replace(" ","",$catwise_actual_spend['saving']) > str_replace(" ","",$catwise_thought_spend['saving']) ? 'greather_then_equal_to_ten' : (str_replace(" ","",$catwise_actual_spend['saving']) < str_replace(" ","",$catwise_thought_spend['saving']) ? 'less_then_ten' : '') }}" readonly>                             
                                    </div>

                                    <div class="col-lg-6 my-2 transport">
                                        <!-- <label class="d-block">Phone and Data @if($catwise_actual_spend['phone_and_data'] != $catwise_thought_spend['phone_and_data'])  <span><i class='fa fa-star'></i></span> @endif</label>
                                        <input type="" placeholder="R 550" value="{{ ($step5_pre_filled_data) ? 'R'.$catwise_actual_spend['phone_and_data'] : '' ;}}" class="{{ ($catwise_actual_spend['phone_and_data'] != $catwise_thought_spend['phone_and_data']) ? 'unmatched_spend' : '' ; }}" readonly> -->    
                                        
                                         <label class="d-block">Phone and Data</label>
                                        <input type="" placeholder="R 550" value="{{ ($step5_pre_filled_data) ? 'R'.strstr(number_format($catwise_actual_spend['phone_and_data'],"2",","," "), ',' , true) : '' ;}}" class="{{ str_replace(" ","",$catwise_actual_spend['phone_and_data']) > str_replace(" ","",$catwise_thought_spend['phone_and_data']) ? 'greather_then_equal_to_ten' : (str_replace(" ","",$catwise_actual_spend['phone_and_data']) < str_replace(" ","",$catwise_thought_spend['phone_and_data']) ? 'less_then_ten' : '') }}" readonly>                            
                                    </div>  

                                    <div class="col-lg-6 my-2 transport">                                        
                                        
                                         <label class="d-block">Housing</label>
                                        <input type="" placeholder="R 550" value="{{ ($step5_pre_filled_data) ? 'R'.strstr(number_format($catwise_actual_spend['housing'],"2",","," "), ',' , true) : '' ;}}" class="{{ str_replace(" ","",$catwise_actual_spend['housing']) > str_replace(" ","",$catwise_thought_spend['housing']) ? 'greather_then_equal_to_ten' : (str_replace(" ","",$catwise_actual_spend['housing']) < str_replace(" ","",$catwise_thought_spend['housing']) ? 'less_then_ten' : '') }}" readonly>                            
                                    </div>

                                    <div class="col-lg-6 my-2 transport">
                                        <!-- <label class="d-block">Other @if($catwise_actual_spend['other'] != $catwise_thought_spend['other'])  <span><i class='fa fa-star'></i></span> @endif</label>
                                        <input type="" placeholder="R 550" value="{{ ($step5_pre_filled_data) ? 'R'.$catwise_actual_spend['other'] : '' ;}}" class="{{ ($catwise_actual_spend['other'] != $catwise_thought_spend['other']) ? 'unmatched_spend' : '' ; }}" readonly> -->    
                                        
                                         <label class="d-block">Other</label>
                                        <input type="" placeholder="R 550" value="{{ ($step5_pre_filled_data) ? 'R'.strstr(number_format($catwise_actual_spend['other'],"2",","," "), ',' , true) : '' ;}}" class="{{ str_replace(" ","",$catwise_actual_spend['other']) > str_replace(" ","",$catwise_thought_spend['other']) ? 'greather_then_equal_to_ten' : (str_replace(" ","",$catwise_actual_spend['other']) < str_replace(" ","",$catwise_thought_spend['other']) ? 'less_then_ten' : '') }}" readonly>                            
                                    </div>                          
                                    
                                </div>

                            </div>
                        </div>
                        @php
                            $total_actual_spend = array_sum($catwise_actual_spend);
                            $total_thought_spend = array_sum($catwise_thought_spend);
                        @endphp

                        <div class="col-lg-12 total_variation text-center mx-auto mt-3"> 


                            <div class="thoughtTo">
                                
                            
                           <!--  <label class="d-block">{{($total_actual_spend >  $total_thought_spend) ? 'You spend more than you thought' : 'You spend less than you thought' ;}}</label> -->

                           @if($total_actual_spend !=  $total_thought_spend)
                           <span>You spend R</span> <input type="" value="{{str_replace('-','',($total_actual_spend - $total_thought_spend))}}" class="{{ ($total_actual_spend  > $total_thought_spend) ? 'greather_then_equal_to_ten' : 'less_then_ten'}}" readonly><span> {{($total_actual_spend >  $total_thought_spend) ? 'more than you thought.' : 'less than you thought.' ;}}</span>
                           @else
                           <span>That’s great you really understand where you spend your money, your assumed spend and actual spend is the same.</span>
                           @endif
</div>

                        </div>

                        @php                        
                            $userid = Auth::guard('frontuser')->user()->id; 
                        @endphp
                        <input type="hidden" name="my_goals_id" value="{{($last_goal) ? $last_goal['mygoals_id'] : '';}}">
                        <input type="hidden" name="user_id" value="{{$userid}}">
                        <input type="hidden" name="current_focus_goal" value="{{($last_goal) ? $last_goal['current_focus_goal'] : '';}}">

                        <div class="col-lg-12 text-center text-lg-right mt-5">
                            <a class="backbtn" href="{{route('getstep4')}}">Back</a>
                            <button type="submit" class="next-btn step5">Next</button>
                        </div>

                    </div>

                </form>

                

        </div>        
    </div>
    
</div>

@endsection