<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>propertyscroller.com</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('admin-assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('admin-assets/vendors/jquery-bar-rating/css-stars.css')}}" />
    <link rel="stylesheet" href="{{asset('admin-assets/vendors/font-awesome/css/font-awesome.min.css')}}" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('admin-assets/css/demo_1/style.css')}}" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.png')}}" />
    <!-- Enable/Disable Toggle button CSS-->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap4.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap4.css"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.3/css/buttons.dataTables.css" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item nav-profile border-bottom">
                    <a href="#" class="nav-link flex-column">
                        <div class="nav-profile-image">
                            <img src="{{asset('admin-assets/images/user.png')}}" alt="profile" />
                            <!--change to offline or busy as needed-->
                        </div>
                        <div class="nav-profile-text d-flex ml-0 mb-3 flex-column">
                            <span class="font-weight-semibold mb-1 mt-2 text-center">{{ Auth::user()->name }}</span>
                            <span class="text-secondary icon-sm text-center">online</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item pt-3">
                    <a class="nav-link d-block" href="{{route('admin.dashboard')}}">
                        <img class="sidebar-brand-logo" src="{{asset('admin-assets/images/logo.png')}}" alt="" width="150px;"/>
                        <img class="sidebar-brand-logomini" src="{{asset('admin-assets/images/logo-mini.png')}}" alt="" />
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.dashboard')}}">
                        <i class="mdi mdi-compass-outline menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                        aria-controls="ui-basic">
                        <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                        <span class="menu-title">Area Management</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.createState')}}">Add States</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.createCity')}}">Add City</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.showUser')}}">
                        <i class="mdi mdi-contacts menu-icon"></i>
                        <span class="menu-title">All Users</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.orderIndex')}}">
                        <i class="mdi mdi-chart-bar menu-icon"></i>
                        <span class="menu-title">Orders</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.propertyList')}}">
                        <i class="mdi mdi-table-large menu-icon"></i>
                        <span class="menu-title">List Property</span>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="pages/tables/basic-table.html">
                        <i class="mdi mdi-table-large menu-icon"></i>
                        <span class="menu-title">Tables</span>
                    </a>
                </li>
                <li class="nav-item pt-3">
                    <a class="nav-link" href="http://bootstrapdash.com/demo/plus-free/documentation/documentation.html"
                        target="_blank">
                        <i class="mdi mdi-file-document-box menu-icon"></i>
                        <span class="menu-title">Documentation</span>
                    </a>
                </li> -->
            </ul>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <div id="settings-trigger"><i class="mdi mdi-settings"></i></div>
            <div id="theme-settings" class="settings-panel">
                <i class="settings-close mdi mdi-close"></i>
                <p class="settings-heading">SIDEBAR SKINS</p>
                <div class="sidebar-bg-options selected" id="sidebar-default-theme">
                    <div class="img-ss rounded-circle bg-light border mr-3"></div>Default
                </div>
                <div class="sidebar-bg-options" id="sidebar-dark-theme">
                    <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                </div>
                <p class="settings-heading mt-2">HEADER SKINS</p>
                <div class="color-tiles mx-0 px-4">
                    <div class="tiles default primary"></div>
                    <div class="tiles success"></div>
                    <div class="tiles warning"></div>
                    <div class="tiles danger"></div>
                    <div class="tiles info"></div>
                    <div class="tiles dark"></div>
                    <div class="tiles light"></div>
                </div>
            </div>
            <!-- partial -->
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="navbar-menu-wrapper d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-chevron-double-left"></span>
                    </button>
                    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                        <a class="navbar-brand brand-logo-mini" href="{{route('admin.dashboard')}}"><img
                                src="{{asset('admin-assets/images/logo-mini.svg')}}" alt="logo" /></a>
                    </div>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item nav-logout d-none d-md-block">
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Logout</button>
                            </form>
                        </li>

                        <li class="nav-item nav-profile dropdown d-none d-md-block">
                            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown"
                                aria-expanded="false">
                                <div class="nav-profile-text">Account</div>
                            </a>
                            <div class="dropdown-menu center navbar-dropdown" aria-labelledby="profileDropdown">
                                <a class="dropdown-item" href="#">
                                     Profile </a>
                                <a class="dropdown-item" href="#">
                                     Password </a>
                            </div>
                        </li>
                        <li class="nav-item nav-logout d-none d-lg-block">
                            <a class="nav-link" href="{{route('admin.dashboard')}}">
                                <i class="mdi mdi-home-circle"></i>
                            </a>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                        <span class="mdi mdi-menu"></span>
                    </button>
                </div>
            </nav>
            @yield('content')
        </div>
    </div>
    <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                    propertyscroller.com
                        2025</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><a
                            href="#" target="_blank">propertyscroller</a> Developed by Chandrakant</span>
                </div>
            </footer>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <!-- End -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script> -->
    <!-- End custom js for this page -->
    
    
    <script src="{{asset('admin-assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('admin-assets/vendors/jquery-bar-rating/jquery.barrating.min.js')}}"></script>
    <!-- <script src="{{asset('admin-assets/vendors/chart.js/Chart.min.js')}}"></script> -->
    <script src="{{asset('admin-assets/vendors/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/flot/jquery.flot.categories.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/flot/jquery.flot.fillbetween.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/flot/jquery.flot.stack.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('admin-assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('admin-assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('admin-assets/js/misc.js')}}"></script>
    <script src="{{asset('admin-assets/js/settings.js')}}"></script>
    <!-- <script src="{{asset('admin-assets/js/todolist.js')}}"></script> -->
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- <script src="{{asset('admin-assets/js/dashboard.js')}}"></script> -->
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="{{asset('admin-assets/js/custome.js')}}"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> -->
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.3/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.3/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script> -->
    <script src="https://cdn.datatables.net/buttons/3.2.3/js/buttons.html5.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/buttons/3.2.3/js/buttons.print.min.js"></script> -->
    <!-- Enable/Disable Toggle button Js-->
    <script>
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
        $(document).ready(function () {
            var table = $('#example').DataTable();

            // Initial toggle activation
            initToggle();

            // Reinitialize toggles on table redraw (pagination, sorting, etc.)
            table.on('draw', function () {
                initToggle();
            });

            function initToggle() {
                $('.user-toggle').bootstrapToggle(); // or whatever plugin you're using
                $('.city-toggle').bootstrapToggle();

            }
        });
        new DataTable('#example', {
        layout: {
            topStart: {
                buttons: ['csv', 'excel']
            }
        }
    }); 
    </script>    
    @stack('scripts')
</body>
</html>