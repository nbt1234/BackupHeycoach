@extends('frontend/index')
@section('content')
 <div class="My_Goals">
    <div class="container">
        <div class="My_Goals_Heading">
            <h2 class="text-white">Profile</h2>
        </div>
        <div class="My_Goals_Section"> 
            {{-- dd($get_details) --}}
    	   	<div class="profile-main-section">
        		<!-- <div class="profile-main-img">
                        <img src="public/front-assets/img/profile-img.png">
                        <i class="fa fa-pencil-square-o"></i>
        		</div> -->
                <form method="post" action="{{route('update_profile_image')}}" id="update_profile_img_form" enctype="multipart/form-data">
                    @csrf
                  <div class="avatar-upload">
                      <div class="avatar-edit">
                          <input type='file' name="image" id="update_pro_image" accept=".png, .jpg, .jpeg" onchange="user_profile_readURL(this);"/>
                          <label for="update_pro_image"></label>
                      </div>
                      <div class="avatar-preview">
                          <div id="imagePreview" style="background-image: url({{ asset('public/front-assets/img/profile_img/') }}/{{$get_details->pro_img}});">
                          </div>
                      </div>
                  </div>
                </form>
        		<div class="profile-main-text">
        			<h5>{{ucfirst($get_details->first_name)}} {{ucfirst($get_details->last_name)}}</h5>
        			<!-- <span>Software Engineer</span> -->
        		</div>
        	</div>

            <!-- <div class="contact-information-section userdetails_section">
                <h3>Contact Information</h3>
                <div class="row px-3 my-2 my-md-0 my-lg-0">
                    <div class="col-lg-3 col-12 col-md-4 px-0">
                        <div class="Information-details">
                            <span>First Name <span class="bullet">:</span></span>
                        </div>                          
                    </div>
                    <div class="col-lg-3 col-12 col-md-4 px-0">
                        <div class="Information-details_One">
                            <span>Joan</span>
                        </div>
                    </div>
                </div>
                <div class="row px-3 my-2 my-md-0 my-lg-0">
                    <div class="col-lg-3 col-12 col-md-4 px-0">
                        <div class="Information-details">
                            <span>Last Name <span class="bullet">:</span></span>
                        </div>                          
                    </div>
                    <div class="col-lg-3 col-12 col-md-4 px-0">
                        <div class="Information-details_One">
                            <span>Joan</span>
                        </div>
                    </div>
                </div>
                <div class="row px-3 my-2 my-md-0 my-lg-0">
                    <div class="col-lg-3 col-12 col-md-4 px-0">
                        <div class="Information-details">
                            <span> Phone Number <span class="bullet-1">:</span></span>
                        </div>                          
                    </div>
                    <div class="col-lg-3 col-12 col-md-4 px-0">
                        <div class="Information-details_One">
                            <span>00000000-00</span>
                        </div>
                    </div>
                </div>
                <div class="row px-3 my-2 my-md-0 my-lg-0">
                    <div class="col-lg-3 col-12 col-md-4 px-0">
                        <div class="Information-details">
                            <span>Email<span class="bullet-2">:</span></span>
                        </div>                          
                    </div>
                    <div class="col-lg-3 col-12 col-md-4 px-0">
                        <div class="Information-details_One">
                            <span>Joan@gamil.com</span>
                        </div>
                    </div>
                </div>
                <div class="row px-3 my-2 my-md-0 my-lg-0">
                    <div class="col-lg-3 col-12 col-md-4 px-0">
                        <div class="Information-details">
                            <span>Country<span class="bullet-2">:</span></span>
                        </div>                          
                    </div>
                    <div class="col-lg-3 col-12 col-md-4 px-0">
                        <div class="Information-details_One">
                            <span>India</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="cantact-edit">
                            <button class="show_edit_profile_form">Edit</button>
                        </div>
                    </div>
                </div>
            </div> -->

            <form action="{{route('update_user_details')}}" name="update_user_profile" method="post" class="update_user_profile" id="update_user_profile">
                @csrf
            	<div class="contact-information-section">
            		<h3>Contact Information</h3>
            		<div class="row px-3 my-2 my-md-0 my-lg-0">
            			<div class="col-lg-3 col-12 col-md-4 px-0">
            				<div class="Information-details">
            					<span>First Name <span class="bullet">:</span></span>
            				</div>            				
            			</div>
            			<div class="col-lg-3 col-12 col-md-4 px-0">
        					<div class="Information-details_One">
        						<!-- <span>{{ucfirst($get_details->first_name)}}</span> -->
                                <input type="text" name="firstname" value="{{ucfirst($get_details->first_name)}}" class=" firstname userdetails_fields uneditable" disabled>
        					</div>
            			</div>
            		</div>
            		<div class="row px-3 my-2 my-md-0 my-lg-0">
            			<div class="col-lg-3 col-12 col-md-4 px-0">
            				<div class="Information-details">
            					<span>Last Name <span class="bullet">:</span></span>
            				</div>            				
            			</div>
            			<div class="col-lg-3 col-12 col-md-4 px-0">
        					<div class="Information-details_One">
        						<!-- <span>{{ucfirst($get_details->last_name)}}</span> -->
                                <input type="text" name="lastname" value="{{ucfirst($get_details->last_name)}}" class=" lastname userdetails_fields uneditable" disabled>
        					</div>
        				</div>
            		</div>
            		<div class="row px-3 my-2 my-md-0 my-lg-0">
            			<div class="col-lg-3 col-12 col-md-4 px-0">
            				<div class="Information-details">
            					<span> Phone Number <span class="bullet-1">:</span></span>
            				</div>            				
            			</div>
            			<div class="col-lg-3 col-12 col-md-4 px-0">
        					<div class="Information-details_One">
        						<!-- <span>00000000-00</span> -->
                                <input type="text" name="phone" value="{{$get_details->phone}}" class="phone userdetails_fields uneditable" disabled>
        					</div>
        				</div>
            		</div>
            		<div class="row px-3 my-2 my-md-0 my-lg-0">
            			<div class="col-lg-3 col-12 col-md-4 px-0">
            				<div class="Information-details">
            					<span>Email<span class="bullet-2">:</span></span>
            				</div>            				
            			</div>
            			<div class="col-lg-3 col-12 col-md-4 px-0">
        					<div class="Information-details_One">
        						<!-- <span>{{$get_details->email}}</span> -->
                                <input type="email" name="email" value="{{$get_details->email}}" class="email userdetails_fields uneditable" disabled>
        					</div>
        				</div>
            		</div>
            		<div class="row px-3 my-2 my-md-0 my-lg-0">
            			<div class="col-lg-3 col-12 col-md-4 px-0">
            				<div class="Information-details">
            					<span>Country<span class="bullet-3">:</span></span>
            				</div>            				
            			</div>
            			<div class="col-lg-3 col-12 col-md-4 px-0">
        					<div class="Information-details_One">
        						<!-- <span>{{ucfirst($get_details->country)}}</span> -->
                                <select name="country" class="country userdetails_fields uneditable" disabled>
                                    <option value="">---Country---</option>
                                    @foreach($all_countries as $all_country)
                                        <option {{($get_details->country == $all_country->code ) ? 'selected' : '' ;}}  value="{{$all_country->code}}">{{$all_country->name}}</option>
                                    @endforeach
                                    <!-- <option {{($get_details->country =='uk') ? 'selected' : '' ;}} value="uk">Uk</option>
                                    <option {{($get_details->country =='india') ? 'selected' : '' ;}}  value="india">India</option>
                                    <option {{($get_details->country =='pakistan') ? 'selected' : '' ;}} value="pakistan">Pakistan</option> -->
                                </select>
        					</div>
        				</div>
            		</div>
            		<div class="row">
            			<div class="col-12">
            				<div class="cantact-edit"> 
                                <p class="pro_details_error"></p>
                            <button type="button" class="userdetails_editbutton">Edit</button>                              
            					<!-- <input type="" name="userdetails_editbutton" class="userdetails_editbutton" value="edit"> -->
            				</div>
            			</div>
            		</div>
            	</div>

        	</form>
        </div>
    </div>
</div>
<!-- <script src="{{asset('public/front-assets/js/jquery.min.js')}}"></script> -->
<!-- <script src="{{asset('public/backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script> -->

<script type="text/javascript">

function user_profile_readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#imagePreview').css('background-image', 'url('+e.target.result +')');
              $('#imagePreview').hide();
              $('#imagePreview').fadeIn(650);
          }
          reader.readAsDataURL(input.files[0]);

        }
    }  
    $('#update_pro_image').change(function(e){
      e.preventDefault();
      $('#update_profile_img_form').submit();
    });

    $('#update_profile_img_form').submit(function(e) {
         e.preventDefault();
         //alert('fsf');

         let formData = new FormData(this);
         // Append data 
         //formData.append('file',files[0]);
         //formData.append('_token',CSRF_TOKEN);
        $.ajax({
            type:'POST',
            url: "{{route('update_profile_image') }}",
            data: formData,
            //data : {},
            cache:false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: (response) => {                
                if (response) {
                    this.reset();                    
                    toastr.success('Image has been updated successfully');
                }
            }
             
        });
    });
</script>
@endsection