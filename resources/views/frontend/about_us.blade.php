@extends('frontend/index')
@section('content')

		
		<div class="platform-main">
			<div class="container">
				<div class="platform-text">
					<p class='ml-2'>{{$section1->heading}}</p>
					<div class="upper-section EveryOne">
						<p>
							EVERYONE
							CAN BE A GOOD MONEY
							MANAGER!
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="support-section">
			<div class="container">
				<div class="row mt-0 ">
					<div class="col-md-4 order-2 order-md-1">
						
						<div class="Choes_Goals">
							<!-- <div class="Choes_ineer">
								<input type="radio" id="test1" name="fav_language" value="cc">
								<label for="test1">Set Goals</label>
							</div>
							<div class="Choes_ineer">
								<input type="radio" name="fav_language" value="ccc">
								<label>Honest approach</label>
							</div>
							<div class="Choes_ineer">
								<input type="radio" name="fav_language" value="ccv">
								<label>Accountability partner</label>
							</div>
							<div class="Choes_ineer">
								<input type="radio" name="fav_language" value="ccb">
								<label>Simple Solutions</label>
								
							</div>
							<div class="Choes_ineer">
								<input type="radio" name="fav_language" value="ccn">
								<label>Action Plan</label>
							</div>
							<div class="Choes_ineer">
								<input type="radio" name="fav_language" value="ccn">
								<label>Support</label>
							</div>
							
							 -->
							 <ul>
							 	@foreach((explode(', ', $section1->description)) as $key => $value)
							 		<li>{{$value}}</li>
							 	@endforeach
							 </ul>
							
							
						</div>
					</div>
					<div class="col-md-8 order-1 order-md-2">
						<div class="coach-main d-flex justify-content-between 	">
							
							
							<div class="mt-3 digital-img">
								<img src="{{asset('public/front-assets/img/'.$section1->image)}}">
							</div>
							<div class="coach-section">
								<p>
									COACH & GROUP SUPPORT
								</p>
							</div>
						</div>
						<!-- <div class="internet">
							<span>{{$section2->heading}}</span>
							<p>{!!$section2->description !!}</p>
						</div> -->
					</div>
					
				</div>
			</div>
		</div>
		<!-- <div class="mean">
			<div class="container">
				<div class="mean-ineer">
					<h3>{{$section3->heading}}</h3>
					<img src="{{asset('public/front-assets/img/line.png')}}">
					<p>{!!$section3->description !!}</p>
				</div>


			</div>
		</div> -->
		<div class="Different">
			<div class="container text-white px-lg-0">
				@foreach(json_decode($section4->description) as $key => $value)
				@if($key == 0)
					<h3>{{$value->heading}}</h3>
					<img src="{{asset('public/front-assets/img/line-2.png')}}">
					{!!$value->content!!}
					
					<p class="outcomes"></p>
				@else
					<h3 class="pt-2 pt-lg-5">{{$value->heading}}</h3>
					<img src="{{asset('public/front-assets/img/line-2.png')}}">
					{!!$value->content!!}
					<p class="outcomes"></p>

				@endif
				@endforeach
			</div>
		</div>

@endsection