<x-admin-master>
    @section('content')
    <h2 class="m-0 font-weight-bold text-primary">All Posts</h2><br>


        @if (Session::has('message'))

        {{-- or using helper function session
                  @if (session('message'))

          --}}

            <div class="alert alert-danger">{{Session::get('message')}}</div>

        {{-- or using helper function session
                  <div class="alert alert-danger">{{session('message')}}</div>

          --}}
        @elseif(session('post-created-message'))

            <div class="alert alert-success">{{session('post-created-message')}}</div>

        @elseif(session('post-updated-message'))
            <div class="alert alert-info">{{session('post-updated-message')}}</div>

        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
              {{-- <h6 class="m-0 font-weight-bold text-primary">Posts</h6> --}}
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Owner</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Post Link</th>
                      {{-- <th>Comments</th> --}}
                      <th>Created At</th>
                      <th>Update</th>
                      <th>Delete</th>

                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Owner</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Post Link</th>
                      {{-- <th>Comments</th> --}}
                      <th>Created At</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>

                  <tbody>
                    @foreach ($posts as $post)


                      <tr>
                          <td>#</td>
                          <td>{{$post->user->name}}</td>
                          <td><a href="{{route('post.edit', $post->id)}}">{{$post->title}}</a></td>
                          <td>

                            {!! $post->body !!}



                            {{-- <img src="{!! asset('ckimages/' . $post->body)!!}" alt="" height="40px"> --}}
                          </td>
                          <td><a href="{{route('post',$post->id)}}">View Post</a></td>
                          {{-- <td><a href="{{route('comments.show', $post->id)}}">View Comments</a></td> --}}
                          <td>{{$post->created_at->diffForHumans()}}</td>
                          <td>{{$post->updated_at->diffForHumans()}}</td>
                          <td>
                            {{-- @can('update', $post)    ====== to authorize data   --}}

                            {{-- @endcan --}}
                              <form action="{{route('post.destroy', $post->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                          </td>

                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
        </div>

        @if(auth()->user()->name !== 'admin')
          <div class="d-flex">
            <div class="mx-auto">
              {{$posts->links()}}
            </div>
          </div>

          @endif
          {{-- {{$posts->links()}} --}}

    @endsection

    @section('scripts')
          <!-- Page level plugins -->
            <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

            <!-- Page level custom scripts -->
            <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @endsection
</x-admin-master>
