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
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>State Name</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                @php $i = 1; @endphp
                                <tbody>
                                    @foreach($result as $results)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $results->state_name }}</td>
                                        <td>
                                            <input type="checkbox" class="status-toggle" data-toggle="toggle"
                                                data-on="Enabled" data-off="Disabled" data-onstyle="success"
                                                data-offstyle="danger" data-id="{{ $results->id }}"
                                                {{ $results->status == '1' ? 'checked' : '' }}>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex mt-4">
                            {{ $result->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @push('scripts')
    <script>
    // Your JavaScript here
    $(document).ready(function() {
        $('.status-toggle').change(function() {
            var status = $(this).prop('checked') ? 1 : 0;
            var id = $(this).data('id');

            $.ajax({
                url: '{{ route("admin.updateStateStatus") }}', // adjust as needed
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