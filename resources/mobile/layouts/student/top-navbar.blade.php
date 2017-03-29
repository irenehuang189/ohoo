<!-- Navbar -->
<div class="ui top attached borderless inverted menu grid" id="mobile-menu">
  <a class="header item" href="{{ url('/') }}">
    <img src="{{ asset('images/logo.png') }}" />
  </a>
  <div class="right menu">
    <a class="item" id="report-mobile">
      <i class="book icon"></i>
    </a>
    <a
      class="item {{ Request::is('*statistic*') ? 'active' : '' }}" 
      href="{{ url('student/statistic') }}">
      <i class="line chart icon"></i>
    </a>
    <a class="item" id="user-mobile">
      <i class="user icon"></i>
    </a>
  </div>
</div>

<div class="ui bottom attached three item menu grid" id="report-menu">
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
<div class="ui bottom attached two item menu grid" id="user-menu">
  <a class="item" href="{{ url('password/edit') }}">Ubah Password</a>
  <a class="item" href="{{ url('/logout') }}">Keluar</a>
</div>

<!-- /Navbar -->