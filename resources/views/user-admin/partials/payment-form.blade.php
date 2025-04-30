<form method="post" action="{{route('createSubscribe')}}" enctype="multipart/form-data">
    @csrf
    <div data-mdb-input-init class="form-outline">
        <div class="form-row">
            <input type="hidden" class="form-control" name="user_id" value="{{$user->id}}">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Mobile Number</label>
                <input type="number" class="form-control" name="mobile_number" placeholder="Mobile Number">
                @error('mobile')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Upload Receipt</label>
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