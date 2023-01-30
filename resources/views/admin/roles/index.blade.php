<x-admin-master>

    @section('content')
    <h2 class="m-0 font-weight-bold text-primary">Roles</h2><br>
    @if (session()->has('role-delete'))

            <div class="alert alert-danger">
                {{session('role-delete')}}
            </div>

        @endif

        <div class="row">
            <div class="col-sm-3">
                <form action="{{route('roles.store')}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">

                        <div>
                            @error('name')
                                <span><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="role-create">Create</button>

                </form>
            </div>
            <div class="col-sm-9">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">All Roles</h6>
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

                            @foreach($roles as $role)
                              <tr>
                                  <td>{{$role->id}}</td>
                                  <td><a href="{{route('roles.edit', $role->id)}}">{{$role->name}}</a></td>
                                  <td>{{$role->slug}}</td>
                                  <td>
                                    <form action="{{route('roles.destroy', $role->id)}}" method="POST">
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

    @section('scripts')

        <script src="{{asset('js/button.js')}}"></script>r

    @endsection

</x-admin-master>
