@extends('admin.layouts.app')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">All City</h3>
            <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text" data-toggle="modal"
                    data-target="#Modal">
                    <i class="mdi mdi-plus-circle"></i> Add City</button>
            </div>
        </div>
        <div class="row">
            <!-- Modal -->
            <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">All City</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="form-sample" id="cityForm">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">State Name</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="state_id" id="state_id">
                                                    <option value="">Select</option>
                                                    @foreach($items as $item)
                                                    <option value="{{$item->id}}">{{$item->state_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">City Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="City Name"
                                                    name="city_name" id="city_name" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Status</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="status" id="status">
                                                    <option value="">Select</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">Deactive</option>
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
                                        <th>City Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @php $i=1; @endphp  
                                  @foreach($cities as $citie)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$citie->city_name}}</td>
                                        <td>
                                            <input type="checkbox" class="city-toggle" data-toggle="toggle"
                                                data-on="Enabled" data-off="Disabled" data-onstyle="success"
                                                data-offstyle="danger" data-id="{{ $citie->id }}"
                                                {{ $citie->status == '1' ? 'checked' : '' }}>
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
                            {{ $cities->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @push('scripts')
    <script>
    $(document).ready(function() {
        $('#cityForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{route('admin.storeCity')}}",
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
                    $('#cityForm')[0].reset(); // Reset form
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
        $('.city-toggle').change(function() {
            var status = $(this).prop('checked') ? 1 : 0;
            var id = $(this).data('id');

            $.ajax({
                url: '{{ route("admin.updateCityStatus") }}', // adjust as needed
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
    });
    </script>
    @endpush