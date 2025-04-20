@extends('user-admin.layouts.app')
@section('content')
      <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
          <div class="">
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h3 class="page-title">Commercial Sell Property Listing</h3>
                    <p class="card-description"></p>
                    <div class="table-responsive">
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
                            <td>{{ $item->owner_name }} <br><br> <a href="tel:{{ $item->contact_number }}">{{ $item->contact_number }}</a></td>
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
                    <div class="d-flex mt-4">
                            {{ $items->links() }}
                        </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="container">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
              </div>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
@endsection   