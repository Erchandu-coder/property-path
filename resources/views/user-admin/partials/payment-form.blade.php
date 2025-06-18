<form method="post" action="{{route('createSubscribe')}}" enctype="multipart/form-data">
    @csrf
    <div data-mdb-input-init class="form-outline">
        <div class="form-row">
            <input type="hidden" class="form-control" name="user_id" value="{{$user->id}}">
            <div class="form-group col-md-6">
                <label>Choose Your Plan</label>
                <select class="form-control" name="plan_type" id="plan_type">
                    <option value="">Select Your Plane</option>
                    <option value="6">6 Month</option>
                    <option value="12">1 Year</option>
                    <option value="3">3 Days Trial</option>
                </select>
                @error('plan_type')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label>Price</label>
                <select class="form-control" name="price" id="price">
                    <option value="">Select Price</option>
                </select>
                @error('price')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label>Mobile Number</label>
                <input type="number" class="form-control" name="mobile_number" placeholder="Mobile Number">
                @error('mobile_number')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label>Upload Receipt</label>
                <input type="file" class="form-control file-upload-browse" name="payment_receipt">
                @error('payment_receipt')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
    <div class="mt-3">
        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block btn-lg">
            Proceed to payment <i class="fas fa-long-arrow-alt-right"></i>
        </button>
    </div>
</form>