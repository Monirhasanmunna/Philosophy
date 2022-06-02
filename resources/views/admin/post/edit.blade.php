@extends('layouts.backend.main')

@section('title','Post Update')
@section('css')
    <link rel="stylesheet" href="{{asset('backend/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
@endsection

@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Post Update</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Back to Dashboard</a></li>
                    <li class="breadcrumb-item active">Post Update</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
    <section class="content px-3 pb-4" style="overflow: hidden;">
      <form action="{{route('admin.post.update',[$post->id])}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-6">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Title and Description</h3>
    
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{$post->title}}">
                  </div>
                  <div class="form-group">
                    <label for="summernote">Description</label>
                    <textarea name="description" id="your_summernote" cols="60" rows="8">{{$post->description}}</textarea>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <div class="col-md-6">
              <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title">Category and Tag</h3>
    
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>
                  </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Category Select</label>
                        <div class="select2-purple">
                          <select class="select2" multiple="multiple" name="category[]" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" 
                                    @foreach ($post->categories as $postCategory)
                                        {{$postCategory->id == $category->id ? 'selected' : ''}}
                                    @endforeach
                                    >{{$category->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Tag Select</label>
                        <div class="select2-purple">
                          <select class="select2" name="tag[]" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;">
                            @foreach ($tags as $tag)
                                <option value="{{$tag->id}}"
                                    
                                    @foreach ($post->tags as $postTag)
                                        {{$postTag->id == $tag->id ? 'selected' : ''}}
                                    @endforeach

                                    >{{$tag->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                          <strong>Choose file</strong>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="image" id="customFile">
                          <label class="custom-file-label"  for="customFile">Choose file</label>
                        </div>
                      </div>

                      <div class="form-group">
                        @if ($post->user_id == 1)
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" name="status" {{$post->status == 1 ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineCheckbox1">Status</label>
                          </div>
                        @else
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="1" name="is_approve" disabled {{$post->is_approve == 1 ? 'checked' : ''}}>
                          <label class="form-check-label" for="inlineCheckbox2">{{$post->is_approve == 1 ? 'Approved' : 'Approve'}}</label>
                        </div>
                        @endif
                        
                    </div>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <a href="{{route('admin.post.index')}}" class="btn btn-secondary">Cancel</a>
              <input type="submit" value="Update" class="btn btn-success float-right">
            </div>
          </div>

      </form>
    </section>
@endsection

@section('js')
<script src="{{asset('backend/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-validation/additional-methods.min.js')}}"></script>

<!-- bs-custom-file-input -->
<script src="{{asset('backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
    $(document).ready(function () {
        bsCustomFileInput.init();
    });

</script>
<script src="{{asset('backend/plugins/select2/js/select2.full.min.js')}}"></script>
<script>
    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    });
</script>
<script>
    $('#summernote').summernote({
      placeholder: 'Hello stand alone ui',
      tabsize: 2,
      height: 120,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
      ]
    });
  </script>
@endsection
