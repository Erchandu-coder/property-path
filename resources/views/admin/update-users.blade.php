@extends('admin.layouts.app')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Update User</h3>
    </div>
    <div class="row">                  
        <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
            <form class="form-sample">
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{$user->name}}" />
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{$user->email}}"/>
                    </div>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Gender</label>
                    <div class="col-sm-9">
                        <select class="form-control">
                        <option value="">--Select--</option>
                        <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Date of Birth</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" placeholder="dd/mm/yyyy" value="{{$user->dob}}"/>
                    </div>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Mobile</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{$user->mobile}}"/>
                    </div>
                    </div>
                </div>
                
                </div>
                <p class="card-description">Address</p>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{$user->address}}"/>
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">State</label>
                    <div class="col-sm-9">
                    <select class="form-control">
                        <option value="">--Select--</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        </select>
                    </div>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Pincode</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" />
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">City</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" />
                    </div>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Country</label>
                    <div class="col-sm-9">
                        <select class="form-control">
                        <option>America</option>
                        <option>Italy</option>
                        <option>Russia</option>
                        <option>Britain</option>
                        </select>
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">User Status</label>
                    <div class="col-sm-9">
                        <select class="form-control">
                        <option>Male</option>
                        <option>Female</option>
                        </select>
                    </div>
                    </div>
                </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                <button class="btn btn-light">Cancel</button>
            </form>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection