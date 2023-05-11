<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="{{asset('public/front-assets/css/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('public/front-assets/css/responsive.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('public/front-assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('public/front-assets/css/font-awesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('public/front-assets/css/font-awesome.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('public/front-assets/css/jquery.fancybox.min.css')}}">
        <!-- TOASTR -->
        <link rel="stylesheet" href="{{ asset('public/backend/plugins/toastr/toastr.min.css') }} ">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{asset('public/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
        <!--   <link rel="stylesheet" href="{{asset('public/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}"> -->
        <!--   <link rel="stylesheet" href="{{asset('public/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}"> -->

        <script src="{{asset('public/front-assets/js/jquery.min.js')}}"></script>

        <title>Hey Coach</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


        <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />   
         <!-- Am chart graph for step 9 -->
          <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
          <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
          <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
          <script src="https://cdn.amcharts.com/lib/5/themes/Responsive.js"></script>



         <!-- Am chart graph for step 9 end -->    

@include('cookie-consent::index')
    </head>
    <body>
<style>
#slide {
    position: fixed;
    right: -600px;
    bottom: 15px;
    background-size: 100%!important;
    width: 110px;
    height: 48px;
    letter-spacing: 2px;
    cursor: pointer;
    outline: none;
    border: none;
    display: grid;
    color: #1ea19b;
    place-items: center;
    -webkit-animation: slide 0.5s forwards;
    -webkit-animation-delay: 2s;
    animation: slide 1s forwards;
    animation-delay: 3s;
    padding-left: 10px;
    padding-bottom: 2px;
    z-index: 999;
}

@-webkit-keyframes slide {
    100% { right:50px; }
}

@keyframes slide {
    100% { right: 50px; }
}

html,body{
  overflow-x: hidden;
}


@media screen and (min-width: 320px) and (max-width: 767px) {

#slide{
  margin-right: -15px;
}

}
</style>
<!-- <button type="button" >Help</button> -->
<button id="slide" style="background: url('https://urlsdemo.xyz/heycoachnew/public/front-assets/img/help-bg.png') no-repeat;" type="button" class=""  data-toggle="modal" data-target="#modal-default">@if(array_key_exists('as', Request::route()->action))
        @if(Request::route()->action['as']  == 'getstep9')Coach <span>Me</span>
        @else
            help
        @endif
    @else
            Help
    @endif</button>
