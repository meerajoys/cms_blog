<x-admin-master>

    @section('content')

    @if(session()->has('role-update'))

        <div class="alert alert-success">
            {{session('role-update')}}
        </div>
    @endif

       <div class="col-sm-6">

        <h1>Edit: {{$role->name}}</h1>

        <form action="{{route('roles.update', $role->id)}}" method="post">
            @csrf
            @method('PUT')

            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{$role->name}}"><br>
            <button type="submit" class="btn btn-primary">Update</button>

        </form>
       </div>

    @endsection
</x-admin-master>
