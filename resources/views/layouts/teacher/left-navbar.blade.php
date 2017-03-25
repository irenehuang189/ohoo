<!-- Navbar -->
<div class="ui left fixed inverted vertical accordion menu">
  <div class="item">
    <img class="ui image" src="{{ asset('images/logo.png') }}">
    <div class="ui hidden divider"></div>
    <div class="ui center aligned grid">
      <h5>Bambang Supendi</h5>
      187290 1271 9276
    </div>
    <div class="ui hidden divider"></div>
  </div>
  <div class="item">
    <div class="title">
      <i class="dropdown icon"></i>
        <i class="users icon"></i>Kelas
    </div>
    <div class="content menu">
      <a class="item" href="{{ url('teacher/class') }}">Kelas X-1</a>
      <a class="item">Kelas X-2</a>
      <a class="item">Kelas X-3</a>
      <a class="item">Kelas XI-1</a>
      <a class="item">Kelas XI-2</a>
      <a class="item">Kelas XII-1</a>
      <a class="item">Kelas XII-2</a>
    </div>
  </div>
  <div class="item">
    <div class="title">
      <i class="dropdown icon"></i>
      <i class="book icon"></i>Mata Pelajaran
    </div>
    <div class="content menu">
      <a class="item" href="{{ url('teacher/course') }}">Matematika</a>
      <a class="item">Fisika</a>
      <a class="item">Kimia</a>
    </div>
  </div>
  <a class="item" href="{{ url('teacher/individu') }}">
    <span>
      <i class="child icon"></i>Performansi Individu
    </span>
  </a>
  <a class="item" href="{{ url('teacher/statistic') }}">
    <span>
      <i class="line chart icon"></i>Statistik
    </span>
  </a>
  <a class="item">
    <span>
      <i class="privacy icon"></i>Ubah Password
    </span>
  </a>
  <a class="item">
    <span>
      <i class="sign out icon"></i>Keluar
    </span>
  </a>
</div>
<!-- /navbar -->