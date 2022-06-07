@extends('layouts.backend.main')

@section('title','Contact List')

@section('css')
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  
@endsection

@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Post</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('author.dashboard')}}">Back to Dashboard</a></li>
            <li class="breadcrumb-item active">Post List</li>
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
          <th>Name</th>
          <th>Email</th>
          <th>Website</th>
          <th>Message</th>
          <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
       
          @if($contacts->count() > 0)
          @foreach ($contacts as $key => $contact)
          <td>{{$key+1}}</td>
          <td>{{$contact->name}}</td>
          <td><span class="badge badge-pill bg-secondary">{{$contact->email}}</span></td>
          <td>{{$contact->website}}</td>
          <td>{{Str::words($contact->message,'20','...')}}</td>
          <td style="width: 0px;"><a href="{{route('author.contact.show',[$contact->id])}}"><i class="fas fa-eye btn-sm btn-primary waves-effect"></i></a></td>
          <td style="width: 0px;">
            <form action="{{route('author.contact.destroy',[$contact->id])}}" method="post">
              @method('Delete')
              @csrf
              <button class="show-alert-delete-box " data-toggle="tooltip" title='Delete' style="border:none;background-color: transparent;" type="submit"><i class="fas fa-trash btn-sm btn-danger waves-effect"></i></button>
            </form>
          </td>
        </tr>
        @endforeach
        @else
        <tr><th colspan="9" class="text-center">No Message Found</th></tr>
        @endif
        </tbody>
        <tfoot>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Website</th>
          <th>Message</th>
          <th colspan="2">Action</th>
        </tr>
        </tfoot>
      </table>
    </div>
    {!! $contacts->links() !!}
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
            title: "Are you sure you want to delete this Message?",
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            type: "warning",
            buttons: ["Cancel","Yes!"],
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Message deleted successfully!'
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });
</script>
@endsection