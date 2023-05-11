@extends('frontend/index')
@section('content')
<style>
    
/*.main .container{
    max-width: 920px !important;
    margin: auto;
}*/
.start-heading h2{
    text-transform: uppercase;
    font-size: 57px;
    font-weight: 700;
    color: #343434;
}

svg{
    max-width: 100%;
    height: auto;
}

@media screen and (min-width: 320px) and (max-width: 767px) { 
.desktop{
    display: none!important;
}

.mobile{
    display: block!important;
}
}

/*
html,body{
    overflow-x: hidden;
}*/
.contant-section {
position: relative;
}
.contant-section:before {
content: "";
background: url("public/front-assets/img/shp2.png");
position: absolute;
right: 0;
width: 118px;
height: 160px;
background-repeat: no-repeat;
z-index: 99;
}
.contant-section p {
padding: 0px 120px;
text-align: right;
font-size: 11px;
font-weight: 700;
color: #343434;
width: 100%;
line-height: 16px;
}
.contant-section h3 {
padding: 0px 120px;
text-align: right;
font-size: 29px;
font-weight: 700;
margin-bottom: 0;
padding-top: 10px;
}
.contant-section-2 {
position: relative;

}
.contant-section-2:after {
content: "";
background: url("public/front-assets/img/shp2.png");
position: absolute;
width: 118px;
height: 160px;
background-repeat: no-repeat;
transform: rotate(180deg);
top: -7px;
left: 92px;
z-index: 99;
}
.contant-section-2 p {
padding: 0px 0px 0px 20% ;
font-size: 11px;
font-weight: 700;
color: #343434;
width: 100%;
line-height: 20px;
}
.contant-section-2 h3 {
padding: 43px 0px 0px 20%;
font-size: 29px;
font-weight: 700;
margin-bottom: 0;
}
.contant-section-2 img {
position: absolute;
left: 200px;
top: -2px;

}
/*
.contant-section-2.contant-section-4 img {
top: -17px;
}*/
.contant-section-2.contant-section-4::after {
top: -7px;
}
.contant-section-3.contant-section-6 img {
top: -9px;
}
.contant-section-3.contant-section-6::before {
top: -9px;
}
.contant-section-2.contant-section-5 img {
top: 0px;
}
.contant-section-2.contant-section-5::after {
top: -5px;
}
.contant-section-3 {
position: relative;
}
.contant-section-3:before {
content: "";
background: url("public/front-assets/img/shp2.png");
position: absolute;
right: 5px;
width: 118px;
height: 160px;
background-repeat: no-repeat;
top: -9px;
z-index: 99;
}
.contant-section-3 p {
padding: 0px 120px;
text-align: right;
font-size: 11px;
font-weight: 700;
color: #343434;
width: 100%;
line-height: 20px;
}
.contant-section-3 h3 {
padding: 0px 120px;
text-align: right;
font-size: 29px;
font-weight: 700;
margin-bottom: 0;
padding-top: 28px;
}
.contant-section-3 img {
position: absolute;
left: 22%;
top: -9px;

}
.bottam img {
position: unset;
margin-left: 23%;
margin-top:40px!important;
}
.bottam h3 {
text-transform: uppercase;
font-size: 57px;
font-weight: 700;
color: #343434;
padding: 0px 0px 0px 0;
text-align: right;
position: absolute;
right: 0px;
}
.overview-btn{
    padding-top: 100px;
}
@media (max-width: 767px){
.bl-two h3 {
padding-top: 60px!important;
}
.bl-three img {
top: 10px!important;
border-radius: 0 25px!important;
}
.bl-four img{
    top: 11px!important;
}
.bl-six img, .bl-six::after{
    top: 2px!important;
}
.bl-four h3 {
padding-top: 70px!important;
}
.bl-four::after{
top: 10px!important;
}
.bl-three::before{
    top: 9px!important;
}
.bl-five img, .bl-five::before{
    top: 0px!important;
}
    .bottam img,
    .contant-section-3 img,
    .contant-section-2 img,.contant-section img{
        object-fit: cover;
        /*width: 100%;*/
        width: calc(100% - 10%);
        height: 25px;
    }
.contant-section-3 h3{
    font-size: 21px!important;
}
.contant-section img{
        border-radius: 0 50px 0 0 ;
}
.contant-section-2 h3{
    font-size: 20px;
}
.main p{
height: 75px;
overflow-y: scroll;
}
.main p::-webkit-scrollbar {
width: 0px;
}
.main p::-webkit-scrollbar-track {
box-shadow: inset 0 0 5px transparent;
border-radius: 10px;
}

.main p::-webkit-scrollbar-thumb {
background: transparent;
border-radius: 10px;
}
.main p::-webkit-scrollbar-thumb:hover {
background: transparent;
}
    .contant-section p {
padding: 0px 40px 0px  0px;
overflow: hidden;
}
    .contant-section h3{
        padding: 10px 40px 0px 0px;
    }
    .contant-section:before{
        right: -110px;
    }
.contant-section-2 img {
top: 13px;
left: 52px;
width: calc(100% - 100px);
height: 24px;
}
.contant-section-2:after {
height: 200px;
top: 11px;
left: -38px;
}
.contant-section-3 h3 {
padding: 56px 0px 0px 0px;
}
.contant-section-3 p {
padding: 0px;

}
.contant-section-3 img {
left: 10%;
top: 24px;
width:calc(100% - 100px);
}
.contant-section-3:before {
content: "";
background: url("public/front-assets/img/shp2.png");
position: absolute;
right: -30px;
width: 118px;
height: 198px;
background-repeat: no-repeat;
top: 22px;
}
.contant-section-3 {
padding-right: 35px;
}
.bottam img {
position: unset;
margin-left: 13%;
margin-top: -14.7px
}
.contant-section-2 h3 {
padding: 45px 0px 0px 20%;
font-size: 20px;

}
.contant-section-2.contant-section-4 img {
top: 24px;
}
.contant-section-2.contant-section-4:after{
    top:23px
}
.contant-section-3.contant-section-6 img {
top: 45px;
}
.contant-section-3.contant-section-6:before{
    top: 44px;
}
.contant-section-2.contant-section-5 img {
top: 46px;
}
.contant-section-2.contant-section-5:after{
    top: 45px;
}
.bottam {
margin-top: -24px;
}
.contant-section-2.contant-section-4 h3 {
padding: 37px 0px 0px 72px;
}
.start-heading h2{
    font-size: 37px;
}
.bottam h3{
    font-size: 37px;
    padding: 0px;
}
.contant-section:before {
content: "";
background: url("public/front-assets/img/mobile.png") !important;
position: absolute;
right: -32px;
width: 118px;
height: 235px;
background-repeat: no-repeat !important;
top: 1px;
z-index: 99;
}
.contant-section-2:after{
    background: url("public/front-assets/img/mobile.png") no-repeat;
}
.contant-section-3:before{
    background: url("public/front-assets/img/mobile.png") no-repeat;
}
}
@media only screen and (min-width:768px) and (max-width: 991px) {
.bl-two h3 {
padding-top: 60px!important;
}
.bl-three img {
top: 10px!important;
border-radius: 0 25px!important;
}
.bl-four img{
    top: 11px!important;
}
.bl-six img, .bl-six::after{
    top: 2px!important;
}
.bl-four h3 {
padding-top: 70px!important;
}
.bl-four::after{
top: 10px!important;
}
.bl-three::before{
    top: 9px!important;
}
.bl-five img, .bl-five::before{
    top: 0px!important;
}
    .bottam img,
    .contant-section-3 img,
    .contant-section-2 img,.contant-section img{
        object-fit: cover;
        /*width: 100%;*/
        width: calc(100% - 10%);
        height: 25px;
    }
.contant-section-3 h3{
    font-size: 21px!important;
}
.contant-section img{
        border-radius: 0 50px 0 0 ;
}
.contant-section-2 h3{
    font-size: 20px;
}
.main p{
height: 75px;
overflow-y: scroll;
margin-top: 15px;
margin-bottom: 0px;
font-size: 14px;
}
.main p::-webkit-scrollbar {
width: 0px;
}
.main p::-webkit-scrollbar-track {
box-shadow: inset 0 0 5px transparent;
border-radius: 10px;
}

.main p::-webkit-scrollbar-thumb {
background: transparent;
border-radius: 10px;
}
.main p::-webkit-scrollbar-thumb:hover {
background: transparent;
}
    .contant-section p {
padding: 0px 40px 0px  0px;
overflow: hidden;
}
    .contant-section h3{
        padding: 10px 40px 0px 0px;
    }
    .contant-section:before{
        right: -110px;
    }
.contant-section-2 img {
top: 13px;
left: 52px;
width: calc(100% - 100px);
height: 24px;
}
.contant-section-2:after {
height: 200px;
top: 11px;
left: -38px;
}
.contant-section-3 h3 {
padding: 56px 0px 0px 0px;
}
.contant-section-3 p {
padding: 0px;

}
.contant-section-3 img {
left: 10%;
top: 24px;
width:calc(100% - 100px);
}
.contant-section-3:before {
content: "";
background: url("public/front-assets/img/shp2.png");
position: absolute;
right: -30px;
width: 118px;
height: 198px;
background-repeat: no-repeat;
top: 22px;
}
.contant-section-3 {
padding-right: 35px;
}
.bottam img {
position: unset;
margin-left: 10%;
margin-top: -14.7px
}
.contant-section-2 h3 {
padding: 45px 0px 0px 10%;
font-size: 20px;

}
.contant-section-2 p {
padding: 0px 0px 0px 10%;
}
.contant-section-2.contant-section-4 img {
top: 24px;
}
.contant-section-2.contant-section-4:after{
    top:23px
}
.contant-section-3.contant-section-6 img {
top: 45px;
}
.contant-section-3.contant-section-6:before{
    top: 44px;
}
.contant-section-2.contant-section-5 img {
top: 46px;
}
.contant-section-2.contant-section-5:after{
    top: 45px;
}
.bottam {
margin-top: -24px;
}
.start-heading h2{
    font-size: 37px;
}
.bottam h3{
    font-size: 37px;
    padding: 0px;
}
.contant-section:before {
content: "";
background: url("public/front-assets/img/mobile.png") !important;
position: absolute;
right: -32px;
width: 118px;
height: 235px;
background-repeat: no-repeat !important;
top: 1px;
z-index: 99;
}
.contant-section-2:after{
    background: url("public/front-assets/img/mobile.png") no-repeat;
}
.contant-section-3:before{
    background: url("public/front-assets/img/mobile.png") no-repeat;
}
}
/*@media only screen and (min-width: 991px) and (max-width: 1280px) {
    .bottam img{
        width: 80%;
height: 28px;
}
.bottam h3 {
text-transform: uppercase;
font-size: 47px;
}
}*/
@media only screen and (min-width:992px) and (max-width: 1600px) {
.bl-two h3 {
padding-top: 60px!important;
}
.bl-three img {
top: 10px!important;
border-radius: 0 25px!important;
}
.bl-four img{
    top: 11px!important;
}
.bl-six img, .bl-six::after{
    top: 2px!important;
}
.bl-four h3 {
padding-top: 70px!important;
}
.bl-four::after{
top: 10px!important;
}
.bl-three::before{
    top: 9px!important;
}
.bl-five img, .bl-five::before{
    top: 0px!important;
}
    .bottam img,
    .contant-section-3 img,
    .contant-section-2 img,.contant-section img{
        object-fit: cover;
        /*width: 100%;*/
        width: calc(100% - 7%);
        height: 25px;
    }
.contant-section-3 h3{
    font-size: 21px!important;
}
.contant-section img{
        border-radius: 0 50px 0 0 ;
}
.contant-section-2 h3{
    font-size: 20px;
}
.main p{
height: 75px;
overflow-y: scroll;
margin-top: 15px;
margin-bottom: 0px;
font-size: 14px;
}
.main p::-webkit-scrollbar {
width: 0px;
}
.main p::-webkit-scrollbar-track {
box-shadow: inset 0 0 5px transparent;
border-radius: 10px;
}

.main p::-webkit-scrollbar-thumb {
background: transparent;
border-radius: 10px;
}
.main p::-webkit-scrollbar-thumb:hover {
background: transparent;
}
    .contant-section p {
padding: 0px 40px 0px  0px;
overflow: hidden;
}
    .contant-section h3{
        padding: 10px 40px 0px 0px;
    }
    .contant-section:before{
        right: -110px;
    }
.contant-section-2 img {
top: 13px;
left: 52px;
width: calc(100% - 100px);
height: 24px;
}
.contant-section-2:after {
height: 200px;
top: 11px;
left: -38px;
}
.contant-section-3 h3 {
padding: 56px 0px 0px 0px;
}
.contant-section-3 p {
padding: 0px;

}
.contant-section-3 img {
left: 6%;
top: 24px;
width:calc(100% - 100px);
}
.contant-section-3:before {
content: "";
background: url("public/front-assets/img/shp2.png");
position: absolute;
right: -30px;
width: 118px;
height: 198px;
background-repeat: no-repeat;
top: 22px;
}
.contant-section-3 {
padding-right: 35px;
}
.bottam img {
position: unset;
margin-left: 9%;
margin-top: -14.7px
}
.contant-section-2 h3 {
padding: 45px 0px 0px 10%;
font-size: 20px;

}
.contant-section-2 p {
padding: 0px 0px 0px 10%;
}
.contant-section-2.contant-section-4 img {
top: 24px;
}
.contant-section-2.contant-section-4:after{
    top:23px
}
.contant-section-3.contant-section-6 img {
top: 45px;
}
.contant-section-3.contant-section-6:before{
    top: 44px;
}
.contant-section-2.contant-section-5 img {
top: 46px;
}
.contant-section-2.contant-section-5:after{
    top: 45px;
}
.bottam {
margin-top: -24px;
}
.start-heading h2{
    font-size: 37px;
}
.bottam h3{
    font-size: 37px;
    padding: 0px;
}
.contant-section:before {
content: "";
background: url("public/front-assets/img/mobile.png") !important;
position: absolute;
right: -32px;
width: 118px;
height: 235px;
background-repeat: no-repeat !important;
top: 1px;
z-index: 99;
}
.contant-section-2:after{
    background: url("public/front-assets/img/mobile.png") no-repeat;
}
.contant-section-3:before{
    background: url("public/front-assets/img/mobile.png") no-repeat;
}
}

