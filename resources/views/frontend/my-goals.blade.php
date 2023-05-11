@extends('frontend/index')
@section('content')
<style>
    .go_back_button {
    background: #173854;
    padding: 10px 40px;
    border-radius: 5px;
    color: #fff;
    font-weight: 500;
    margin: auto;
    cursor: pointer;
}
</style>

<div class="My_Goals">
    <div class="container">
        <div class="My_Goals_Heading">
            <h2 class="text-white">All Goals</h2>
        </div>
        @php $current_step = 'get'.$currentStep['current_step']; @endphp


        <div class="My_Goals_Section">     
            <a href="{{route($current_step)}}"><button class="go_back_button">Back</button></a><br><br>       
            <div class="table-responsive">
            <table id="" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S.no</th>
                        <th>Goals</th>                     
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody> 
                      @foreach($get_my_goals as $get_my_goal)   
                        @php
                          $unserialize = unserialize($get_my_goal->my_goal_cats);
                        @endphp
                            @foreach($unserialize as $key => $value)  
                                @if($value == 'other')
                                   @php unset($unserialize[$key]); @endphp
                                @endif
                                @if($key == 'other' && $value != null)
                                   @php $unserialize[$key] = "Other (". $value.")" @endphp
                                @endif
                                
                            @endforeach
                        @php
                          $cats = implode(", ",$unserialize);
                        @endphp
                         
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td class="Make-section">{{ucwords(str_replace("_", " ", $cats))}}</td>
                          <td class="Incomplete">{{ucfirst($get_my_goal->status)}}</td>
                          <td class="View-btn"><a href="{{route('my_focused_goal', $get_my_goal->id)}}">View</a></td>
                        </tr>
                      @endforeach  
                </tbody>
                <tfoot>
                    <tr>
                        <th>S.no</th>
                        <th>Goals</th>                     
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
            </div>




        </div>
    </div>
</div>

@endsection