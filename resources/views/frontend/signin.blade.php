@extends('frontend/index')
@section('content')

<div class="sing-in Sing_In_Main ">
    
    <div role="tabpanel" class="tab-pane fade in active show" id="profile">
        <div class="tabs_ineer">
            <h2>Sign-in</h2> 
            <!-- @if (Auth::guard('frontuser')->check() || Auth::check())   
                <p>Logged-in</p>
            @else
                <p>Not Logged-in</p>
            @endif -->

            <form action="{{route('user-signin')}}" method="post" name="user_signin" class="user-signin" id="user-signin">
                
                @csrf
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" placeholder="Email Address" />
                    @error('email')
                        <div class="form-valid-error">{{ $message }}</div>
                    @enderror                       
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" />
                    @error('password')
                        <div class="form-valid-error">{{ $message }}</div>
                    @enderror                   
                </div>

                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                    <div class="col d-flex justify-content-center">
                      <!-- Checkbox -->
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="form2Example31"/>
                        <label class="form-check-label  RememberMe" for="form2Example31"> Remember me </label>
                      </div>
                    </div>

                    <div class="col">
                      <a href="#!" class="RememberMe">Forgot password?</a>
                    </div>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

                <div class="text-center">
                    <p>Not a member? <a href="{{route('frontend.signup')}}">Register</a></p>
                    <!-- <p>or sign up with:</p>
                    <button type="button" class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-facebook-f"></i>
                    </button>

                    <button type="button" class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-google"></i>
                    </button>

                    <button type="button" class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-twitter"></i>
                    </button>

                    <button type="button" class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-github"></i>
                    </button> -->
                </div>

            </form>

        </div>
        
    </div>
    
</div>

@endsection