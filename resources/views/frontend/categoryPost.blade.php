@extends('layouts.frontend.main')

@section('content')
<div class="row narrow">
    <div class="col-full s-content__header" data-aos="fade-up">
        <h1>Category: {{$posts->name}}</h1>

        @if ( ! $posts->posts->count())
            <h1>{{'No Data Found :('}}</h1>
        @endif
        
    </div>
</div>

<div class="row masonry-wrap">
    <div class="masonry">

        <div class="grid-sizer"></div>
        @foreach ($posts->posts as $post)

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