<x-app-layout>
    <div class="col-md-6 mx-auto mt-md-4">
        @include('session-message.helper-msg')
        <div class="card card-success">
            <div class="card-header">
                <h2 class="card-title">{{ __('Create Bill') }}</h2>

                <!-- <a href="{{ route('assets.create') }}" class="btn btn-primary float-right">
                    Add Assets
                </a> -->
            </div>
            <div class="card-body">
                <form action="{{ route('bill.store') }}" method="post">
                    @csrf()
                    <label for="">Month</label>
                    <select name="month" class="form-control form-control-lg col-md-6" id="">
                        @for($i=1;$i<=12;$i++)
                            <option value="{{ $i }}">{{ date('F',mktime(0,0,0,$i,10))}}</option>
                        @endfor
                    </select>
                    <br>
                    <label for="">Year</label>
                    <select name="year" class="form-control form-control-lg col-md-6" id="">
                        {{ $year = date('Y'); }}
                        @for($i=$year-2;$i<=$year;$i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    <br>
                    <input type="submit" value="Submit" class="btn btn-success float-right ">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>