<!-- <img id="slide" src="{{asset('public/front-assets/img/help-bg.png')}}"  data-toggle="modal" data-target="#modal-default"> -->



        <div class="welcome">
            <div class="container">                

                <!-----Menu Items------>
                <div class="row align-items-center">
                    <div class="col-md-6 col-12 logo_section">
                            <a href="{{url('/')}}"><img src="{{asset('public/front-assets/img/logo.png')}}"></a>
                    </div>
                    <div class="col-12 col-md-6 text-right Header_Icon">
                        <ul class="main_menus">
                            <li><a href="#"><i class="fa fa-bars show_hide_bar_icon" aria-hidden="true"></i></a>
                                <ul class="submenu">
                                    <li><a href="{{route('AboutUsPage')}}">About Us</a></li>
                                    <li><a href="{{route('FrontentVideosLibrary')}}">Video Library</a></li>
                                    <li><a href="{{route('ContactUsPage')}}">Contact Us</a></li>
                                     @if(Auth::guard('frontuser')->check() || Auth::check())
                                       @if(Auth::guard('frontuser')->check())
                                         @php 
                                          $user_id = Auth::guard('frontuser')->id();
                                          $data = DB::table('my_focusgoals_models')->where('user_id', $user_id)->first();
                                         @endphp
                                        <li><a href="{{($data) ? $data->current_step : 'step1';}}">Coaching</a></li>
                                        <li><a href="{{route('overview')}}">Overview</a></li>
                                       @endif
                                     @endif
                                </ul>
                            </li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            @if(Auth::guard('frontuser')->check() || Auth::check())                                  
                                <li><a href="#"><i class="fa fa-user-o show_hide_bar_icon" aria-hidden="true"></i></a> 
                                    <ul class="submenu">
                                        <li><a href="{{route('my_profile')}}">My Profile</a></li>
                                        <li><a href="{{route('all_my_goals')}}">My Goals</a></li>
                                        <li><a href="{{route('all_my_booking')}}">My Bookings</a></li>
                                        <li><a href="{{route('userlogout')}}">Logout</a></li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <!-----/Menu Items------>
                <!------Show Falsh messages------>                
                @if (Session::has('flash-success'))
                    <p class="all_step_popup_alert" onclick="toastr_success('{{ session('flash-success')}}')"></p>
                @endif
                @if (Session::has('flash-error'))
                    <p class="all_step_popup_alert" onclick="toastr_danger('{{ session('flash-error')}}')"></p>
                @endif  
                <!-----/ Show Flash messages----->
                  <!-- Show popup after sucess or fail -->
                    <div class="modal fade all_step_popup" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                                @if (Session::has('flash-success'))
                                    <p>{{ session('flash-success')}}</p>
                                @endif
                                @if (Session::has('flash-error'))
                                    <p>{{ session('flash-error')}}</p>
                                @endif
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn alex-popup-btn-second highlight_amount" data-dismiss="modal">Ok</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  <!-- Show popup after sucess or fail -->

                

                @yield('content')
                 <!-- Help icon booking session in all -->

                  <div class="modal fade book_slot_model" id="modal-default">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Select Booking Slot</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('user_book_slot')}}" method="POST" name="slot_booking_form" id="slot_booking_form" class="slot_booking_form {{Auth::guard('frontuser')->check() || Auth::check() ? '' : 'check_auth_during_booking'}}">
                                            @csrf
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class='col-sm-12'>
                                                        <div class="form-group">
                                                            <label for="slot_date">Select Date</label>
                                                            <select name="selected_slot" class="slot_date user_choose_slote_date">
                                                                <option value="">Select Date</option>
                                                                @foreach ($all_slotss as $all_slot)                
                                                                    <option value="{{$all_slot->id}}" data-id="{{$all_slot->id}}" class="slot_id">{{$all_slot->date}}</option>
                                                                @endforeach                
                                                            </select>
                                                        </div>
                                                    </div>
                                                
                                                    <div class='col-sm-6'>
                                                        <div class="form-group">
                                                            <label for="start_time">Start Time:</label>
                                                            <div class='input-group date'>
                                                                <input type='text' class="form-control" name="start_time" value="" id="start_time">                
                                                            </div>
                                                        </div>
                                                    </div>
                                                  
                                                    <div class='col-sm-6'>
                                                        <div class="form-group">
                                                            <label for="end_time">End Time:</label>
                                                            <div class='input-group date'>
                                                                <input type='text' class="form-control" id="end_time" value="" name="end_time"/>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="card-footer bg-transparent border-0">
                                              <button type="submit" class="btn btn-primary">Book slot</button>
                                            </div>        
                                        </form>
                                    </div>
                                </div>
                         
                            </div>

                  </div>
              
                
            </div>
        </div>





        <script type="text/javascript">
            var base_url = "<?php echo url('') . '/'; ?>"
            var csrf_token = "{{csrf_token()}}";
        </script>
        <!-- <script src="{{asset('public/front-assets/js/jquery-3.2.1.slim.min.js')}}"></script> -->
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
        <script src="{{asset('public/backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
        <script src="{{asset('public/front-assets/js/popper.min.js')}}"></script>
        <script src="{{asset('public/front-assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('public/front-assets/js/jquery.fancybox.min.js')}}"></script>

        <!-- Am chart graph for step 9 -->
       <!--    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
          <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
          <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script> -->
         <!-- Am chart graph for step 9 end -->

        <!---Toastr flash message---->
        <script src="{{ asset('public/backend/plugins/toastr/toastr.min.js') }}"></script>
        <!---Sweet Alert message for step 9 start---->
              <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!---Sweet Alert message for step 9 end---->

        <script src="{{asset('public/front-assets/js/custom.js')}}" type="text/javascript" ></script>

        <!-- jquery-validation -->
        <script src="{{asset('public/front-assets/js/jquery.validate.min.js')}}"></script>

        <!-- DataTables  & Plugins -->
      <script src="{{asset('public/backend/dist/js/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('public/backend/dist/js/dataTables.bootstrap4.min.js')}}"></script>

     



        <script type="text/javascript">
            function videoId(button) {
  var $videoUrl = button.attr("data-video");
  if ($videoUrl !== undefined) {
    var $videoUrl = $videoUrl.toString();
    var srcVideo;

    if ($videoUrl.indexOf("youtube") !== -1) {
      var et = $videoUrl.lastIndexOf("&");
      if (et !== -1) {
        $videoUrl = $videoUrl.substring(0, et);
      }
      var embed = $videoUrl.indexOf("embed");
      if (embed !== -1) {
        $videoUrl =
          "https://www.youtube.com/watch?v=" +
          $videoUrl.substring(embed + 6, embed + 17);
      }

      srcVideo =
        "https://www.youtube.com/embed/" +
        $videoUrl.substring($videoUrl.length - 11, $videoUrl.length) +
        "?autoplay=1&mute=1&loop=1&playlist=" +
        $videoUrl.substring($videoUrl.length - 11, $videoUrl.length) +
        "";
    } else if ($videoUrl.indexOf("youtu") !== -1) {
      var et = $videoUrl.lastIndexOf("&");
      if (et !== -1) {
        $videoUrl = $videoUrl.substring(0, et);
      }
      var embed = $videoUrl.indexOf("embed");
      if (embed !== -1) {
        $videoUrl =
          "https://youtu.be/" + $videoUrl.substring(embed + 6, embed + 17);
      }

      srcVideo =
        "https://www.youtube.com/embed/" +
        $videoUrl.substring($videoUrl.length - 11, $videoUrl.length) +
        "?autoplay=1&mute=1&loop=1&playlist=" +
        $videoUrl.substring($videoUrl.length - 11, $videoUrl.length) +
        "";
    } else if ($videoUrl.indexOf("vimeo") !== -1) {
      srcVideo =
        "https://player.vimeo.com/video/" +
        $videoUrl
          .substring($videoUrl.indexOf(".com") + 5, $videoUrl.length)
          .replace("/", "") +
        "?autoplay=1";
    } else if ($videoUrl.indexOf("mp4") !== -1) {
      return (
        '<video loop playsinline autoplay><source src="' +
        $videoUrl +
        '" type="video/mp4"></video>'
      );
    } else if ($videoUrl.indexOf("m4v") !== -1) {
      return (
        '<video loop playsinline autoplay><source src="' +
        $videoUrl +
        '" type="video/mp4"></video>'
      );
    } else {
      alert(
        "The video assigned is not from Youtube, Vimeo or MP4, remember to enter the correct complete video link .\n - Youtube: https://www.youtube.com/watch?v=43ngkc2Ejgw\n - Vimeo: https://vimeo.com/111939668\n - MP4 https://server.com/file.mp4"
      );
      return false;
    }
    return (
      '<iframe src="' +
      srcVideo +
      '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
    );
  } else {
    alert("No video assigned.");
    return false;
  }
}

