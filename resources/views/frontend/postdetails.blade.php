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

                    <h3 class="h2">5 Comments</h3>

                    <!-- commentlist -->
                    <ol class="commentlist">

                        <li class="depth-1 comment">

                            <div class="comment__avatar">
                                <img width="50" height="50" class="avatar" src="images/avatars/user-01.jpg" alt="">
                            </div>

                            <div class="comment__content">

                                <div class="comment__info">
                                    <cite>Itachi Uchiha</cite>

                                    <div class="comment__meta">
                                        <time class="comment__time">Dec 16, 2017 @ 23:05</time>
                                        <a class="reply" href="#0">Reply</a>
                                    </div>
                                </div>

                                <div class="comment__text">
                                <p>Adhuc quaerendum est ne, vis ut harum tantas noluisse, id suas iisque mei. Nec te inani ponderum vulputate,
                                facilisi expetenda has et. Iudico dictas scriptorem an vim, ei alia mentitum est, ne has voluptua praesent.</p>
                                </div>

                            </div>

                        </li> <!-- end comment level 1 -->

                        <li class="thread-alt depth-1 comment">

                            <div class="comment__avatar">
                                <img width="50" height="50" class="avatar" src="images/avatars/user-04.jpg" alt="">
                            </div>

                            <div class="comment__content">

                                <div class="comment__info">
                                <cite>John Doe</cite>

                                <div class="comment__meta">
                                    <time class="comment__time">Dec 16, 2017 @ 24:05</time>
                                    <a class="reply" href="#0">Reply</a>
                                </div>
                                </div>

                                <div class="comment__text">
                                <p>Sumo euismod dissentiunt ne sit, ad eos iudico qualisque adversarium, tota falli et mei. Esse euismod
                                urbanitas ut sed, et duo scaevola pericula splendide. Primis veritus contentiones nec ad, nec et
                                tantas semper delicatissimi.</p>
                                </div>

                            </div>

                            <ul class="children">

                                <li class="depth-2 comment">

                                    <div class="comment__avatar">
                                        <img width="50" height="50" class="avatar" src="images/avatars/user-03.jpg" alt="">
                                    </div>

                                    <div class="comment__content">

                                        <div class="comment__info">
                                            <cite>Kakashi Hatake</cite>

                                            <div class="comment__meta">
                                                <time class="comment__time">Dec 16, 2017 @ 25:05</time>
                                                <a class="reply" href="#0">Reply</a>
                                            </div>
                                        </div>

                                        <div class="comment__text">
                                            <p>Duis sed odio sit amet nibh vulputate
                                            cursus a sit amet mauris. Morbi accumsan ipsum velit. Duis sed odio sit amet nibh vulputate
                                            cursus a sit amet mauris</p>
                                        </div>

                                    </div>

                                    <ul class="children">

                                        <li class="depth-3 comment">

                                            <div class="comment__avatar">
                                                <img width="50" height="50" class="avatar" src="images/avatars/user-04.jpg" alt="">
                                            </div>

                                            <div class="comment__content">

                                                <div class="comment__info">
                                                <cite>John Doe</cite>

                                                <div class="comment__meta">
                                                    <time class="comment__time">Dec 16, 2017 @ 25:15</time>
                                                    <a class="reply" href="#0">Reply</a>
                                                </div>
                                                </div>

                                                <div class="comment__text">
                                                <p>Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est
                                                etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p>
                                                </div>

                                            </div>

                                        </li>

                                    </ul>

                                </li>

                            </ul>

                        </li> <!-- end comment level 1 -->

                        <li class="depth-1 comment">

                            <div class="comment__avatar">
                                <img width="50" height="50" class="avatar" src="images/avatars/user-02.jpg" alt="">
                            </div>

                            <div class="comment__content">

                                <div class="comment__info">
                                <cite>Shikamaru Nara</cite>

                                <div class="comment__meta">
                                    <time class="comment-time">Dec 16, 2017 @ 25:15</time>
                                    <a class="reply" href="#">Reply</a>
                                </div>
                                </div>

                                <div class="comment__text">
                                <p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem.</p>
                                </div>

                            </div>

                        </li>  <!-- end comment level 1 -->

                    </ol> <!-- end commentlist -->


                    <!-- respond
                    ================================================== -->
                    <div class="respond">

                        <h3 class="h2">Add Comment</h3>

                        <form name="contactForm" id="contactForm" method="post" action="">
                            <fieldset>

                                <div class="form-field">
                                        <input name="cName" type="text" id="cName" class="full-width" placeholder="Your Name" value="">
                                </div>

                                <div class="form-field">
                                        <input name="cEmail" type="text" id="cEmail" class="full-width" placeholder="Your Email" value="">
                                </div>

                                <div class="form-field">
                                        <input name="cWebsite" type="text" id="cWebsite" class="full-width" placeholder="Website" value="">
                                </div>

                                <div class="message form-field">
                                    <textarea name="cMessage" id="cMessage" class="full-width" placeholder="Your Message"></textarea>
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