@extends('layouts.backend.main')

@section('title','Post Details')
@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Post Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.post.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Post Destails</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0">Post Title :</h5>
                </div>
              <div class="card-body">
                <h1 class="card-text">{{$post->title}}</h1>
              </div>
            </div>
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="m-0">Post Description :</h5>
                </div>
              <div class="card-body">
                <p class="card-text">{!! $post->description !!}</p1>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h5 class="m-0">Category</h5>
              </div>
              <div class="card-body">
                  @foreach ($post->categories as $category)
                      <span class="label rounded-pill bg-success p-1">{{$category->name}}</span>
                  @endforeach
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Tag</h5>
              </div>
              <div class="card-body">
                @foreach ($post->tags as $tag)
                      <span class="label rounded-pill bg-info p-1">{{$tag->name}}</span>
                @endforeach
              </div>
            </div>

            <div class="card card-primary card-outline">
                <div class="card-header">
                  <h5 class="m-0">Feature Image</h5>
                </div>
                <div class="card-body text-center">
                  <img style="width: 100%;" src="{{asset('storage/post/'.$post->image)}}" alt="{{$post->image}}">
                </div>
              </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection