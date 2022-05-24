@extends('layouts.backend.main')

@section('title','Profile')

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
                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Password</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active" id="settings">
                  <form class="form-horizontal" action="{{route('author.user.update',[$user->id])}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Name :</label>
                      <div class="col-sm-10">
                        <input type="text"  class="form-control" name="name" value="{{$user->name}}" id="inputName" placeholder="Enter Your Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="username" class="col-sm-2 col-form-label">User Name :</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="username"  value="{{$user->username}}" id="username" placeholder="Enter Your User Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Email :</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" name="email"  value="{{$user->email}}" id="inputEmail" placeholder="Email">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="age" class="col-sm-2 col-form-label">Age :</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" name="age"  value="{{$user->age}}" id="age" placeholder="Enter Your Age">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="age" class="col-sm-2 col-form-label">Gender :</label>
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioPrimary1" name="gender" value="Male" {{$user->gender == 'Male' ? 'checked' : ''}}>
                          <label for="radioPrimary1">
                            Male
                          </label>
                        </div>
                        <div class="icheck-primary d-inline" style="margin-left: 7px;">
                          <input type="radio" id="radioPrimary2" name="gender" value="Female" {{$user->gender == 'Female' ? 'checked' : ''}}>
                          <label for="radioPrimary2">
                            Female
                          </label>
                        </div>
                        <div class="icheck-primary d-inline" style="margin-left: 7px;">
                          <input type="radio" id="radioPrimary3" name="gender" value="Other" {{$user->gender == 'Other' ? 'checked' : ''}}>
                          <label for="radioPrimary3">
                            Other
                          </label>
                        </div>
                    </div>

                    <div class="form-group row">
                      <label for="education" class="col-sm-2 col-form-label">Education :</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="education"  value="{{$user->education}}" id="education" placeholder="Enter Your Education Details">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="address" class="col-sm-2 col-form-label">Address :</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="address"  value="{{$user->address}}" id="address" placeholder="Enter Your Address">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="about" class="col-sm-2 col-form-label">About :</label>
                      <div class="col-sm-10">
                        <textarea type="text" class="form-control" name="about" id="about" placeholder="Enter About You">{{$user->about}}</textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="address" class="col-sm-2 col-form-label">Photo :</label>
                      <div class="custom-file px-5" style="width: 83%;">
                        <input type="file" class="custom-file-input" name="image" id="customFile">
                        <label class="custom-file-label"  for="customFile">Choose file</label>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Submit</button>
                      </div>
                    </div>
                  </form>
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