<header class="header">
    <div class="header__content row">

        <div class="header__logo">
            <a class="logo" href="{{route('home')}}">
                <img src="{{asset('storage/logo/'.$logo->logo)}}" alt="{{$logo->logo}}">
            </a>
        </div> <!-- end header__logo -->

        <ul class="header__social">
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

        <a class="header__search-trigger" href="#0"></a>

        <div class="header__search">

            <form role="search" method="get" class="header__search-form" action="#">
                <label>
                    <span class="hide-content">Search for:</span>
                    <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="Search for:" autocomplete="off">
                </label>
                <input type="submit" class="search-submit" value="Search">
            </form>

            <a href="#0" title="Close Search" class="header__overlay-close">Close</a>

        </div>  <!-- end header__search -->


        <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

        <nav class="header__nav-wrap">

            <h2 class="header__nav-heading h6">Site Navigation</h2>

            <ul class="header__nav">
                <li class="{{Request::is('/') ? 'current' : ''}}"><a href="{{route('home')}}" title="">Home</a></li>
                <li class="has-children">
                    <a href="#0" title="">Categories</a>
                    <ul class="sub-menu">
                        @foreach ($categories as $category)
                            <li><a href="category.html">{{$category->name}}</a></li>
                        @endforeach
                    
                    </ul>
                </li>
                <li class="has-children">
                    <a href="#0" title="">Blog</a>
                    <ul class="sub-menu">
                    <li><a href="single-video.html">Video Post</a></li>
                    <li><a href="single-audio.html">Audio Post</a></li>
                    <li><a href="single-gallery.html">Gallery Post</a></li>
                    <li><a href="single-standard.html">Standard Post</a></li>
                    </ul>
                </li>
                <li><a href="style-guide.html" title="">Styles</a></li>
                <li><a href="about.html" title="">About</a></li>
                <li><a href="contact.html" title="">Contact</a></li>
            </ul> <!-- end header__nav -->

            <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

        </nav> <!-- end header__nav-wrap -->

    </div> <!-- header-content -->
</header> <!-- header -->