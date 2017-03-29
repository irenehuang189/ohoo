<!-- Navbar -->
<div class="ui borderless stackable grid fixed inverted  huge menu">
  <!--<a class="item" id="sidebar-trigger">
    <i class="sidebar icon"></i>
  </a>-->
  <a class="header item" href="{{ url('/') }}">
    <img src="{{ asset('images/logo.png') }}" />
  </a>
  <div class="ui dropdown item">
    <a>Rapor</a>
    <div class="menu">
      <a 
        class="item {{ Request::is('parent/report') ? 'active' : '' }}"href="{{ url('parent/report') }}">
        Semester
      </a>
      <a
        class="item {{ Request::is('parent/report-bayangan*') ? 'active' : '' }}"
        href="{{ url('parent/report-bayangan') }}">
        Bayangan
      </a>
      <a 
        class="item {{ Request::is('parent/detailed-report*') ? 'active' : '' }}"
        href="{{ url('parent/detailed-report') }}">
        Rincian
      </a>
    </div>
  </div>
  <a 
    class="item {{ Request::is('*statistic*') ? 'active' : '' }}" 
    href="{{ url('parent/statistic') }}">
    Dashboard
  </a>
  <div class="ui right dropdown item">
    <i class="user icon"></i>
    @yield('user-name')
    <div class="menu">
      <a class="item" href="{{ url('password/edit') }}">Ubah Password</a>
      <a class="item" href="{{ url('/logout') }}">Keluar</a>
    </div>
  </div>
</div>
<!-- /Navbar -->