<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Property Scroller</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700"
        rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <!-- =======================================================
    Theme Name: NewBiz
    Theme URL: https://bootstrapmade.com/newbiz-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
    <style>
    .register {
        background: -webkit-linear-gradient(left, #ffffff, #ffffff);
        margin-top: 5%;
        padding: 3%;
    }

    .register-left {
        text-align: center;
        color: #fff;
        margin-top: 4%;
    }

    .register-left input {
        border: none;
        border-radius: 1.5rem;
        padding: 2%;
        width: 100%;
        background: #f8f9fa;
        font-weight: bold;
        color: #383d41;
        margin-top: 30%;
        margin-bottom: 3%;
        cursor: pointer;
    }

    .register-right {
        background: #ebecf0;
        border-radius: 2%;
        box-shadow: 5px;
    }

    .register-left img {
        margin-top: 15%;
        margin-bottom: 5%;
        width: 100%;
        -webkit-animation: mover 2s infinite alternate;
        animation: mover 1s infinite alternate;
    }

    @-webkit-keyframes mover {
        0% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(-20px);
        }
    }

    @keyframes mover {
        0% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(-20px);
        }
    }

    .register-left p {
        font-weight: lighter;
        padding: 12%;
        margin-top: -9%;
    }

    .register .register-form {
        padding: 10%;
        margin-top: 10%;
    }

    .btnRegister {
        float: right;
        margin-top: 10%;
        border: none;
        border-radius: 1.5rem;
        padding: 2%;
        background: #0062cc;
        color: #fff;
        font-weight: 600;
        width: 50%;
        cursor: pointer;
    }

    .register .nav-tabs {
        margin-top: 3%;
        border: none;
        background: #0062cc;
        border-radius: 1.5rem;
        width: 28%;
        float: right;
    }

    .register .nav-tabs .nav-link {
        padding: 2%;
        height: 34px;
        font-weight: 600;
        color: #fff;
        border-top-right-radius: 1.5rem;
        border-bottom-right-radius: 1.5rem;
    }

    .register .nav-tabs .nav-link:hover {
        border: none;
    }

    .register .nav-tabs .nav-link.active {
        width: 100px;
        color: #0062cc;
        border: 2px solid #0062cc;
        border-top-left-radius: 1.5rem;
        border-bottom-left-radius: 1.5rem;
    }

    .register-heading {
        text-align: center;
        margin-top: 8%;
        margin-bottom: -15%;
        color: #495057;
    }

    #fixedWhatsAppIcon {
        display: block;
        position: fixed;
        right: 20px;
        bottom: 60px;
        width: 50px;
        height: 50px;
        background-color: #54b460;
        text-align: center;
        line-height: 50px;
        color: #fff;
        border-radius: 50%;
        font-size: 24px;
        z-index: 9999;
    }

    #fixedWhatsAppIcon:hover {
        background-color: #339933;
    }
    </style>
</head>

