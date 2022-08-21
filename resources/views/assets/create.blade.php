<x-app-layout>
    <div class="col-md-6 mx-auto mt-md-4">
        @include('session-message.helper-msg')
        <div class="card card-success">
            <div class="card-header">
                <h2 class="card-title">{{ __('Add Assets') }}</h2>

                <!-- <a href="{{ route('assets.create') }}" class="btn btn-primary float-right">
                    Add Assets
                </a> -->
            </div>
            <div class="card-body">
                <form action="{{ route('assets.store') }}" method="post">
                    @csrf()
                    <label for="">Asset Name</label>
                    <input class="form-control form-control-lg col-md-6" name="name" type="text" placeholder="Name">
                    <br>
                    <label for="">Asset Price</label>
                    <input class="form-control form-control-lg col-md-6" name="price" type="text" placeholder="Price">
                    <br>
                    <label for="">Asset On Rent</label>
                    <select class="form-control form-control-lg col-md-6" name="on_rent" id="">
                        <option value="" selected>Select a value</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                    <br>
                    <input type="submit" value="Submit" class="btn btn-success float-right ">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>