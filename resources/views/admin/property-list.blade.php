@extends('admin.layouts.app')
@section('content')
<div class="main-panel col-lg-12">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">All Property List</h3>
            <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                <a href="{{route('admin.create')}}"><button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                    <i class="mdi mdi-plus-circle"></i> Add Property </button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="">
                    <div class="">
                        <div class="table-responsive">
                            <!-- <table  id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Special Note</th>
                                        <th>Date</th>
                                        <th>Name & Contact</th>
                                        <th>Address</th>
                                        <th>Premise</th>
                                        <th>Area</th>
                                        <th>Rent</th>
                                        <th>Availability</th>
                                        <th>Condition</th>
                                        <th>SqFt/Sqyd</th>
                                        <th>Key</th>
                                        <th>Brokerage</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011-04-25</td>
                                        <td>$320,800</td>
                                        <td>61</td>
                                        <td>61</td>
                                        <td>61</td>
                                        <td>61</td>
                                        <td>61</td>
                                        <td>61</td>
                                        <td>61</td>
                                        <td>61</td>
                                    </tr>
                                </tbody>
                            </table> -->
                            <table class="table table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr>
                                    <th>S.No</th>
                                        <th>Special Note</th>
                                        <th>Date</th>
                                        <th>Name & Contact</th>
                                        <th>Address</th>
                                        <th>Premise</th>
                                        <th>Area</th>
                                        <th>Rent</th>
                                        <th>Availability</th>
                                        <th>Condition</th>
                                        <th>SqFt/Sqyd</th>
                                        <th>Key</th>
                                        <th>Brokerage</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Jacob</td>
                                        <td>Photoshop</td>
                                        <td class="text-danger"> 28.76% </td>
                                        <td>Jacob</td>
                                        <td>Jacob</td>
                                        <td>Photoshop</td>
                                        <td class="text-danger"> 28.76% </td>
                                        <td>Jacob</td>
                                        <td>Jacob</td>
                                        <td>Photoshop</td>
                                        <td class="text-danger"> 28.76% </td>
                                        <td>Jacob</td>
                                        <td>Jacob</td>
                                        <td>Photoshop</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap4.js"></script>
@push('scripts')
<script>
new DataTable('#example');
</script>
@endpush