@extends('admin.layouts.app')
@section('content')
<div class="main-panel">
    <div class=" col-lg-12">
        <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
                <h3 class="page-title">All User List</h3>
                <!-- <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                    <a href="{{route('admin.create')}}"><button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                        <i class="mdi mdi-plus-circle"></i> Add Property </button></a>
                </div> -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="">
                        <div class="">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                        <th>S.No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1; @endphp
                                        @foreach($results as $result)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{ $result->name}}</td>
                                            <td>{{ $result->email }}</td>
                                            <td>{{ $result->mobile }}</td>
                                            <td>
                                                <input type="checkbox" class="city-toggle" data-toggle="toggle"
                                                data-on="Enabled" data-off="Disabled" data-onstyle="success"
                                                data-offstyle="danger" data-id="{{ $result->id }}"
                                                {{ $result->status == '1' ? 'checked' : '' }}>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-rounded btn-icon">
                                                    <i class="mdi mdi mdi-pencil"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-rounded btn-icon">
                                                    <i class="mdi mdi mdi-delete"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex mt-4">
                                {{ $results->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection
<!-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap4.js"></script>
@push('scripts')
<script>
new DataTable('#example');
</script>
@endpush -->