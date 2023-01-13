<x-admin-master>

    @section('content')

        <h1>Permissions</h1>
        @if (session()->has('permission-delete'))

            <div class="alert alert-danger">
                {{session('permission-delete')}}
            </div>

        @endif

        <div class="row">

            <div class="col-sm-3">
                <form action="{{route('permissions.store')}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="" class="form-control @error('name') is-invalid @enderror">

                        <div>
                            @error('name')
                                <span><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>

                </form>
            </div>

            <div class="col-sm-9">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>Id</th>
                              <th>Name</th>
                              <th>Slug</th>
                              <th>Operation</th>

                            </tr>
                          </thead>
                          <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Operation</th>

                            </tr>
                          </tfoot>

                          <tbody>

                            @foreach($permissions as $permission)
                              <tr>
                                  <td>{{$permission->id}}</td>
                                  <td><a href="{{route('permissions.edit', $permission->id)}}">{{$permission->name}}</a></td>
                                  <td>{{$permission->slug}}</td>
                                  <td>
                                    <form action="{{route('permissions.destroy', $permission->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>

                                    </form>
                                  </td>

                              </tr>
                          </tbody>
                          @endforeach
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-admin-master>

