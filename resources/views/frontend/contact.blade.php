@extends('layouts.frontend.main')

@section('content')
<section class="s-content s-content--narrow">

    <div class="row">

        <div class="s-content__header col-full">
            <h1 class="s-content__header-title">
                Feel Free To Contact Us.
            </h1>
        </div> <!-- end s-content__header -->

        <div class="s-content__media col-full">
            <div id="map-wrap">
                <div id="map-container"></div>
                <div id="map-zoom-in"></div>
                <div id="map-zoom-out"></div>
                
            </div> 
        </div> <!-- end s-content__media -->

        <div class="col-full s-content__main">

            <p class="lead">
                {{$contact->description}}
            </p>

            <div class="row">
                <div class="col-six tab-full">
                    <h3>Where to Find Us</h3>

                    <p>
                    {{$contact->address}}<br>
                    {{$contact->city}}<br>
                    {{$contact->area_code}}
                    </p>

                </div>

                <div class="col-six tab-full">
                    <h3>Contact Info</h3>

                    <p>{{$contact->email}}<br>
                    {{$contact->phone}}
                    </p>

                </div>
            </div> <!-- end row -->

            <h3>Say Hello.</h3>

            <form name="cForm" id="cForm" method="post" action="">
                <fieldset>

                    <div class="form-field">
                        <input name="cName" type="text" id="cName" class="full-width" placeholder="Your Name" value="">
                    </div>

                    <div class="form-field">
                        <input name="cEmail" type="text" id="cEmail" class="full-width" placeholder="Your Email" value="">
                    </div>

                    <div class="form-field">
                        <input name="cWebsite" type="text" id="cWebsite" class="full-width" placeholder="Website"  value="">
                    </div>

                    <div class="message form-field">
                    <textarea name="cMessage" id="cMessage" class="full-width" placeholder="Your Message" ></textarea>
                    </div>

                    <button type="submit" class="submit btn btn--primary full-width">Submit</button>

                </fieldset>
            </form> <!-- end form -->


        </div> <!-- end s-content__main -->

    </div> <!-- end row -->

</section> <!-- s-content -->
@endsection

@section('js')
<script src="https://maps.googleapis.com/maps/api/js"></script>
@endsection