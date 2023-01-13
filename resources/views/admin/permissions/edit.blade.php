<x-admin-master>

    @section('content')

    @if(session()->has('permission-update'))

    <div class="alert alert-success">
        {{session('permission-update')}}
    </div>
    @endif

        <div class="row">

            <div class="col-sm-6">

                <h1>Edit: {{$permission->name}}</h1>

                <form action="{{route('permissions.update', $permission->id)}}" method="post">
                    @csrf
                    @method('PUT')

                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$permission->name}}"><br>
                    <button type="submit" class="btn btn-primary">Update</button>

                </form>
               </div>
        </div>


    @endsection
</x-admin-master>
