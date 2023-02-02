<x-admin-master>

    @section('content')
    <h2 class="m-0 font-weight-bold text-primary">Roles</h2><br>
    @if (session()->has('role-delete'))
{{--
            <div class="alert alert-danger">
                {{session('role-delete')}}
            </div> --}}
    @elseif (session()->has('role-create'))

            <div class="alert alert-success">
                {{session('role-create')}}
            </div>


    @endif

        <div class="row">
            <div class="col-sm-3">
                <form action="{{route('roles.store')}}" method="POST" id="form-ajax">
                {{-- <form id="form-ajax"> --}}

                    @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary" id="role-create" name="submit">Create</button>
                </form>
            </div>

            {{-- <div id="response"></div> --}}
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
                                  <td>#</td>
                                  <td id="ajaxresponse"><a href="{{route('roles.edit', $role->id)}}">{{$role->name}}</a></td>
                                  {{-- <td><a href="{{route('roles.edit', $role->id)}}">{{result->name}}</a></td> --}}


                                  <td>{{$role->slug}}</td>
                                  <td>
                                    <form action="{{route('roles.destroy', $role->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" id="role-delete">Delete</button>

                                    </form>
                                  </td>

                              </tr>
                              @endforeach
                          </tbody>

                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection


    @section('scripts')

    <script>

        $(document).ready(function(){

            $('#form-ajax').submit(function(e){

                e.preventDefault();

                //to load spinner

                $("#role-create").prepend('<i class="fa fa-spinner fa-spin"></i>');
                // $('#role-create').attr('disabled', false);

                var formdata = $(this).serialize();

                // var formdata = '_token=FPF3bAyI9oQJXRIlqqCfjW8LOhrGwMDd6fb3hxPZ&name=Dev';
                console.log(formdata);

                var name = formdata.split('&')[1].split('=')[1];

                console.log(name);

                $.ajax({
                    url: "{{route('roles.store')}}",
                    data: formdata,
                    type: 'post',
                    success: function(response){

                        // $('#response').html(name);
                        // console.log(response);

                        // var name = response.name;
                        console.log(name);


                        // location.reload();


                        // to remove spinner

                        $("#role-create").find(".fa-spinner").remove();

                        var slug = name.toLowerCase();

                        // $('#role-delete').load('');
                        var deleteForm = `<form action="{{url('admin/roles', $role->id)}}" method="POST">@csrf @method('DELETE')<button class="btn btn-danger" id="role-delete">Delete</button></form>`;


                        $('#dataTable').append(

                            // $('#ajaxresponse').html(name);

                            "<td>" + '#' +  "</td>",
                            `<td><a href="{{route('roles.edit', $role->id )}}"> ${name} </a></td>`,
                            "<td>" + slug +  "</td>",
                            "<td>" + deleteForm +  "</td>",

                        );

                        $('#form-ajax')['0'].reset();
                        $('#role-create').attr('disabled', true);

                    }

                });
            });
        });

    </script>
    @endsection

</x-admin-master>
