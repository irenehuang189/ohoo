<!DOCTYPE html>
<html>
<head>
    <title>ohoo</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{{ asset('images/favicon.ico') }}}" type="image/x-icon">
    <link rel="icon" href="{{{ asset('images/favicon.ico') }}}" type="image/x-icon">
    
    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="{{{ asset('css/semantic.min.css') }}}" />
    <link rel="stylesheet" type="text/css" href="{{{ asset('css/app.css') }}}" />
</head>
<body style="background-image:url(images/login-bg.jpg)">
<p><br /><br /></p>
<div class="ui container center aligned" id="holder">
    <div class="ui centered fluid card">
        <div class="ui grid">
            <div class="eleven wide column" id="login-banner">
                <img class="ui fluid image" src="images/login-banner.jpg" />
            </div>
            <!-- User type -->
            <div class="ui five wide column" id="login-form">
                <h3>LOGIN</h3><br /><br />
                <div class="ui three column grid" id="login-role">
                    <a class="column right-border">
                        <img class="ui circular image" src="images/teacher-icon.png" />Guru
                    </a>
                    <a class="column right-border">
                        <img class="ui circular image" src="images/parent-icon.png" />Orang Tua
                    </a>
                    <a class="column">
                        <img class="ui circular image" src="images/student-icon.png" />Murid
                    </a>

                    <div class="ui hidden divider"></div>
                    <!-- Login form -->
                    <form class="ui form" method="post" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                        <div class="ui left icon input field">
                            <input name="username" type="text" placeholder="Username" value="{{ old('username') }}" />
                            <i class="user icon"></i>
                        </div>
                        <div class="ui left icon input field">
                            <input name="password" type="password" placeholder="Password" />
                            <i class="key icon"></i>
                        </div>
                        <div class="field">
                            <button type="submit" class="ui button">Login</button>
                        </div>
                    </form>
                    <!-- /Login form -->
                </div>
            </div>
            <!-- /User type -->
        </div>
    </div>
</div>

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