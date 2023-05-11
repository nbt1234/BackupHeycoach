@extends('admin/index')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Library Videos List</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Library Videos List</li>
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
              <div class="card-header">
                  <a class="btn btn-primary" href="{{route('LibraryVideoAdd')}}">Add Videos</a>
              </div>    
              <div class="card-body">
                <table id="allslotslisttable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Video</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>    
                          @foreach($data as $key => $value)
                          <tr>
                              <td>{{$key+1}}</td>
                              <td><video width="200" height="100" controls><source src="{{asset('public/front-assets/video-library/'.$value->name)}}"></video></td>
                              <td><a href="{{route('LibraryVideoDelete', encrypt($value->id))}}" onclick="return confirm(' you want to delete?');" class="btn btn-danger">Delete</a></td>
                          </tr> 
                          @endforeach
                       
                    </tbody>
                  
                  <tfoot>
                    <tr>
                      <th>S.No</th>
                      <th>Video</th>
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