<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title') - Projet M2</title>

    @section('css')
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{ asset('css/accueil.css') }}" rel="stylesheet">
    @show

  </head>

  <body>


    <!-- Navigation -->
    <!--header style="height: 100px">gete</header-->
    @yield('nav')

    <!-- Page Content -->
    <div class="container">
			@yield('content')
	  </div>
	<!-- Footer -->
    <footer class="py-5 bg-primary">
        <p class="m-0 text-center text-white">&copy; M2 2017</p>
      <!-- /.container -->
    </footer>
	<!-- Bootstrap core JavaScript -->
    @section('js')

    <script src="{{ asset('bootstrap/js/jquery-3.1.js')}}"></script>
    <script src="{{ asset('bootstrap/js/popper.js')}}"></script>
    <script src="{{ asset('bootstrap/js/tooltip.js')}}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.js')}}"></script>

    @show

  </body>

</html>