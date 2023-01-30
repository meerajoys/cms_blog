<x-admin-master>
    @section('content')
    <h3 class="m-0 font-weight-bold text-primary">Create Post</h3><br>

    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" aria-describedby="" placeholder="Enter title">
        </div>
        <div class="form-group">
            <label for="file">File</label>
            <input type="file" name="post_image" id="post_image" class="form-control-file">
        </div>
        <div class="form-group">
            <textarea name="body" id="body" cols="30" rows="10" class="form-control" placeholder="Enter the content"></textarea>
        </div>

        <button type="submit" class="btn btn-primary" id="post_submit" >Submit</button>

        </form>
        {{-- <script>
            $(document).ready(){
                $('#post_submit').click(function(){
                    alert("Post created successfully");
                })
            }
        </script> --}}


    @endsection





</x-admin-master>
