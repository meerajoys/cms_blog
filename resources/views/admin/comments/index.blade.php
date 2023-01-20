@extends('components.admin-master')

@section('content')

@if (session()->has('comment-deleted-message'))

    <div class="alert alert-danger">{{Session::get('comment-deleted-message')}}</div>


@endif

{{-- <h1>Comments</h1> --}}
<h3 class="m-0 font-weight-bold text-primary">Comments</h3><br>


<div class="col-sm-9">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>

        @if (count($comments) > 0)


        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

              <thead>

                <tr>
                    <th>Id</th>
                    <th>Author</th>
                    <th>Email</th>
                    <th>Post Title</th>
                    <th>Comment</th>
                    <th>Post</th>
                    {{-- <th>Operations</th> --}}
                    <th>Delete</th>

                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Author</th>
                  <th>Email</th>
                  <th>Post Title</th>
                  <th>Comment</th>
                  <th>Post</th>
                  {{-- <th>Operations</th> --}}
                  <th>Delete</th>
                </tr>
              </tfoot>

              <tbody>

                @foreach ($comments as $comment)

                  <tr>
                      <td>#</td>
                      <td>{{$comment->author}}</td>
                      <td>{{$comment->email}}</td>
                      <td>{{$comment->post->title}}</td>
                      <td>{{$comment->body}}</td>
                      <td><a href="{{route('post', $comment->post->id)}}">View Post</a></td>
{{--
                      <td>ss
                        @if($comment->is_active == 1)


                        <form action="{{route('comments.update', $comment->id)}}" method="Post">
                            @csrf
                            @method("PATCH")

                            <input type="hidden" name="is_active" value="0">

                          <div class="form-group">
                            <button type="submit" class="btn btn-success">Un-approve</button>
                          </div>
                        </form>

                        @else

                        <form action="{{route('comments.update', $comment->id)}}" method="Post">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="is_active" value="1">
                          <div class="form-group">

                            <button type="submit" class="btn btn-info">Approve</button>
                          </div>
                        </form>

                        @endif
                      </td> --}}
                      <td>

                        <form action="{{route('comments.destroy', $comment->id)}}" method="Post" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')


                            <button type="submit" class="btn btn-danger">Delete</button>

                        </form>
                      </td>

                  </tr>
              </tbody>

              @endforeach

            </table>
          </div>
        </div>

        @else

            <h3 class="text-center">No comments Yet</h3>

        @endif


    </div>
</div>

@endsection
