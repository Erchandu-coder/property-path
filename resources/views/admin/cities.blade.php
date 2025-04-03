@extends('admin.layouts.app')
@section('content')
      <div class="main-panel">
          <div class="content-wrapper">
              <div class="page-header">
            <h3 class="page-title">All City</h3>
            <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text" data-toggle="modal" data-target="#Modal">
                  <i class="mdi mdi-plus-circle"></i> Add City</button>
              </div>
          </div>
          <div class="row">
            <!-- Modal -->
              <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <form class="form-sample">
                    <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">All City</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">State Name</label>
                            <div class="col-sm-8">
                              <select class="form-control">
                                  <option>Select</option>
                                  <option>Maharastra</option>
                                  <option>Gujrat</option>
                                </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">City Name</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" placeholder="City Name"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Status</label>
                            <div class="col-sm-8">
                              <select class="form-control">
                                <option>Active</option>
                                <option>Deactive</option>
                              </select>
                            </div>
                          </div>
                        </div>
                       </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Submit</button>
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
                            <th>City Name</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Gujrat</td>
                            <td>Nasik</td>
                            <td>Enable</td>
                            <td>Enable</td>
                          </tr>
                          <tr>
                            <td>1</td>
                            <td>Gujrat</td>
                            <td>Nasik</td>
                            <td>Enable</td>
                            <td>Enable</td>
                          </tr>
                          <tr>
                            <td>1</td>
                            <td>Gujrat</td>
                            <td>Nasik</td>
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