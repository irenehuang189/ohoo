@extends('layouts.teacher.two-column-content')

@section('title', 'Tambah Nilai Kelas')

@section('user-name')
  NAMA DI SINI
@endsection

@section('user-tid')
  187290 1271 9276
@endsection

@section('right-column')
<div class="ui small form">
  <div class="field">
    <label>Nama Siswa</label>
    <select class="ui search dropdown">
      <option selected>Semua</option>
      <option>Wina Aryasubedjo</option>
    </select>
  </div>
  <div class="row">
    <button class="ui horizontal animated teal large fluid button show-detailed-report-blank" tabindex="0">
      <div class="visible content">Search</div>
      <div class="hidden content">
        <i class="search icon"></i>
      </div>
    </button>
  </div>
</div>
@endsection

@section('left-column')
<div class="ui grid">
  <div class="ten wide column">
    <h2 class="ui header">
      Tambah Nilai Kelas X-1
      <div class="sub header">Mata Pelajaran Matematika</div>
    </h2>
  </div>
  <div class="six wide right aligned column">
    <a class="ui labeled icon compact yellow button" href="{{ url('teacher/class/add') }}">
      <i class="pencil icon"></i>Ubah
    </a>
    <a class="ui labeled icon compact red button" id="delete">
      <i class="trash icon"></i>Hapus
    </a>
  </div>
</div>
<div class="ui divider"></div>

<!-- Rincian Penilaian -->
<div class="ui grid">
  <div class="row">
    <div class="four wide column">Jenis Penilaian</div>
    <div class="twelve wide column">: Ujian Tengah Semester</div>
  </div>
  <div class="row">
    <div class="four wide column">Materi</div>
    <div class="twelve wide column">: Persamaan Linear</div>
  </div>
  <div class="row">
    <div class="four wide column">Tanggal Pelaksanaan</div>
    <div class="twelve wide column">: 25-03-2017</div>
  </div>
  <div class="row">
    <div class="four wide column">SKBM</div>
    <div class="twelve wide column">: 65</div>
  </div>
</div>
<!-- /Rincian Penilaian -->

<!-- Tabel Daftar Siswa -->
<div class="ui hidden section divider"></div>
<div class="ui teal big ribbon label">Nilai Siswa</div>
<table class="ui selectable striped table">
  <thead class="center aligned"><tr>
    <th class="one wide">No.</th>
    <th>Nama Lengkap</th>
    <th class="two wide">Nilai</th>
  </tr></thead>
  <tbody>
    <tr>
      <td class="center aligned">1</td>
      <td>Wina Aryasubedjo</td>
      <td class="center aligned">80</td>
    </tr>
    <tr class="negative">
      <td class="center aligned">2</td>
      <td>Bekti Hutama</td>
      <td class="center aligned">40</td>
    </tr>
  </tbody>
  <tfoot><tr>
    <th></th>
    <th><b>Rata-rata Kelas</b></th>
    <th class="center aligned"><b>75</b></th>
  </tr></tfoot>
</table>
<!-- /Tabel Daftar Siswa -->

<!-- Modal Hapus -->
<div class="ui basic modal">
  <div class="ui icon header">
    <i class="archive icon"></i>
    Apakah Anda yakin ingin menghapus?
  </div>
  <div class="content">
    <p>Nilai akan dihapus segera. Anda tidak dapat mengembalikan nilai yang telah dihapus.</p>
  </div>
  <div class="actions">
    <div class="ui basic cancel inverted button">
      <i class="remove icon"></i>
      Tidak
    </div>
    <a class="ui red ok inverted button" href="{{ url('teacher/class') }}">
      <i class="checkmark icon"></i>
      Ya
    </a>
  </div>
</div>
<!-- /Modal Hapus -->

@endsection