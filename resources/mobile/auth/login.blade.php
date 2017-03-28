<!DOCTYPE html>
<html>
<head>
  <title>Ohoo</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon -->
  <link rel="shortcut icon" href="{{{ asset('images/favicon.ico') }}}" type="image/x-icon">
  <link rel="icon" href="{{{ asset('images/favicon.ico') }}}" type="image/x-icon">
  
  <!-- Style -->
  <link rel="stylesheet" type="text/css" href="{{{ asset('css/semantic.min.css') }}}" />
  <link rel="stylesheet" type="text/css" href="{{{ asset('css/app.css') }}}" />
</head>
<body style="background-image:url({{ asset('images/login-bg.jpg') }});">
<p><br /><br /></p>
<!-- LOGIN ON MOBILE -->
<div class="ui mobile only tablet only container grid">
<div class="ui fluid card">
  <div class="image">
    <img src="{{ asset('images/login-banner.jpg') }}">
  </div>
  <div class="content">
  <img src="{{ asset('images/logo.png') }}" class="ui fluid image"/>
  <div class="ui hidden divider"></div>
    <div class="description">
      <!-- User type -->
      <div class="ui center aligned three column grid container" id="login-role">
        <a class="column right-border">
          <img class="ui circular image" src="{{ asset('images/teacher-icon.png') }}" />Guru
        </a>
        <a class="column right-border">
          <img class="ui circular image" src="{{ asset('images/parent-icon.png') }}" />Orang Tua
        </a>
        <a class="column">
          <img class="ui circular image" src="{{ asset('images/student-icon.png') }}" />Murid
        </a>
      </div>
      <!-- /User type -->
      <!-- Login form -->
      <div class="ui one column grid">
        <div class="column">
          <form class="ui form" method="post" action="{{ url('/login') }}">
          {{ csrf_field() }}
            <div class="ui fluid left icon input field">
              <input name="username" type="text" placeholder="Username" value="{{ old('username') }}" />
              <i class="user icon"></i>
            </div>
            <div class="ui fluid left icon input field">
              <input type="password" name="password" placeholder="Password" />
              <i class="key icon"></i>
            </div>
            <div class="field">
              <a class="right floated">Lupa password?</a>
              <button type="submit" class="ui fluid teal medium button">Masuk</button>
            </div>
          </form>
          <div class="ui hidden divider"></div>
        </div>
      </div>
      <!-- /Login form -->
    </div>
  </div>
</div>
</div>
<!-- /LOGIN ON MOBILE -->

<!-- LOGIN ON COMPUTER -->
<div class="ui computer only container center aligned grid" id="holder">
  <div class="ui centered fluid card">
    <div class="ui grid">
      <div class="eleven wide column" id="login-banner">
        <img class="ui fluid image" src="{{ asset('images/login-banner.jpg') }}"/>
      </div>
      <div class="ui five wide column" id="login-form">
        <img src="{{ asset('images/logo.png') }}" class="ui fluid image"/>
        <div class="ui hidden divider"></div>
        <!-- User type -->
        <div class="ui three column grid" id="login-role">
          <a class="column right-border">
            <img class="ui circular image" src="{{ asset('images/teacher-icon.png') }}" />Guru
          </a>
          <a class="column right-border">
            <img class="ui circular image" src="{{ asset('images/parent-icon.png') }}" />Orang Tua
          </a>
          <a class="column">
            <img class="ui circular image" src="{{ asset('images/student-icon.png') }}" />Murid
          </a>
        </div>
        <!-- /User type -->
        <!-- Login form -->
        <div class="ui one column grid">
          <div class="column">
            <form class="ui form" method="post" action="{{ url('/login') }}">
            {{ csrf_field() }}
              <div class="ui fluid left icon input field">
                <input name="username" type="text" placeholder="Username" value="{{ old('username') }}" />
                <i class="user icon"></i>
              </div>
              <div class="ui fluid left icon input field">
                <input type="password" name="password" placeholder="Password" />
                <i class="key icon"></i>
              </div>
              <div class="field">
                <a class="left floated">Lupa password?</a>
                <button type="submit" class="ui right floated teal medium button">Masuk</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /Login form -->
      </div>
    </div>
  </div>
</div>
<!-- LOGIN ON COMPUTER -->

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