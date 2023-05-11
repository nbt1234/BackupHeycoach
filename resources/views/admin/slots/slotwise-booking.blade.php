@extends('admin/index')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">All Bookings</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">All Bookings</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">  	
  	
    {{-- $all_booking --}}  
    <div class="row">
          <div class="col-12">
            <div class="card">   
              <!-- <div class="card-header">
                  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">Add Booking</button>
              </div> -->                          
              <div class="card-body">
                <table id="allbookngslisttable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Username</th>
                      <th>Email</th>                      
                    </tr>
                  </thead>

                  <tbody>    
                      @foreach($all_booking as $booking)
                          {{-- dd($all_slot) --}}   
                                                
                          <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{GetUserinfo($booking->user_id, 'username')}}</td>
                              <td>{{GetUserinfo($booking->user_id, 'email')}}</td>                              
                          </tr> 
                      @endforeach                         
                    </tbody>
                  
                  <tfoot>
                    <tr>
                      <th>S.No</th>
                      <th>Username</th>
                      <th>Email</th>                      
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