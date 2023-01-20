<x-admin-master>

    @section('content')

        <h1>User Profile for: {{$user->name}}</h1>

        <div class="row">
            <div class="col-sm-6">

                {{-- to display errors --}}

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{route('user.profile.update', $user)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <img class="img-profile rounded-circle" width="40px" height="40px" src="{{$user->avatar}}">
                    </div>
                    <div class="form-group">

                        <input type="file" name="avatar" id="file">
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" aria-describedby=""  value="{{$user->username}}">

                        {{-- for error checking --}}

                        @error('username')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror

                    </div>


                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" aria-describedby=""  value="{{$user->name}}">
                    </div>

                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" name="email" id="email" class="form-control" aria-describedby=""  value="{{$user->email}}">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" aria-describedby="">
                    </div>

                    <div class="form-group">
                        <label for="password-confirmation">Confirm Password</label>
                        <input type="password" name="password-confirmation" id="password-confirmation" class="form-control" aria-describedby="">
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
            </div>
                <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>Options</th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Attach</th>
                            <th>Detach</th>


                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                              <th>Options</th>
                              <th>Id</th>
                              <th>Name</th>
                              <th>Slug</th>
                              <th>Attach</th>
                              <th>Detach</th>
                          </tr>
                        </tfoot>

                        <tbody>


                            @foreach($roles as $role)

                              <tr>
                                    <td><input type="checkbox"
                                                @foreach ($user->roles as $user_role )

                                                    @if($user_role->slug == $role->slug)
                                                            checked
                                                    @endif
                                                @endforeach
                                    ></td>
                                    <td>{{$role->id}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>{{$role->slug}}</td>
                                    <td>
                                        <form action="{{route('user.role.attach', $user)}}" method="post">

                                            @csrf
                                            @method('PUT')

                                            <input type="hidden" name="role" value="{{$role->id}}">
                                            <button class="
                                                            btn btn-primary"
                                                            @if($user->roles->contains($role))

                                                                disabled
                                                            @endif
                                                            >
                                                            Attach
                                            </button>

                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{route('user.role.detach', $user)}}" method="post">
                                            @csrf
                                            @method('PUT')

                                            <input type="hidden" name="role" value="{{$role->id}}">
                                            <button class="
                                                            btn btn-danger"
                                                            @if(!$user->roles->contains($role))

                                                                disabled
                                                            @endif
                                                            >
                                                            Detach
                                            </button>

                                        </form>
                                    </td>

                                    <td></td>
                                    <td>

                                    </td>


                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
            </div>
        </div>

    @endsection
</x-admin-master>
