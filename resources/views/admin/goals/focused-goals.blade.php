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
<section class="content">
  <div class="container-fluid">  	
  	
    {{-- dd($focused_goals_list) --}}  
    <div class="row">
          <div class="col-12">
            <div class="card">                             
              <div class="card-body">
                <table id="allgoalslisttable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>S.no</th>
                      <th>Goal Category</th>                      
                      <th>Goal Each Month</th>
                      <th>Achieve Goal Time</th>
                      <th>Income</th>
                      <th>status</th>
                      <th>More Details</th>
                    </tr>
                  </thead>

                  <tbody>
                      @foreach($focused_goals_list as $focus_goal)
                        {{-- dd($focus_goal) --}}
                          <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ucwords(str_replace("_", " ", $focus_goal->focused_cat))}}</td>
                            <td>{{$focus_goal->each_month_goal}}</td>
                            <td>{{ucwords($focus_goal->archive_goal_time)}}</td>
                            <td>{{$focus_goal->earn_after_tax_per_mnth}}</td>
                            <td>{{ucfirst($focus_goal->goal_status)}}</td>
                            <td><a href="{{route('focused_goal_single', $focus_goal->id)}}">View</a></td>
                          </tr> 
                      @endforeach 
                  </tbody>
                    
                    <tfoot>
                      <tr>
                        <th>S.no</th>
                      <th>Goal Category</th>                      
                      <th>Goal Each Month</th>
                      <th>Achieve Goal Time</th>
                      <th>Income</th>
                      <th>status</th>
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