.desktop{
    display: block;
}

text, tspan {
    font-family: 'Quicksand', sans-serif;
}
</style>
<div class="sing-up">
    <ul class="nav">
        <li class="nav-item your-spend-bg">
            <a class="nav-link active" href="#profile" role="tab" data-toggle="tab">Welcome</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#buzz" role="tab" data-toggle="tab">Goals</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="#references" role="tab" data-toggle="tab">Know Your Spend</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#Match_Goal" role="tab" data-toggle="tab">Match Goal to Gap</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#Action_Plan" role="tab" data-toggle="tab">Adjust Spending</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#Action_Plan" role="tab" data-toggle="tab">Action Plan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#Learn_Action" role="tab" data-toggle="tab">Goal Tracking</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#Achieve_Goal" role="tab" data-toggle="tab">Achieve Goal</a>
        </li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        
        <div role="tabpanel" class="tab-pane fade active show" id="buzz">
            <div class="tabs_ineer">
                {{--    <h5>Hey {{$username}}! Thanks for signing up. HeyCoach is excited to start this journey with you. Before we get going here is an outline of the steps you will follow.</h5>
                
                <div class="row mt-2 mt-md-5">
                    <div class="col-lg-4 col-md-6 col-sm-6 my-3">
                        <div class="overview-contant">
                            <h4>1.Goals</h4>
                            <div class="overview-ineer">
                                <div class="inner-content">
                                    <!-- <p class=" w-100">Here you choose specifc <b>money goals</b> that are important to you.</p> -->
                                    <!-- <p class=" w-100">
                                            As you move through the steps you will begin to see why your
                                            goals have been so hard to reach. How you <b>think</b> you spend
                                            your money might not <b>actually</b> be what is happening.
                                    </p> -->
                                    <p class=" w-100">
                                        Here you choose specific money goals that are important to you.They should be SMART goals: Specific, Measurable, Achievable, Realistic and Timely.
                                    </p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 my-3">
                        <div class="overview-contant">
                            <h4>2.Know Your Spend</h4>
                            <div class="overview-ineer">
                                <div class="inner-content">
                                    <!-- <p class=" w-100">Part 1: Where you <b>think</b> you spend your money. Don't pull up your banking app just put down your best guess for each category.
                                    </p> -->
                                    <!-- <p class=" w-100">
                                            Part 2: Where you <b>actually</b> spend your money. Here you login to your bank and use your actual bank statements. Don't worry HeyCoach will guide you through this step.
                                    </p> -->
                                    <p class=" w-100">
                                        Then compare what you <b>think</b> you spend with your <b>actual</b> spend based on your bank statements to know how your money is working for you
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 my-3">
                        <div class="overview-contant">
                            <h4>3.Match Goal to Gap</h4>
                            <div class="overview-ineer">
                                <div class="inner-content">
                                    <!-- <p class=" w-100">
                                            By this step you have a good understanding of how you <b>actually</b> spend your money and what is a realistic goal. Armed with this knowledge you will choose to either <b>Adjust Goal</b> or move on to the next step......<b>Reduce Spending.</b>
                                    </p>
                                    <p class=" w-100">
                                            If your goal is <b>not looking realistic,</b> choose <b>Adjust Goal</b>.  Here you make changes to your goal amount or the time frame.
                                    </p> -->
                                    <p class=" w-100">
                                        Now that you know what you are actually spending each month you can choose to either adjust your goal to make it more realistic or move to the next step to see where to adjust your spending to achieve your goal.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 my-3">
                        <div class="overview-contant">
                            <h4>4.Adjust Spending</h4>
                            <div class="overview-ineer">
                                <div class="inner-content">
                                    <!-- <p class=" w-100">This is where your plan starts coming together. In this step you will make room in your monthly spending to support your goal.
                                    </p>
                                    <p class=" w-100">
                                            HeyCoach will make it simple and give you tips, and tricks. <b>You just need to make the commitment.</b>
                                    </p> -->
                                    <p class=" w-100">
                                        This is where your plan starts coming together.  In this step you will make room in your monthly spending to support your goal and commit to actions to support this.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 my-3">
                        <div class="overview-contant">
                            <h4>5.Action Plan</h4>
                            <div class="overview-ineer">
                                <!-- <p class=" w-100">
                                        Here you will set your weekly action plan  and HeyCoach will help you track it every step of the way.
                                </p> -->
                                <p class=" w-100">
                                    Goals are more manageable when broken into bite-sized chunks.  HeyCoach helps you translate your monthly actions into a weekly action plan.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 my-3">
                        <div class="overview-contant">
                            <!-- <h4>6.Weekly Check In</h4> -->
                            <h4>6.Goal Tracking </h4>
                            <div class="overview-ineer">
                                <!-- <p class=" w-100">
                                        Check out how well you are doing or ask HeyCoach for help. That’s what we are here for.
                                </p> -->
                                <p class=" w-100">
                                    Check out how well you are doing against your goal each week.  If you’re struggling with achieving your action plan sign up for our regular coaching sessions where we gather as a HeyCoach community to share tips and tricks to reaching our goals.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <h5 class="mt-5">If you get stuck anywhere along the line why not join our weeklylive session where we will walk you through the process and address any questions you might have.  You can book your place using the (speech bubble HELP) icon at any stage.</h5>
                --}}
                
                <section class="main">
                   <!--  <div class="container">
                        <div class="start-heading">
                            <h2>start</h2>
                        </div>
                        <div class="contant-section">
                            <img src="{{asset('public/front-assets/img/shp1.jpg')}}">
                            <h3>Goals</h3>
                            <p>Here you choose specific money goals that are important to you. They should be SMART goals: Specific, Measurable, Achievable, Realistic and Timely.</p>
                            
                        </div>
                        <div class="contant-section-2 bl-two">
                            <img src="{{asset('public/front-assets/img/shp3.jpg')}}">
                            <h3>Know your spend</h3>
                            <p>Then compare what you think you spend with your actual spend based on your bank statements to know how your money is working for you.</p>
                            
                        </div>
                        <div class="contant-section-3 bl-three">
                            <img src="{{asset('public/front-assets/img/shp3.jpg')}}">
                            <h3>Match Goal to Gap</h3>
                            <p>Now that you know what you are actually spending each month you can choose to either adjust your goal to make it more realistic or move to the next step to see where to adjust your spending to achieve your goal.</p>
                            
                        </div>
                        <div class="contant-section-2 contant-section-4 bl-four">
                            <img src="{{asset('public/front-assets/img/shp3.jpg')}}">
                            <h3>Adjust spending</h3>
                            <p>This is where your plan starts coming together.  In this step you will make room in your monthly spending to support your goal and commit to actions to support this.</p>
                            
                        </div>
                        <div class="contant-section-3 contant-section-6 bl-five">
                            <img src="{{asset('public/front-assets/img/shp3.jpg')}}">
                            <h3>Action Plan</h3>
                            <p>Goals are more manageable when broken into bite-sized chunks.  HeyCoach helps you translate your monthly actions into a weekly action plan.</p>
                        </div>
                        <div class="contant-section-2 contant-section-5 bl-six">
                            <img src="{{asset('public/front-assets/img/shp3.jpg')}}">
                            <h3>Goal Tracking</h3>
                            <p>Check out how well you are doing against your goal each week. If you’re struggling with achieving your action plan sign up for our regular coaching sessions where we gather as a HeyCoach community to share tips and tricks to reaching our goals.</p>
                            <div class="bottam">
                                <img src="{{asset('public/front-assets/img/shp4.jpg')}}">
                                <h3>REACH GOAL</h3>
                            </div>
                        </div>
                        
                        
                    </div> -->
                  <div class="container desktop">
                       <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="1122px" height="1028px" viewBox="0 0 1122 1028" enable-background="new 0 0 1122 1028" xml:space="preserve">
                            <g>
                                <defs>
                                <rect id="SVGID_1_" width="1122" height="1028"></rect>
                                </defs>
                                <clipPath id="SVGID_2_">
                                <use xlink:href="#SVGID_1_" overflow="visible"></use>
                                </clipPath>
                                <path clip-path="url(#SVGID_2_)" fill="#36374B" d="M1117.05,919.15v27.693h-5.129c-293.323,0-586.646,0.258-879.967-0.318   c-37.746-0.074-69.415-24.937-78.883-61.876c-6.103-23.807-2.665-45.676,9.683-66.115c13.703-22.683,34.838-34.64,60.8-38.384   c3.931-0.567,7.927-0.959,11.893-0.96c223.826-0.045,447.651-0.036,671.476-0.046c27.313-0.002,49.739-17.405,55.429-42.915   c7.709-34.562-18.284-67.316-53.767-67.35c-103.829-0.096-207.658-0.035-311.488-0.036c-121.162,0-242.327,0.44-363.485-0.283   c-33.856-0.203-60.583-16.116-75.267-47.367c-19.945-42.45-3.677-90.273,37.181-111.702c11.699-6.135,24.776-9.224,38.007-9.233   c224.492-0.151,448.984-0.104,673.475-0.115c26.009-0.001,47.513-15.687,54.459-39.62c10.27-35.38-16.001-70.615-52.967-70.644   c-117.662-0.091-235.325-0.035-352.987-0.036c-107.329,0-214.661,0.432-321.987-0.226c-39.317-0.241-71.613-25.917-80.463-63.141   c-7.786-32.75,0.288-60.623,24.026-83.921c15.897-15.603,36.043-22.237,57.771-22.26c223.991-0.237,447.983-0.141,671.975-0.151   c26.708-0.001,48.227-16.068,54.92-40.915c9.339-34.672-16.699-69.119-52.582-69.347c-25.498-0.162-50.998-0.038-76.497-0.038   c-264.156-0.001-528.313-0.001-792.471-0.001H32.95V81.15h5.835c290.157,0,580.313-0.228,870.468,0.273   c38.485,0.066,70.433,25.273,79.618,62.226c7.073,28.454,1.111,53.472-16.999,75.707c-9.938,12.201-22.642,20.961-38.254,24.986   c-11.65,3.004-23.325,4.636-35.46,4.625c-193.159-0.175-386.318-0.13-579.479-0.116c-27.664,0.002-55.327,0.105-82.991,0.159   c-32.469,0.064-57.36,24.326-57.376,55.929c-0.017,31.713,24.771,56.026,57.255,56.036c224.323,0.071,448.646-0.154,672.968,0.467   c34.014,0.094,60.894,16.291,75.419,47.888c19.451,42.312,2.756,89.304-37.559,110.229c-11.716,6.081-24.785,9.17-38.021,9.181   c-198.326,0.15-396.652,0.1-594.978,0.108c-26.832,0.001-53.664-0.047-80.495,0.129c-27.628,0.181-50.132,20.414-54.272,48.504   c-3.8,25.78,12.707,52.143,38.056,59.775c6.416,1.932,13.418,2.683,20.152,2.688c223.824,0.165,447.648-0.082,671.472,0.479   c34.054,0.086,60.949,16.171,75.554,47.702c19.538,42.189,3.067,89.21-37.259,110.347c-11.717,6.141-24.801,9.234-38.004,9.247   c-198.159,0.181-396.319,0.123-594.478,0.127c-26.666,0.001-53.331-0.008-79.996,0.057c-31.376,0.077-55.81,24.23-55.815,55.088   c-0.004,30.825,24.497,55.102,55.781,55.287c48.122,0.285,96.242,0.816,144.364,0.833c243.825,0.086,487.651,0.04,731.478,0.04   H1117.05z"></path>
                            </g>
                            <g>
                                <defs>
                                <rect id="SVGID_3_" width="1122" height="1028"></rect>
                                </defs>
                                <clipPath id="SVGID_4_">
                                <use xlink:href="#SVGID_3_" overflow="visible"></use>
                                </clipPath>
                                
                                <path clip-path="url(#SVGID_4_)" fill="none" stroke="#5D5984" stroke-width="2" stroke-miterlimit="10" stroke-dasharray="12,12" d="   M57.95,94.253h855.237c0,0,56.321,14.546,64.373,58.566c0,0,3.387,77.522-64.373,82.269H229.868c0,0-65.67,0.059-69.626,72.234   c0,0,9.26,68.718,68.718,68.718h687.025c0,0,66.526,11.393,61.604,67.017c0,0,1.007,61.273-62.412,71.443H229.404   c0,0-62.833,5.023-62.041,68.52c0,0,0.791,73.782,62.505,73.782h684.396c0,0,65.457,9.495,63.585,67.253   c0,0,2.024,60.132-62.824,67.253H229.868c0,0-72.791,4.279-66.461,77.305c0,0,0.938,60.107,68.117,69.069l854.212-3.956"></path>
                            </g>
                            <text transform="matrix(1 0 0 1 60.084 58)" font-family="'Arial-BoldMT'" font-size="50">Start</text>
                            <text transform="matrix(1 0 0 1 830.5215 140)" font-family="'MyriadPro-Semibold'" font-size="30">Goals</text>
                            <rect x="304" y="170" fill="none" width="603" height="34"></rect>
                            <text transform="matrix(1 0 0 1 350.4946 159.9399)">
                                <tspan x="570" y="0" font-family="'MyriadPro-Regular'" margin-right="20px" font-size="14" text-anchor="end">Here you choose specific money goals that are important to you. They should be SMART goals: Specific, </tspan>


                                 <tspan x="570" y="21" font-family="'MyriadPro-Regular'" margin-right="20px" font-size="14" text-anchor="end">Measurable, Achievable, Realistic and Timely.</tspan>


                            




                            </text>
                            <text transform="matrix(1 0 0 1 224.2852 279)" font-family="'MyriadPro-Semibold'" font-size="30">Know Your Spend</text>


                            <rect x="231" y="316" fill="none" width="495" height="35"></rect>


                            <text transform="matrix(1 0 0 1 224 300.9399)">
                                <tspan x="0" y="0" font-family="'MyriadPro-Regular'" font-size="14">Then compare what you think you spend with your actual spend based on your bank statements to know </tspan>


                                 <tspan x="0" y="21" font-family="'MyriadPro-Regular'" font-size="14">how your money is working for you.</tspan></text>




                            <text transform="matrix(1 0 0 1 660 420)" font-family="'MyriadPro-Semibold'" font-size="30">Match Goal To Gap</text>



                            <rect x="412" y="453" fill="none" width="495" height="34"></rect>



                            <text transform="matrix(1 0 0 1 424.8755 442.9399)">

                                <tspan x="505" y="0" font-family="'MyriadPro-Regular'" font-size="14" text-anchor="end">Now that you know what you are actually spending each month you can choose to either adjust your goal</tspan>

                                 <tspan x="505" y="21" font-family="'MyriadPro-Regular'" font-size="14" text-anchor="end"> to make it more realistic or move to the next step to see where to adjust your spending to achieve</tspan>

                                 <tspan x="505" y="41" font-family="'MyriadPro-Regular'" font-size="14" text-anchor="end">  your goal.</tspan>




                              


                                  <tspan x="505" y="31" font-family="'MyriadPro-Regular'" font-size="14" text-anchor="end"></tspan>


                            </text>






                            <text transform="matrix(1 0 0 1 231 556.666)" font-family="'MyriadPro-Semibold'" font-size="30">Adjust Spending</text>
                            <rect x="232" y="594.999" fill="none" width="624.666" height="34"></rect>



                            <text transform="matrix(1 0 0 1 232.0005 575.9385)">
                                <tspan x="0" y="0" font-family="'MyriadPro-Regular'" font-size="14">This is where your plan starts coming together.  In this step you will make room in your monthly </tspan>
                                <tspan x="0" y="21" font-family="'MyriadPro-Regular'" font-size="14">spending to support your goal and commit to actions to support this.</tspan></text>




                            <text transform="matrix(1 0 0 1 760.7637 700)" font-family="'MyriadPro-Semibold'" font-size="30">Action Plan</text>
                            <rect x="145" y="737" fill="none" width="663" height="34"></rect>


                            <text transform="matrix(1 0 0 1 267.3623 720.3594)">

                                <tspan text-anchor="end" x="655" y="0" font-family="'MyriadPro-Regular'" font-size="16">Goals are more manageable when broken into bite-sized chunks. HeyCoach helps you </tspan>
                                <tspan x="655" y="21" font-family="'MyriadPro-Regular'" font-size="16" text-anchor="end">translate your monthly actions into a weekly action plan.</tspan></text>




                            <text transform="matrix(1 0 0 1 228.0044 838)" font-family="'MyriadPro-Semibold'" font-size="30">Goal Tracking</text>



                            <text transform="matrix(1 0 0 1 233 860)">

                                <tspan x="0" y="0" font-family="'MyriadPro-Regular'" font-size="14">Check out how well you are doing against your goal each week. If you’re struggling with achieving your action   </tspan>


                                <tspan x="0" y="21" font-family="'MyriadPro-Regular'" font-size="14">plan sign up for our regular coaching sessions where we gather as a HeyCoach community to share tips and</tspan>

                                <tspan x="0" y="41" font-family="'MyriadPro-Regular'" font-size="14"> tricks to reaching our goals.</tspan>

                            </text>





                            <text transform="matrix(1 0 0 1 820.5 1002)" font-family="'MyriadPro-Semibold'" font-size="50">REACH GOAL</text>
                        </svg>
                    </div>

                    <div class="container mobile px-0" style="display: none;">
                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 768 1500" style="enable-background:new 0 0 768 1500;" xml:space="preserve">
                        <style type="text/css">
                            .st0{fill:#38394D;}
                            .st1{clip-path:url(#SVGID_2_);fill:none;stroke:#5F5B86;stroke-width:2;stroke-miterlimit:10;stroke-dasharray:12,12;}
                            .st2{fill:#020202;}
                           
                            .st4{font-size:70px;}
                          
                            .st6{font-size:50px;}
                            .st7{enable-background:new    ;}
                            .st8{font-size:16px;font-weight: 500;}
                        </style>
                        <path class="st0" d="M737.82,1353.59v40.14h-7.43c-425.18,0-144.8,0.37-569.98-0.46c-54.71-0.11-100.62-36.15-114.34-89.69  c-8.85-34.51-3.86-66.21,14.04-95.84c19.86-32.88,50.5-50.21,88.13-55.64c5.7-0.82,11.49-1.39,17.24-1.39  c324.44-0.06,108.21-0.05,432.65-0.07c39.59,0,72.1-25.23,80.35-62.21c11.17-50.1-26.5-97.58-77.94-97.63  c-150.5-0.14-191.01-0.05-341.51-0.05c-175.63,0,81.04,0.64-94.59-0.41c-49.08-0.29-87.82-23.36-109.1-68.66  C26.42,860.16,50,790.84,109.23,759.77c16.96-8.89,35.91-13.37,55.09-13.38c325.41-0.22,108.52-0.15,433.93-0.17  c37.7,0,68.87-22.74,78.94-57.43c14.89-51.28-23.19-102.36-76.78-102.4c-170.56-0.13-231.11-0.05-401.67-0.05  c-155.58,0,119.52,0.63-36.06-0.33c-56.99-0.35-103.81-37.57-116.63-91.52c-11.29-47.47,0.42-87.87,34.83-121.65  c23.04-22.62,52.25-32.23,83.74-32.27c324.68-0.34,108.69-0.2,433.38-0.22c38.71,0,69.91-23.29,79.61-59.31  c13.54-50.26-24.21-100.19-76.22-100.52c-36.96-0.24,36.08-0.06-0.89-0.06c-382.9,0-564.24,0-564.24,0H25.74v-41.59h8.46  c0,0,146.71-0.33,567.3,0.4c55.78,0.1,102.1,36.63,115.41,90.2c10.25,41.24,1.61,77.51-24.64,109.74  c-14.41,17.69-32.82,30.38-55.45,36.22c-16.89,4.35-33.81,6.72-51.4,6.7c-279.99-0.25-109.31-0.19-389.3-0.17  c-40.1,0,9.8,0.15-30.3,0.23c-47.07,0.09-83.15,35.26-83.17,81.07c-0.02,45.97,35.91,81.21,82.99,81.23  c325.17,0.1,109.65-0.22,434.82,0.68c49.3,0.14,88.27,23.61,109.32,69.42c28.2,61.33,4,129.45-54.44,159.78  c-16.98,8.82-35.93,13.29-55.11,13.31c-287.48,0.22-122.66,0.14-410.15,0.16c-38.89,0,12.21-0.07-26.68,0.19  c-40.05,0.26-72.67,29.59-78.67,70.31c-5.51,37.37,18.42,75.58,55.16,86.65c9.3,2.8,19.45,3.89,29.21,3.9  c324.44,0.24,106.59-0.12,431.03,0.69c49.36,0.12,88.35,23.44,109.52,69.15c28.32,61.15,4.44,129.31-54.01,159.95  c-16.98,8.9-35.95,13.39-55.09,13.4c-287.24,0.26-123.8,0.18-411.04,0.18c-38.65,0,12.69-0.01-25.96,0.08  c-45.48,0.11-80.9,35.12-80.91,79.85c-0.01,44.68,35.51,79.87,80.86,80.14c69.75,0.41,49.51,1.18,119.26,1.21  c353.43,0.12,91.3,0.06,444.74,0.06L737.82,1353.59L737.82,1353.59z"></path>
                        <g>
                            <g>
                                <g>
                                    <defs>
                                        <rect id="SVGID_1_" x="-64.67" y="21.34" width="813.33" height="1489.95"></rect>
                                    </defs>
                                    <clipPath id="SVGID_2_">
                                        <use xlink:href="#SVGID_1_" style="overflow:visible;"></use>
                                    </clipPath>
                                    <path class="st1" d="M51.77,157.94h562.92c0,0,81.63,21.08,93.3,84.88c0,0,4.91,112.36-93.3,119.24H158.5     c0,0-95.18,0.09-100.91,104.69c0,0,13.42,99.6,99.6,99.6h461.56c0,0,96.42,16.51,89.29,97.13c0,0,1.46,88.81-90.46,103.55H157.82     c0,0-91.07,7.28-89.92,99.31c0,0,1.15,106.94,90.59,106.94h457.75c0,0,94.87,13.76,92.16,97.47c0,0,2.93,87.15-91.05,97.47H158.5     c0,0-105.5,6.2-96.33,112.04c0,0,1.36,87.12,98.73,100.11l535.21-5.73"></path>
                                </g>
                            </g>
                        </g>
                        <text transform="matrix(1 0 0 1 35.9832 110.067)" class="st2 st3 st4">Start</text>
                        <text transform="matrix(1 0 0 1 495.8164 234.4838)" class="st2 st5 st6">Goals</text>
                        <text transform="matrix(1 0 0 1 171.8126 258.308)" class="st7"><tspan x="-35px" y="0" class="st2 st5 st8">Here you choose specific money goals that are important to you.</tspan><tspan x="-18px" y="23" class="st2 st5 st8">They should be SMART goals: Specific, Measurable, Achievable,</tspan><tspan x="300px" y="46" class="st2 st5 st8">Realistic and Timely.</tspan></text>
                        <text transform="matrix(1 0 0 1 148.9678 444.035)" class="st2 st5 st6">Know your spend</text>
                        <text transform="matrix(1 0 0 1 148.9679 473.8593)" class="st7"><tspan x="0" y="0" class="st2 st5 st8">Then compare what you think you spend with your actual spend</tspan><tspan x="0" y="23" class="st2 st5 st8">based on your bank statements to know how your money is working</tspan><tspan x="0" y="46" class="st2 st5 st8">for you.</tspan></text>
                        <text transform="matrix(1 0 0 1 218.2744 636.9911)" class="st2 st5 st6">Match Goal to Gap</text>
                        <text transform="matrix(1 0 0 1 178.381 661.8153)" class="st7"><tspan x="-80" y="10" class="st2 st5 st8">Now that you know what you are actually spending each month you can</tspan><tspan x="-60" y="33" class="st2 st5 st8"> choose to either adjust your goal to make it more realistic or move to</tspan><tspan x="-76" y="56" class="st2 st5 st8"> the next step to see where to adjust your spending to achieve your goal.</tspan></text>
                        <text transform="matrix(1 0 0 1 151.304 848.7054)" class="st2 st5 st6">Adjust spending</text>
                        <text transform="matrix(1 0 0 1 151.3041 878.5296)" class="st7"><tspan x="0" y="0" class="st2 st5 st8">This is where your plan starts coming together.  In this step you will</tspan><tspan x="0" y="23" class="st2 st5 st8">make room in your monthly spending to support your goal and</tspan><tspan x="0" y="46" class="st2 st5 st8">commit to actions to support this.</tspan></text>
                        <text transform="matrix(1 0 0 1 370.532 1039.7772)" class="st2 st5 st6">Action Plan</text>
                        <text transform="matrix(1 0 0 1 169.9818 1064.6014)" class="st7"><tspan x="-25" y="0" class="st2 st5 st8">Goals are more manageable when broken into bite-sized chunks.</tspan><tspan x="21" y="23" class="st2 st5 st8">HeyCoach helps you translate your monthly actions into a</tspan><tspan x="315.99" y="46" class="st2 st5 st8">weekly action plan.</tspan></text>
                        <text transform="matrix(1 0 0 1 151.4391 1243.4971)" class="st2 st5 st6">Goal Tracking</text>
                        <text transform="matrix(1 0 0 1 151.4393 1273.3213)" class="st7"><tspan x="0" y="0" class="st2 st5 st8">Check out how well you are doing against your goal each week. If you’re</tspan><tspan x="0" y="23" class="st2 st5 st8">struggling with achieving your action plan sign up for our regular coaching</tspan><tspan x="0" y="46" class="st2 st5 st8">sessions where we gather as a HeyCoach community to share tips and tricks to</tspan><tspan x="0" y="69" class="st2 st5 st8">reaching our goals.</tspan></text>
                        <text transform="matrix(1 0 0 1 256.7081 1463.17)" class="st2 st3 st4">REACH GOAL</text>
                        </svg>
                    </div>
                <!-- <div class="container">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 768 944" enable-background="new 0 0 768 944" xml:space="preserve">
                            <path fill="#37384C" d="M729.837,834.013v24.744h-4.583c-262.092,0-274.184,0.231-536.275-0.284
                                c-33.727-0.066-62.024-22.282-70.484-55.288c-5.453-21.272-2.381-40.813,8.652-59.076c12.244-20.268,31.129-30.952,54.326-34.297
                                c3.512-0.507,7.083-0.857,10.627-0.858c199.995-0.04,189.988-0.032,389.982-0.041c24.405-0.002,44.443-15.552,49.527-38.346
                                c6.888-30.882-16.337-60.149-48.042-60.179c-92.774-0.086-185.548-0.031-278.323-0.032c-108.262,0-5.526,0.393-113.784-0.253
                                c-30.251-0.181-54.133-14.4-67.253-42.324c-17.821-37.93-3.285-80.661,33.222-99.809c10.453-5.482,22.138-8.242,33.96-8.25
                                c200.59-0.135,190.18-0.093,390.768-0.103c23.24-0.001,42.454-14.017,48.661-35.402c9.177-31.613-14.297-63.096-47.327-63.122
                                c-105.134-0.081-210.269-0.031-315.404-0.032c-95.901,0,18.194,0.386-77.704-0.202c-35.131-0.215-63.988-23.158-71.896-56.418
                                c-6.957-29.263,0.257-54.168,21.468-74.986c14.204-13.942,32.205-19.869,51.62-19.89c200.142-0.212,190.285-0.126,390.428-0.135
                                c23.864-0.001,43.092-14.357,49.073-36.559c8.345-30.98-14.921-61.76-46.983-61.963c-22.783-0.145-45.568-0.034-68.352-0.034
                                c-236.031-0.001-471.095-0.001-471.095-0.001h-6.483V85.237h5.214c0,0,281.526-0.204,540.787,0.244
                                c34.387,0.059,62.934,22.582,71.141,55.601c6.32,25.424,0.993,47.779-15.189,67.646c-8.88,10.902-20.231,18.729-34.181,22.326
                                c-10.41,2.684-20.842,4.142-31.685,4.133c-172.593-0.156-135.186-0.116-307.78-0.104c-24.719,0.002-49.436,0.094-74.155,0.142
                                c-29.012,0.057-51.253,21.736-51.267,49.974c-0.015,28.336,22.134,50.061,51.159,50.07c200.439,0.063,190.878-0.138,391.315,0.417
                                c30.392,0.084,54.41,14.556,67.389,42.789c17.38,37.807,2.463,79.796-33.56,98.493c-10.469,5.434-22.146,8.194-33.973,8.203
                                c-177.21,0.134-143.419,0.089-320.629,0.096c-23.975,0.001-47.95-0.042-71.924,0.115c-24.686,0.162-44.794,18.24-48.494,43.34
                                c-3.395,23.035,11.354,46.591,34.004,53.411c5.733,1.726,11.989,2.397,18.006,2.402c199.993,0.147,188.986-0.073,388.979,0.428
                                c30.428,0.077,54.46,14.449,67.51,42.623c17.458,37.697,2.74,79.712-33.292,98.598c-10.469,5.487-22.16,8.251-33.958,8.262
                                c-177.06,0.162-144.122,0.11-321.182,0.114c-23.827,0.001-47.653-0.007-71.479,0.051c-28.035,0.069-49.868,21.65-49.872,49.223
                                c-0.004,27.543,21.889,49.235,49.842,49.4c42.998,0.255,85.995,0.729,128.993,0.744c217.864,0.077,185.73,0.036,403.596,0.036
                                L729.837,834.013L729.837,834.013z"/>
                            <g>
                                <g>
                                    <defs>
                                        <rect id="SVGID_1_" x="-19.418" y="12.837" width="766.418" height="918.436"/>
                                    </defs>
                                    <clipPath id="SVGID_2_">
                                        <use xlink:href="#SVGID_1_"  overflow="visible"/>
                                    </clipPath>
                                    
                                        <path clip-path="url(#SVGID_2_)" fill="none" stroke="#5E5A85" stroke-width="2" stroke-miterlimit="10" stroke-dasharray="12,12" d="
                                        M52.356,97.044h538.086c0,0,50.318,12.996,57.512,52.324c0,0,3.026,69.26-57.512,73.501H185.951c0,0-58.671,0.053-62.205,64.535
                                        c0,0,8.273,61.394,61.394,61.394h407.802c0,0,59.436,10.179,55.038,59.874c0,0,0.9,54.743-55.76,63.829H185.537
                                        c0,0-56.136,4.488-55.429,61.217c0,0,0.707,65.918,55.843,65.918h405.453c0,0,58.481,8.483,56.808,60.085
                                        c0,0,1.808,53.723-56.128,60.085H185.951c0,0-65.033,3.823-59.378,69.066c0,0,0.838,53.701,60.857,61.708l527.17-3.534"/>
                                </g>
                            </g>
                            <text transform="matrix(1 0 0 1 540.5991 147.8994)" fill="#010101" font-family="'MyriadPro-Semibold'" font-size="26px">Goals</text>
                            <text transform="matrix(1 0 0 1 163.7247 170.8393)" fill="#010101" font-family="'MyriadPro-Regular'" font-size="11px">Here You Choose Specific Money Goals That Are Important To You. They Should Be Smart Goals: </text>
                            <text transform="matrix(1 0 0 1 356.0791 191.8393)" fill="#010101" font-family="'MyriadPro-Regular'" font-size="11px">Specific, Measurable, Achievable, Realistic And Timely.</text>
                            <text transform="matrix(1 0 0 1 173.1929 276.2452)" fill="#010101" font-family="'MyriadPro-Semibold'" font-size="26px">Know Your Spend</text>
                            <text transform="matrix(1 0 0 1 173.2065 303.1852)" fill="#010101" font-family="'MyriadPro-Regular'" font-size="11px">Then compare what you think you spend with your actual spend based on your bank </text>
                            <text transform="matrix(1 0 0 1 173.2065 324.1852)" fill="#010101" font-family="'MyriadPro-Regular'" font-size="11px">statements to know how your money is working for you.</text>
                            <text transform="matrix(1 0 0 1 387.6357 398.9818)" fill="#010101" font-family="'MyriadPro-Semibold'" font-size="26px">Match Goal To Gap</text>
                            <text transform="matrix(1 0 0 1 224.203 419.9218)" fill="#010101" font-family="'MyriadPro-Regular'" font-size="11px">Now That You Know What You Are Actually Spending Each Month You Can Choose </text>
                            <text transform="matrix(1 0 0 1 248.5931 440.9217)" fill="#010101" font-family="'MyriadPro-Regular'" font-size="11px">To either adjust your goal to make it more realistic or move to the next step to </text>
                            <text transform="matrix(1 0 0 1 176.7462 526.3979)" fill="#010101" font-family="'MyriadPro-Semibold'" font-size="26px">Adjust Spending</text>
                            <text transform="matrix(1 0 0 1 176.7598 547.6704)" fill="#010101" font-family="'MyriadPro-Regular'" font-size="11px">This is where your plan starts coming together. In this step you will make </text>
                            <text transform="matrix(1 0 0 1 176.7598 568.6704)" fill="#010101" font-family="'MyriadPro-Regular'" font-size="11px">to Support your goal and commit to actions to support this.</text>
                            <text transform="matrix(1 0 0 1 475.8218 647.61)" fill="#010101" font-family="'MyriadPro-Semibold'" font-size="26px">Action Plan</text>
                            <text transform="matrix(1 0 0 1 165.1284 671.9694)" fill="#010101" font-family="'MyriadPro-Regular'" font-size="11px">Goals Are More Manageable When Broken Into Bite-sized Chunks. Heycoach Helps You Translate </text>
                            <text transform="matrix(1 0 0 1 384.0031 692.9694)" fill="#010101" font-family="'MyriadPro-Regular'" font-size="11px">Your Monthly Actions Into A Weekly Action Plan.</text>
                            <text transform="matrix(1 0 0 1 172.5411 770.9902)" fill="#010101" font-family="'MyriadPro-Semibold'" font-size="26px">Goal Tracking</text>
                            <text transform="matrix(1 0 0 1 177.5367 798.9902)" fill="#010101" font-family="'MyriadPro-Regular'" font-size="11px">Check Out How Well You Are Doing Against Your Goal Each Week. If You’re Struggling </text>
                            <text transform="matrix(1 0 0 1 177.5367 819.9902)" fill="#010101" font-family="'MyriadPro-Regular'" font-size="11px">Up For Our Regular Coaching Sessions Where We Gather As A Heycoach Community To Shar</text>
                            <text transform="matrix(1 0 0 1 494.7599 906.2018)" fill="#010101" font-family="'MyriadPro-Semibold'" font-size="40px">REACH GOAL</text>
                            <text transform="matrix(1 0 0 1 41.7213 60.7283)" fill="#010101" font-family="'Arial-BoldMT'" font-size="40px">Start</text>
                        </svg>

                    </div>  -->
                    <h5 class="mt-5">If you get stuck anywhere along the line why not join our weeklylive session where we will walk you through the process and address any questions you might have.  You can book your place using the <!-- (speech bubble HELP)  --> icon at any stage.</h5>

                </section>
                <div class="overview-btn">
                    <a href="{{route('getstep1')}}"><button>Let’s get started</button></a>
                </div>
                
            </div>
        </div>
        
    </div>
</div>
<script>
    $(document).ready(function(){
    var highestBox = 0;
    $('.overview-contant').each(function(){
    if($(this).height() > highestBox){
    highestBox = $(this).height();
    }
    });
    $('.overview-contant').height(highestBox);
    });
</script>
<script>
    $(document).ready(function(){
    var highestBox = 0;
    $('.overview-ineer').each(function(){
    if($(this).height() > highestBox){
    highestBox = $(this).height();
    }
    });
    $('.overview-ineer').height(highestBox);
    });
</script>
@endsection