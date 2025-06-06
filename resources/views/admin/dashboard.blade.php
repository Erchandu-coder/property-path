@extends('admin.layouts.app')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper pb-0">
        <div class="page-header flex-wrap">
            <div class="header-left">
                <!-- <button class="btn btn-primary mb-2 mb-md-0 mr-2"> Create new document</h1>
                </button>
                <button class="btn btn-outline-primary bg-white mb-2 mb-md-0"> Import documents </button> -->
            </div>
            <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                <div class="d-flex align-items-center">
                    <a href="#">
                        <p class="m-0 pr-3">Date / Time</p>
                    </a>
                    <a class="pl-3 mr-4" href="#">
                        <p class="m-0">{{ $formatted }}</p>
                    </a>
                </div>
            </div>
        </div>
        <!-- first row starts here -->
        <!-- <div class="row">
            <div class="col-xl-12 stretch-card grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between flex-wrap">
                            <div>
                                <div class="card-title mb-0">Total Sell</div>
                                <h3 class="font-weight-bold mb-0">$32,409</h3>
                            </div>
                            <div>
                                <div class="d-flex flex-wrap pt-2 justify-content-between sales-header-right">
                                    <div class="d-flex mr-5">
                                        <button type="button" class="btn btn-social-icon btn-outline-sales">
                                            <i class="mdi mdi-inbox-arrow-down"></i>
                                        </button>
                                        <div class="pl-2">
                                            <h4 class="mb-0 font-weight-semibold head-count"> $8,217 </h4>
                                            <span class="font-10 font-weight-semibold text-muted">TOTAL
                                                SALES</span>
                                        </div>
                                    </div>
                                    <div class="d-flex mr-3 mt-2 mt-sm-0">
                                        <button type="button" class="btn btn-social-icon btn-outline-sales profit">
                                            <i class="mdi mdi-cash text-info"></i>
                                        </button>
                                        <div class="pl-2">
                                            <h4 class="mb-0 font-weight-semibold head-count"> 2,804 </h4>
                                            <span class="font-10 font-weight-semibold text-muted">TOTAL
                                                PROFIT</span>
                                        </div>
                                    </div>
                                    <div class="d-flex mr-3 mt-2 mt-sm-0">
                                        <button type="button" class="btn btn-social-icon btn-outline-sales profit">
                                            <i class="mdi mdi-cash text-info"></i>
                                        </button>
                                        <div class="pl-2">
                                            <h4 class="mb-0 font-weight-semibold head-count"> 2,804 </h4>
                                            <span class="font-10 font-weight-semibold text-muted">TOTAL
                                                PROFIT</span>
                                        </div>
                                    </div>
                                    <div class="d-flex mr-3 mt-2 mt-sm-0">
                                        <button type="button" class="btn btn-social-icon btn-outline-sales profit">
                                            <i class="mdi mdi-cash text-info"></i>
                                        </button>
                                        <div class="pl-2">
                                            <h4 class="mb-0 font-weight-semibold head-count"> 2,804 </h4>
                                            <span class="font-10 font-weight-semibold text-muted">TOTAL
                                                PROFIT</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- chart row starts here -->
        <div class="row">
            <div class="col-sm-4 stretch-card grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="card-title"> Total Earning
                            </div>
                        </div>
                        <h3 class="font-weight-bold mb-0"> Rs. {{$total_value}}
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 stretch-card grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="card-title"> Total User
                            </div>
                        </div>
                        <h3 class="font-weight-bold mb-0"> {{$total_user}}
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 stretch-card grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="card-title"> Active User
                            </div>
                        </div>
                        <h3 class="font-weight-bold mb-0"> {{$active_user}}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 grid-margin">
                <div class="card stretch-card mb-3">
                    <div class="card-body d-flex flex-wrap justify-content-between">
                        <div>
                            <h4 class="font-weight-semibold mb-1 text-black"> Total Property </h4>
                        </div>
                        <h3 class="text-success font-weight-bold">+{{$total_count}}</h3>
                    </div>
                </div>
                <div class="card stretch-card mb-3">
                    <div class="card-body d-flex flex-wrap justify-content-between">
                        <div>
                            <h4 class="font-weight-semibold mb-1 text-black"> Residential Rent </h4>
                        </div>
                        <h3 class="text-success font-weight-bold">+{{$rr_count}}</h3>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body d-flex flex-wrap justify-content-between">
                        <div>
                            <h4 class="font-weight-semibold mb-1 text-black"> Residential Sell </h4>
                        </div>
                        <h3 class="text-success font-weight-bold">+{{$rs_count}}</h3>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body d-flex flex-wrap justify-content-between">
                        <div>
                            <h4 class="font-weight-semibold mb-1 text-black"> Commercial Rent </h4>
                        </div>
                        <h3 class="text-success font-weight-bold">+{{$cr_count}}</h3>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body d-flex flex-wrap justify-content-between">
                        <div>
                            <h4 class="font-weight-semibold mb-1 text-black"> Commercial Sell </h4>
                        </div>
                        <h3 class="text-success font-weight-bold">+{{$cs_count}}</h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 stretch-card grid-margin">
                <div class="card">
                    <div class="card-body pb-0">
                        <h4 class="card-title mb-0">Contact User Review</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table id="example" class="table custom-table text-dark">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=1; @endphp
                                    @foreach($contact_data as $contact_datas)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>
                                            {{$contact_datas->name}}
                                        </td>
                                        <td>
                                           {{$contact_datas->email}} 
                                        </td>
                                        <td>{{$contact_datas->phone_number}}</td>
                                        <td>{{$contact_datas->message}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-sm-6 col-xl-4 stretch-card grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title mb-2">Upcoming events (3)</div>
                        <h3 class="mb-3">23 september 2019</h3>
                        <div class="d-flex border-bottom border-top py-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" checked /></label>
                            </div>
                            <div class="pl-2">
                                <span class="font-12 text-muted">Tue, Mar 5, 9.30am</span>
                                <p class="m-0 text-black"> Hey I attached some new PSD files… </p>
                            </div>
                        </div>
                        <div class="d-flex border-bottom py-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" /></label>
                            </div>
                            <div class="pl-2">
                                <span class="font-12 text-muted">Mon, Mar 11, 4.30 PM</span>
                                <p class="m-0 text-black"> Discuss performance with manager </p>
                            </div>
                        </div>
                        <div class="d-flex border-bottom py-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" /></label>
                            </div>
                            <div class="pl-2">
                                <span class="font-12 text-muted">Tue, Mar 5, 9.30am</span>
                                <p class="m-0 text-black">Meeting with Alisa</p>
                            </div>
                        </div>
                        <div class="d-flex pt-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" /></label>
                            </div>
                            <div class="pl-2">
                                <span class="font-12 text-muted">Mon, Mar 11, 4.30 PM</span>
                                <p class="m-0 text-black"> Hey I attached some new PSD files… </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4 stretch-card grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex border-bottom mb-4 pb-2">
                            <div class="hexagon">
                                <div class="hex-mid hexagon-warning">
                                    <i class="mdi mdi-clock-outline"></i>
                                </div>
                            </div>
                            <div class="pl-4">
                                <h4 class="font-weight-bold text-warning mb-0"> 12.45 </h4>
                                <h6 class="text-muted">Schedule Meeting</h6>
                            </div>
                        </div>
                        <div class="d-flex border-bottom mb-4 pb-2">
                            <div class="hexagon">
                                <div class="hex-mid hexagon-danger">
                                    <i class="mdi mdi-account-outline"></i>
                                </div>
                            </div>
                            <div class="pl-4">
                                <h4 class="font-weight-bold text-danger mb-0">34568</h4>
                                <h6 class="text-muted">Profile visits</h6>
                            </div>
                        </div>
                        <div class="d-flex border-bottom mb-4 pb-2">
                            <div class="hexagon">
                                <div class="hex-mid hexagon-success">
                                    <i class="mdi mdi-laptop-chromebook"></i>
                                </div>
                            </div>
                            <div class="pl-4">
                                <h4 class="font-weight-bold text-success mb-0"> 33.50% </h4>
                                <h6 class="text-muted">Bounce Rate</h6>
                            </div>
                        </div>
                        <div class="d-flex border-bottom mb-4 pb-2">
                            <div class="hexagon">
                                <div class="hex-mid hexagon-info">
                                    <i class="mdi mdi-clock-outline"></i>
                                </div>
                            </div>
                            <div class="pl-4">
                                <h4 class="font-weight-bold text-info mb-0">12.45</h4>
                                <h6 class="text-muted">Schedule Meeting</h6>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="hexagon">
                                <div class="hex-mid hexagon-primary">
                                    <i class="mdi mdi-timer-sand"></i>
                                </div>
                            </div>
                            <div class="pl-4">
                                <h4 class="font-weight-bold text-primary mb-0"> 12.45 </h4>
                                <h6 class="text-muted mb-0">Browser Usage</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4 stretch-card grid-margin">
                <div class="card color-card-wrapper">
                    <div class="card-body">
                        <img class="img-fluid card-top-img w-100" src="../admin-assets/images/dashboard/img_5.jpg"
                            alt="" />
                        <div class="d-flex flex-wrap justify-content-around color-card-outer">
                            <div class="col-6 p-0 mb-4">
                                <div class="color-card primary m-auto">
                                    <i class="mdi mdi-clock-outline"></i>
                                    <p class="font-weight-semibold mb-0">Delivered</p>
                                    <span class="small">15 Packages</span>
                                </div>
                            </div>
                            <div class="col-6 p-0 mb-4">
                                <div class="color-card bg-success m-auto">
                                    <i class="mdi mdi-tshirt-crew"></i>
                                    <p class="font-weight-semibold mb-0">Ordered</p>
                                    <span class="small">72 Items</span>
                                </div>
                            </div>
                            <div class="col-6 p-0">
                                <div class="color-card bg-info m-auto">
                                    <i class="mdi mdi-trophy-outline"></i>
                                    <p class="font-weight-semibold mb-0">Arrived</p>
                                    <span class="small">34 Upgraded</span>
                                </div>
                            </div>
                            <div class="col-6 p-0">
                                <div class="color-card bg-danger m-auto">
                                    <i class="mdi mdi-presentation"></i>
                                    <p class="font-weight-semibold mb-0">Reported</p>
                                    <span class="small">72 Support</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </div> -->
    </div>
</div>    
    @endsection