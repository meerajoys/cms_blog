<x-admin-master>
    @section('content')
    <h3 class="m-0 font-weight-bold text-primary">Edit Post</h3><br>
    <form action="{{route('post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" aria-describedby="" placeholder="Enter title" value="{{$post->title}}">
        </div>
        {{-- <div class="form-group">
            <div><img src="{{ asset('storage/' . $post->post_image)}}" alt="" height="100px"></div>
            <label for="file">File</label>
            <input type="file" name="post_image" id="post_image" class="ckeditor form-control-file">
        </div> --}}
        <div class="form-group">
            <label for="body">Description</label>

            <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{$post->body}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary" id="post-edit">Submit</button>

        </form>

    @endsection


    @section('scripts')

    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
            $(document).ready(function () {
                $('.ckeditor').ckeditor();
            });

        CKEDITOR.replace('body', {

            filebrowserUploadUrl: "{{route('ckeditor.imageupload', ['_token'=> csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>


@endsection

</x-admin-master>
