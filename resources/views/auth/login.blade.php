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
                    <h3 class="register-heading">Welcome To Property Path</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row register-form">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email *" id="email"
                                        name="email" value="{{ old('email') }}" autofocus
                                        autocomplete="username" />
                                </div>
                                @error('email')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password *" name="password"
                                        id="password" autocomplete="current-password" />
                                </div>
                                @error('password')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="block mt-4">

                                    <input id="remember_me" type="checkbox"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                        name="remember">
                                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>

                                </div>
                            </div>
                            <div class="col-md-6">
                                @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                                @endif
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