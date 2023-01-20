<x-admin-master>
    @section('content')
        <h1>Edit</h1>
        <form action="{{route('post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" aria-describedby="" placeholder="Enter title" value="{{$post->title}}">
        </div>
        <div class="form-group">
            <div><img src="{{ asset('storage/' . $post->post_image)}}" alt="" height="100px"></div>
            <label for="file">File</label>
            <input type="file" name="post_image" id="post_image" class="form-control-file">
        </div>
        <div class="form-group">
            <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{$post->body}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

        </form>

    @endsection

</x-admin-master>
