<div class="ui top attached borderless inverted menu grid" id="mobile-menu">
  <a class="header item" href="{{ url('/') }}">
    <img src="{{ asset('images/logo.png') }}" />
  </a>
  <div class="right menu">
    <!-- Manajemen nilai -->
    <a class="item {{ Request::is('teacher/score') ? 'active' : '' }}" href="{{ url('teacher/score') }}">
      <i class="student icon"></i> 
    </a>

    <!-- Manajemen nilai akhir -->
    <a
      class="item {{ Request::is('teacher/score/final') ? 'active' : '' }}" 
      href="{{ url('teacher/score/final') }}">
      <i class="calculator icon"></i>
    </a>

    <!-- Performansi Individu -->
    <a
      class="item {{ Request::is('teacher/individu') ? 'active' : '' }}" 
      href="{{ url('teacher/individu') }}">
      <i class="child icon"></i> 
    </a>

    <!-- Dashboard -->
    <a
      class="item {{ Request::is('*statistic*') ? 'active' : '' }}" 
      href="{{ url('teacher/statistic') }}">
      <i class="line chart icon"></i> 
    </a>

    <a class="item" id="user-mobile">
      <i class="user icon"></i>
    </a>
  </div>
</div>

<!-- User Mobile -->
<div class="ui bottom attached two item menu grid" id="user-menu">
  <a class="item" href="{{ url('password/edit') }}">Ubah Password</a>
  <a class="item" href="{{ url('/logout') }}">Keluar</a>
</div>