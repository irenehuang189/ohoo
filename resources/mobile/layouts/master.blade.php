<!DOCTYPE html>
<html>
<head>
  <title>@yield('title')</title>

  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
  <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    
  <!-- Style -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/semantic.min.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />
</head>
<body>

  @if(Auth::user()->parent || Auth::user()->student)
    @include('layouts.student.top-navbar')
  @else
    @include('layouts.teacher.left-navbar')
  @endif

  @yield('content')
  
  <!-- Script -->
  <script
    src="https://code.jquery.com/jquery-3.1.1.min.js"
    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
    crossorigin="anonymous"></script>
  <script src="{{ asset('js/semantic.min.js') }}"></script>
  <script src="{{ asset('js/Chart.bundle.min.js') }}"></script>
  @if(Request::is('student/statistic'))
  <script src="{{ asset('js/student-chart.js') }}"></script>
  @endif
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/mobile.js') }}"></script>
  @yield('js')

</body>
</html>