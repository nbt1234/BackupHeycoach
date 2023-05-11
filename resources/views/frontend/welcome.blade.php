@extends('frontend/index')
@section('content')

<div class="wellcome-section">
    <h2 class="pb-3 text-center">Welcome</h2>


    <div class="wellcome_img">
        <div class="well-come-icon-section" href="{{asset('public/front-assets/vedio/Welcome Video_1.mp4')}}" data-fancybox data-caption="">
            <i class="fa fa-play"></i>
        </div>
        <img src="{{asset('public/front-assets/img/wellcome_bg.jpg')}}"/ class="rounded wellcome-innner w-100">        
    </div>


    <div class="Welcome_Btn mt-4 mt-lg-5 text-center">
        <a href="{{route('frontend.signin')}}"><button class="login-btn-1 mr-lg-2 mr-0">Sign in</button></a>
        <a href="{{route('frontend.signup')}}"><button  class="login-btn-2 ml-lg-2 ml-0">Sign up</button></a>
    </div>
</div>

@endsection