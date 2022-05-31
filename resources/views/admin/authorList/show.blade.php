@extends('layouts.backend.main')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img  class="profile-user-img img-fluid img-circle"
                     src="{{asset('storage/user/'.$user->image)}}"
                     alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">{{$user->username}}</h3>

              <p class="text-muted text-center">{{$user->about}}</p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- About Me Box -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">About Me</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
              <p class="text-muted">
               {{$user->email}}
              </p>

              <hr>

              <strong><i class="fas fa-map-marker-alt mr-1"></i> Gender</strong>

              <p class="text-muted">{{$user->gender}}</p>

              <hr>

              <strong><i class="fas fa-map-marker-alt mr-1"></i> Age</strong>

              <p class="text-muted">{{$user->age}}</p>

              <hr>

              <strong><i class="fas fa-book mr-1"></i> Education</strong>

              <p class="text-muted">
               {{$user->education}}
              </p>

              <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

              <p class="text-muted">{{$user->address}}</p>

              <hr>


            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item active"><a class="nav-link " href="#settings" data-toggle="tab">About</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane" id="settings">
                  {{$user->about}}
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('js')
<!-- bs-custom-file-input -->
<script src="{{asset('backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
    $(document).ready(function () {
        bsCustomFileInput.init();
    });

</script>
@endsection