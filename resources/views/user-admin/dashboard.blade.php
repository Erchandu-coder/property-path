@extends('user-admin.layouts.app')
@section('content')
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
                <!-- <div class="header-left">
                    <button class="btn btn-primary mb-2 mb-md-0 mr-2"> Create new document </button>
                    <button class="btn btn-outline-primary mb-2 mb-md-0"> Import documents </button>
                </div> -->
                <!-- <div class="header-right d-flex flex-wrap mt-md-2 mt-lg-0">
                    <div class="d-flex align-items-center">
                        <a href="#">
                            <p class="m-0 pr-3">Dashboard</p>
                        </a>
                        <a class="pl-3 mr-4" href="#">
                            <p class="m-0">ADE-00234</p>
                        </a>
                    </div>
                    <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                        <i class="mdi mdi-plus-circle"></i> Add Prodcut </button>
                </div> -->
            </div>
            <div class="row">
                <div class="col-xl-12 stretch-card grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between flex-wrap">
                                <div>
                                    <div class="card-title mb-0"></div>
                                    <h4 class="font-weight-bold mb-0" style="padding-top:12px;">Active Property</h4>
                                </div>
                                <div class="d-flex flex-wrap pt-2 justify-content-between sales-header-right">
                                    <div class="d-flex mr-5">
                                        <button type="button" class="btn btn-social-icon btn-outline-sales">
                                            <i class="mdi mdi mdi-home text-info"></i>
                                        </button>
                                        <div class="pl-2">
                                            <h4 class="mb-0 font-weight-semibold head-count"> #{{$rrent_count}} </h4>
                                            <span class="font-10 font-weight-semibold text-muted">RESIDENTIAL
                                                RENT</span>
                                        </div>
                                    </div>
                                    <div class="d-flex mr-5">
                                        <button type="button" class="btn btn-social-icon btn-outline-sales profit">
                                            <i class="mdi mdi mdi-home-map-marker text-info"></i>
                                        </button>
                                        <div class="pl-2">
                                            <h4 class="mb-0 font-weight-semibold head-count"> #{{$rsell_count}} </h4>
                                            <span class="font-10 font-weight-semibold text-muted">RESIDENTIAL
                                                SELL</span>
                                        </div>
                                    </div>
                                    <div class="d-flex mr-5">
                                        <button type="button" class="btn btn-social-icon btn-outline-sales profit">
                                            <i class="mdi mdi-hospital-building text-info"></i>
                                        </button>
                                        <div class="pl-2">
                                            <h4 class="mb-0 font-weight-semibold head-count"> #{{$crent_count}} </h4>
                                            <span class="font-10 font-weight-semibold text-muted">COMMERCIAL RENT</span>
                                        </div>
                                    </div>
                                    <div class="d-flex mr-5">
                                        <button type="button" class="btn btn-social-icon btn-outline-sales profit">
                                            <i class="mdi mdi mdi-hospital-building text-info"></i>
                                        </button>
                                        <div class="pl-2">
                                            <h4 class="mb-0 font-weight-semibold head-count"> #{{$csell_count}} </h4>
                                            <span class="font-10 font-weight-semibold text-muted">COMMERCIAL SELL</span>
                                        </div>
                                    </div>
                                    <div class="d-flex mr-5">
                                        <button type="button" class="btn btn-social-icon btn-outline-sales profit">
                                            <i class="mdi mdi-format-list-bulleted text-info"></i>
                                        </button>
                                        <div class="pl-2">
                                            <h4 class="mb-0 font-weight-semibold head-count"> {{$total_property}} </h4>
                                            <span class="font-10 font-weight-semibold text-muted">TOTAL
                                                ACTIVE</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Today's Property</h4><br>
                            <div class="d-flex border-bottom mb-4 pb-2">
                                <div class="hexagon">
                                    <div class="hex-mid hexagon-warning">
                                        <i class="mdi mdi-clock-outline"></i>
                                    </div>
                                </div>
                                <div class="pl-4">
                                    <h4 class="font-weight-bold text-warning mb-0">{{$today_rrent_count}}</h4>
                                    <h6 class="text-muted">Residential Rent</h6>
                                </div>
                            </div>
                            <div class="d-flex border-bottom mb-4 pb-2">
                                <div class="hexagon">
                                    <div class="hex-mid hexagon-danger">
                                        <i class="mdi mdi-account-outline"></i>
                                    </div>
                                </div>
                                <div class="pl-4">
                                    <h4 class="font-weight-bold text-danger mb-0">{{$today_rsell_count}}</h4>
                                    <h6 class="text-muted">Residential Sell</h6>
                                </div>
                            </div>
                            <div class="d-flex border-bottom mb-4 pb-2">
                                <div class="hexagon">
                                    <div class="hex-mid hexagon-success">
                                        <i class="mdi mdi-laptop-chromebook"></i>
                                    </div>
                                </div>
                                <div class="pl-4">
                                    <h4 class="font-weight-bold text-success mb-0">{{$today_crent_count}}</h4>
                                    <h6 class="text-muted">Commercial Rent</h6>
                                </div>
                            </div>
                            <div class="d-flex border-bottom mb-4 pb-2">
                                <div class="hexagon">
                                    <div class="hex-mid hexagon-info">
                                        <i class="mdi mdi-clock-outline"></i>
                                    </div>
                                </div>
                                <div class="pl-4">
                                    <h4 class="font-weight-bold text-info mb-0">{{$today_csell_count}}</h4>
                                    <h6 class="text-muted">Commercial Sell</h6>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="hexagon">
                                    <div class="hex-mid hexagon-primary">
                                        <i class="mdi mdi-timer-sand"></i>
                                    </div>
                                </div>
                                <div class="pl-4">
                                    <h4 class="font-weight-bold text-primary mb-0">{{$today_total_property}}</h4>
                                    <h6 class="text-muted mb-0">Total Property</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 stretch-card grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Residential Rent Top 50 Area</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Area Name</th>
                                            <th>Progress</th>
                                            <th>Property count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($rrent_tops as $rrent_top)
                                        <tr>
                                            <td>{{$rrent_top->city_name}}</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                        style="width: 25%;" aria-valuenow="25" aria-valuemin="0"
                                                        aria-valuemax="100">{{$rrent_top->total_properties}}%</div>
                                                </div>
                                            </td>
                                            <td>{{$rrent_top->total_properties}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Yesterday's Property</h4><br>
                            <div class="d-flex border-bottom mb-4 pb-2">
                                <div class="hexagon">
                                    <div class="hex-mid hexagon-warning">
                                        <i class="mdi mdi-clock-outline"></i>
                                    </div>
                                </div>
                                <div class="pl-4">
                                    <h4 class="font-weight-bold text-warning mb-0"> {{$yesterday_rrent_count}} </h4>
                                    <h6 class="text-muted">Residential Rent</h6>
                                </div>
                            </div>
                            <div class="d-flex border-bottom mb-4 pb-2">
                                <div class="hexagon">
                                    <div class="hex-mid hexagon-danger">
                                        <i class="mdi mdi-account-outline"></i>
                                    </div>
                                </div>
                                <div class="pl-4">
                                    <h4 class="font-weight-bold text-danger mb-0">{{$yesterday_rsell_count}}</h4>
                                    <h6 class="text-muted">Residential Sell</h6>
                                </div>
                            </div>
                            <div class="d-flex border-bottom mb-4 pb-2">
                                <div class="hexagon">
                                    <div class="hex-mid hexagon-success">
                                        <i class="mdi mdi-laptop-chromebook"></i>
                                    </div>
                                </div>
                                <div class="pl-4">
                                    <h4 class="font-weight-bold text-success mb-0"> {{$yesterday_crent_count}} </h4>
                                    <h6 class="text-muted">Commercial Rent</h6>
                                </div>
                            </div>
                            <div class="d-flex border-bottom mb-4 pb-2">
                                <div class="hexagon">
                                    <div class="hex-mid hexagon-info">
                                        <i class="mdi mdi-clock-outline"></i>
                                    </div>
                                </div>
                                <div class="pl-4">
                                    <h4 class="font-weight-bold text-info mb-0">{{$yesterday_csell_count}}</h4>
                                    <h6 class="text-muted">Commercial Sell</h6>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="hexagon">
                                    <div class="hex-mid hexagon-primary">
                                        <i class="mdi mdi-timer-sand"></i>
                                    </div>
                                </div>
                                <div class="pl-4">
                                    <h4 class="font-weight-bold text-primary mb-0"> {{$yesterday_total_property}} </h4>
                                    <h6 class="text-muted mb-0">Total Property</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 stretch-card grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Residential Sell Top 50 Area</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Area Name</th>
                                            <th>Progress</th>
                                            <th>Property count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Herman Beck</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                        style="width: 25%;" aria-valuenow="25" aria-valuemin="0"
                                                        aria-valuemax="100">25%</div>
                                                </div>
                                            </td>
                                            <td>$ 77.99</td>
                                        </tr>
                                        <tr>
                                            <td>Messsy Adam</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar"
                                                        style="width: 75%;" aria-valuenow="75" aria-valuemin="0"
                                                        aria-valuemax="100">75%</div>
                                                </div>
                                            </td>
                                            <td>$245.30</td>
                                        </tr>
                                        <tr>
                                            <td>John Richards</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        style="width: 90%;" aria-valuenow="90" aria-valuemin="0"
                                                        aria-valuemax="100">90%</div>
                                                </div>
                                            </td>
                                            <td>$138.00</td>
                                        </tr>
                                        <tr>
                                            <td>Peter Meggik</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary" role="progressbar"
                                                        style="width: 50%;" aria-valuenow="50" aria-valuemin="0"
                                                        aria-valuemax="100">50%</div>
                                                </div>
                                            </td>
                                            <td>$ 77.99</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 stretch-card grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Commercial Rent Top 50 Area</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Area Name</th>
                                            <th>Progress</th>
                                            <th>Property count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Herman Beck</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                        style="width: 25%;" aria-valuenow="25" aria-valuemin="0"
                                                        aria-valuemax="100">25%</div>
                                                </div>
                                            </td>
                                            <td>$ 77.99</td>
                                        </tr>
                                        <tr>
                                            <td>Messsy Adam</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar"
                                                        style="width: 75%;" aria-valuenow="75" aria-valuemin="0"
                                                        aria-valuemax="100">75%</div>
                                                </div>
                                            </td>
                                            <td>$245.30</td>
                                        </tr>
                                        <tr>
                                            <td>John Richards</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        style="width: 90%;" aria-valuenow="90" aria-valuemin="0"
                                                        aria-valuemax="100">90%</div>
                                                </div>
                                            </td>
                                            <td>$138.00</td>
                                        </tr>
                                        <tr>
                                            <td>Peter Meggik</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary" role="progressbar"
                                                        style="width: 50%;" aria-valuenow="50" aria-valuemin="0"
                                                        aria-valuemax="100">50%</div>
                                                </div>
                                            </td>
                                            <td>$ 77.99</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 stretch-card grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Commercial Sell Top 50 Area</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Area Name</th>
                                            <th>Progress</th>
                                            <th>Property count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Herman Beck</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                        style="width: 25%;" aria-valuenow="25" aria-valuemin="0"
                                                        aria-valuemax="100">25%</div>
                                                </div>
                                            </td>
                                            <td>$ 77.99</td>
                                        </tr>
                                        <tr>
                                            <td>Messsy Adam</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar"
                                                        style="width: 75%;" aria-valuenow="75" aria-valuemin="0"
                                                        aria-valuemax="100">75%</div>
                                                </div>
                                            </td>
                                            <td>$245.30</td>
                                        </tr>
                                        <tr>
                                            <td>John Richards</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        style="width: 90%;" aria-valuenow="90" aria-valuemin="0"
                                                        aria-valuemax="100">90%</div>
                                                </div>
                                            </td>
                                            <td>$138.00</td>
                                        </tr>
                                        <tr>
                                            <td>Peter Meggik</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary" role="progressbar"
                                                        style="width: 50%;" aria-valuenow="50" aria-valuemin="0"
                                                        aria-valuemax="100">50%</div>
                                                </div>
                                            </td>
                                            <td>$ 77.99</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="container">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                        bootstrapdash.com 2020</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                            href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard
                            templates</a> from
                        Bootstrapdash.com</span>
                </div>

                <div>
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"> Distributed
                        By: <a href="https://themewagon.com/" target="_blank">Themewagon</a></span>
                </div>
            </div>
        </footer>
        <!-- partial -->
    </div>
    <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
@endsection