@extends('user-admin.layouts.app')
@section('content')
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="page-header">
                                <h3 class="page-title">Total Property Listing</h3>
                                <nav aria-label="breadcrumb">
                                    <button type="button" class="btn btn-info btn-fw btn-icon-text" data-toggle="modal"
                                        data-target=".bd-example-modal-lg">
                                        <i class="mdi mdi-magnify"></i> Search Property </button>
                                </nav>
                            </div>
                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="col-12 grid-margin">
                                            <div>
                                                <div class="card-body">
                                                    <h4 class="card-title">Search Property</h4>
                                                    <form class="form-sample" method="GET"
                                                        action="{{route('totalProperty')}}">
                                                        <p class="card-description">Personal info</p>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-3 col-form-label">Property
                                                                        Type</label>
                                                                    <div class="col-sm-9">
                                                                        <select class="form-control"
                                                                            name="property_type_id"
                                                                            value="{{ request('property_type_id') }}">
                                                                            <option value="">--Select--</option>
                                                                            @foreach($ptypes as $ptype)
                                                                            <option value="{{$ptype->id}}">
                                                                                {{$ptype->property_name}}</option>
                                                                            @endforeach;
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-sm-3 col-form-label">Condition</label>
                                                                    <div class="col-sm-9">
                                                                        <div class="form-check">
                                                                            <input type="checkbox"
                                                                                class="form-check-input"
                                                                                value="Semi Furnished"
                                                                                name="condition[]">
                                                                            <label class="form-check-label">Semi
                                                                                Furnished</label>
                                                                        </div>

                                                                        <div class="form-check">
                                                                            <input type="checkbox"
                                                                                class="form-check-input"
                                                                                name="condition[]" value="Unfurnished">
                                                                            <label class="form-check-label"
                                                                                for="primary2">Unfurnished</label>
                                                                        </div>

                                                                        <div class="form-check">
                                                                            <input type="checkbox"
                                                                                class="form-check-input"
                                                                                name="condition[]" value="Furnished">
                                                                            <label class="form-check-label"
                                                                                for="primary3">Furnished</label>
                                                                        </div>

                                                                        <div class="form-check">
                                                                            <input type="checkbox"
                                                                                class="form-check-input"
                                                                                name="condition[]" value="Kitchen-Fix">
                                                                            <label class="form-check-label"
                                                                                for="primary4">Kitchen-Fix</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Area</label>
                                                                    <div class="col-md-12 grid-margin stretch-card">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    @foreach($cities as $city)
                                                                                    <div
                                                                                        class="col-md-2 d-flex align-items-center">
                                                                                        <div
                                                                                            class="d-flex flex-row align-items-center">
                                                                                            <input type="checkbox"
                                                                                                class="form-check-input"
                                                                                                name="city_id[]"
                                                                                                value="{{$city->id}}">
                                                                                            <p class="form-check-label"
                                                                                                for="primary4">
                                                                                                {{$city->city_name}}
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary mr-2"> Submit
                                                        </button>
                                                        <button class="btn btn-light">Cancel</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive d-none d-md-block">
                                <table class="table table-bordered">
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
                                            <th>Description 1</th>
                                            <th>Description 2</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1; @endphp
                                        @foreach($items as $item)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{ $item->special_note ? $item->special_note : 'N/A' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->date)->format('d-m-Y') }}</td>
                                            <td>
                                                @if($p_status && $p_status->payment_status == 'completed')
                                                {{ $item->owner_name }} <br><br>
                                                <a href="tel:{{ $item->contact_number }}">
                                                    {{ $item->contact_number }}
                                                </a>
                                                @else
                                                <a type="button" class="btn btn-inverse-warning btn-fw"
                                                    href="{{route('subscribe')}}"> Get Contact Info </a>
                                                @endif
                                            </td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->premise }}</td>
                                            <td class="table-warning">{{ $item->city?->city_name ?? 'N/A' }}</td>
                                            <td>{{ $item->rent }} Thd</td>
                                            <td class="table-info">{{ $item->availability }}</td>
                                            <td class="table-primary">{{ $item->condition }}</td>
                                            <td class="table-success">{{ $item->sqFt_sqyd }}</td>
                                            <td>{{ $item->key }}</td>
                                            <td>{{ $item->brokerage }}</td>
                                            <td>{{ $item->property_status }}</td>
                                            <td>{{ $item->description_1 }}</td>
                                            <td>{{ $item->description_2 }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Cards for mobile -->
                            <div class="d-block d-md-none stretch-card">
                                @php $i=1; @endphp
                                @foreach($items as $item)
                                <div class="card card-body mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">#{{$i++}} - {{ $item->special_note ?? 'N/A' }}</h5>
                                        <p class="card-text"><strong>Date:</strong>
                                            {{ \Carbon\Carbon::parse($item->date)->format('d-m-Y') }}</p>
                                        <p class="card-text"><strong>Name:</strong>
                                            @if($p_status && $p_status->payment_status == 'completed')
                                            {{ $item->owner_name }}
                                            @else
                                            <a type="button" class="btn btn-inverse-warning btn-fw"
                                                href="{{route('subscribe')}}"> Get Contact Info </a>
                                            @endif
                                        </p>
                                        <p class="card-text"><strong>Contact:</strong>
                                            @if($p_status && $p_status->payment_status == 'completed')
                                            <a href="tel:{{ $item->contact_number }}">{{ $item->contact_number }}
                                            </a>
                                            @else
                                            <a type="button" class="btn btn-inverse-warning btn-fw"
                                                href="{{route('subscribe')}}"> Get Contact Info </a>
                                            @endif
                                        </p>
                                        <p class="card-text"><strong>Address:</strong> {{ $item->address }}</p>
                                        <p class="card-text"><strong>Premise:</strong> {{ $item->premise }}</p>
                                        <p class="card-text"><strong>Area:</strong>
                                            {{ $item->city?->city_name ?? 'N/A' }}</p>
                                        <p class="card-text"><strong>Rent:</strong> {{ $item->rent }} Thd</p>
                                        <p class="card-text"><strong>Availability:</strong> {{ $item->availability }}
                                        </p>
                                        <p class="card-text"><strong>Condition:</strong> {{ $item->condition }}</p>
                                        <p class="card-text"><strong>SqFt/Sqyd:</strong> {{ $item->sqFt_sqyd }}</p>
                                        <p class="card-text"><strong>Key:</strong> {{ $item->key }}</p>
                                        <p class="card-text"><strong>Brokerage:</strong> {{ $item->brokerage }}</p>
                                        <p class="card-text"><strong>Status:</strong> {{ $item->property_status }}</p>
                                        <p class="card-text"><strong>Description 1:</strong> {{ $item->description_1 }}
                                        </p>
                                        <p class="card-text"><strong>Description 2:</strong> {{ $item->description_2 }}
                                        </p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="d-flex mt-4">
                                {{ $items->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection