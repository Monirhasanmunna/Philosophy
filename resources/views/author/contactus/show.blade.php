@extends('layouts.backend.main')

@section('title','Contact Details')
@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Contact Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('author.contact.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Contact Destails</li>
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
          <div class="col-lg-12 col-md-12 col-sm-12">
            <a class="btn btn-sm bg-danger my-2" href="{{route('author.contact.index')}}"><i class="fas fa-left-long"></i><span class="pl-1">Back</span></a>
          </div>
          <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0">Contact Name :</h5>
                </div>
              <div class="card-body">
                <h2 class="card-text">{{$contact->name}}</h2>
              </div>
            </div>
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="m-0">Message :</h5>
                </div>
              <div class="card-body">
                <p class="card-text">{{ $contact->message }}</p1>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h5 class="m-0">Email</h5>
              </div>
              <div class="card-body">
                  <span class="badge badge-pill bg-secondary">{{$contact->email}}</span>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Website</h5>
              </div>
              <div class="card-body">
                <span class="badge badge-pill bg-dark">{{$contact->website}}</span>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection