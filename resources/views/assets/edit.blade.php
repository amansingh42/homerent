<x-app-layout>
    <div class="col-md-6 mx-auto mt-md-4">
        @include('session-message.helper-msg')
        <div class="card card-warning">
            <div class="card-header">
                <h2 class="card-title">{{ __('Edit Asset') }}</h2>

            </div>
            <div class="card-body">
                <form action="{{ route('assets.update',$asset->id) }}" method="post">
                    @csrf()
                    @method('PATCH')
                    <label for="">Asset Name</label>
                    <input class="form-control form-control-lg col-md-6" name="name" type="text" placeholder="Name" value="{{ $asset->name }}">
                    <br>
                    <label for="">Asset Price</label>
                    <input class="form-control form-control-lg col-md-6" name="price" type="text" placeholder="Price" value="{{ $asset->price }}">
                    <br>
                    <label for="">Asset On Rent</label>
                    <select class="form-control form-control-lg col-md-6" name="on_rent" id="">
                        <option value="">Select a value</option>
                        <option value="1" {{ $asset->on_rent == 1 ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ $asset->on_rent == 0 ? 'selected' : '' }}>No</option>
                    </select>
                    <br>
                    <input type="submit" value="Update" class="btn btn-success float-right ">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>