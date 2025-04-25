@extends('admin.layouts.app')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Add Property</h3>
            <nav aria-label="breadcrumb">
                <a href="{{route('admin.propertyList')}}"><button type="button" class="btn btn-warning btn-icon-text">
                    <i class="mdi mdi-arrow-left btn-icon-prepend"></i> Back </button></a>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form class="form-sample" method="post" action="{{route('admin.updateProperty')}}">
                            @csrf
                            <div class="row">
                            <input type="hidden" name="id" value="{{ $property->id }}" />
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Owner Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="owner_name"
                                                placeholder="Owner Name" value="{{ old('owner_name', $property->owner_name) }}" />
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
                                                placeholder="Owner Contact Number"
                                                value="{{ old('contact_number', $property->contact_number) }}" />
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
                                            <input class="form-control" placeholder="Enter Premise" name="premise"
                                                value="{{ old('premise', $property->premise) }}" />
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
                                            <input type="date" class="form-control" name="date" placeholder="dd/mm/yyyy"
                                                value="{{ old('date', $property->date) }}" />
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
                                            <select class="form-control" name="property_type_id"
                                                value="{{ old('property_type_id') }}">
                                                <option value="">--Select--</option>
                                                @foreach($ptypes as $ptype)
                                                <option value="{{$ptype->id}}" {{ $ptype->id == $property->property_type_id ? 'selected' : '' }}>{{$ptype->property_name}}</option>
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
                                            <input class="form-control" placeholder="Enter Rent" name="rent"
                                                value="{{ old('rent', $property->rent) }}" />
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
                                                name="availability" value="{{ old('availability', $property->availability) }}" />
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
                                            <select class="form-control" name="condition"
                                                value="{{ old('condition') }}">
                                                <option value="">--Select--</option>
                                                <option value="Semi Furnished" {{ $property->condition == 'Semi Furnished' ? 'Selected' : '' }}>Semi Furnished</option>
                                                <option value="Unfurnished" {{ $property->condition == 'Unfurnished' ? 'Selected' : '' }}>Unfurnished</option>
                                                <option value="Furnished" {{ $property->condition == 'Furnished' ? 'Selected' : '' }}>Furnished</option>
                                                <option value="Kitchen Fix" {{ $property->condition == 'Kitchen Fix' ? 'Selected' : '' }}>Kitchen-Fix</option>
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
                                            <input class="form-control" placeholder="Enter SqFT/Sqyd" name="sqFt_sqyd"
                                                value="{{ old('sqFt_sqyd', $property->sqFt_sqyd) }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Key</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" placeholder="Enter Key" name="key"
                                                value="{{ old('key', $property->key) }}" />
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
                                            <input class="form-control" placeholder="Enter Brokerage" name="brokerage"
                                                value="{{ old('brokerage', $property->brokerage) }}" />
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
                                            <select class="form-control" name="property_status"
                                                value="{{ old('property_status') }}">
                                                <option value="">--Select--</option>
                                                <option value="Available" {{ $property->property_status == 'Available' ? 'Selected' : '' }}>Available</option>
                                                <option value="Rent Out" {{ $property->property_status == 'Rent Out' ? 'Selected' : '' }}>Rent Out</option>
                                                <option value="Not Receiving" {{ $property->property_status == 'Not Receiving' ? 'Selected' : '' }}>Not Receiving</option>
                                                <option value="Incoming Call Stop" {{ $property->property_status == 'Incoming Call Stop' ? 'Selected' : '' }}>Incoming Call Stop</option>
                                                <option value="Switch Off" {{ $property->property_status == 'Switch Off' ? 'Selected' : '' }}>Switch Off</option>
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
                                                name="address" value="{{ old('address', $property->address) }}" />
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
                                                <option value="{{$datas->id}}" {{ $datas->id == $property->state_id ? 'Selected' : '' }}>{{$datas->state_name}}</option>
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
                                            <select class="form-control" id="city-dropdown" name="city_id"
                                                value="{{ old('city_id') }}"></select>
                                            @error('city_id')
                                            <p class="text text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Description 1</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Enter Description 1"
                                                name="description_1" value="{{ old('description_1', $property->description_1) }}" />
                                            @error('description_1')
                                            <p class="text text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Description 2</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Enter Description 2"
                                                name="description_2" value="{{ old('description_2', $property->description_2) }}" />
                                            @error('description_2')
                                            <p class="text text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Special Notes</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                                name="special_note" value="{{ old('special_note', $property->special_note) }}" />
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
// $(document).ready(function() {
//     $("#state-dropdown").on('change', function() {
//         var state_id = this.value;
//         $('#city-dropdown').html('');
//         $.ajax({
//             url: "{{route('admin.fetchCity')}}",
//             type: "Post",
//             data: {
//                 state_id: state_id,
//                 _token: '{{csrf_token()}}'
//             },
//             dataType: 'json',
//             success: function(res) {
//                 $('#city-dropdown').html('<option value="">-- Select City --</option>')
//                 var selectedCityId = {{ $property->city_id ?? 'null' }};
//                 $.each(res.cities, function(key, value) {
//                 var selected = value.id == selectedCityId ? 'selected' : '';
//                 $("#city-dropdown").append('<option value="' + value.id + '" ' + selected + '>' + value.city_name + '</option>');
//             });
//             }
//         })
//     });
// });
// $(document).ready(function() {
//     // Function to load cities for a given state_id
//     function loadCities(state_id, selectedCityId) {
//         $('#city-dropdown').html('');
//         $.ajax({
//             url: "{{ route('admin.fetchCity') }}",
//             type: "POST",
//             data: {
//                 state_id: state_id,
//                 _token: '{{ csrf_token() }}'
//             },
//             dataType: 'json',
//             success: function(res) {
//                 $('#city-dropdown').html('<option value="">-- Select City --</option>');
//                 $.each(res.cities, function(key, value) {
//                     var selected = value.id == selectedCityId ? 'selected' : '';
//                     $("#city-dropdown").append('<option value="' + value.id + '" ' + selected + '>' + value.city_name + '</option>');
//                 });
//             }
//         });
//     }
//     // Bind state change
//     $("#state-dropdown").on('change', function() {
//         var state_id = this.value;
//         loadCities(state_id, null); // when user changes manually, no pre-selection
//     });
//     // Auto-trigger on page load if state is already selected
//     var selectedStateId = $("#state-dropdown").val();
//     var selectedCityId = {{ $property->city_id ?? 'null' }};
//     if (selectedStateId) {
//         loadCities(selectedStateId, selectedCityId);
//     }
// });
</script>
<script>
    $(document).ready(function() {
        // Convert PHP variables into JavaScript variables safely
        var selectedCityId = {{ $property->city_id ?? 'null' }};
        var selectedStateId = {{ $property->state_id ?? 'null' }};

        // Function to load cities for a given state_id
        function loadCities(state_id, selectedCityId) {
            $('#city-dropdown').html('');
            $.ajax({
                url: "{{ route('admin.fetchCity') }}",
                type: "POST",
                data: {
                    state_id: state_id,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(res) {
                    $('#city-dropdown').html('<option value="">-- Select City --</option>');
                    $.each(res.cities, function(key, value) {
                        var selected = value.id == selectedCityId ? 'selected' : '';
                        $("#city-dropdown").append('<option value="' + value.id + '" ' + selected + '>' + value.city_name + '</option>');
                    });
                }
            });
        }

        // Bind state change
        $("#state-dropdown").on('change', function() {
            var state_id = this.value;
            loadCities(state_id, null); // when user changes manually
        });

        // Trigger on page load if state is selected (edit mode)
        if (selectedStateId) {
            loadCities(selectedStateId, selectedCityId);
        }
    });
</script>
@endpush