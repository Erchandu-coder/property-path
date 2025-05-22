@extends('user-admin.layouts.app')
@section('content')
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="page-header flex-wrap">
                                <div class="header-left">
                                    <h3 class="page-title">Favourite Property</h3>
                                </div>
                            </div>
                            <div class="table-responsive d-none d-md-block">
                                <table class="table table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>S.No</th>
                                            <th>Type</th>
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
                                        @foreach($items as $cartItem)
                                        <tr>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-icon add-to-cart"
                                                    data-pid="{{encrypt_id($cartItem->id)}}">
                                                        <i class="mdi mdi-close-box"></i>
                                                </button>
                                            </td>
                                            <td>{{$cartItem->property->propertype->property_name}}</td>
                                            <td>{{ \Carbon\Carbon::parse($cartItem->property->date)->format('d-m-Y') }}</td>
                                            <td>
                                                @if($p_status && $p_status->payment_status == 'completed')
                                                {{ $cartItem->property->owner_name }} <br><br>
                                                <a href="tel:{{ $cartItem->property->contact_number }}">
                                                    {{ $cartItem->property->contact_number }}
                                                </a>
                                                @else
                                                <a type="button" class="btn btn-inverse-warning btn-fw"
                                                    href="{{route('subscribe')}}"> Get Contact Info </a>
                                                @endif
                                            </td>
                                            <td>{{ $cartItem->property->address }}</td>
                                            <td>{{ $cartItem->property->premise }}</td>
                                            <td class="table-warning">{{ $cartItem->property->city?->city_name ?? 'N/A' }}</td>
                                            <td>{{ $cartItem->property->rent }} Thd</td>
                                            <td class="table-info">{{ $cartItem->property->availability }}</td>
                                            <td class="table-primary">{{ $cartItem->property->condition }}</td>
                                            <td class="table-success">{{ $cartItem->property->sqFt_sqyd }}</td>
                                            <td>{{ $cartItem->property->key }}</td>
                                            <td>{{ $cartItem->property->brokerage }}</td>
                                            <td>{{ $cartItem->property->property_status }}</td>
                                            <td>{{ $cartItem->property->description_1 }}</td>
                                            <td>{{ $cartItem->property->description_2 }}</td>
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
                                        <h5 class="card-title">#{{$i++}} - {{ $cartItem->property->special_note ?? 'N/A' }}</h5>
                                        <p class="card-text"><strong>Date:</strong>
                                            {{ \Carbon\Carbon::parse($cartItem->property->date)->format('d-m-Y') }}</p>
                                        <p class="card-text"><strong>Name:</strong>
                                            @if($p_status && $p_status->payment_status == 'completed')
                                            {{ $cartItem->property->owner_name }}
                                            @else
                                            <a type="button" class="btn btn-inverse-warning btn-fw"
                                                href="{{route('subscribe')}}"> Get Contact Info </a>
                                            @endif
                                        </p>
                                        <p class="card-text"><strong>Contact:</strong>
                                            @if($p_status && $p_status->payment_status == 'completed')
                                            <a href="tel:{{ $cartItem->property->contact_number }}">{{ $cartItem->property->contact_number }}
                                            </a>
                                            @else
                                            <a type="button" class="btn btn-inverse-warning btn-fw"
                                                href="{{route('subscribe')}}"> Get Contact Info </a>
                                            @endif
                                        </p>
                                        <p class="card-text"><strong>Address:</strong> {{ $cartItem->property->address }}</p>
                                        <p class="card-text"><strong>Premise:</strong> {{ $cartItem->property->premise }}</p>
                                        <p class="card-text"><strong>Area:</strong>
                                            </p>
                                        <p class="card-text"><strong>Rent:</strong> {{ $cartItem->property->rent }} Thd</p>
                                        <p class="card-text"><strong>Availability:</strong>
                                            {{ $cartItem->property->availability }}
                                        </p>
                                        <p class="card-text"><strong>Condition:</strong> {{ $cartItem->property->condition }}</p>
                                        <p class="card-text"><strong>SqFt/Sqyd:</strong> {{ $cartItem->property->sqFt_sqyd }}</p>
                                        <p class="card-text"><strong>Key:</strong> {{ $cartItem->property->key }}</p>
                                        <p class="card-text"><strong>Brokerage:</strong> {{ $cartItem->property->brokerage }}</p>
                                        <p class="card-text"><strong>Status:</strong> {{ $cartItem->property->property_status }}
                                        </p>
                                        <p class="card-text"><strong>Description 1:</strong>
                                            {{ $cartItem->property->description_1 }}
                                        </p>
                                        <p class="card-text"><strong>Description 2:</strong>
                                            {{ $cartItem->property->description_2 }}
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