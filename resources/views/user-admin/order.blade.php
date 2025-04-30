@extends('user-admin.layouts.app')
@section('content')
<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-10 col-xl-8">
                <div class="card">
                    <div class="card-body p-md-5">
                        <div>
                            <h4>Upgrade your plan</h4>
                            <p class="text-muted pb-2">
                                Please make the payment to start enjoying all the features of our premium
                                plan as soon as possible
                            </p>
                        </div>

                        <div
                            class="px-3 py-4 border border-primary border-2 rounded mt-4 d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                                <div class="d-flex flex-column ms-4">
                                    <span class="h5 mb-1">Small Business</span>
                                    <span class="small text-muted">CHANGE PLAN</span>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <sup class="dollar font-weight-bold text-muted">&#8377;</sup>
                                <span class="h2 mx-1 mb-0">5000</span>
                                <span class="text-muted font-weight-bold mt-2">/ year</span>
                            </div>
                        </div>

                        <h4 class="mt-5">Payment details</h4>

                        <div class="mt-4 d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-row align-items-center">
                                <div class="d-flex flex-column ms-3">
                                    <span class="h5 mb-1">Account Details:</span>
                                    <span class="small text-muted">Account No. 1234 XXXX XXXX 2570</span>
                                    <span class="small text-muted">IFSC Code. 1234 XXXX XXXX 2570</span>
                                </div>
                            </div>
                            <div>
                                <img src="/assets/img/cart.jpg" class="rounded" width="70" />
                            </div>
                        </div>

                        <div class="mt-2 d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-row align-items-center">
                                <div class="d-flex flex-column ms-3">
                                    <span class="h5 mb-1">Via UPI / Paytm/ PhonePe</span>
                                    <button type="button" class="btn btn-primary btn-fw" data-toggle="modal"
                                        data-target="#exampleModalCenter">Click via upi</button>
                                    </span>
                                </div>
                            </div>
                            <div>
                                <img src="/assets/img/upi.jpg" class="rounded" width="70" />
                            </div>
                        </div>

                        <h6 class="mt-4 mb-3 text-primary text-uppercase">After payment add below</h6>
                        @if($pstatus)
                        @if(in_array($pstatus->payment_status, ['pending', 'completed']))
                        <div class="alert alert-success" role="alert">
                            Thank you! Your payment request has been submitted successfully. Kindly wait for
                            administrator approval.
                        </div>
                        @elseif($pstatus->payment_status == 'fail')
                        {{-- Show form again for failed payment --}}
                        @include('user-admin.partials.payment-form', ['user' => $user])
                        @else
                        {{-- Unknown status, show form as fallback --}}
                        @include('user-admin.partials.payment-form', ['user' => $user])
                        @endif
                        @else
                        {{-- No subscription record, show form --}}
                        @include('user-admin.partials.payment-form', ['user' => $user])
                        @endif
                    </div>
                </div>
                @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">QR Code</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <img src="/assets/img/upi.png" class="rounded" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection