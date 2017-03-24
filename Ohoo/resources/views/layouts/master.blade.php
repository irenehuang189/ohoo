<!DOCTYPE html>
<html>
<head>
  <title>@yield('title')</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{{ asset('images/favicon.ico') }}}" type="image/x-icon">
  <link rel="icon" href="{{{ asset('images/favicon.ico') }}}" type="image/x-icon">
    
  <!-- Style -->
  <link rel="stylesheet" type="text/css" href="{{{ asset('css/semantic.min.css') }}}" />
  <link rel="stylesheet" type="text/css" href="{{{ asset('css/app.css') }}}" />
</head>
<body>
  @include('layouts.navbar')

  @yield('content')
  
  <!-- Script -->
  <script
    src="https://code.jquery.com/jquery-3.1.1.min.js"
    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
    crossorigin="anonymous"></script>
  <script src="{{{ asset('js/semantic.min.js') }}}"></script>
  <script src="{{{ asset('js/Chart.bundle.min.js') }}}"></script>
  <script src="{{{ asset('js/app.js') }}}"></script>

</body>
</html>