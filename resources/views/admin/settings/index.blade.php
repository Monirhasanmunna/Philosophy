@extends('layouts.backend.main')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Settings</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Settings</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center bg-black">
                <img class="img-fluid"
                     src="{{asset('storage/logo/'.$logo->logo)}}"
                     alt="{{$logo->logo}}">
              </div>
            </div>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#logo" data-toggle="tab">Logo</a></li>
                <li class="nav-item"><a class="nav-link" href="#about" data-toggle="tab">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#social" data-toggle="tab">Social</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="logo">
                  
                  <form action="{{route('admin.settings.logo', 1 )}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                      <div class="form-group">
                        <strong>Choose file</strong>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="logo" id="customFile">
                        <label class="custom-file-label"for="customFile">Choose file</label>
                      </div>
                    </div>

                    <button type="submit" class="btn bg-primary">Update</button>

                  </form>
                  
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="about">

                  <form class="form-horizontal" action="{{route('admin.settings.about',1)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group row">
                      <label for="about" class="col-sm-2 col-form-label">About :</label>
                      <div class="col-sm-10">
                        <textarea type="text"  class="form-control" rows="8" name="about" value="" id="about" placeholder="Enter About Your Website"></textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </form>

                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="social">

                  <form class="form-horizontal" action="{{route('admin.settings.social',1)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group row">
                      <label for="facebook" class="col-sm-2 col-form-label">Facebook :</label>
                      <div class="col-sm-10">
                        <input type="text"  class="form-control" name="facebook" value="" id="facebook" placeholder="Enter Your facebook link">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="instagram" class="col-sm-2 col-form-label">Instagram :</label>
                      <div class="col-sm-10">
                        <input type="text"  class="form-control" name="instagram" value="" id="instagram" placeholder="Enter Your instagram link">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="twitter" class="col-sm-2 col-form-label">Twitter :</label>
                      <div class="col-sm-10">
                        <input type="text"  class="form-control" name="twitter" value="" id="twitter" placeholder="Enter Your twitter link">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="pinterest" class="col-sm-2 col-form-label">Pinterest :</label>
                      <div class="col-sm-10">
                        <input type="text"  class="form-control" name="pinterest" value="" id="facebook" placeholder="Enter Your pinterest link">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="google_plus" class="col-sm-2 col-form-label">Google Plus :</label>
                      <div class="col-sm-10">
                        <input type="text"  class="form-control" name="google_plus" value="" id="google_plus" placeholder="Enter Your google plus link">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="linkdin" class="col-sm-2 col-form-label">Linkdin :</label>
                      <div class="col-sm-10">
                        <input type="text"  class="form-control" name="linkdin" value="" id="linkdin" placeholder="Enter Your linkdin link">
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
  <!-- /.content -->
@endsection

@section('js')
<script src="{{asset('backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
    $(document).ready(function () {
        bsCustomFileInput.init();
    });

</script>
@endsection