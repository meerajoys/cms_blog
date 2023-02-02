<x-admin-master>
    @section('content')
    <h3 class="m-0 font-weight-bold text-primary">Create Post</h3><br>

    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title" name="title-label">Title </label>
            <input type="text" name="title" id="title" class="form-control" aria-describedby="" placeholder="Enter title" >
        </div>
        {{-- <div class="form-group">
            <label for="file">File</label>
            <input type="file" name="post_image" id="post_image" class="form-control-file">
        </div> --}}
        <div class="form-group">
            <label for="body">Description</label>
            <textarea name="body" id="body" cols="30" rows="10" class="ckeditor form-controll" placeholder="Enter the content" ></textarea>
        </div>

        <button type="submit" class="btn btn-primary" id="post-create" >Submit</button>

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
                // removeButtons: 'Source'
            });
        </script>


    @endsection

</x-admin-master>
