@extends('layouts.backend.main')

@section('title','Dashboard')
    
@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
  <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$posts->count()}}</h3>

              <p>Total Post</p>
            </div>
            <div class="icon">
              <i class="fas fa-paper-plane"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$pendingPost->count()}}</h3>

              <p>Pending Post</p>
            </div>
            <div class="icon">
              <i class="fas fa-alarm-exclamation"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$users->count()}}</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{$subscribers->count()}}</h3>

              <p>Subscribers</p>
            </div>
            <div class="icon">
              <i class="fas fa-envelopes-bulk"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">

          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header bg-success">
                      <h3 class="card-title">{{$users->count()}} Author</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                      <table class="table table-head-fixed text-nowrap">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Posts</th>
                            <th>Update</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($users as $key=>$user)
                          <tr>
                            <td>{{$key+1}}</td>
                            <td><img style="width: 60px;height:60px;border-radius:50%;" class="img-thumbnail" src="{{asset('storage/user/'.$user->image)}}"></td>
                            <td>{{$user->username}}</td>
                            <td><span class="label bg-info">{{$user->email}}</span></td>
                            <td>{{$user->posts->count()}}</td>
                            <td>{{$user->updated_at}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    
                    <!-- /.card-body -->
                  </div>
                  {{$users->links('admin.pagination')}}
                  <!-- /.card -->
                </div>
              </div>
            </div>
          </div>

        </section>

        <section class="col-lg-5 connectedSortable">
          <div class="card ">
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header bg-info">
                      <h3 class="card-title">{{$subscribers->count()}} SUBSCRIBERS</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                      <table class="table table-head-fixed text-nowrap ">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Date</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($subscribers as $key=>$subscriber)
                          <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$subscriber->email}}</td>
                            <td>{{$subscriber->created_at->format('M,d,Y')}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  {{$users->links('admin.pagination')}}
                  <!-- /.card -->
                </div>
              </div>
            </div>
          </div>

          <!-- Map card -->
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header bg-primary">
                      <h3 class="card-title">{{$comments->count()}} COMMENTS</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                      <table class="table table-head-fixed text-nowrap">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Posts</th>
                            <th>Comments</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($comments as $key=>$comment)
                          <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$comment->user ? $comment->user->username : $comment->name}}</td>
                            <td>{{$comment->user ? $comment->user->email : $comment->email}}</td>
                            <td>{{Str::words($comment->post->title, '3')}}</td>
                            <td>{{Str::words($comment->text, '10')}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  {{$users->links('admin.pagination')}}
                  <!-- /.card -->
                </div>
              </div>
            </div>
            <!-- /.card-body-->
          </div>
          <!-- /.card -->
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  @endsection