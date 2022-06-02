@extends('layouts.frontend.main')

@section('home_header_design','s-pageheader--home')

@section('pageheader')
<div class="pageheader-content row">
    <div class="col-full">

        <div class="featured">

            @foreach ($firstItem as $firstpost)
            <div class="featured__column featured__column--big">
                <div class="entry" style="background-image: url({{asset('storage/post/'.$firstpost->image)}})">
                    <div class="entry__content">
                        @foreach ($firstpost->categories as $category)
                            <span class="entry__category"><a href="#0">{{$category->name}}</a></span>
                        @endforeach
                        

                        <h1><a href="{{route('post.details',[$firstpost->slug])}}" title="">{{$firstpost->title}}</a></h1>

                        <div class="entry__info">
                            <a href="#0" class="entry__profile-pic">
                                <img class="avatar" src="{{asset('storage/user/'.$firstpost->user->image)}}" alt="">
                            </a>

                            <ul class="entry__meta">
                                <li><a href="#0">{{$firstpost->user->username}}</a></li>
                                <li>{{$firstpost->created_at}}</li>
                            </ul>
                        </div>
                    </div> <!-- end entry__content -->
                    
                </div> <!-- end entry -->
            </div> <!-- end featured__big -->
            @endforeach

            <div class="featured__column featured__column--small">

                @foreach ($secondItem as $secondpost)
                    <div class="entry" style="background-image:url({{asset('storage/post/'.$secondpost->image)}});">
                    
                    <div class="entry__content">

                        @foreach ($secondpost->categories as $category)
                            <span class="entry__category"><a href="#0">{{$category->name}}</a></span>
                        @endforeach
                        
                        <h1><a href="{{route('post.details',[$secondpost->slug])}}" title="">{{$secondpost->title}}</a></h1>

                        <div class="entry__info">
                            <a href="#0" class="entry__profile-pic">
                                <img class="avatar" src="{{asset('storage/user/'.$secondpost->user->image)}}" alt="{{$secondpost->user->image}}">
                            </a>

                            <ul class="entry__meta">
                                <li><a href="#0">{{$secondpost->user->username}}</a></li>
                                <li>{{$secondpost->created_at}}</li>
                            </ul>
                        </div>
                    </div> <!-- end entry__content -->
                  
                </div> <!-- end entry -->
                @endforeach

                

            </div> <!-- end featured__small -->
        </div> <!-- end featured -->

    </div> <!-- end col-full -->
</div> <!-- end pageheader-content row -->
@endsection

@section('content')
<div class="row masonry-wrap">
    <div class="masonry">

        <div class="grid-sizer"></div>
        @foreach ($posts as $post)

        <article class="masonry__brick entry format-standard" data-aos="fade-up" style="position:absolute;top:527px;">
                
            <div class="entry__thumb">
                <a href="{{route('post.details',[$post->slug])}}" class="entry__thumb-link">
                    <img src="{{asset('storage/post/'.$post->image)}}" alt="{{$post->image}}" style="width: 100%;">
                </a>
            </div>

            <div class="entry__text">
                <div class="entry__header">
                    
                    <div class="entry__date">
                        <a href="single-standard.html">{{$post->created_at}}</a>
                    </div>
                    <h1 class="entry__title"><a href="{{route('post.details',[$post->slug])}}">{{Str::words($post->title, 5)}}</a></h1>
                    
                </div>
                <div class="entry__excerpt">
                    <p>
                        {{ Str::words(strip_tags($post->description), 10) }}
                    </p>
                </div>
                <div class="entry__meta">
                    <span class="entry__meta-links">
                        @foreach ($post->categories as $category)
                        <a href="category.html">{{$category->name}}</a> 
                        @endforeach
                    </span>
                </div>
            </div>

        </article> <!-- end article -->               
        @endforeach
    </div> <!-- end masonry -->
</div> <!-- end masonry-wrap -->

    {{-- Pagination --}}
    {{$posts->links('frontend.pagination')}}
    {{-- Pagination --}}
@endsection

@section('loder')
<div id="preloader">
    <div id="loader">
        <div class="line-scale">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>
@endsection