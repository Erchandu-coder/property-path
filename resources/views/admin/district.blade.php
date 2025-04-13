@extends('admin.layouts.app')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">All District & Pin Code</h3>
            <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text" data-toggle="modal"
                    data-target="#Modal">
                    <i class="mdi mdi-plus-circle"></i> Add District</button>
            </div>
        </div>
        <div class="row">
            <!-- Modal -->
            <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <form class="form-sample" id="districtForm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">All District & Pin Code</h5>
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
                                                <select class="form-control" id="state-dropdown" name="state_id">
                                                    <option value="">Select</option>
                                                    @foreach($states as $state)
                                                    <option value="{{$state->id}}">{{$state->state_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">City Name</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" id="city-dropdown" name="city_id"></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Area Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="State Name"
                                                    name="district_name" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pin Code</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="Pin Code"
                                                    name="pin_code" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Status</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="status">
                                                    <option value="">--Select--</option>
                                                    <option value="0">Active</option>
                                                    <option value="1">Deactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
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
                                    <!-- <th>State Name</th>
                                    <th>City Name</th> -->
                                    <th>District</th>
                                    <th>Pin Code</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @php $i=1; @endphp
                                @foreach($results as $result)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <!-- <td>Gujrat</td>
                                    <td>Nasik</td> -->
                                    <td>{{$result->district_name}}</td>
                                    <td>{{$result->pin_code}}</td>
                                    <td>
                                      <input type="checkbox" class="district-toggle" data-toggle="toggle"
                                            data-on="Enabled" data-off="Disabled" data-onstyle="success"
                                            data-offstyle="danger" data-id="{{ $result->id }}"
                                            {{ $result->status == '1' ? 'checked' : '' }}>
                                    </td>
                                    <td><button type="button" class="btn btn-primary btn-rounded btn-icon">
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
@endsection
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
@push('scripts')
<script>
$(document).ready(function() {
    $("#state-dropdown").on('change', function() {
        var state_id = this.value;
        $('#city-dropdown').html('');
        $.ajax({
            url: "{{route('admin.fetchCity')}}",
            type: "Post",
            data: {
                state_id: state_id,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(res) {
                $('#city-dropdown').html('<option value="">-- Select City --</option>')
                $.each(res.cities, function(key, value) {
                    $("#city-dropdown").append('<option value="' + value.id + '">' +
                        value.city_name + '</option>');
                });
            }
        })
    });

    $('#districtForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: "{{route('admin.storeDistrict')}}",
            type: "Post",
            data: $(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "timeOut": "5000"
                };
                toastr.success(response.message, 'Success');
                $('#districtForm')[0].reset(); // Reset form
                $('#Modal').modal('hide');
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        toastr.error(value[0]);
                    });
                } else {
                    toastr.error("Something went wrong.");
                }
            }
        });
    });
    $('.district-toggle').change(function() {
            var status = $(this).prop('checked') ? 1 : 0;
            var id = $(this).data('id');

            $.ajax({
                url: '{{ route("admin.UpdateDistrictStatus") }}', // adjust as needed
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    status: status
                },
                success: function(response) {
                    toastr.options = {
                        "closeButton": true,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "timeOut": "5000"
                    };
                    toastr.success(response.message, 'Success');
                },
                error: function(xhr) {
                    // console.log(xhr.responseText);
                    let errorMsg = 'Something went wrong';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMsg = xhr.responseJSON.message;
                    }

                    toastr.options = {
                        "closeButton": true,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "timeOut": "5000"
                    };
                    toastr.error(errorMsg, 'Error');
                }
            });
        });

})
</script>
@endpush