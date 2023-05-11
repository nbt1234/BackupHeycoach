@extends('admin/index')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Contact Us From Data</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Contact Us From Data</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">  	
    <div class="row">
          <div class="col-12">
            <div class="card">   
              <div class="card-body">
                <table id="allslotslisttable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>First Name</th>
                      <th>Last time</th>
                      <th>Email</th>
                      <th>Mobile No.</th>
                      <th>Message</th>
                      <th>Date</th>
                    </tr>
                  </thead>

                  <tbody>    
                          @foreach($data as $key => $value)      
                          <tr>
                              <td>{{$key+1}}</td>
                              <td>{{$value->first_name}}</td>
                              <td>{{$value->last_name}}</td>
                              <td>{{$value->email}}</td>
                              <td>{{$value->mobile}}</td>
                              <td>{{$value->message}}</td>
                              <td>{{date("d, F, Y", strtotime($value->created_at))}}</td>
                          </tr> 
                         @endforeach 
                    </tbody>
                  
                  <tfoot>
                    <tr>
                      <th>S.No</th>
                      <th>First Name</th>
                      <th>Last time</th>
                      <th>Email</th>
                      <th>Mobile No.</th>
                      <th>Message</th>
                      <th>Date</th>
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