<body>

    <!--==========================
  Header
  ============================-->
    <header id="header" class="fixed-top">
        <div class="container">

            <div class="logo float-left">
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <h1 class="text-light"><a href="#header"><span>NewBiz</span></a></h1> -->
                <a href="{{route('home')}}" class="scrollto"><img src="assets/img/logo.png" alt=""
                        class="img-fluid"></a>
            </div>

            <nav class="main-nav float-right d-none d-lg-block">
                <ul>
                    <li class="active"><a href="{{route('home')}}">Home</a></li>
                    <!-- <li><a href="{{route('home')}}/#about">About Us</a></li> -->
                    <!-- <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#team">Team</a></li> -->
                    <!-- <li class="drop-down"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="drop-down"><a href="#">Drop Down 2</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li> -->
                    <li><a href="#add-property">Add Property</a></li>
                    <li><a href="{{route('register')}}">Register</a></li>
                    <li>
                        @if(Auth::check())
                        <a href="{{ route('dashboard') }}" class="btn btn-warning btn-fw">Dashboard</a>
                        @else
                        <a href="{{ route('login') }}">Login</a>
                        @endif
                    </li>
                </ul>
            </nav><!-- .main-nav -->

        </div>
    </header><!-- #header -->
    <main id="main">

        @yield('content')

    </main>

    <!--==========================
    Footer
  ============================-->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-5 col-md-6 footer-info">
                        <h3>Property Scroller</h3>
                        <p class="text-justify">PropertyScroller.com is India’s premier property listing platform, built exclusively
                            for property brokers and real estate professionals. We empower brokers to
                            connect, list, and close deals faster — whether it’s residential, commercial, rental,
                            or investment properties.</p>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="#about-us">About us</a></li>
                            <li><a href="#about">What We Offer</a></li>
                            <li><a href="#our-vision">Our Vision</a></li>
                            <li><a href="#">Terms of service</a></li>
                            <li><a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-5 col-md-6 footer-contact">
                        <h4>Contact Us</h4>
                        <p>
                            <!-- A108 Adam Street <br>
                            New York, NY 535022<br> -->
                            <strong>Office Address:</strong> B-5 DEEP BULDING GROUND FLOOR BEHIND D-MART KALYAN WEST-421301 MUMBAI<br>
                            <strong>Phone:</strong> <a href="tel:+919227015296">+91 9227015296</a><br>
                            <strong>Email:</strong> <a href="mailto:support@propertyscroller.com">support@propertyscroller.com</a><br>
                            <strong>Working Hours:</strong> Monday to Saturday, 10 AM - 7 PM<br> 
                        </p>

                        <div class="social-links">
                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong>Property Scroller</strong>. All Rights Reserved
            </div>
            <!-- <div class="credits"> -->
            <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=NewBiz
        -->
            <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
            <!-- </div> -->
        </div>
    </footer><!-- #footer -->
    <a href="https://api.whatsapp.com/send?phone=919227015296&text=Hello,%20Welcome%20in%20property%20Scroller!%20How%20May%20I%20Help%20You..."
        id="fixedWhatsAppIcon" class="wow zoomIn" target="_blank"><i class="fa fa-whatsapp"></i></a>
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <!-- Uncomment below i you want to use a preloader -->
    <!-- <div id="preloader"></div> -->

    <!-- JavaScript Libraries -->
    <script src="assets/lib/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- <script src="assets/lib/jquery/jquery-migrate.min.js"></script> -->
    <script src="assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="assets/lib/easing/easing.min.js"></script> -->
    <script src="assets/lib/mobile-nav/mobile-nav.js"></script>
    <!-- <script src="assets/lib/wow/wow.min.js"></script> -->
    <!-- <script src="assets/lib/waypoints/waypoints.min.js"></script> -->
    <!-- <script src="assets/lib/counterup/counterup.min.js"></script> -->
    <!-- <script src="assets/lib/owlcarousel/owl.carousel.min.js"></script> -->
    <!-- <script src="assets/lib/isotope/isotope.pkgd.min.js"></script> -->
    <!-- <script src="assets/lib/lightbox/js/lightbox.min.js"></script> -->
    <!-- Contact Form JavaScript File -->
    <!-- <script src="contactform/contactform.js"></script> -->

    <!-- Template Main Javascript File -->
    <script src="assets/js/main.js"></script>
    <script>
    $(document).ready(function() {
        $("#state-select").on('change', function() {
            var state_id = this.value;
            $('#city-dropdown').html('');
            $.ajax({
                url: "{{route('getCity')}}",
                type: "Post",
                data: {
                    state_id: state_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(res) {
                    $('#city-dropdown').html('<option value="">-- Select City --</option>')
                    $.each(res.cities, function(key, value) {
                        $("#city-dropdown").append('<option value="' + value.id +
                            '">' +
                            value.city_name + '</option>');
                    });
                }
            })
        });
    });
    $(document).ready(function(){
        toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "timeOut": "5000", // 5 seconds
        "extendedTimeOut": "1000"
        };
        @if(session('message'))
            toastr.success("{{ session('message') }}");
        @endif

        @if(session('error'))
            toastr.error("{{ session('error') }}");
        @endif
    });
    </script>
</body>

</html>