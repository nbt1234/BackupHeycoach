@extends('admin/index')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">All Slots</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">All Slots</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">  	
  	
    {{-- $all_slots_list --}}  
    <div class="row">
          <div class="col-12">
            <div class="card">   
              <div class="card-header">
                  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">Add Slot</button>
              </div>                          
              <div class="card-body">
                <table id="allslotslisttable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Date</th>
                      <th>Start time</th>
                      <th>End time</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>    
                      @foreach($all_slots_list as $all_slot)
                          {{-- dd($all_slot) --}}   
                          @php
                          $start_time = date('h:i A', strtotime($all_slot->start_time));
                          $end_time = date('h:i A', strtotime($all_slot->end_time));
                          @endphp                       
                          <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$all_slot->date}}</td>
                              <td>{{$start_time}}</td>
                              <td>{{$end_time}}</td>
                              <td>{{ucfirst($all_slot->status)}}</td>                              
                              <td>
                                <a href="" class="admin_edit_slot" slot_id="{{$all_slot->id}}" date="{{$all_slot->date}}" start_time="{{$all_slot->start_time}}" end_time="{{$all_slot->end_time}}" status="{{$all_slot->status}}">Edit</a> /
                                <a href="{{route('view_booking', $all_slot->id)}}" class="admin_view_booking">View Bookings</a> /
                                
                                <a href="{{route('delete_slot', ['id' => $all_slot->id])}}" onclick="return confirm('You want to delete?');" style="color:red;">Delete</a>
                              </td>
                          </tr> 
                      @endforeach                         
                    </tbody>
                  
                  <tfoot>
                    <tr>
                      <th>S.No</th>
                      <th>Date</th>
                      <th>Start time</th>
                      <th>End time</th>
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


    <div class="modal fade slotmodel" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Create new slot</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{route('create_slot')}}" method="POST" name="add_new_slot" id="add_new_slot" class="add_new_slot">
              @csrf
              <div class="card-body">
                <div class="row">
                  <div class='col-sm-12'>
                    <div class="form-group">
                      <label for="start_time">Date:</label>
                      <div class='input-group date' id="">
                        <input type='date' class="form-control slotdate" id="slotdate" name="slotdate" value="">
                      </div>                  
                    </div>
                  </div>
              
                  <div class='col-sm-6'>
                    <div class="form-group">
                      <label for="start_time">Start Time:</label>
                      <div class='input-group date' id="start_time">
                        <input type='time' class="form-control start_time" name="start_time" id="start_time">
                      </div>
                    </div>
                  </div>
                
                  <div class='col-sm-6'>
                    <div class="form-group">
                      <label for="end_time">End Time:</label>
                      <div class='input-group date' id="end_time">
                        <input type='time' class="form-control end_time" id="end_time" name="end_time"/>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-12">
                      <div class="form-check">
                          <input type="radio" name="slot_status" id="slot_status_active" class="form-check-input slot_status_active" value="active" checked>
                          <label class="form-check-label" for="slot_status_active">Active</label>
                      </div>  
                      <div class="form-check">
                      <input type="radio" name="slot_status" id="slot_status_inactive" class="form-check-input slot_status_inactive" value="inactive">
                          <label class="form-check-label" for="slot_status_inactive">Inactive</label>
                      </div> 
                  </div>

                </div>
              </div>
              <div class="card-footer">              
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>


  </div>
</section>


@endsection