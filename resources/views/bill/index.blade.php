<x-app-layout>
    <div class="content-wrapper">
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-10 mx-auto mt-md-5">
                @include('session-message.helper-msg')
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Monthly Bill Index</h3>
                    <a href="{{ route('bill.create') }}" class="btn btn-success float-right">Create Bill</a>
                  </div>
                  <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Month</th>
                            <th>Year</th>
                            <th>Paid</th>
                            <th>Pending</th>
                            <th>Total Rent</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($bills as $bill)
                                <tr>
                                    <td>{{ $bill->id }}</td>
                                    <td>{{ date("F",mktime(0,0,0,$bill->month,10)) }}</td>
                                    <td>{{ $bill->year }}</td>
                                    <td>{{ $bill->paid }}</td>
                                    <td>{{ $bill->pending }}</td>
                                    <td>{{ $bill->total }}</td>
                                    <td class="d-flex jsutify-content-center">
                                        <a href="{{ route('bill.edit',$bill->id) }}" class="btn btn-sm btn-warning mr-md-2">Edit</a>
                                        <form action="{{ route('bill.destroy',$bill->id)}} " method="post">
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