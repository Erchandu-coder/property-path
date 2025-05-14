@extends('front-layouts.app')
@section('content')
<div class="container register">
    <div class="row">
        <div class="col-md-4 register-left">
            <img src="../assets/img/auth-bg.jpg" alt="" />
        </div>
        <div class="col-md-8 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Welcome To Property Scroller</h3>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="First Name *" name="firstName"
                                        value="{{ old('firstName') }}" />
                                </div>
                                @error('firstName')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Last Name *" name="lastName"
                                        value="{{ old('lastName') }}" />
                                </div>
                                @error('lastName')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email *" name="email"
                                        value="{{ old('email') }}" />
                                </div>
                                @error('email')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Mobile Number *" name="mobile"
                                        value="{{ old('mobile') }}" />
                                </div>
                                @error('mobile')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password *"
                                        name="password" />
                                </div>
                                @error('password')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Confirm Password *"
                                        name="password_confirmation" />
                                </div>
                                @error('password_confirmation')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                                </a>
                            </div>
                            <div class="col-md-12">
                                <center><button type="submit" class="btn btn-primary btn-sm">Submit</button></center>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection