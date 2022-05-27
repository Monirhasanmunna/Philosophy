<footer class="s-footer">

    <div class="s-footer__main">
        <div class="row">
            <div class="col-two md-four mob-full s-footer__sitelinks">
                    
                <h4>Quick Links</h4>

                <ul class="s-footer__linklist">
                    <li><a href="#0">Home</a></li>
                    <li><a href="#0">Blog</a></li>
                    <li><a href="#0">Styles</a></li>
                    <li><a href="#0">About</a></li>
                    <li><a href="#0">Contact</a></li>
                    <li><a href="#0">Privacy Policy</a></li>
                </ul>

            </div> <!-- end s-footer__sitelinks -->

            <div class="col-two md-four mob-full s-footer__archives">
                    
                <h4>Archives</h4>

                <ul class="s-footer__linklist">
                    <li><a href="#0">January 2018</a></li>
                    <li><a href="#0">December 2017</a></li>
                    <li><a href="#0">November 2017</a></li>
                    <li><a href="#0">October 2017</a></li>
                    <li><a href="#0">September 2017</a></li>
                    <li><a href="#0">August 2017</a></li>
                </ul>

            </div> <!-- end s-footer__archives -->

            <div class="col-two md-four mob-full s-footer__social">
                    
                <h4>Social</h4>

                <ul class="s-footer__linklist">
                    <li><a target="blank" href="{{$social->facebook}}">Facebook</a></li>
                    <li><a target="blank" href="{{$social->instagram}}">Instagram</a></li>
                    <li><a target="blank" href="{{$social->twitter}}">Twitter</a></li>
                    <li><a target="blank" href="{{$social->pinterest}}">Pinterest</a></li>
                    <li><a target="blank" href="{{$social->google_plus}}">Google+</a></li>
                    <li><a target="blank" href="{{$social->linkdin}}">LinkedIn</a></li>
                </ul>

            </div> <!-- end s-footer__social -->

            <div class="col-five md-full end s-footer__subscribe">
                    
                <h4>Our Newsletter</h4>

                <p>Sit vel delectus amet officiis repudiandae est voluptatem. Tempora maxime provident nisi et fuga et enim exercitationem ipsam. Culpa consequatur occaecati.</p>

                @error('email')
                    <div class="alert bg-danger">{{ $message }}</div>
                @enderror
                <div class="subscribe-form">
                    <form id="mc-form" class="group" novalidate="true" action="{{route('subscription.store')}}" method="POST">
                        @csrf
                        <input type="email" value="" name="email" class="email" id="mc-email" placeholder="Email Address" required="" class="@error('email') is-invalid @enderror">
            
                        <input type="submit" name="subscribe" value="Send">

                        <label for="mc-email" class="subscribe-message"></label>
                    </form>
                </div>
            </div> <!-- end s-footer__subscribe -->
        </div>
    </div> <!-- end s-footer__main -->

    <div class="s-footer__bottom">
        <div class="row">
            <div class="col-full">
                <div class="s-footer__copyright">
                    <span>© Copyright Philosophy 2018</span> 
                    <span>Site Template by <a href="https://colorlib.com/">Colorlib</a> Downloaded from <a href="https://themeslab.org/" target="_blank">Themeslab</a></span>
                </div>

                <div class="go-top">
                    <a class="smoothscroll" title="Back to Top" href="#top"></a>
                </div>
            </div>
        </div>
    </div> <!-- end s-footer__bottom -->

</footer> <!-- end s-footer -->