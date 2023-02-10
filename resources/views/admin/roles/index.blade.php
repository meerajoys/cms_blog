<x-admin-master>

    @section('content')
        <h2 class="m-0 font-weight-bold text-primary">Roles</h2><br>
        @if (session()->has('role-delete'))
            {{--
            <div class="alert alert-danger">
                {{session('role-delete')}}
            </div> --}}
        @elseif (session()->has('role-create'))
            {{--
            <div class="alert alert-success">
                {{session('role-create')}}
            </div> --}}
        @endif

        <div class="row">
            <div class="col-sm-3">
                <form action="{{ route('roles.store') }}" method="POST" id="form-ajax">
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

                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>#</td>
                                            <td><a href="{{ route('roles.edit', $role->id) }}">{{ $role->name }}</a></td>

                                            <td>{{ $role->slug }}</td>
                                            <td>


                                                <input type="hidden" id="id_{{ $role->id }}"
                                                    value="{{ $role->id }}">
                                                <button class="btn btn-danger delete-role" id="role-delete"
                                                    onclick='del("id_{{ $role->id }}")'>Delete</button>

                                                {{-- <button class="btn btn-danger" id="role-delete" data-id="{{$role->id}}">Delete</button> --}}


                                                {{-- <form action="{{route('roles.destroy', $role->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" id="role-delete" data-id="{{ $role->id }}">Delete</button>

                                    </form> --}}
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
            $(document).ready(function() {


                $('#form-ajax').submit(function(e) {
                    e.preventDefault();

                    //   to load spinner

                    $("#role-create").prepend('<i class="fa fa-spinner fa-spin"></i>');

                    var formData = $("#form-ajax").serialize(); // serialize form data


                    $.ajax({
                        url: "{{ route('roles.store') }}",
                        data: formData,
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },

                        success: function(result) {

                            console.log(typeof result); // this return type

                            console.log(result);
                            // to remove spinner

                            $("#role-create").find(".fa-spinner").remove();


                            $("#dataTable").append(
                                "<td>" + '#' + "</td>",
                                `<td><a href="{{ route('roles.edit', $role->id) }}">` + result
                                .name + "</a></td>",
                                "<td>" + result.slug + "</td>",
                                `<td><input type="hidden" id="id_` + result.id + `" value="` +
                                result.id +
                                `"><button  class="btn btn-danger delete-role" id="role-delete" onclick='del("id_` +
                                result.id + `")'>Delete</button></td>`
                                // `<td><input type="hidden" id="id_{{ `+result.id+` }}" value="{{ `+result.id+` }}"><button  class="btn btn-danger delete-role" id="role-delete" onclick='del("id_{{ `+result.id+` }}")'>Delete</button></td>`
                            );


                            $('#form-ajax')['0'].reset();
                            $('#role-create').attr('disabled', true);
                        }
                    });



                });


            });

            function del(id_) {
                // e.preventDefault();


                let id = $('#' + id_).val();

                console.log(id);
                let url = "{{ route('roles.destroy') }}";

                console.log(url);
                // let url = url('admin/roles/{role}/destroy');
                $("#role-delete").prepend('<i class="fa fa-spinner fa-spin"></i>');

                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id': id
                    },
                    success: function(result) {

                        // empty the existing data table
                        // $('#dataTable tbody').empty();

                        // loop through the updated data and add each role to the table
                        // for (var i = 0; i < result.length; i++) {
                        //     var role = result[i];
                        //     var row = '<tr>' +
                        //                 '<td>' + (i + 1) + '</td>' +
                        //                 '<td><a href="{{ route('roles.edit', ' + role.id + ') }}">' + role.name + '</a></td>' +
                        //                 '<td>' + role.slug + '</td>' +
                        //                 '<td><input type="hidden" id="id_' + role.id + '" value="' + role.id + '"><button class="btn btn-danger delete-role" id="role-delete" onclick="del(\'id_' + role.id + '\')">Delete</button></td>' +
                        //             '</tr>';
                        //     $('#dataTable tbody').append(row);

                        // }

                        console.log(result);
                        $("#role-delete").find(".fa-spinner").remove();

                    }
                });



            }
        </script>
    @endsection

</x-admin-master>
