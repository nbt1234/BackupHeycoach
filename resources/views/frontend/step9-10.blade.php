@extends('frontend/index')
@section('content')

<div class="sing-up">
    <ul class="nav  justify-content-between">
        <li class="nav-item">
            <a class="nav-link active" href="#profile" role="tab" data-toggle="tab">Welcome</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#buzz" role="tab" data-toggle="tab">Goals</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#references" role="tab" data-toggle="tab">Know Your Spend</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#Match_Goal" role="tab" data-toggle="tab">Match Goal to Gap</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#Action_Plan" role="tab" data-toggle="tab">Action Plan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#Learn_Action" role="tab" data-toggle="tab">Learn & Action</a>
        </li>
        <li class="nav-item achieve-goal">
            <a class="nav-link" href="#Achieve_Goal" role="tab" data-toggle="tab">Achieve Goal</a>
        </li>
    </ul>
    <div role="tabpanel" class="tab-pane fade in active show" id="profile">
        <div class="tabs_ineer really ">
                <div class="row">
                    <div class="col-12 text-center">
                        @php                            
                            $get_mnth = explode(" ", $archive_goal_time);
                            $total_goal = $each_month_goal * $get_mnth[0];
                        @endphp
                        <h3 class="Congratulations_Text">Congratulations</h3>
                        <p class="achievement">
                            You paid off your debt of
                            R{{$total_goal}} in {{$archive_goal_time}}.
                            This is a huge achievement!!!

                        </p>
                    </div>
                </div>
            
        </div>        
    </div>
</div>

@endsection