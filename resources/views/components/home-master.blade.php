<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog Home</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <!-- Custom styles for this template -->
  <link href="{{asset('css/blog-home.css')}}" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="{{route('home')}}">My Blog</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li>
                <form action="{{route('home')}}" method="get">
                    <div class="input-group">
                        <input type="search" class="form-control" name="search" placeholder="Search for title or name" value="">
                        <span class="input-group-btn">
                        <button class="btn btn-secondary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
              </li>



          <li class="nav-item active">
            <a class="nav-link" href="{{route('home')}}">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>


          @if (Auth::check())

            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.index')}}">Dashboard</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('logout.perform')}}">Logout</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{route('user.profile.show', auth()->user())}}">{{auth()->user()->name}}</a>
              </li>
          @else
            <li class="nav-item">
              {{-- <a class="nav-link" href="/login">Login</a> --}}
              <a class="nav-link" href="{{route('login')}}">Login</a>

            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{route('register')}}">Register</a>
            </li>
          @endif


        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">
            @yield('content')

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        {{-- <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div> --}}




      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>
