<x-home-master>

    @section('content')


    {{-- <h1 class="m-0 font-weight-bold text-primary">All Posts</h1><br> --}}

        {{-- <h1 class="my-4">Page Heading
            <small>Secondary Text</small>
          </h1> --}}

          <!-- Blog Post -->

          <div class="container m-5">

            <div class="row">
                <div class="col-4"></div>
                <div class="col-4 ">
                    {{-- <h1 class="font-weight-bold text-success text-center" style="font-size: 50px">All Posts</h1><br><br> --}}
                </div>
                <div class="col-4"></div>
            </div>
            <div class="row">

                <div class="col-3"></div>
                <div class="col-6">

                    @foreach($posts as $post)

                    <div class="card m-6" style="width: 35rem">
                      {{-- <img class="card-img-top " src="{{ asset('storage/' . $post->post_image)}}" alt="Card image cap"> --}}
                      <div class="card-body">
                        <h2 class="card-title">{{$post->title}}</h2>
                        <p class="card-text">{!! $post->body !!}</p>

                        {{-- <p class="card-text">{!! Str::limit($post->body, '50', '...') !!}</p> --}}
                        <a href="{{route('post', $post->id)}}" class="btn btn-primary">Read More &rarr;</a>
                      </div>
                      <div class="card-footer text-muted">
                        Posted on {{$post->created_at->diffForHumans()}} by
                        <a href="#">{{$post->user->name}}</a>
                      </div>
                    </div>

                    @endforeach
                </div>
                <div class="col-3"></div>
            </div>

        </div>

          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>


          <div id="search-results">
            <!-- Your blog posts will be displayed here -->
          </div>


    @endsection


    @section('scripts')

    <script>
        $(document).ready(function() {
            $("#search-input").on('keyup', function() {
            e.preventDefault();
            let query = $("#search-input").val();

            $.ajax({
                url: "{{route('search')}}",
                type: 'GET',
                data: {
                'search': query
                },
                success: function(result) {
                $("#search-results").html(result);
                }
            });
            });
        });
    </script>

    @endsection

    </x-home-master>
