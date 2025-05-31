@extends('front-layouts.app')
@section('content')
<!--==========================
    Intro Section
  ============================-->
<section id="intro" class="clearfix">
    <div class="container">

        <div class="intro-img">
            <img src="assets/img/intro-img.svg" alt="" class="img-fluid">
        </div>

        <div class="intro-info">
            <h2>The Ultimate property<br><span>solutions</span><br>for Property Scroller!</h2>
            <div>
                <a href="#about" class="btn-get-started scrollto">Get Started</a>
            </div>
        </div>

    </div>
</section><!-- #intro -->
<!--==========================
      About Us Section
    ============================-->
<section id="about-us">
    <div class="container">
        <header class="section-header">
            <h3>About Us</h3>
        </header>
        <div class="row about-extra">
            <div class="col-lg-6 wow fadeInUp order-1 order-lg-2">
                <img src="assets/img/about-extra-2.svg" class="img-fluid" alt="">
            </div>

            <div class="col-lg-6 wow fadeInUp pt-4 pt-lg-0 order-2 order-lg-1 text-justify">
                <p>
                    PropertyScroller.com is India’s leading property listing platform exclusively made
                    for property brokers and real estate professionals. We created this platform with
                    one mission — to empower brokers with a simple, smart, and efficient way to list,
                    discover, and close property deals.
                </p>
                <p>
                    From residential rentals to high-value commercial spaces, we connect verified
                    brokers with each other to help grow their business network, manage property
                    listings, and access quality inquiries. No direct owners, no confusion — only
                    professional, broker-to-broker property deals.
                </p>
                <p>
                    At PropertyScroller.com, we believe that real estate runs on relationships. And our
                    platform makes those connections happen.
                </p>
            </div>

        </div>
    </div>
</section>
<section id="add-property">
    <div class="container-fluid">

        <div class="section-header">
            <h3>Add Property</h3>
        </div>

        <div class="row wow fadeInUp">
            <div class="col-lg-6">
                <div class="map mb-4 mb-lg-0">
                    <img src="{{asset('assets/img/property.jpg')}}" class="img-fluid" height="250px;">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form">
                    @if(session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if(session('error'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <!-- <div id="sendmessage">Your message has been sent. Thank you!</div>
                    <div id="errormessage"></div> -->
                    <form action="{{route('guestAddProperty')}}" method="post" role="form" class="contactForm">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <input type="text" name="owner_name" value="{{old('owner_name')}}" class="form-control"
                                    placeholder="Owner Name" />
                                @error('owner_name')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control" name="contact_number"
                                    value="{{old('contact_number')}}" placeholder="Owner Contact Number" />
                                @error('contact_number')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <input type="date" name="date" class="form-control"
                                    placeholder="Property display date" />
                                @error('date')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control" name="brokerage" value="{{old('brokerage')}}"
                                    placeholder="Brokerage" />
                                @error('brokerage')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control" name="premise" value="{{old('premise')}}"
                                    placeholder="Premise" />
                                @error('premise')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <select class="form-control" name="property_type_id"
                                    value="{{ old('property_type_id') }}">
                                    <option value="">--Select Property Type--</option>
                                    @foreach($ptypes as $ptype)
                                    <option value="{{encrypt_id($ptype->id)}}"
                                        {{ old('property_type_id') == encrypt_id($ptype->id) ? 'selected' : '' }}>
                                        {{$ptype->property_name}}</option>
                                    @endforeach;
                                </select>
                                @error('property_type_id')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control" name="rent" value="{{old('rent')}}"
                                    placeholder="Rent" />
                                @error('rent')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <select class="form-control" name="availability" value="{{ old('availability') }}">
                                    <option value="">--Select Availability--</option>
                                    <option value="1 Room">1 Room</option>
                                    <option value="1 Room & Kitchen">1 Room & Kitchen</option>
                                    <option value="1.5BHK">1.5BHK</option>
                                    <option value="1BHK">1BHK</option>
                                    <option value="2 Room">2 Room</option>
                                    <option value="2 Room & Kitchen">2 Room & Kitchen</option>
                                    <option value="2.5BHK">2.5BHK</option>
                                    <option value="2BHK">2BHK</option>
                                    <option value="3BHK">3BHK</option>
                                    <option value="4BHK">4BHK</option>
                                    <option value="5BHK">5BHK</option>
                                    <option value="6BHK">6BHK</option>
                                    <option value="Above 2BHK">Above 2BHK</option>
                                    <option value="Duplex">Duplex</option>
                                    <option value="Duplex 1">Duplex 1</option>
                                    <option value="Independent Building">Independent Building</option>
                                    <option value="PG">PG</option>
                                </select>
                                @error('availability')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <select class="form-control" name="condition" value="{{ old('condition') }}">
                                    <option value="">--Select Condition--</option>
                                    <option value="Semi Furnished">Semi Furnished</option>
                                    <option value="Unfurnished">Unfurnished</option>
                                    <option value="Furnished">Furnished</option>
                                    <option value="Kitchen Fix">Kitchen Fix</option>
                                    <option value="Fully Furnished">Fully Furnished</option>
                                </select>
                                @error('condition')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" name="sqFt_sqyd" value="{{old('sqFt_sqyd')}}" class="form-control"
                                    placeholder="SqFT/Sqyd" />
                                @error('sqFt_sqyd')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <select class="form-control" id="state-select" name="state_id" placeholder="--Select--"
                                    value="{{ old('state_id') }}">
                                    <option value="">--Select State--</option>
                                    @foreach($states as $state)
                                    <option value="{{encrypt_id($state->id)}}">{{$state->state_name}}</option>
                                    @endforeach
                                </select>
                                @error('state_id')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <select class="form-control" id="city-dropdown" name="city_id"
                                    value="{{ old('city_id') }}"></select>
                                @error('city_id')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="address" rows="5"
                                placeholder="Property Address"></textarea>
                            @error('address')
                            <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="text-center"><button type="submit" class="btn btn-primary"
                                title="Send Message">Add</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="about">
    <div class="container">
        <header class="section-header">
            <h3>What We Offer</h3>
            <p>PropertyScroller.com is India’s premier property listing platform, built exclusively
                for property brokers and real estate professionals. We empower brokers to
                connect, list, and close deals faster — whether it’s residential, commercial, rental,
                or investment properties. </p>
        </header>
        <div class="row about-container">
            <div class="col-lg-6 content order-lg-1 order-2">
                <p>
                    Built for Brokers. Powered by Connections.At PropertyScroller.com, we understand the real estate
                    business runs on trusted
                    relationships and verified listings. That’s why we’ve created a platform designed
                    only for property brokers, helping you grow your network, expand your reach, and
                    boost your business.
                </p>
                <div class="icon-box wow fadeInUp">
                    <div class="icon"><i class="fa fa-shopping-bag"></i></div>
                    <h4 class="title"><a href="">For Rent Properties</a></h4>
                    <p class="description">List and discover rental homes, flats, commercial shops, offices, and
                        industrial
                        spaces tailored for your clients.</p>
                </div>
                <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
                    <div class="icon"><i class="fa fa-photo"></i></div>
                    <h4 class="title"><a href="">Buy & Sell Properties</a></h4>
                    <p class="description">Promote your sale listings, showcase exclusive properties, and find buyers
                        faster
                        with verified broker-to-broker connections.</p>
                </div>
                <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
                    <div class="icon"><i class="fa fa-bar-chart"></i></div>
                    <h4 class="title"><a href="">Commercial Listings</a></h4>
                    <p class="description">Post and search for offices, retail spaces, showrooms, and warehouses with
                        ease
                        — all from trusted brokers like you.</p>
                </div>
            </div>
            <div class="col-lg-6 background order-lg-2 order-1 wow fadeInUp">
                <img src="assets/img/about-img.svg" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</section>
<section id="our-vision" class="section-bg">
    <div class="container">
        <div class="section-header">
            <h3>Our Vision</h3>
            <p>To be the most trusted and powerful property listing network for brokers in India.
                We envision a professional, verified, and broker-driven property marketplace
                where real estate professionals can collaborate, exchange listings, and grow their
                business without limits. By providing an exclusive platform for brokers, we aim to
                make property transactions faster, smarter, and more profitable for everyone in
                the network.</p>
        </div>
    </div>
</section>
<!--==========================
      Why Us Section
    ============================-->
<section id="why-us" class="wow fadeIn">
    <div class="container">
        <header class="section-header">
            <h3>Why Choose PropertyScroller.com ?</h3>
        </header>
        <p class="text-white text-center">Exclusively for Brokers: No direct owners, no random buyers — only verified
            real
            estate professionals. Unlimited Listings: Post, manage, and promote your property listings hassle-free.
            Broker-to-Customers Deals: Grow your network and close deals through genuine broker or Customer
            collaborations. Verified Leads: Access quality inquiries and connect with serious property seekers.
            Easy, Fast, Reliable: Mobile-friendly, intuitive, and built for the modern real estate market.
        </p>
        <div class="row row-eq-height justify-content-center">
            <div class="col-lg-4 mb-4">
                <div class="card wow bounceInUp">
                    <div class="card-body">
                        <h1>#8193</h1>
                        <h5 class="card-title">Total Property</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card wow bounceInUp">
                    <div class="card-body">
                        <h1>#1042</h1>
                        <h5 class="card-title">Residential Rent</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card wow bounceInUp">
                    <div class="card-body">
                        <h1>#4437</h1>
                        <h5 class="card-title">Residential Sell</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-eq-height justify-content-center">
            <div class="col-lg-4 mb-4">
                <div class="card wow bounceInUp">
                    <div class="card-body">
                        <h1>#1331</h1>
                        <h5 class="card-title">Commercial Rent</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card wow bounceInUp">
                    <i class="fa fa-language"></i>
                    <div class="card-body">
                        <h1>#1383</h1>
                        <h5 class="card-title">Commercial Sell</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="testimonials" class="section-bg">
    <div class="container">

        <header class="section-header">
            <h3>Join the Network. Grow Your Business.</h3>
        </header>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="testimonials-carousel wow fadeInUp">
                    <div class="testimonial-item">
                        <p>
                            PropertyScroller.com is more than a listing platform — it’s a powerful business tool
                            for brokers to connect, collaborate, and succeed. Whether you're handling
                            residential rentals, luxury sales, or large commercial deals, we help you move
                            properties faster and smarter.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- #testimonials -->
@endsection