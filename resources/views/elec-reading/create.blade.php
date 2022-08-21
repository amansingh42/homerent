<x-app-layout>
    <div class="col-md-6 mx-auto mt-md-4">
        @include('session-message.helper-msg')
        <div class="card card-success">
            <div class="card-header">
                <h2 class="card-title">{{ __('Add Electricity Reading') }}</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('elec-reading.store') }}" method="post">
                    @csrf()
                    <label for="">Asset Name</label>
                    <select name="aid" id="a_id" class="form-control form-control-lg col-md-6">
                    <option value="" data-price="0">Select a Value</option>    
                        @foreach($assets as $asset)
                            <option value="{{ $asset->id }}" data-price="{{ $asset->price }}">{{ $asset->name }}</option>
                        @endforeach
                    </select>
                    <br>
                    <label for="">Asset Price</label>
                    <input class="form-control form-control-lg col-md-6" id="a_price" name="aprice" type="text" placeholder="Price" disabled>
                    <input type="hidden" name="asset_price" class="asset_price" >
                    <br>
                    <label for="">Month</label>
                    <select class="form-control form-control-lg col-md-6" name="month" id="">
                        @for($i=1;$i<=12;$i++)
                            <option value="{{ $i }}">{{ date("F",mktime(0,0,0,$i,10)) }}</option>
                        @endfor
                    </select>
                    <br>
                    <label for="">Year</label>
                    <select class="form-control form-control-lg col-md-6" name="year" id="">
                        {{ $year = date('Y') }}
                        @for($i=$year-2;$i<=$year;$i++)
                            <option value="{{ $i }}" {{ date('Y') == $i ? 'selected' : ''}}>{{ $i }}</option>
                        @endfor    
                    </select>
                    <br>
                    <label for="">Previous Reading</label>
                    <input class="form-control form-control-lg col-md-6" name="p_reading" type="number" placeholder="Previous Reading">
                    <br>
                    <label for="">Current Reading</label>
                    <input class="form-control form-control-lg col-md-6" name="c_reading" type="number" placeholder="Current reading">
                    <br>
                    <label for="">Price Per Unit</label>
                    <input type="number" max="15" name="price_per_unit" class="form-control form-control-lg col-md-6" placeholder="Per Unit Price">
                    <br>
                    <input type="submit" value="Submit" class="btn btn-success float-right ">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>