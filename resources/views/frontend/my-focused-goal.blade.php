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
            <h2 class="text-white">Focus Goal</h2>
        </div>

        <div class="My_Goals_Section">  
            <a href="{{route('all_my_goals')}}"><button class="go_back_button">Back</button></a><br><br>
            <div class="table-responsive">

            <table id="" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S.no</th>
                        <th>Goals Category</th>                     
                        <th>Goal Each Month</th>
                        <th>Achieve Goal Time</th>
                        <th>Total Goal</th>
                        <th>Status</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody> 
                      {{-- dd($get_focused_goals) --}}
                      @foreach($get_focused_goals as $get_focused_goal) 
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{ucwords(str_replace("_", " ", $get_focused_goal->focused_cat))}}</td>
                          <td>{{$get_focused_goal->each_month_goal}}</td>
                          <td>{{ucwords($get_focused_goal->archive_goal_time)}}</td>
                          <td>
                                @php 
                                    $month = (explode(" ", $get_focused_goal->archive_goal_time))[0];

                                    $monthly_goal = str_replace(" ", "", $get_focused_goal->each_month_goal);
                                    $total_goal = $month*$monthly_goal;
                                @endphp
                                {{ strstr(number_format($total_goal,"2",","," "), ',' , true) }}

                          </td>
                            <td>{{ucfirst($get_focused_goal->goal_status)}}</td>
                            <td class="View-btn">
                                @if($get_focused_goal->goal_status == 'incomplete')
                                    <a href="{{url('/'.$get_focused_goal->current_step)}}">View</a>
                                @else
                                    <p class="goaldone">Done</p>
                                @endif                                
                            </td>
                        </tr>
                      @endforeach  
                </tbody>
                <tfoot>
                    <tr>
                        <th>S.no</th>
                        <th>Goals Category</th>                     
                        <th>Goal Each Month</th>
                        <th>Achieve Goal Time</th>
                        <th>Total Goal</th>
                        <th>Status</th>
                        <th>Details</th>
                    </tr>
                </tfoot>
            </table>
            </div>




        </div>
    </div>
</div>

    
  
    

@endsection