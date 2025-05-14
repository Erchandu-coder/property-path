@extends('user-admin.layouts.app')
@section('content')
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">Update Password</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Update Password </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-md-2 grid-margin stretch-card">
                </div>
                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-description">Ensure your account is using a long, random password to stay
                                secure.</p>
                            <form class="forms-sample" method="post" action="{{ route('password.update') }}">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label>Current Password</label>
                                    <input type="password" class="form-control" id="update_password_current_password"
                                        placeholder="Current Password" name="current_password"
                                        autocomplete="current-password" />
                                    <x-input-error :messages="$errors->updatePassword->get('current_password')"
                                        class="mt-2" />
                                </div>
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="New Password" autocomplete="new-password" />
                                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control"
                                        id="update_password_password_confirmation" name="password_confirmation"
                                        placeholder="Confirm Password" autocomplete="new-password" />
                                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')"
                                        class="mt-2" />
                                </div>
                                <button type="submit" class="btn btn-primary mr-2"> Update </button>
                                @if (session('status') === 'password-updated')
                                <p x-data="{ show: true }" x-show="show" x-transition
                                    x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
                                    {{ __('Saved.') }}</p>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 grid-margin stretch-card">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection