@extends('layouts.backend.main')

@section('title','Tag Add')

@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<!-- jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<!-- SweetAlert2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

@endsection

@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add New</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Back to Dashboard</a></li>
                    <li class="breadcrumb-item active">Tag Add</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <form action="{{route('admin.tag.store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="tag">Tag Name</label>
                                <input type="text" name="tag" class="form-control" id="tag" placeholder="Enter tag name" class="@error('tag') is-invalid @enderror">
                                @error('tag')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

@section('js')
<script src="{{asset('backend/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-validation/additional-methods.min.js')}}"></script>

<script>
    $(document).ready(function () {
        $.validator.setDefaults({
            submitHandler: function () {
                alert("Form successful submitted!");
            }
        });
        $('#quickForm').validate({
            rules: {
                name: {
                    required: true,
                },
                image: {
                    required: true,
                },
            },
            messages: {
                category: {
                    required: "Please enter a category name",
                },
                image: {
                    required: "This filed is required",
                },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });

</script>
<!-- bs-custom-file-input -->
<script src="{{asset('backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
    $(document).ready(function () {
        bsCustomFileInput.init();
    });

</script>
<script>
    $('.delete-confirm').on('click', function (event) {
       event.preventDefault();
       const url = $(this).attr('href');
       swal({
           title: 'Are you sure?',
           text: 'This record and it`s details will be permanantly deleted!',
           icon: 'warning',
           buttons: ["Cancel", "Yes!"],
           }).then(function(value) {
           if (value) {
           window.location.href = url;
         }
       });
      });
 </script>
@endsection
