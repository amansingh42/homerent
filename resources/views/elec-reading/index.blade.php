<x-app-layout>
    <div class="content-wrapper">
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-10 mx-auto mt-md-5">
                @include('session-message.helper-msg')
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Electricity-Reading Index</h3>
                    <a href="{{ route('elec-reading.create') }}" class="btn btn-success float-right">Add Electricity Reading</a>
                  </div>
                  <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Asset Name</th>
                            <th>Asset Price</th>
                            <th>Month</th>
                            <th>Year</th>
                            <th>Previous Reading</th>
                            <th>Current Reading</th>
                            <th>Per Unit Price</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($elec_reading as $elec)
                                <tr>
                                    <td>{{ $elec->id }}</td>
                                    <td>{{ $elec->asset_name->name }}</td>
                                    <td>{{ $elec->a_price }}</td>
                                    <td>{{ date("F",mktime(0,0,0,$elec->month,10)) }}</td>
                                    <td>{{ $elec->year }}</td>
                                    <td>{{ $elec->p_reading }}</td>
                                    <td>{{ $elec->c_reading }}</td>
                                    <td>{{ $elec->per_unit }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a href="{{ route('elec-reading.edit',$elec->id) }}" class="btn btn-sm btn-warning mr-md-2">Edit</a>
                                        <form action="{{ route('elec-reading.destroy',$elec->id)}} " method="post">
                                            @csrf()
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-sm btn-danger " onclick="return confirm('Are you sure?')" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </section>
    </div>
</x-app-layout>