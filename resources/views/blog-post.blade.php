<x-home-master>

    @section('content')

            <h1 class="mt-4">{{$post->title}}</h1>

            <!-- Author -->
            <p class="lead">
            by
            <a href="#">{{$post->user->name}}</a>
            </p>

            <hr>

            <!-- Date/Time -->
            <p>Posted on {{$post->created_at->diffForHumans()}}</p>

            <hr>

            <!-- Preview Image -->
            <img class="img-fluid rounded" src="{{ asset('storage/' . $post->post_image)}}" alt="">

            <hr>

            <!-- Post Content -->
                {{$post->body}}
            <hr>

            @if (Session::has('comment-message'))

                {{session('comment-message')}}

            @endif

            <!-- Comments Form -->

            @if (Auth::check())



            <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
                <form method="POST" action="{{route('comments.store')}}">
                    @csrf

                    <input type="hidden" name="post_id" value="{{$post->id}}">

                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="body"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            </div>
            @endif

            {{-- @if (count((array)$comments) > 0) --}}

                {{-- @foreach ($comments as $comment )



                <!-- Single Comment -->
                <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                    <h5 class="mt-0">{{$comment->author}}</h5>
                   <p>haiiihello</p>
                </div>
                </div>
                @endforeach --}}

            {{-- @endif --}}






            <!-- Comment with nested comments -->
            {{-- <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                    <h5 class="mt-0">Commenter Name</h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
                </div>

                <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                    <h5 class="mt-0">Commenter Name</h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
                </div>

            </div>
            </div> --}}




    @endsection



</x-home-master>

