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
                                <table id="example" class="table table-bordered table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            <th>Trail</th>
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
                                            <td>{{ $result->address }}</td>
                                            <td>
                                                <input type="checkbox" class="user-toggle" data-toggle="toggle"
                                                    data-on="Enabled" data-off="Disabled" data-onstyle="success"
                                                    data-offstyle="danger" data-id="{{ $result->id }}"
                                                    {{ $result->status == '1' ? 'checked' : '' }}>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.editUser', ['id' => $result->id]) }}"><button type="button" class="btn btn-primary btn-rounded btn-icon">
                                                    <i class="mdi mdi mdi-pencil"></i>
                                                </button></a>
                                                <form action="{{ route('admin.deleteUser', ['id' => $result->id]) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-rounded btn-icon">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button>
                                                </form>

                                            </td>
                                            <td class="table-info">
                                                
                                                <form method="post" action="{{route('admin.trailSubscribe')}}">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value="{{$result->id}}">
                                                    <input type="number" name="trail_day" min="1" max="7" required>
                                                    <button type="submit" class="btn-sm btn-warning">Trail</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
        $('.user-toggle').change(function() {
            var status = $(this).prop('checked') ? 1 : 0;
            var id = $(this).data('id');

            $.ajax({
                url: '{{ route("admin.updateUserStatus") }}', // adjust as needed
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