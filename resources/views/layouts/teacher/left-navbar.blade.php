<!-- Navbar -->
<div class="ui left fixed inverted vertical accordion menu">
  <div class="item">
    <img class="ui image" src="{{ asset('images/logo.png') }}">
    <div class="ui hidden divider"></div>
    <div class="ui center aligned one column grid">
      <div class="column">
        <h5>@yield('user-name')</h5>
        @yield('user-tid')
      </div>
    </div>
    <div class="ui hidden divider"></div>
  </div>
  <a class="teal item" href="{{ url('teacher/score') }}">
    <span>
      <i class="student icon"></i>Manajemen Nilai
    </span>
  </a>
  <a class="teal item" href="{{ url('teacher/individu') }}">
    <span>
      <i class="child icon"></i>Performansi Individu
    </span>
  </a>
  <a class="teal item" href="{{ url('teacher/statistic') }}">
    <span>
      <i class="line chart icon"></i>Dashboard
    </span>
  </a>
  <a class="teal item" href="{{ url('password/edit') }}">
    <span>
      <i class="privacy icon"></i>Ubah Password
    </span>
  </a>
  <a class="teal item" href="{{ url('/logout') }}">
    <span>
      <i class="sign out icon"></i>Keluar
    </span>
  </a>
</div>
<!-- /navbar -->