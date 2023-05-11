@extends('frontend/index')
@section('content')


<link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css"></link>
<div class="Library_Main">
			<div class="container">
				<div class="Videos_Library_Ineer">
					<h3>Video Library</h3>
				</div>
			</div>
		</div>
<!-- 
<div class="Videos_Library">
		<div class="row">
			<div class="col-lg-4 col-md-6 my-3">
				<div class="video-laibrary-box">
				<a data-fancybox data-width="640" data-height="360" href="https://urlsdemo.xyz/heycoachnew/public/front-assets/video-library/1682313300UJcZLSet your action plan.mp4">
        		   <img src="https://source.unsplash.com/IvfoDk30JnI/320x180" />
				   <div class="circal">
					<i class="fa fa-caret-right"></i>
				</div>
				</a>
				
				</div>
			</div>
			<div class="col-lg-4 col-md-6 my-3">
				<div class="video-laibrary-box">
				<a data-fancybox data-width="640" data-height="360" href="https://urlsdemo.xyz/heycoachnew/public/front-assets/video-library/1682313260u1gq7Know your spend.mp4">
        		   <img src="https://source.unsplash.com/IvfoDk30JnI/320x180" />
				   <div class="circal">
					<i class="fa fa-caret-right"></i>
				</div>
				</a>
				
				</div>
			</div>
			<div class="col-lg-4 col-md-6 my-3">
				<div class="video-laibrary-box">
				<a data-fancybox data-width="640" data-height="360" href="https://urlsdemo.xyz/heycoachnew/public/front-assets/video-library/1682313212mM4tzSetting a smart goal.mp4">
        		   <img src="https://source.unsplash.com/IvfoDk30JnI/320x180" />
				   <div class="circal">
					<i class="fa fa-caret-right"></i>
				</div>
				</a>
				
				</div>
			</div>
			<div class="col-lg-4 col-md-6 my-3">
				<div class="video-laibrary-box">
				<a data-fancybox data-width="640" data-height="360" href="https://urlsdemo.xyz/heycoachnew/public/front-assets/video-library/1682312228SQBC4Welcome Video_1.mp4">
        		   <img src="https://source.unsplash.com/IvfoDk30JnI/320x180" />
				   <div class="circal">
					<i class="fa fa-caret-right"></i>
				</div>
				</a>
				
				</div>
			</div>



			
			
       </div>
</div>

 -->



		<div class="Videos_Library">
			<div class="container">
				<div id="append_load_data" class="row">
					
					@foreach($data as $key => $value)
					<div class="col-lg-4 col-sm-6 my-3">
						<div class="video-section">
							<video width="360" height="400" controls>
							  <source src="{{asset('public/front-assets/video-library/'. $value->name)}}">
							</video>

							<a id="{{$value->id}}" class="lets-play lets-playcount" data-video="{{asset('public/front-assets/video-library/'. $value->name)}}">
								<div class="circal">
									<i class="fa fa-caret-right"></i>
								</div>
							</a>
						</div>
					</div>
					@endforeach 


				

					<!-- <div class="col-lg-4 col-sm-6 my-3">
						<div class="video-section-2">
						<a class="lets-play" data-video="https://24e3d2766e918fc4369a-2005f80a01533296a927e19ca48f1dcf.ssl.cf1.rackcdn.com/stregisbricke/St._Regis_LIVE_EXQUISITE.m4v">
						
							
						
								<div class="circal">
									<i class="fa fa-caret-right"></i>

								</div>
						</a>
					</div>
					</div>
					<div class="col-lg-4 col-sm-6 my-3">
						<div class="video-section-3">
						<a class="lets-play" data-video="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4">
						
							
						
								<div class="circal">
									<i class="fa fa-caret-right"></i>

								</div>
						</a>
					</div>
					</div>
					<div class="col-lg-4 col-sm-6 my-3">
						<div class="video-section">
						<a class="lets-play" data-video="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4">
						
							
						
								<div class="circal">
									<i class="fa fa-caret-right"></i>

								</div>
						</a>
					</div>
					</div>
					<div class="col-lg-4 col-sm-6 my-3">
						<div class="video-section-2 ">
						<a class="lets-play" data-video="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4">
						
							
						
								<div class="circal">
									<i class="fa fa-caret-right"></i>

								</div>
						</a>
					</div>
					</div>
					<div class="col-lg-4 col-sm-6 my-3">
						<div class="video-section-3 ">
						<a class="lets-play" data-video="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4">
						
							
						
								<div class="circal">
									<i class="fa fa-caret-right"></i>

								</div>
						</a>
					</div>
					</div>
					<div class="col-lg-4 col-sm-6 my-3">
						<div class="video-section">
						<a class="lets-play" data-video="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4">
						
							
						
								<div class="circal">
									<i class="fa fa-caret-right"></i>

								</div>
						</a>
					</div>
					</div>
					<div class="col-lg-4 col-sm-6 my-3">
						<div class="video-section-2 ">
						<a class="lets-play" data-video="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4">
						
							
						
								<div class="circal">
									<i class="fa fa-caret-right"></i>

								</div>
						</a>
					</div>
					</div> -->
					<!-- <div class="col-lg-4 col-sm-6 my-3">
						<div class="video-section-3 ">
						<a class="lets-play" data-video="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4">
						
							
						
								<div class="circal">
									<i class="fa fa-caret-right"></i>

								</div>
						</a>
					</div>
					</div> -->

				</div>
				<div class="More_Video">
					@if($totalVideos > 9)
						<button class="{{!$data->isEmpty() ? 'load_more_videos' : ''}}">{{!$data->isEmpty() ? 'More Video' : 'No Videos'}}</button>
					@endif
				</div>
			</div>
		</div>


		<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
<script>
	  

	$('.load_more_videos').on('click', function(){
		
		var i = 0;
		var ids = [];

		$(".lets-playcount").each(function(){
        	ids[i++] =  $(this).attr("id");
     	});
 		var last_id = Math.max.apply(Math,ids);

		var token = "{{csrf_token()}}";
		$.ajax({
            url: "{{route('FrontentLoadVideosLibrary')}}",
            type: 'post',
            data: {
                    _token:token,
                    id:last_id,
                },
                success: function(data) {
	             	var data = JSON.parse(data);
	             	if(data == ''){
	             		$('.load_more_videos').html('');
	             		$('.load_more_videos').html('No More Videos');

	             	}else{
	             		$.each(data, function(key, value) {
				          var load_data_append = '<div class="col-lg-4 col-sm-6 my-3"><div class="video-section"><video width="360" height="400" controls><source src="{{asset("public/front-assets/video-library/")}}/'+value.name+'""></video><a id="'+value.id+'" class="lets-play lets-playcount" data-video="{{asset("public/front-assets/video-library/")}}/'+value.name+'"><div class="circal"><i class="fa fa-caret-right"></i></div></a></div></div>'
				             $('#append_load_data').append(load_data_append);
				        });
	             	}
                }
            });

	});

</script>

@endsection
