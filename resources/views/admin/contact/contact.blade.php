@extends('layouts.backend.main')

@section('title','Contact')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Contact Details</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Contact</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12 m-auto">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link btn bg-primary">Contact Details</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div >
                  <form class="form-horizontal" action="{{route('admin.contact.update', 1)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group row">
                      <label for="phone" class="col-sm-2 col-form-label">Phone :</label>
                      <div class="col-sm-10">
                        <input type="number"  class="form-control" name="phone"  id="phone" value="{{$contact->phone}}" placeholder="Enter Your Phone Number">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="email" class="col-sm-2 col-form-label">Email :</label>
                      <div class="col-sm-10">
                        <input type="email"  class="form-control" name="email" id="email" value="{{$contact->email}}" placeholder="Enter Your Email">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="address" class="col-sm-2 col-form-label">Address :</label>
                      <div class="col-sm-10">
                        <input type="text"  class="form-control" name="address" id="address" value="{{$contact->address}}" placeholder="Enter Your Address">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="city" class="col-sm-2 col-form-label">City :</label>
                      <div class="col-sm-10">
                        <input type="text"  class="form-control" name="city" id="city" value="{{$contact->city}}" placeholder="Enter Your City">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="area_code" class="col-sm-2 col-form-label">Area Code :</label>
                      <div class="col-sm-10">
                        <input type="number"  class="form-control" name="area_code" id="area_code" value="{{$contact->area_code}}" placeholder="Enter Your Area Code">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="description" class="col-sm-2 col-form-label">Description :</label>
                      <div class="col-sm-10">
                        <textarea type="text"  class="form-control" name="description" id="description" placeholder="Enter Description">{{$contact->description}}</textarea>
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