@extends('layouts.teacher.two-column-content')

@section('title', 'Perhitungan Nilai Akhir')

@section('user-name')
  NAMA DI SINI
@endsection

@section('user-tid')
  187290 1271 9276
@endsection

@section('right-column')
<div class="ui hidden divider"></div>
<div class="row">
  <a href="{{ url('teacher/score/semester') }}" class="ui fluid right labeled icon teal button">
    Simpan & Selesai<i class="save icon"></i>
  </a>
</div>
<div class="row">
  <button class="ui fluid right labeled icon red button" id="delete">
    Batal<i class="trash icon"></i>
  </button>
</div>
@endsection

@section('left-column')
<h2 class="ui dividing header">
  Tambah Nilai
</h2>
<div class="ui three steps" id="add-score">
  <a class="active step" id="exam">
    <i class="file text icon"></i>
    <div class="content">
      <div class="title">Persentase</div>
      <div class="description">Masukan persentase nilai</div>
    </div>
  </a>
  <a class="step" id="score">
    <i class="eye icon"></i>
    <div class="content">
      <div class="title">Review</div>
      <div class="description">Tinjau hasil penilaian</div>
    </div>
  </a>
  <a class="step" id="attitude">
    <i class="child icon"></i>
    <div class="content">
      <div class="title">Afektif</div>
      <div class="description">Tambahkan nilai afektif</div>
    </div>
  </a>
</div>

<!-- Rincian Penilaian -->
<div class="ui grid" id="exam">
  <div class="ui hidden divider"></div>
  <div class="row">
    <div class="five wide column">Kelas</div>
    <div class="eleven wide column">
      <select class="ui fluid dropdown">
        <option value="" selected>-- Pilih Kelas --</option>
        <option value="1">Kelas X</option>
        <option value="1">Kelas XI</option>
        <option value="1">Kelas XII</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="five wide column">Mata Pelajaran</div>
    <div class="eleven wide column">
      <select class="ui fluid dropdown">
        <option value="" selected>-- Pilih Mata Pelajaran --</option>
        <option value="1">Matematika</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="five wide column">Ujian Akhir Semester</div>
    <div class="eleven wide column">
      <div class="ui fluid right labeled input">
        <input type="text" placeholder="25">
        <div class="ui basic label">%</div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="five wide column">Ujian Tengah Semester</div>
    <div class="eleven wide column">
      <div class="ui fluid right labeled input">
        <input type="text" placeholder="25">
        <div class="ui basic label">%</div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="five wide column">Ulangan Harian</div>
    <div class="eleven wide column">
      <div class="ui fluid right labeled input">
        <input type="text" placeholder="25">
        <div class="ui basic label">%</div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="five wide column">Tugas</div>
    <div class="eleven wide column">
      <div class="ui fluid right labeled input">
        <input type="text" placeholder="25">
        <div class="ui basic label">%</div>
      </div>
    </div>
  </div>
</div>
<!-- /Rincian Penilaian -->

<!-- Tabel Daftar Siswa -->
<div class="ui hidden divider"></div>
<div id="score">
  <div class="ui hidden divider"></div>
  <table class="ui selectable striped table">
    <thead class="center aligned">
      <tr>
        <th rowspan="2" class="one wide">No.</th>
        <th rowspan="2">No. Induk</th>
        <th rowspan="2">Nama Lengkap</th>
        <th colspan="2" class="two wide">Nilai Akhir</th>
      </tr>
      <tr>
        <th>Konsep</th>
        <th>Praktek</th>
      </tr>
    </thead>
    <tbody>
      <tr class="negative">
        <td class="center aligned">1</td>
        <td class="center aligned">13232</td>
        <td>Wina Aryasubedjo</td>
        <td class="center aligned">87</td>
        <td class="center aligned">87</td>
      </tr>
      <tr>
        <td class="center aligned">2</td>
        <td class="center aligned">13233</td>
        <td>Bekti Hutama</td>
        <td class="center aligned">74</td>
        <td class="center aligned">74</td>
      </tr>
    </tbody>
    <tfoot><tr>
      <th></th>
      <th></th>
      <th><b>Rata-rata Kelas</b></th>
      <th class="center aligned"><b>75</b></th>
      <th class="center aligned"><b>75</b></th>
    </tr></tfoot>
  </table>
  <div class="ui hidden divider"></div>
</div>
<!-- /Tabel Daftar Siswa -->

<!-- Nilai Afektif -->
<div id="attitude">
  <div class="ui hidden divider"></div>
  <table class="ui selectable striped very compact table">
    <thead class="center aligned">
      <tr>
        <th class="one wide">No.</th>
        <th>No. Induk</th>
        <th>Nama Lengkap</th>
        <th class="two wide">Nilai</th>
      </tr>
    </thead>
    <tbody>
      <tr class="negative">
        <td class="center aligned">1</td>
        <td class="center aligned">13232</td>
        <td>Wina Aryasubedjo</td>
        <td class="center aligned">
          <div class="ui input">
            <input type="number" placeholder="0"/>
          </div>
        </td>
      </tr>
      <tr>
        <td class="center aligned">2</td>
        <td class="center aligned">13233</td>
        <td>Bekti Hutama</td>
        <td class="center aligned">
          <div class="ui input">
            <input type="number" placeholder="0"/>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
  <div class="ui hidden divider"></div>
</div>
<!-- /Nilai Afektif -->

<!-- Modal Hapus -->
<div class="ui basic modal">
  <div class="ui icon header">
    <i class="archive icon"></i>
    Apakah Anda yakin ingin membatalkan?
  </div>
  <div class="content">
    <p>Data akan dihapus segera. Anda tidak dapat mengembalikan data yang telah dihapus.</p>
  </div>
  <div class="actions">
    <div class="ui basic cancel inverted button">
      <i class="remove icon"></i>
      Tidak
    </div>
    <a class="ui red ok inverted button" href="{{ url('teacher/score/final') }}">
      <i class="checkmark icon"></i>
      Ya
    </a>
  </div>
</div>
<!-- /Modal Hapus -->

@endsection