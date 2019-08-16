<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>{{ config('app.name', 'Yellow Pages') }}</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{ asset('backend/css/mdb.min.css') }}" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">
  <!-- MDBootstrap Datatables  -->
  <link href="{{ asset('backend/css/addons/datatables.min.css') }}" rel="stylesheet">
  <!-- JQuery -->
  <script type="text/javascript" src="{{ asset('backend/js/jquery-3.4.1.min.js') }}"></script>

  {{-- Select2 --}}
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>

</head>
<body class="grey lighten-5">
  @include('layouts.backend.header')
  @guest
  <div class="container py-2">
    @yield('content')
  </div>
  @else
  <div class="container-fluid pl-0">
    <div class="row">
      <div class="col-md-2 z-depth-1  pr-0">
        @include('layouts.backend.sidebar')
      </div>
      <div class="col-md-10 px-0">
        @yield('content')
      </div>
    </div>
  </div>
  @endguest

  <!-- SCRIPTS -->
  @stack('scripts')

  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{ asset('backend/js/popper.min.js') }}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{ asset('backend/js/mdb.min.js') }}"></script>
  <!-- MDBootstrap Datatables  -->
  <script type="text/javascript" src="{{ asset('backend/js/addons/datatables.min.js') }}"></script>

  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>
  
</body>
</html>