@extends('frontend/index')
@section('content')

<div class="sing-up">
    <ul class="nav  justify-content-between ">
        <li class="nav-item sing-in-bg">
            <a class="nav-link active" href="#profile" role="tab" data-toggle="tab"><span>Welcome</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#buzz" role="tab" data-toggle="tab"><span>Goals</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#references" role="tab" data-toggle="tab"><span>Know Your Spend</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#Match_Goal" role="tab" data-toggle="tab"><span>Match Goal to Gap</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#Action_Plan" role="tab" data-toggle="tab"><span>Action Plan</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#Learn_Action" role="tab" data-toggle="tab"><span>Learn & Action</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#Achieve_Goal" role="tab" data-toggle="tab"><span>Achieve Goal</span></a>
        </li>
    </ul>
    <div role="tabpanel" class="tab-pane fade in active show" id="profile">
        <div class="tabs_ineer">
            <h2>Sign up</h2>
            {{-- dd($all_countries) --}}
            <form action="{{route('userregistration')}}" method="post" name="registeruser" class="registeruser" id="registeruser">
                @csrf
                <div class="row mt-5 form-label-text">
                    <div class="col-lg-6 my-3 form-group">
                        <label class="d-block">First Name</label>
                        <input type="text" name="firstname" placeholder="First Name">
                    </div>
                    <div class="form-group col-lg-6 my-3">
                        <label class="d-block">Last Name</label>
                        <input type="text" name="lastname" placeholder="Last Name">
                    </div>
                    <div class="form-group col-lg-6 my-3">
                        <label class="d-block">Email</label>
                        <input type="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group col-lg-6 my-3">
                        <label class="d-block">Country </label>
                        <select name="country">
                            <option value="">---Country---</option>

                            @foreach($all_countries as $all_country)
                                <option {{($all_country->code == 'ZA' ) ? 'selected' : '' ;}}  value="{{$all_country->code}}">{{$all_country->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-6 my-3">
                        <label class="d-block">Password</label>
                        <input type="Password" name="password" id="password" placeholder="" class="w-100">
                    </div>
                    <div class="form-group col-lg-6 my-3">
                        <label class="d-block">Confirm Password</label>
                        <input type="Password" name="con_password" placeholder="" class="w-100">
                    </div>
                    <div class="form-group col-lg-12 my-3 age ml-3">
                        <input class="form-check-input" type="radio" name="terms" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            I have read and agree to the <a href="{{route('FrontentPrivacyPolicy')}}"><span>Privacy Policy & Terms</span></a>
                        </label>
                    </div>
                    <div class="col-lg-12 text-right">
                        <button type="submit" class="next-btn registration_step_btn">Next</button>                        
                    </div>
                </div>
            </form>
        </div>
        
    </div>
    
</div>

@endsection