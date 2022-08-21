<x-app-layout>
    <div class="content-wrapper">
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-10 mx-auto mt-md-5">
                @include('session-message.helper-msg')
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Assets Index</h3>
                    <a href="{{ route('assets.create') }}" class="btn btn-success float-right">Add Assets</a>
                  </div>
                  <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Asset Id</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>On Rent</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($assets as $asset)
                                <tr>
                                    <td>{{ $asset->id }}</td>
                                    <td>{{ $asset->name }}</td>
                                    <td>{{ $asset->price }}</td>
                                    <td>{{ $asset->on_rent == 1 ? 'Yes' : 'No'}}</td>
                                    <td class="d-flex justify-content-center">
                                        <a href="{{ route('assets.edit',$asset->id) }}" class="btn btn-sm btn-warning mr-md-2">Edit</a>
                                        <form action="{{ route('assets.destroy',$asset->id)}} " method="post">
                                            @csrf()
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-sm btn-danger " onclick="return confirm('Are you sure?')" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                        {{ $assets->links() }}
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