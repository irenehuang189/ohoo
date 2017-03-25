<!-- Navbar -->
<div class="ui top attached borderless stackable grid inverted huge menu">
  <!-- <a class="item" id="sidebar-trigger">
    <i class="sidebar icon"></i>
  </a> -->
  <div class="header item">
    <img src="{{ asset('images/logo.png') }}" />
  </div>
  <div class="ui dropdown item">
    <a href="{{ url('student/report') }}">Rapor</a>
    <div class="menu">
      <a 
        class="item {{ Request::is('student/report*') ? 'active' : '' }}" 
        href="{{ url('student/report') }}">
        Semester
      </a>
      <a class="item">Bayangan</a>
      <a 
        class="item {{ Request::is('student/detailed-report*') ? 'active' : '' }}" 
        href="{{ url('student/detailed-report') }}">
        Rincian
      </a>
    </div>
  </div>
  <a 
    class="item {{ Request::is('*statistic*') ? 'active' : '' }}" 
    href="{{ url('student/statistic') }}">
    Statistik
  </a>
  <div class="ui right dropdown item">
    <i class="user icon"></i>
    @yield('user-name')
    <div class="menu">
    <a class="item">Ubah Password</a>
    <a class="item" href="index.html">Logout</a>
    </div>
  </div>
</div>
<!-- /Navbar -->