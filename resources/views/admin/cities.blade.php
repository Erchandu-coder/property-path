@extends('admin.layouts.app')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">All City</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> State </li>
                </ol>
            </nav>
        </div>
        <div class="row">
        <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add City Name</h4>
                    <form class="form-sample">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">State Name</label>
                            <div class="col-sm-9">
                              <select class="form-control">
                                <option>Active</option>
                                <option>Deactive</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">City Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" placeholder="State Name"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                              <select class="form-control">
                                <option>Active</option>
                                <option>Deactive</option>
                              </select>
                            </div>
                          </div>
                        </div>
                       </div>
                      <button type="submit" class="btn btn-primary mb-2"> Submit </button>
                    </form>
                  </div>
                </div>
              </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">All States</h4>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>S.No</th>
                            <th>State Name</th>
                            <th>City Name</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Gujrat</td>
                            <td>Gwalior</td>
                            <td>Enable</td>
                            <td>Enable</td>
                          </tr>
                          <tr>
                            <td>1</td>
                            <td>Gujrat</td>
                            <td>Gwalior</td>
                            <td>Enable</td>
                            <td>Enable</td>
                          </tr>
                          <tr>
                            <td>1</td>
                            <td>Gujrat</td>
                            <td>Gwalior</td>
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