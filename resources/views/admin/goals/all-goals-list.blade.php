@extends('admin/index')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">All Goals</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">All Goals</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">  	
  	
    {{-- $goals_list --}}  
    <div class="row">
          <div class="col-12">
            <div class="card">                             
              <div class="card-body">
                <table id="allgoalslisttable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>S.no</th>
                      <th>Username</th>                      
                      <th>Email</th>
                      <th>Goals</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                    <tbody>
                      
                      {{-- dd($goals_list) --}}
                      @foreach($goals_list as $goals)
                          {{-- dd($goals) --}}
                          @php
                          $unserialize = unserialize($goals->my_goal_cats);
                          $cats = implode(", ",$unserialize);
                          @endphp
                          <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{GetUserinfo($goals->user_id, 'username')}}</td>
                              <td>{{GetUserinfo($goals->user_id, 'email')}}</td>
                              <td>{{ucwords(str_replace("_", " ", $cats))}}</td>
                              <td>{{ucfirst($goals->status)}}</td>
                              <td><a href="{{route('all_focused_goals',$goals->id)}}">view</a></td>
                          </tr> 
                      @endforeach                         
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>S.no</th>
                        <th>Username</th>                        
                        <th>Email</th>
                        <th>Goals</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
    </div>





  </div>
</section>


@endsection