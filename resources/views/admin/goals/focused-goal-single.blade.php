@extends('admin/index')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Focused Goals</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Focused Goals</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content single_focused_goal">
  <div class="container-fluid">  
  	{{-- dd($focused_single_goal) --}}
  	@php

      $unserialize_catwise_spend = unserialize($focused_single_goal->catwise_spend);
      //print_r($unserialize_cats);
   
  	
  	$unserialize_catwise_actual_spend = unserialize($focused_single_goal->catwise_actual_spend);

  	$unserialize_achieve_my_goal = unserialize($focused_single_goal->achieve_my_goal);
  	
  	@endphp
  	<div class="row">

      <div class="col-lg-8">
        <div class="row">
          
       
        <div class="col-lg-4 col-md-4 col-sm-6 my-2">
          <div class="single_focused_data Small shadow">
            <h4>Focused category</h4>
            <span>{{ucwords(str_replace("_", " ", $focused_single_goal->focused_cat))}}</span>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 my-2">
          <div class="single_focused_data Small shadow">
            <h4>Each Month Goal</h4>
            <span>{{$focused_single_goal->each_month_goal}}</span>
          </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 my-2">
          <div class="single_focused_data Small shadow">
            <h4>Archive Goal Time</h4>
            <span>{{$focused_single_goal->archive_goal_time}}</span>
          </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 my-2">
          <div class="single_focused_data Small shadow">
            <h4>Spend Think</h4>
            <span>{{$focused_single_goal->spend_think}}</span>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 my-2">
          <div class="single_focused_data Small shadow">
            <h4>Earn After Tax Per Month</h4>
            <span>{{$focused_single_goal->earn_after_tax_per_mnth}}</span>
          </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 my-2">
          <div class="single_focused_data Small shadow">
            <h4>Mnth Amount To Achieve Goal</h4>
            <span>{{$focused_single_goal->per_mnth_amnt_to_achieve_goal}}</span>
          </div>
        </div>


        <div class="col-lg-4 col-md-4 col-sm-6 my-2">
          <div class="single_focused_data Small shadow">
            <h4>Weekwise Track Goal</h4>
            <span>{{$focused_single_goal->weekwise_track_goal}}</span>
          </div>
        </div>
        <div class="col-lg-4  col-md-4 col-sm-6 my-2">
          <div class="single_focused_data Small shadow">
            <h4>Goal Status</h4>
            <span>{{ucwords($focused_single_goal->goal_status)}}</span>
          </div>
        </div>
         </div>
      </div>
      <div class="col-lg-4">
        <div class="row">
          <div class="col-lg-12 col-md-6">
            <div class="single_focused_data Small shadow my-2">
            <h4>Category Spend</h4>
            
              <ul>
                @php 
                if($focused_single_goal->catwise_spend){
                foreach($unserialize_catwise_spend as $key => $unserialize_cat){
                @endphp
                    <li>{{ucwords(str_replace("_", " ", $key))}} : {{$unserialize_cat}}</li>
                @php 
                }
                }
                @endphp
              </ul>
            
          </div>
          </div>
          <div class="col-lg-12 col-md-6">
            <div class="single_focused_data Small shadow my-2">
            <h4>Catwise Actual Spend</h4>           
            
                <ul>
                  @php
                  if($focused_single_goal->catwise_actual_spend){
                    foreach($unserialize_catwise_actual_spend as $key => $unserialize_actual_spend){
                    @endphp
                        <li>{{ucwords(str_replace("_", " ", $key))}} : {{$unserialize_actual_spend}}</li>
                    @php
                    }
                  }
                  @endphp
                </ul>
            
          </div>
          </div>
          <div class="col-lg-12 col-md-6">
            <div class="single_focused_data Small shadow my-2">
            <h4>Achieve My Goal</h4>      
                <ul>
                  @php
                  if($focused_single_goal->achieve_my_goal){
                    foreach($unserialize_achieve_my_goal as $key => $unserialize_achieve_goal){
                  @endphp
                        <li>{{ucwords(str_replace("_", " ", $key))}} : {{$unserialize_achieve_goal['achieve_goal_amount']}}</li>
                  @php
                    }
                  }
                  @endphp
                </ul>           
          </div>
          </div>
        </div>
          
      </div>
  
</div>
</div>
</section>


@endsection