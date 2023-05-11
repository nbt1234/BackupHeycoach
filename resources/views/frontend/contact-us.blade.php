@extends('frontend/index')
@section('content')
		
		<form action="{{route('ContactUsSave')}}" method="post">
			@csrf
			<div class="form-section  ">
				<div class="container">
					<div class="contact-border"></div>
					<div class="form-ineer">
						<h3>Contact Us Form </h3>
						<div class="heding-img">
						<img src="{{asset('public/front-assets/img/line-2.png')}}">
						</div>

						<div class="row mt-3	mt-lg-5">
							<div class="col-sm-6">
								<div class="form-part">
									<label>First Name</label>
									<input type="" name="first_name" value="{{old('first_name')}}">
									 @error('first_name')
                            			<span class="text-danger"> {{ $message }} </span>
                          			 @enderror
								</div>
								
							</div>
							<div class="col-sm-6">
								<div class="form-part">
									<label>Last Name</label>
									<input type="" name="last_name" value="{{old('last_name')}}">
									 @error('last_name')
                            			<span class="text-danger"> {{ $message }} </span>
                          			 @enderror
								</div>
								
							</div>
							<div class="col-sm-6">
								<div class="form-part">
									<label>Email</label>
									<input type="" name="email" value="{{old('email')}}">
									@error('email')
                            			<span class="text-danger"> {{ $message }} </span>
                          			@enderror
								</div>
								
							</div>
							<div class="col-sm-6">
								<div class="form-part">
									<label>Phone Number</label>
									<input type="" name="mobile" value="{{old('mobile')}}">
									@error('mobile')
                            			<span class="text-danger"> {{ $message }} </span>
                          			@enderror
								</div>
								
							</div>
							<div class="col-12">
								<div class="form-part">
									<label>Message</label>
									<textarea rows="5" name="message">{{old('message')}}</textarea>
									@error('message')
                            			<span class="text-danger"> {{ $message }} </span>
                          			@enderror
								</div>
							</div>
							<div class="form-btn">
								<button>Send</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>

@endsection