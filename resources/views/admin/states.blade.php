@extends('admin.layouts.app')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">All States</h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if(session('success'))
                            <script>alert("{{ session('success') }}");</script>
                        @endif

                        <form class="form-sample" method="post" action="{{route('admin.storStates')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">State Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="state_name"
                                                placeholder="State Name"/>
                                                @error('state_name')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>
                                    <!-- @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif -->
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group row">
                                        <div class="col-sm-3" style="padding-top: 5px;">
                                            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>State Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Gujrat</td>
                                        <td>Enable</td>
                                        <td>Enable</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Gujrat</td>
                                        <td>Enable</td>
                                        <td>Enable</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Gujrat</td>
                                        <td>Enable</td>
                                        <td>Enable</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection