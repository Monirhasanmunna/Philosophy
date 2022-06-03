@extends('layouts.frontend.main')

@section('content')
<section class="s-content s-content--narrow">

    <div class="row">

        <div class="s-content__header col-full">
            <h1 class="s-content__header-title">
                Learn More About Us.
            </h1>
        </div> <!-- end s-content__header -->

        <div class="col-full s-content__main">

            <p class="lead">{{$about->about}}</p>

        </div> <!-- end s-content__main -->

    </div> <!-- end row -->

</section> <!-- s-content -->
@endsection