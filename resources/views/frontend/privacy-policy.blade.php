@extends('frontend/index')
@section('content')

		
		<div class="platform-main">
			<div class="container">
				<div class="platform-text">
					<p class='ml-2'>Privacy Policy & Terms</p>
					
				</div>
			</div>
		</div>
		<div class="support-section">
			<div class="container">
				<div class="row mt-0 ">
					<div class="col-md-4 order-2 order-md-1">
						
						<div class="Choes_Goals">
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="Different">
			<div class="container text-white px-lg-0">
				
					{!!$data->content!!}
			</div>
		</div>

@endsection