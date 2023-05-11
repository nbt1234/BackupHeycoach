@extends('admin/index')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">About Us Page</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">About Us Page</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content single_focused_goal">
  <div class="container-fluid">  
 
    <h2>Section-1</h2>
    <div class="row">
        <div class="col-lg-12">
          <form action="{{route('update_about_us', ['section-1'])}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="card-body mt-4" style="background:white;">
                      <div class="form-group">
                        <label >Heading</label>
                        <input type="text" class="form-control"  placeholder="Enter Heading" name="section1_heading" value="{{old('section1_heading',$section1->heading)}}">
                        @error('section1_heading')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                      </div>
                      <div class="form-group">
                          <div class="row" id="append_add_more_list">
                            @foreach(old('list') ? old('list') :(explode(', ', $section1->description)) as $key => $value)
                              <div class="col-3">
                                  <label >List</label>
                                    <input type="text" class="form-control" name="list[]" value="{{$value}}">
                                    <i class="fa fa fa-window-close fa-1x remove_add_more_list" aria-hidden="true"></i>
                                    @error('list.'.$key)
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                              </div>
                            @endforeach
                          </div>
                          <button type="button" class="btn btn-success btn-sm add_more_list">Add More List</button>
                      </div>
                      <div class="form-group">
                        <label >Image</label>
                          <input type="file" class="form-control" name="image" accept="image/*">
                          @error('image')
                            <span class="text-danger"> {{ $message }} </span>
                          @enderror
                      </div>
                      <div class="form-group">
                        <img src="{{asset('public/front-assets/img/'.$section1->image)}}" width="100" height="100" alt="Image">                      
                      </div>
                    </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
        </div>
    </div>

  {{--   <!-- <h2 class="mt-4">Section-2</h2>
    <div class="row">
        <div class="col-lg-12">
          <form action="{{route('update_about_us', ['section-2'])}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="card-body mt-4" style="background:white;">
                      <div class="form-group">
                        <label >Heading</label>
                        <input type="text" class="form-control"  placeholder="Enter Heading" name="section2_heading" value="{{old('section2_heading',$section2->heading)}}">
                        @error('section2_heading')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label >Content</label>
                          <textarea class="summernote" name="section2_description">{{old('section2_description') ? old('section2_description') : $section2->description}}</textarea>
                          @error('section2_description')
                            <span class="text-danger"> {{ $message }} </span>
                          @enderror
                      </div>
                   
                    </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
        </div>
    </div>


    <h2 class="mt-4">Section-3</h2>
    <div class="row">
        <div class="col-lg-12">
          <form action="{{route('update_about_us', ['section-3'])}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="card-body mt-4" style="background:white;">
                      <div class="form-group">
                        <label >Heading</label>
                        <input type="text" class="form-control"  placeholder="Enter Heading" name="section3_heading" value="{{old('section3_heading',$section3->heading)}}">
                        @error('section3_heading')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label >Content</label>
                          <textarea class="summernote" name="section3_description">{{old('section3_description') ? old('section3_description') : $section3->description}}</textarea>
                          @error('section3_description')
                            <span class="text-danger"> {{ $message }} </span>
                          @enderror
                      </div>
                   
                    </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
        </div>
    </div>

 --> --}}


    <h2 class="mt-4">Section-2</h2>
  	<div class="row">
        <div class="col-lg-12">

          <form action="{{route('update_about_us', ['section-4'])}}" method="post">
            @csrf
                <div id="append_about_heading_content" class="row">

                   @foreach(old('description') ? old('description') : json_decode($section4->description) as $key => $value)
                    <div class="card-body mt-4" style="background:white;">
                        @if($key !=0)
                          <div class="text-right m-1">
                            <i class="fa fa-minus-circle fa-2x remove_about_heading_content" aria-hidden="true"></i>
                          </div>
                        @endif
                      <div class="form-group">
                        <label for="exampleInputHeading{{$key}}">Heading</label>
                        <input type="text" class="form-control" id="exampleInputHeading{{$key}}" placeholder="Enter Heading" name="description[{{$key}}][heading]" value="{{!empty(old('description')) ? $value['heading'] : $value->heading}}">
                        @error('description.'.$key.'.heading')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputContent{{$key}}">Content</label>
                          <textarea id="exampleInputContent{{$key}}" class="summernote" name="description[{{$key}}][content]">{{!empty(old('description')) ? $value['content'] : $value->content}}</textarea>
                          @error('description.'.$key.'.content')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                      </div>
                    </div>
                    @endforeach
                    <script>
                      var add_bout_field = {{$key}};
                    </script>
                </div>
              
                 <div class="text-right m-1">
                      <i class="fa fa-plus-circle fa-2x add_about_heading_content" aria-hidden="true"></i>
                 </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
        </div>
    </div>
  </div>
</section>
<script type="text/javascript">
  var i = add_bout_field;
  $('.add_about_heading_content').on('click', function(){
    ++i;
    $('#append_about_heading_content').append('<div class="card-body mt-4" style="background:white;">'
                       +'<div class="text-right m-1">'
                            +'<i class="fa fa-minus-circle fa-2x remove_about_heading_content" aria-hidden="true"></i>'
                       +'</div>'
                        +'<div class="form-group">'
                          +'<label for="exampleInputHeading'+i+'">Heading</label>'
                          +'<input type="text" class="form-control" id="exampleInputHeading'+i+'" placeholder="Enter Heading" name="description['+i+'][heading]>'
                        +'</div>'
                        +'<div class="form-group">'
                          +'<label for="exampleInputContent'+i+'">Content</label>'
                            +'<textarea id="exampleInputContent'+i+'" class="summernote" name="description['+i+'][content]"></textarea>'
                        +'</div>'
                    +'</div>');
  $('.summernote').summernote();

  });

  $('body').on('click', '.remove_about_heading_content', function(){
   $(this).parent().parent().remove();
  });
</script>
<script type="text/javascript">
$('.add_more_list').on('click', function(){
   $('#append_add_more_list').append(
                              '<div class="col-3">'
                                  +'<label >List</label>'
                                    +'<input type="text" class="form-control" name="list[]" value="">'
                                    +'<i class="fa fa fa-window-close fa-1x remove_add_more_list" aria-hidden="true"></i>'
                              +'</div>');
});
  
  $('body').on('click', '.remove_add_more_list', function(){
   $(this).parent().remove();
  });
</script>


@endsection