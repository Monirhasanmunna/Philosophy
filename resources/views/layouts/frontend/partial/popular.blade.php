<section class="s-extra">

    <div class="row top">

        <div class="col-eight md-six tab-full popular">
            <h3>Popular Posts</h3>

            <div class="block-1-2 block-m-full popular__posts">
                @foreach ($popularPost as $post)
                    <article class="col-block popular__post">
                    <a href="{{route('post.details',[$post->slug])}}" class="popular__thumb">
                        <img src="{{asset('storage/post/'.$post->image)}}" alt="{{$post->image}}">
                    </a>
                    <h5><a href="{{route('post.details',[$post->slug])}}">{{$post->title}}</a></h5>
                    <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <a href="#0">{{$post->user->username}}</a></span>
                        <span class="popular__date"><span>on</span> <time >{{$post->created_at->format('D M Y')}}</time></span>
                    </section>
                </article>
                @endforeach
            </div> <!-- end popular_posts -->
        </div> <!-- end popular -->
        
        <div class="col-four md-six tab-full about">
            <h3>About Philosophy</h3>

            <p>{{$about->about}}</p>

            <ul class="about__social">
                <li>
                    <a target="blank" href="{{$social->facebook}}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a target="blank" href="{{$social->twitter}}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a target="blank" href="{{$social->instagram}}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a target="blank" href="{{$social->pinterest}}"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                </li>
            </ul> <!-- end header__social -->
        </div> <!-- end about -->
    </div> <!-- end row -->

    <div class="row bottom tags-wrap">
        <div class="col-full tags">
            <h3>Tags</h3>

            <div class="tagcloud">
                @foreach ($tags as $tag)
                    <a href="{{route('tagpost.details',$tag->slug)}}">{{$tag->name}}</a>
                @endforeach
                
            </div> <!-- end tagcloud -->
        </div> <!-- end tags -->
    </div> <!-- end tags-wrap -->

</section> <!-- end s-extra -->