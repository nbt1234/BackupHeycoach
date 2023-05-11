@extends('admin/index')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Add Videos</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Add Videos</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
 
<!-- Main content -->

<section class="content single_focused_goal">
  <div class="container-fluid">  
      <a class="btn btn-secondary" href="{{route('LibraryVideolist')}}">Back</a>
    <div class="row">
        <div class="col-lg-12">
          <form action="{{route('LibraryVideoStore')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div id="append_video_input" class="row">
                  <div class="col-6">
                    <div class="card-body mt-4" style="background:white;">
                      <div class="form-group">
                        <label >Video</label>
                        <input type="file" class="form-control" name="video[]" accept="video/*">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="text-right m-1">
                      <i class="fa fa-plus-circle fa-2x add_video_input" aria-hidden="true"></i>
                 </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
        </div>
    </div>

  </div>
</section>
<script>
$('.add_video_input').on('click', function(){
  $('#append_video_input').append('<div class="col-6">' 

                +'<div class="card-body mt-4" style="background:white;">'
                 +'<i class="fa fa fa-window-close fa-1x remove_add_more_list float-right" aria-hidden="true"></i>'
                  +'<div class="form-group">'
                    +'<label >Video</label>'
                    +'<input type="file" accept="video/*" class="form-control" name="video[]" value="">'
                  +'</div>'
                +'</div>'
                +'</div>');
});
$('body').on('click', '.remove_add_more_list', function(){
  $(this).parent().parent().remove();
});
</script>
@endsection