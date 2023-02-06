<x-home-master>

@section('content')

      <!-- Blog Post -->

    <input type="text" id="search-input" class="form-control" placeholder="Search">

    <div class="container m-5" id="alldata">

        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 ">
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

    <div id="search-results" style="display: none;"></div>

      <!-- Pagination -->
      {{-- <ul class="pagination justify-content-center mb-4">
        <li class="page-item">
          <a class="page-link" href="#">&larr; Older</a>
        </li>
        <li class="page-item disabled">
          <a class="page-link" href="#">Newer &rarr;</a>
        </li>
      </ul> --}}




@endsection


@section('scripts')

<script>
    $(document).ready(function() {

        $("#search-input").on('input', function() {
            let query = $("#search-input").val();
            console.log(query);
            // url: "{{ route('home') }}",

            $.ajax({
                url: "/",
                type: 'GET',
                data: {
                'search': query
                },
                success: function(result) {
                    // console.log(result);

                    // Remove the search input from the result

                    result = result.replace('<input type="text" id="search-input" class="form-control" placeholder="Search">', '');

                    if(result === ""){
                        $("#alldata").show();
                        $("#search-results").hide();
                    }
                    else{
                        $("#search-results").html(result);
                        $("#alldata").hide();
                        $("#search-results").show();
                    }
                }
            });
        });
    });


</script>

@endsection

</x-home-master>
