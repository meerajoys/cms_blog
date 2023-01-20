<x-admin-master>

    @section('content')

    @if(session()->has('role-update'))

        <div class="alert alert-success">
            {{session('role-update')}}
        </div>
    @endif

    <div class="row">
       <div class="col-sm-6">

        <h2 class="font-weight-bold text-primary">Edit: {{$role->name}}</h2><br>

        <form action="{{route('roles.update', $role->id)}}" method="post">
            @csrf
            @method('PUT')

            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{$role->name}}"><br>
            <button type="submit" class="btn btn-primary">Update</button><br>

        </form>
       </div>
    </div>
<br>
    <div class="row">

        <div class="col-sm-9">

            @if ($permissions->isNotEmpty())


                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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

                            @foreach($permissions as $permission)

                            <tr>
                                <td><input type="checkbox"
                                    @foreach ($role->permissions as $role_permission )

                                        @if($role_permission->slug == $permission->slug)
                                                checked
                                        @endif
                                    @endforeach
                                    name="checkbox" id="checkbox">
                                </td>
                                <td>{{$permission->id}}</td>
                                <td>{{$permission->name}}</td>
                                <td>{{$permission->slug}}</td>
                                <td>
                                    <form action="{{route('roles.permission.attach', $role)}}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <input type="hidden" name="permission" value="{{$permission->id}}">
                                        <button type="submit"
                                                class="btn btn-primary"
                                                @if ($role->permissions->contains($permission))

                                                    disabled

                                                @endif
                                                >
                                                Attach
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{route('roles.permission.detach', $role)}}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <input type="hidden" name="permission" value="{{$permission->id}}">
                                        <button type="submit"
                                                class="btn btn-danger"
                                                @if (!$role->permissions->contains($permission))
                                                    disabled

                                                @endif
                                                >
                                                Detach
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        </tbody>
                        @endforeach

                        </table>
                    </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    @endsection
</x-admin-master>
