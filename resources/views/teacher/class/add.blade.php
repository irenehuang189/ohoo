@extends('layouts.teacher.two-column-content')

@section('title', 'Nilai Kelas')

@section('user-name')
  NAMA DI SINI
@endsection

@section('user-tid')
  187290 1271 9276
@endsection

@section('right-column')
<div>

</div>
<div class="row">
  <button class="ui fluid right labeled icon teal button">
    Simpan & Selesai<i class="save icon"></i>
  </button>
</div>
<div class="row">
  <button class="ui fluid right labeled icon button">
    Simpan & Lanjutkan<i class="pencil icon"></i>
  </button>
</div>
<div class="row">
  <button class="ui fluid right labeled icon red button">
    Batal<i class="trash icon"></i>
  </button>
</div>
@endsection

@section('header-left-column')
  Tambah Nilai Kelas X-1
  <div class="sub header">Mata Pelajaran Matematika</div>
  <div class="ui divider"></div>
@endsection

@section('left-column')
<!-- Rincian Penilaian -->
<div class="ui teal big ribbon label">Rincian</div>
<div class="ui hidden divider"></div>
<div class="ui grid">
  <div class="row">
    <div class="four wide column">Jenis Penilaian</div>
    <div class="twelve wide column">
      <div class="ui fluid input">
        <input type="text" placeholder="Ujian Tengah Semester" />
      </div>
    </div>
  </div>
  <div class="row">
    <div class="four wide column">Materi</div>
    <div class="twelve wide column">
      <div class="ui fluid input">
        <input type="text" placeholder="Persamaan Linear" />
      </div>
    </div>
  </div>
  <div class="row">
    <div class="four wide column">Tanggal Pelaksanaan</div>
    <div class="twelve wide column">
      <div class="ui fluid input"><input type="date" /></div>
    </div>
  </div>
</div>
<!-- /Rincian Penilaian -->

<!-- Tabel Daftar Siswa -->
<div class="ui hidden divider"></div>
<div class="ui teal big ribbon label">Daftar Siswa</div>
<div class="ui hidden divider"></div>
<div class="ui container">
  <!-- <div class="column"> -->
  <table class="ui celled striped table">
    <thead class="center aligned"><tr>
      <th class="one wide">No.</th>
      <th>Nama Lengkap</th>
      <th class="two wide">Nilai</th>
    </tr></thead>
    <tbody>
      <tr>
        <td class="center aligned">1</td>
        <td>Wina Aryasubedjo</td>
        <td>
          <div class="ui input">
            <input type="number" placeholder="0"/>
          </div>
        </td>
      </tr>
      <tr>
        <td class="center aligned">2</td>
        <td>Bekti Hutama</td>
        <td>
          <div class="ui input">
            <input type="number" placeholder="0"/>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</div>
<!-- /Tabel Daftar Siswa -->

@endsection