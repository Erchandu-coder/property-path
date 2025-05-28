@extends('admin.layouts.app')
@section('content')
<div class="main-panel">
    <div class=" col-lg-12">
        <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
                <h3 class="page-title">All User Order List</h3>
                <!-- <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                    <a href="{{route('admin.create')}}"><button type="button"
                            class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                            <i class="mdi mdi-plus-circle"></i> Add Property </button></a>
                </div> -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="">
                        <div class="">
                            <div class="table-responsive">
                                <table id="example" class="table table-bordered table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>S.No</th>
                                            <th>Order ID</th>
                                            <th>User Name</th>
                                            <th>Email</th>
                                            <th>Mobile Number</th>
                                            <th>Order Date/Plane renew Date</th>
                                            <th>Plane Expire Date</th>
                                            <th>Payment Receipt</th>
                                            <th>Payment Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1; @endphp
                                        @foreach($results as $result)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$result->order_id}}</td>
                                            <td>{{$result->user->name}}</td>
                                            <td>{{$result->user->email}}</td>
                                            <td>{{$result->mobile_number}}</td>
                                            <td>{{$result->plan_renew_date}}</td>
                                            <td>{{$result->plan_expire_date}}</td>
                                            <td>
                                                <a href="{{ asset('storage/uploads/' . $result->payment_receipt) }}" class="btn btn-warning btn-icon-text" download>
                                                    <i class="mdi mdi-download btn-icon-prepend"></i> Download 
                                                </a>
                                            </td>
                                            <td>
                                                @if($result->payment_status == 'pending')
                                                <button type="button" class="btn btn-warning btn-fw">Pending</button>
                                                @elseif($result->payment_status == 'completed')
                                                <button type="button" class="btn btn-success btn-fw">Completed</button>
                                                @elseif($result->payment_status == 'failed')
                                                <button type="button" class="btn btn-danger btn-fw">Failed</button>
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-rounded btn-icon edit-btn" data-id="{{ $result->id }}" data-status="{{ $result->payment_status }}"
                                                    data-toggle="modal" data-target="#exampleModal">
                                                    <i class="mdi mdi mdi-pencil"></i>
                                                </button></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Payment
                                                Status</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <form class="forms-sample" method="post" action="{{route('admin.approvePayment')}}">
                                        @csrf    
                                        <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" placeholder="Name"
                                                        id="payment_id" name="payment_id"/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleSelectGender">Verify Payment
                                                        Status</label>
                                                    <select class="form-control" id="payment_status" name="payment_status">
                                                        <option value="pending">Pending</option>
                                                        <option value="completed">Completed</option>
                                                        <option value="failed">Failed</option>
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).on('click', '.edit-btn', function(){
        var id = $(this).data('id');
        var payment_status = $(this).data('status');
        $('#payment_id').val(id);
        $('#payment_status').val(payment_status);

    });  
</script> 
@endpush