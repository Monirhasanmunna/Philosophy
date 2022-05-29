@extends('layouts.frontend.main')

@section('content')
     <!-- s-content
    ================================================== -->
    <section class="s-content s-content--narrow s-content--no-padding-bottom">

        <article class="row format-standard">

            <div class="s-content__header col-full">
                <h1 class="s-content__header-title">
                   {{$post->title}}
                </h1>
                <ul class="s-content__header-meta">
                    <li class="date">{{$post->created_at->format('M,d,Y')}}</li>
                    <li class="cat">
                        In
                        @foreach ($post->categories as $category)
                            <a href="#0">{{$category->name}}</a>
                        @endforeach
                    </li>
                </ul>
            </div> <!-- end s-content__header -->
    
            <div class="s-content__media col-full">
                <div class="s-content__post-thumb">
                    <img src="{{asset('storage/post/'.$post->image)}}" 
 
                         sizes="(max-width: 2000px) 100vw, 2000px" alt="{{$post->image}}" >
                </div>
            </div> <!-- end s-content__media -->

            <div class="col-full s-content__main">

                
                <p>{{$post->description}} </p>

                <p class="s-content__tags">
                    <span>Post Tags</span>

                    <span class="s-content__tag-list">
                        @foreach ($post->tags as $tag)
                            <a href="#0">{{$tag->name}}</a>
                        @endforeach
                        
                    </span>
                </p> <!-- end s-content__tags -->

                <div class="s-content__author">
                    <img src="{{asset('storage/user/'.$post->user->image)}}" alt="">

                    <div class="s-content__author-about">
                        <h4 class="s-content__author-name">
                            <a href="#0">{{$post->user->username}}</a>
                        </h4>
                    
                        <p>{{$post->user->about}}</p>

                        <ul class="s-content__author-social">
                           <li><a href="{{$social->facebook}}">Facebook</a></li>
                           <li><a href="{{$social->twitter}}">Twitter</a></li>
                           <li><a href="{{$social->google_plus}}">GooglePlus</a></li>
                           <li><a href="{{$social->instagram}}">Instagram</a></li>
                        </ul>
                    </div>
                </div>

            </div> <!-- end s-content__main -->

        </article>


        <!-- comments
        ================================================== -->
        <div class="comments-wrap">

            <div id="comments" class="row">
                <div class="col-full">

                    <h3 class="h2">{{$post->comments->count()}} Comments</h3>

                    <!-- commentlist -->
                    <ol class="commentlist">

                        @foreach ($comments as $comment)
                             <li class="depth-1 comment">

                            <div class="comment__avatar">
                                <img width="50" height="50" class="avatar" src="{{$comment->user ? asset('storage/user/'.$comment->user->image)  : asset('storage/image/user.png')}}" alt="">
                            </div>

                            <div class="comment__content">

                                <div class="comment__info">
                                    <cite>{{$comment->user ? $comment->user->username : $comment->name}}</cite>

                                    <div class="comment__meta">
                                        <time class="comment__time">{{$comment->created_at->format('M,d,Y')}} @ {{\Carbon\Carbon::parse($comment->time)->format('H:i:s')}}</time>
                                        <a class="reply" href="#0">Reply</a>
                                    </div>
                                </div>

                                <div class="comment__text">
                                <p>{{$comment->text}}</p>
                                </div>

                            </div>

                        </li> <!-- end comment level 1 -->
                        @endforeach

                    </ol> <!-- end commentlist -->

                    <!-- respond
                    ================================================== -->
                    <div class="respond">

                        <h3 class="h2">Add Comment</h3>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="post" action="{{route('comment.store',[$post->id])}}">
                            @csrf
                            <fieldset>
                                <div class="form-field">
                                        <input name="name" type="text"  class="full-width" placeholder="Your Name" value="">
                                </div>

                                <div class="form-field">
                                        <input name="email" type="email" class="full-width" placeholder="Your Email" value="">
                                </div>

                                <div class="form-field">
                                        <input name="website" type="text"  class="full-width" placeholder="Website" value="">
                                </div>

                                <div class="message form-field">
                                    <textarea name="text" class="full-width" placeholder="Your Message"></textarea>
                                </div>

                                <button type="submit" class="submit btn--primary btn--large full-width">Submit</button>
                            </fieldset>
                        </form> <!-- end form -->

                    </div> <!-- end respond -->

                </div> <!-- end col-full -->

            </div> <!-- end row comments -->
        </div> <!-- end comments-wrap -->

    </section> <!-- s-content -->
@endsection