@extends('admin/index')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Privacy Policy & Terms Page</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Privacy Policy & Terms</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content single_focused_goal">
  <div class="container-fluid">  
  	<div class="row">
        <div class="col-lg-12">
          <form action="{{route('UpdatePrivacyPolicyTerms')}}" method="post">
            @csrf
                <div id="append_about_heading_content" class="row">
                    <div class="card-body mt-4" style="background:white;">
                      <div class="form-group">
                        <label for="exampleInputContent">Content</label>
                          <textarea id="exampleInputContent" class="summernote" name="privacy_content">{{$data->content}}</textarea>
                          @error('privacy_content')
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
  </div>
</section>

@endsection