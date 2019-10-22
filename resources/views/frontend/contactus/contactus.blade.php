
@extends('frontend.layouts.layout')

@section('content')
<!-- =====  CONTAINER START  ===== -->
<div class="container">
    <div class="row ">
    <!-- =====  BANNER STRAT  ===== -->
    <div class="col-sm-12">
        <div class="breadcrumb ptb_20">
        <h1>Contact us</h1>
        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>    
            <li class="active">Contact us</li>
        </ul>
        </div>
    </div>
    <!-- =====  BREADCRUMB END===== -->

    @include('frontend.left_column.left_column')

    
    <div class="col-sm-8 col-lg-9 mtb_20">
          <!-- contact  -->
        <div class="row">
        <div class="col-md-4 col-xs-12 contact">
            <div class="location mb_50">
            <h5 class="capitalize mb_20"><strong>Our Location</strong></h5>
            <div class="address">Office address
                <br> 124,Lorem Ipsum has been
                <br> text ever since the 1500</div>
            <div class="call mt_10"><i class="fa fa-phone" aria-hidden="true"></i>+91-9987-654-321</div>
            </div>
            <div class="Career mb_50">
            <h5 class="capitalize mb_20"><strong>Careers</strong></h5>
            <div class="address">dummy text ever since the 1500s, simply dummy text of the typesetting industry. </div>
            <div class="email mt_10"><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:careers@yourdomain.com" target="_top">careers@yourdomain.com</a></div>
            </div>
            <div class="Hello mb_50">
            <h5 class="capitalize mb_20"><strong>Say Hello</strong></h5>
            <div class="address">simply dummy text of the printing and typesetting industry.</div>
            <div class="email mt_10"><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@yourdomailname.com" target="_top">info@yourdomailname.com</a></div>
            </div>
        </div>
        <div class="col-md-8 col-xs-12 contact-form mb_50">
            <!-- Contact FORM -->
            <div id="contact_form">
            <form id="contact_body" method="post" action="contact_me.php">
                <!--                                <label class="full-with-form" ><span>Name</span></label>
-->
                <input class="full-with-form " type="text" name="name" placeholder="Name" data-required="true" />
                <!--                <label class="full-with-form" ><span>Email Address</span></label>
-->
                <input class="full-with-form  mt_30" type="email" name="email" placeholder="Email Address" data-required="true" />
                <!--                <label class="full-with-form" ><span>Phone Number</span></label>
-->
                <input class="full-with-form  mt_30" type="text" name="phone1" placeholder="Phone Number" maxlength="15" data-required="true" />
                <!--                <label class="full-with-form" ><span>Subject</span></label>
-->
                <input class="full-with-form  mt_30" type="text" name="subject" placeholder="Subject" data-required="true">
                <!--                                <label class="full-with-form" ><span>Attachment</span></label>
-->
                <!--                                <label class="full-with-form" ><span>Message</span></label>
-->
                <textarea class="full-with-form  mt_30" name="message" placeholder="Message" data-required="true"></textarea>
                <button class="btn mt_30" type="submit">Send Message</button>
            </form>
            <div id="contact_results"></div>
            </div>
            <!-- END Contact FORM -->
        </div>
        </div>
        <!-- map  -->
        <div class="row">
        <div class="col-xs-12 map mb_80">
            <div id="map"></div>
        </div>
        </div>
    </div>


    </div>
</div>
<!-- =====  CONTAINER END  ===== -->


@endsection

@section('scripts')
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAT3mI0RI16q19Oxv93gSxN0cF0wfxWN6w">
    </script>
    <script src="/frontend/js/map.js"></script>
@endsection