<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>propertyscroller.com</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../admin-assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../admin-assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../admin-assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../admin-assets/vendors/jquery-bar-rating/css-stars.css" />
    <link rel="stylesheet" href="../admin-assets/vendors/font-awesome/css/font-awesome.min.css" />

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" /> -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap4.css" /> -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../admin-assets/css/demo_2/style.css" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../admin-assets/images/favicon.png" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <style>
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
    <div class="container-scroller">
        <!-- partial:partials/_horizontal-navbar.html -->
        <div class="horizontal-menu">
            <nav class="navbar top-navbar col-lg-12 col-12 p-0">
                <div class="container">
                    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                        <a class="navbar-brand brand-logo" href="{{route('dashboard')}}">
                            <img src="../admin-assets/images/logo.png" alt="logo" />
                            <span class="font-12 d-block font-weight-light">Ultimate property solutions </span>
                        </a>
                        <a class="navbar-brand brand-logo-mini" href="{{route('dashboard')}}"><img
                                src="../admin-assets/images/logo-mini.svg" alt="logo" /></a>
                    </div>
                    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                        <ul class="navbar-nav mr-lg-1">
                            <li class="nav-item nav-search d-none d-lg-block">
                                <div class="input-group">
                                    <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                                        <span class="input-group-text" id="search">
                                            <i class="mdi mdi-magnify"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" id="navbar-search-input"
                                        placeholder="Search" aria-label="search" aria-describedby="search" />
                                </div>
                            </li>
                        </ul>
                        <ul class="navbar-nav navbar-nav-right">
                            <li class="nav-item nav-profile dropdown">
                                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown"
                                    aria-expanded="false">
                                    <div class="nav-profile-img">
                                        <img src="../admin-assets/images/faces/face1.jpg" alt="image" />
                                    </div>
                                    <div class="nav-profile-text">
                                        <p class="text-black font-weight-semibold m-0"> {{$user->name}} </p>
                                        <span class="font-13 online-color">online <i
                                                class="mdi mdi-chevron-down"></i></span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                            data-toggle="horizontal-menu-toggle">
                            <span class="mdi mdi-menu"></span>
                        </button>
                    </div>
                </div>
            </nav>
            <nav class="bottom-navbar">
                <div class="container">
                    <ul class="nav page-navigation">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('dashboard')}}">
                                <i class="mdi mdi-compass-outline menu-icon"></i>
                                <span class="menu-title" :active="request()->routeIs('dashboard')">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="mdi mdi-monitor-dashboard menu-icon"></i>
                                <span class="menu-title">All Property</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="submenu">
                                <ul class="submenu-item">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('showResidentialRent')}}">Residential Rent</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('showResidentialSell')}}">Residential Sell</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('showCommercialRent')}}">Commercial Rent</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('showCommercialSell')}}">Commercial Sell</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('totalProperty')}}">Total Property</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('subscribe')}}">
                                <i class="mdi mdi-contacts menu-icon"></i>
                                <span class="menu-title">Subscription</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('favouriteProperty')}}">
                            <i class="mdi mdi-bookmark-outline menu-icon"></i>
                            <span class="menu-title">Favourite Property</span>
                            </a>
                        </li>
                        <li>
                            <!-- <a class="nav-link" href="../../pages/icons/mdi.html">
                            <i class="mdi mdi-contacts menu-icon"></i>
                            <span class="menu-title">Icons</span>
                            </a> -->
                        </li>
                        <li>
                            <!-- <a class="nav-link" href="../../pages/charts/chartjs.html">
                            <i class="mdi mdi-chart-bar menu-icon"></i>
                            <span class="menu-title">Charts</span>
                            </a> -->
                        </li>
                        <li>
                            <!-- <a class="nav-link" href="../../pages/tables/basic-table.html">
                            <i class="mdi mdi-table-large menu-icon"></i>
                            <span class="menu-title">Tables</span>
                            </a> -->
                        </li>
                        <li>
                            <!-- <a href="https://www.bootstrapdash.com/demo/plus-free/documentation/documentation.html" class="nav-link" target="_blank">
                            <i class="mdi mdi-file-document-box menu-icon"></i>
                            <span class="menu-title">Docs</span></a> -->
                        </li>
                        <li class="nav-item">
                            <div class="nav-link d-flex">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-sm bg-danger text-white"> Logout </button>
                                </form>
                                <div class="nav-item dropdown">
                                    <a class="nav-link count-indicator dropdown-toggle text-white font-weight-semibold"
                                        id="notificationDropdown" href="#" data-toggle="dropdown"> Profile </a>
                                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                        aria-labelledby="notificationDropdown">
                                        <a class="dropdown-item" href="{{route('profile.edit')}}">
                                            Update Profile</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{route('profile.updatePassword')}}">
                                            Change Password </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{route('subScriptionDetails')}}">
                                            Order </a>
                                        <div class="dropdown-divider"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- partial -->
        @yield('content')
    <footer class="footer">
        <div class="container">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                    propertyscroller.com 2025</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Developed by <a
                        href="#" target="_blank">propertyscroller</a> from
                        propertyscroller.com</span>
            </div>
        </div>
    </footer>
    <a href="https://api.whatsapp.com/send?phone=919000000000&text=Hello!%20Got%20your%20reference%20from%20Website..." id="fixedWhatsAppIcon" class="wow zoomIn" target="_blank"><i class="fa fa-whatsapp"></i></a>
    </div>
    <!-- main-panel ends -->
</div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../admin-assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../admin-assets/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
    <script src="../admin-assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../admin-assets/vendors/flot/jquery.flot.js"></script>
    <script src="../admin-assets/vendors/flot/jquery.flot.resize.js"></script>
    <script src="../admin-assets/vendors/flot/jquery.flot.categories.js"></script>
    <script src="../admin-assets/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="../admin-assets/vendors/flot/jquery.flot.stack.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../admin-assets/js/off-canvas.js"></script>
    <script src="../admin-assets/js/hoverable-collapse.js"></script>
    <script src="../admin-assets/js/misc.js"></script>
    <script src="../admin-assets/js/settings.js"></script>
    <script src="../admin-assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../admin-assets/js/dashboard.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- End custom js for this page -->
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    <!-- <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap4.js"></script> -->
    <!-- <script>
        new DataTable('#example');
    </script>     -->
    <script>
        $(document).on('click', '.add-to-cart', function(){
            const btn = $(this);
            const propertyId = btn.data('pid'); 
            $.ajax({
                url:"{{route('addCart')}}",
                method:'Post',
                data:{
                    property_id: propertyId,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                // alert(response.status);
                if (response.status === 'exists' || response.status === 'added') {
                    btn.addClass('active'); // Apply 'active' class
                }
                toastr.options = {
                        "closeButton": true,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "timeOut": "5000"
                    };
                toastr.success(response.message, 'message');
            },
            error: function (xhr) {
                alert(xhr.responseJSON.error || 'Something went wrong');
            }
            });
        });
    </script>
</body>

</html>