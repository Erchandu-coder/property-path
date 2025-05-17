@extends('user-admin.layouts.app')
@section('content')
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">Profile Update</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Profile </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                                @csrf
                            </form>
                            <form class="form-sample" method="post" action="{{ route('profile.update') }}">
                                @csrf
                                @method('patch')
                                <p class="card-description">Personal info</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"
                                                    value="{{ old('name', $user->name) }}" id="name" name="name" />
                                                @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Estate / Company Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"
                                                    value="{{ old('estate_name', $user->estate_name) }}" name="estate_name"
                                                    />
                                                @error('estate_name')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"
                                                    value="{{ old('name', $user->email) }}" id="email" name="email"
                                                    readonly />
                                                @error('email')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Gender</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" id="gender" name="gender">
                                                    <option value="">Select Gender</option>
                                                    <option value="Male"
                                                        {{ old('gender', $user->gender) == 'Male' ? 'selected' : '' }}>
                                                        Male</option>
                                                    <option value="Female"
                                                        {{ old('gender', $user->gender) == 'Female' ? 'selected' : '' }}>
                                                        Female</option>
                                                </select>
                                                @error('gender')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Date of Birth</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" placeholder="dd/mm/yyyy"
                                                    id="dob" name="dob" value="{{ old('dob', $user->dob) }}" />
                                                @error('dob')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="card-description">Address</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Mobile</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="mobile" name="mobile"
                                                    value="{{ old('mobile', $user->mobile) }}" readonly />
                                                @error('mobile')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Address</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="address" name="address"
                                                    value="{{ old('address', $user->address) }}" />
                                                @error('address')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">State</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="state" name="state"
                                                    value="{{ old('state', $user->state) }}" />
                                                @error('state')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Pincode</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="pincode" name="pincode"
                                                    value="{{ old('pincode', $user->pincode) }}" />
                                                @error('pincode')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">City</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="city" name="city"
                                                    value="{{ old('city', $user->city) }}" />
                                                @error('city')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Country</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" id="country" name="country">
                                                    <option value="">Select Country</option>
                                                    <option value="india"
                                                        {{ old('country', $user->country) == 'india' ? 'selected' : '' }}>
                                                        India</option>
                                                </select>
                                                @error('country')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !
                                $user->hasVerifiedEmail())
                                <div class="row">
                                    <p class="text-sm mt-2 text-gray-800">
                                        {{ __('Your email address is unverified.') }}

                                        <button form="send-verification"
                                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            {{ __('Click here to re-send the verification email.') }}
                                        </button>
                                    </p>

                                    @if (session('status') === 'verification-link-sent')
                                    <p class="mt-2 font-medium text-sm text-green-600">
                                        {{ __('A new verification link has been sent to your email address.') }}
                                    </p>
                                    @endif
                                </div>
                                @endif
                                <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                                <button class="btn btn-light">Cancel</button>
                                @if (session('status') === 'profile-updated')
                                <p x-data="{ show: true }" x-show="show" x-transition
                                    x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
                                    {{ __('Saved.') }}</p>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection