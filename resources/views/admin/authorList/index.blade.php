@extends('layouts.backend.main')

@section('title','user')

@section('css')
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

@endsection

@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">user</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Back to Dashboard</a></li>
            <li class="breadcrumb-item active">user List</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped text-center">
        <thead>
        <tr>
          <th>ID</th>
          <th>Image</th>
          <th>Name</th>
          <th>Posts</th>
          <th>Created At</th>
          <th>Updated At</th>
          <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $key => $user)   
        <tr>
          <td>{{$key+1}}</td>
          <td><img class="img-fluid img-thumbnail" style="width: 65px; height:65px; border-radius:50%;" src="{{asset('storage/user/'.$user->image)}}" alt="{{$user->image}}"></td>
          <td>{{$user->username}}</td>
          <td>{{$user->posts->count()}}</td>
          <td>{{$user->created_at}}</td>
          <td>{{$user->updated_at}}</td>
          <td style="width: 0px;"><a href="{{route('admin.user.show',[$user->id])}}"><i class="fas fa-eye btn-sm btn-info waves-effect"></i></a></td>
          <td style="width: 0px;">
          
            <form action="{{route('admin.user.destroy',[$user->id])}}" method="post">
              @method('Delete')
              @csrf
              <button class="show-alert-delete-box " data-toggle="tooltip" title='Delete' style="border:none;background-color: transparent;" type="submit"><i class="fas fa-trash btn-sm btn-danger waves-effect"></i></button>
            </form>

          </td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
          <th>ID</th>
          <th>Image</th>
          <th>Name</th>
          <th>Posts</th>
          <th>Created At</th>
          <th>Updated At</th>
          <th colspan="2">Action</th>
        </tr>
        </tfoot>
      </table>
    </div>
  </div>
@endsection

@section('js')
    <!-- DataTables -->
<script src="{{asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  <script type="text/javascript">
    $('.show-alert-delete-box').click(function(event){
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: "Are you sure you want to delete this record?",
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            type: "warning",
            buttons: ["Cancel","Yes!"],
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });
</script>


@endsection