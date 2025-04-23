@extends('admin.layouts.app')
@section('content')
<div class="main-panel">
    <div class=" col-lg-12">
        <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
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
                                <table class="table table-bordered table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                        <th>S.No</th>
                                            <th>Special Note</th>
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>Contact</th>
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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1; @endphp
                                        @foreach($results as $result)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{ $result->special_note ? $result->special_note : 'N/A' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($result->date)->format('d-m-Y') }}</td>
                                            <td>{{ $result->owner_name }}</td>
                                            <td>{{ $result->contact_number }}</td>
                                            <td>{{ $result->address }}</td>
                                            <td>{{ $result->premise }}</td>
                                            <td>{{ $result->city?->city_name ?? 'N/A' }}</td>
                                            <td>{{ $result->rent }} Thd</td>
                                            <td>{{ $result->availability }}</td>
                                            <td>{{ $result->condition }}</td>
                                            <td>{{ $result->sqFt_sqyd }}</td>
                                            <td>{{ $result->key }}</td>
                                            <td>{{ $result->brokerage }}</td>
                                            <td><label class="{{ $result->status == 1 ? 'badge badge-success' : 'badge badge-danger'}}">{{ $result->status == '1' ? 'Enable' : 'Disable' }}</label></td>
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
