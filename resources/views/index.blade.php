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
<section id="about">
    <div class="container">

        <header class="section-header">
            <h3>About Us</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua.</p>
        </header>

        <div class="row about-container">

            <div class="col-lg-6 content order-lg-1 order-2">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat.
                </p>

                <div class="icon-box wow fadeInUp">
                    <div class="icon"><i class="fa fa-shopping-bag"></i></div>
                    <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
                    <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore,
                        cum soluta nobis est eligendi</p>
                </div>

                <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
                    <div class="icon"><i class="fa fa-photo"></i></div>
                    <h4 class="title"><a href="">Magni Dolores</a></h4>
                    <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                        deserunt mollit anim id est laborum</p>
                </div>

                <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
                    <div class="icon"><i class="fa fa-bar-chart"></i></div>
                    <h4 class="title"><a href="">Dolor Sitema</a></h4>
                    <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                        commodo consequat tarad limino ata</p>
                </div>

            </div>

            <div class="col-lg-6 background order-lg-2 order-1 wow fadeInUp">
                <img src="assets/img/about-img.svg" class="img-fluid" alt="">
            </div>
        </div>

        <div class="row about-extra">
            <div class="col-lg-6 wow fadeInUp">
                <img src="assets/img/about-extra-1.svg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 wow fadeInUp pt-5 pt-lg-0">
                <h4>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h4>
                <p>
                    Ipsum in aspernatur ut possimus sint. Quia omnis est occaecati possimus ea. Quas molestiae
                    perspiciatis occaecati qui rerum. Deleniti quod porro sed quisquam saepe. Numquam mollitia
                    recusandae non ad at et a.
                </p>
                <p>
                    Ad vitae recusandae odit possimus. Quaerat cum ipsum corrupti. Odit qui asperiores ea corporis
                    deserunt veritatis quidem expedita perferendis. Qui rerum eligendi ex doloribus quia sit. Porro
                    rerum eum eum.
                </p>
            </div>
        </div>

        <div class="row about-extra">
            <div class="col-lg-6 wow fadeInUp order-1 order-lg-2">
                <img src="assets/img/about-extra-2.svg" class="img-fluid" alt="">
            </div>

            <div class="col-lg-6 wow fadeInUp pt-4 pt-lg-0 order-2 order-lg-1">
                <h4>Neque saepe temporibus repellat ea ipsum et. Id vel et quia tempora facere reprehenderit.</h4>
                <p>
                    Delectus alias ut incidunt delectus nam placeat in consequatur. Sed cupiditate quia ea quis.
                    Voluptas nemo qui aut distinctio. Cumque fugit earum est quam officiis numquam. Ducimus corporis
                    autem at blanditiis beatae incidunt sunt.
                </p>
                <p>
                    Voluptas saepe natus quidem blanditiis. Non sunt impedit voluptas mollitia beatae. Qui esse
                    molestias. Laudantium libero nisi vitae debitis. Dolorem cupiditate est perferendis iusto.
                </p>
                <p>
                    Eum quia in. Magni quas ipsum a. Quis ex voluptatem inventore sint quia modi. Numquam est aut fuga
                    mollitia exercitationem nam accusantium provident quia.
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
                                <input type="text" name="owner_name" value="{{old('owner_name')}}" class="form-control" placeholder="Owner Name" />
                                @error('owner_name')
                                  <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control" name="contact_number" value="{{old('contact_number')}}"
                                    placeholder="Owner Contact Number" />
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
                                <input type="text" class="form-control" name="brokerage" value="{{old('brokerage')}}" placeholder="Brokerage" />
                                @error('brokerage')
                                  <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control" name="premise" value="{{old('premise')}}" placeholder="Premise" />
                                @error('premise')
                                  <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <select class="form-control" name="property_type_id"
                                    value="{{ old('property_type_id') }}">
                                    <option value="">--Select Property Type--</option>
                                    @foreach($ptypes as $ptype)
                                        <option value="{{encrypt_id($ptype->id)}}" {{ old('property_type_id') == encrypt_id($ptype->id) ? 'selected' : '' }}>{{$ptype->property_name}}</option>
                                    @endforeach;
                                </select>
                                @error('property_type_id')
                                  <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control" name="rent" value="{{old('rent')}}" placeholder="Rent" />
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
                                <input type="text" name="sqFt_sqyd" value="{{old('sqFt_sqyd')}}" class="form-control" placeholder="SqFT/Sqyd" />
                                @error('sqFt_sqyd')
                                  <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <select class="form-control" id="state-select" name="state_id"
                                    placeholder="--Select--" value="{{ old('state_id') }}">
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
                        <div class="text-center"><button type="submit" class="btn btn-primary" title="Send Message">Add</button></div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</section>
<!--==========================
      Why Us Section
    ============================-->
<section id="why-us" class="wow fadeIn">
    <div class="container">
        <header class="section-header">
            <h3>Why choose us?</h3>
            <p>Laudem latine persequeris id sed, ex fabulas delectus quo. No vel partiendo abhorreant vituperatoribus.
            </p>
        </header>

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
<!--==========================
      Clients Section
    ============================-->
<section id="clients" class="section-bg">

    <div class="container">

        <div class="section-header">
            <h3>Featured on</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        </div>

        <div class="row no-gutters clients-wrap clearfix wow fadeInUp">

            <div class="col-lg-3 col-md-4 col-xs-6">
                <div class="client-logo">
                    <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6">
                <div class="client-logo">
                    <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6">
                <div class="client-logo">
                    <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6">
                <div class="client-logo">
                    <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6">
                <div class="client-logo">
                    <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6">
                <div class="client-logo">
                    <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6">
                <div class="client-logo">
                    <img src="assets/img/clients/client-7.png" class="img-fluid" alt="">
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6">
                <div class="client-logo">
                    <img src="assets/img/clients/client-8.png" class="img-fluid" alt="">
                </div>
            </div>

        </div>

    </div>

</section>
@endsection