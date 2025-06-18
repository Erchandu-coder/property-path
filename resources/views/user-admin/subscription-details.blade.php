@extends('user-admin.layouts.app')
@section('content')
<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-10 col-xl-8">
                <div class="card">
                    <div class="card-body p-md-5">
                        <div>
                            <h4>Your Subscription Details</h4>
                        </div>

                        <div
                            class="px-3 py-4 border border-primary border-2 rounded mt-4 d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                                <div class="d-flex flex-column ms-4">
                                    <span class="h5 mb-1">Paid Amount</span>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <sup class="dollar font-weight-bold text-muted">&#8377;</sup>
                                <span class="h2 mx-1 mb-0">5000</span>
                            </div>
                        </div>

                        <h4 class="mt-5">Payment details</h4>
                        <h6 class="h5 mb-1">Order Id: 
                            @if($p_status)
                                {{ $p_status->order_id }}
                            @else
                                N/A
                            @endif</h6>
                        <div class="mt-4 d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-row align-items-center">
                                <div class="d-flex flex-column ms-3">
                                    <span class="h5 mb-1">Plane Date:</span>
                                    <span class="small text-muted">Plane Renew Date: 
                                        @if($p_status)
                                            {{ $p_status->plan_renew_date }}
                                        @else
                                            N/A
                                        @endif
                                    </span>
                                    <span class="small text-muted">Plane Expire Date: 
                                        @if($p_status)
                                            {{ $p_status->plan_expire_date }}
                                        @else
                                            N/A
                                        @endif    
                                    </span>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
    </div>
</section>
@endsection