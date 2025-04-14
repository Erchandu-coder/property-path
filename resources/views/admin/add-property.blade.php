@extends('admin.layouts.app')
@section('content')
<!-- partial -->
<div class="col-12 main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Add Property</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Form elements </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form class="form-sample" method="post" action="{{route('admin.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Owner Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="owner_name"
                                                placeholder="Owner Name" value="{{ old('owner_name') }}" />
                                            @error('owner_name')
                                            <p class="text text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Contact Number</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="contact_number"
                                                placeholder="Owner Contact Number" value="{{ old('contact_number') }}"/>
                                            @error('contact_number')
                                            <p class="text text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Premise</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" placeholder="Enter Premise" name="premise" value="{{ old('premise') }}"/>
                                            @error('premise')
                                            <p class="text text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" name="date"
                                                placeholder="dd/mm/yyyy" value="{{ old('date') }}"/>
                                            @error('date')
                                            <p class="text text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Property Type</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="property_type_id" value="{{ old('property_type_id') }}">
                                                <option value="">--Select--</option>
                                                @foreach($ptypes as $ptype)
                                                <option value="{{$ptype->id}}">{{$ptype->property_name}}</option>
                                                @endforeach;
                                            </select>
                                            @error('property_type_id')
                                            <p class="text text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Rent</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" placeholder="Enter Rent" name="rent" value="{{ old('rent') }}"/>
                                            @error('rent')
                                            <p class="text text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Availability</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" placeholder="Enter Availability"
                                                name="availability" value="{{ old('availability') }}"/>
                                            @error('availability')
                                            <p class="text text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Condition</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="condition" value="{{ old('condition') }}">
                                                <option value="">--Select--</option>
                                                <option value="Semi Furnished">Semi Furnished</option>
                                                <option value="Unfurnished">Unfurnished</option>
                                                <option value="Furnished">Furnished</option>
                                                <option value="Kitchen-Fix">Kitchen-Fix</option>
                                            </select>
                                            @error('condition')
                                            <p class="text text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">SqFT/Sqyd</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" placeholder="Enter SqFT/Sqyd"
                                                name="sqFt_sqyd" value="{{ old('sqFt_sqyd') }}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Key</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" placeholder="Enter Key" name="key" value="{{ old('key') }}"/>
                                            @error('key')
                                            <p class="text text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Brokerage</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" placeholder="Enter Brokerage"
                                                name="brokerage" value="{{ old('brokerage') }}"/>
                                            @error('brokerage')
                                            <p class="text text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Contact Status</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="property_status" value="{{ old('property_status') }}">
                                                <option value="">--Select--</option>
                                                <option value="Available">Available</option>
                                                <option value="Rent Out">Rent Out</option>
                                                <option value="Not Receiving">Not Receiving</option>
                                                <option value="Incoming Call Stop">Incoming Call Stop</option>
                                                <option value="Switch Off">Switch Off</option>
                                            </select>
                                            @error('property_status')
                                            <p class="text text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="card-description">Address</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Property Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Enter Property Address"
                                                name="address" value="{{ old('address') }}"/>
                                            @error('address')
                                            <p class="text text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">State</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="state-dropdown" name="state_id"
                                                placeholder="--Select--" value="{{ old('state_id') }}">
                                                <option value="">--Select--</option>
                                                @foreach($data as $datas)
                                                <option value="{{$datas->id}}">{{$datas->state_name}}</option>
                                                @endforeach;
                                            </select>
                                            @error('state_id')
                                            <p class="text text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">City</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="city-dropdown" name="city_id" value="{{ old('city_id') }}"></select>
                                            @error('city_id')
                                            <p class="text text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">District</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="district-dropdown"
                                                name="district_id" value="{{ old('district_id') }}"></select>
                                            @error('district_id')
                                            <p class="text text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Description 1</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Enter Description 1"
                                                name="description_1" value="{{ old('description_1') }}"/>
                                            @error('description_1')
                                            <p class="text text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Description 2</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Enter Description 2"
                                                name="description_2" value="{{ old('description_2') }}"/>
                                            @error('description_2')
                                            <p class="text text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
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
    $("#city-dropdown").on('change', function() {
        var city_id = this.value;
        $('#district-dropdown').html('');
        $.ajax({
            url: "{{route('admin.fetchDistrict')}}",
            type: "Post",
            data: {
                city_id: city_id,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(res) {
                $('#district-dropdown').html(
                    '<option value="">-- Select District --</option>')
                $.each(res.districts, function(key, value) {
                    console.log(value);
                    $("#district-dropdown").append('<option value="' + value.id +
                        '">' +
                        value.district_name + '</option>');
                });
            }
        })
    });

    // $('#districtForm').on('submit', function(e) {
    //     e.preventDefault();

    //     $.ajax({
    //         url: "{{route('admin.storeDistrict')}}",
    //         type: "Post",
    //         data: $(this).serialize(),
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         success: function(response) {
    //             toastr.options = {
    //                 "closeButton": true,
    //                 "progressBar": true,
    //                 "positionClass": "toast-top-right",
    //                 "timeOut": "5000"
    //             };
    //             toastr.success(response.message, 'Success');
    //             $('#districtForm')[0].reset(); // Reset form
    //             $('#Modal').modal('hide');
    //         },
    //         error: function(xhr) {
    //             if (xhr.status === 422) {
    //                 let errors = xhr.responseJSON.errors;
    //                 $.each(errors, function(key, value) {
    //                     toastr.error(value[0]);
    //                 });
    //             } else {
    //                 toastr.error("Something went wrong.");
    //             }
    //         }
    //     });
    // });
    // $('.district-toggle').change(function() {
    //         var status = $(this).prop('checked') ? 1 : 0;
    //         var id = $(this).data('id');

    //         $.ajax({
    //             url: '{{ route("admin.UpdateDistrictStatus") }}', // adjust as needed
    //             type: 'POST',
    //             data: {
    //                 _token: '{{ csrf_token() }}',
    //                 id: id,
    //                 status: status
    //             },
    //             success: function(response) {
    //                 toastr.options = {
    //                     "closeButton": true,
    //                     "progressBar": true,
    //                     "positionClass": "toast-top-right",
    //                     "timeOut": "5000"
    //                 };
    //                 toastr.success(response.message, 'Success');
    //             },
    //             error: function(xhr) {
    //                 // console.log(xhr.responseText);
    //                 let errorMsg = 'Something went wrong';
    //                 if (xhr.responseJSON && xhr.responseJSON.message) {
    //                     errorMsg = xhr.responseJSON.message;
    //                 }

    //                 toastr.options = {
    //                     "closeButton": true,
    //                     "progressBar": true,
    //                     "positionClass": "toast-top-right",
    //                     "timeOut": "5000"
    //                 };
    //                 toastr.error(errorMsg, 'Error');
    //             }
    //         });
    //     });

})
</script>
@endpush