$('body').on('click', '.lets-play', function (e) {
  e.preventDefault();
  var $theVideo = videoId($(this));
  if ($theVideo) {
    $("body")
      .append(
        '<div class="active" id="video-wrap"><span class="video-overlay"></span><div class="video-container">' +
          $theVideo +
          '</div><button class="close-video">x</button></div>'
      )
      .addClass("active");
  }
});

$(document).on("click", ".close-video, .video-overlay", function () {
  $("#video-wrap").remove();
});

        </script>
        
<script>
  $(".show_hide_bar_icon").click(function(){
    $(".submenu").toggle();
  });

</script>
<!--Start of Tawk.to Script-->
<!-- <script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/6360da57b0d6371309cc9f81/1ggp59qej';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
</script> -->
<!--End of Tawk.to Script-->

<script>
  $('.check_auth_during_booking').on('submit', function(e){
    e.preventDefault();
     $(this).before('<p style="color:red;">You are not login to book sesion. Please <a href="{{route("frontend.signin")}}">Login</a> first to book session.</p>');
      return  false;
  });

</script>

@if(Session::has('increase-month'))
    <script>
        $('.modal_show_increase_month').modal({backdrop: 'static', keyboard: false});
        $('.modal_show_increase_month').modal('show');
    </script>
@endif

    </body>
</html>
