<x-app-layout>
    <div class="col-md-6 mx-auto mt-md-4">
        @include('session-message.helper-msg')
        <div class="card card-warning">
            <div class="card-header">
                <h2 class="card-title">{{ __('Edit Bill') }}</h2>

            </div>
            <div class="card-body">
                <form action="{{ route('bill.update',$bill->id) }}" method="post">
                    @csrf()
                    @method('PATCH')
                    <label for="">Paid</label>
                    <input class="form-control form-control-lg col-md-6" id="paid" name="paid" type="text" placeholder="Paid" value="{{ $bill->paid }}">
                    <br>
                    <label for="">Pending</label>
                    <input class="form-control form-control-lg col-md-6"  name="pending" type="text" placeholder="Pending" value="{{ $bill->pending }}" disabled>
                    <input type="hidden" name="pending_rent" id="pending" value="{{ $bill->pending}}" >
                    <br>
                    <!-- <label for="">Total</label> -->
                    <input class="form-control form-control-lg col-md-6" name="total" type="hidden" placeholder="Total" value="{{ $bill->total }}">
                    <br>
                    <input type="submit" value="Update" class="btn btn-success float-right ">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>