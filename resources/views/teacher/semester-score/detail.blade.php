@extends('layouts.teacher.two-column-content')

@section('title', 'Daftar Nilai Akhir')

@section('user-name')
  {{ $teacher->name }}
@endsection

@section('user-tid')
  {{ $teacher->number_registration }}
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
<h2 class="ui header">
  Daftar Nilai Semester Kelas {{ $course->kelas->name }}
  <div class="sub header">Mata Pelajaran {{ $course->name }}</div>
</h2>
<div class="ui divider"></div>

<!-- Rincian Penilaian -->
<div class="ui grid">
  <div class="row">
    <div class="four wide column">Tahun Ajaran</div>
    <div class="twelve wide column">: {{ $course->kelas->year }}/{{ $course->kelas->year + 1 }}</div>
  </div>
  <div class="row">
    <div class="four wide column">SKBM</div>
    <div class="twelve wide column">: {{ $course->skbm }}</div>
  </div>
</div>
<!-- /Rincian Penilaian -->

<!-- Tabel Daftar Siswa -->
<div class="ui hidden section divider"></div>
<div class="ui teal big ribbon label">Nilai Siswa</div>
<table class="ui selectable striped table">
  <thead class="center aligned">
    <tr>
      <th rowspan="2" class="one wide">No.</th>
      <th rowspan="2">Nama Lengkap</th>
      <th colspan="2" class="two wide">Nilai Akhir</th>
    </tr>
    <tr>
      <th>Konsep</th>
      <th>Praktek</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="center aligned">1</td>
      <td>Wina Aryasubedjo</td>
      <td class="center aligned">80</td>
      <td class="center aligned">76</td>
    </tr>
    <tr class="negative">
      <td class="center aligned">2</td>
      <td>Bekti Hutama</td>
      <td class="center aligned">40</td>
      <td class="center aligned">40</td>
    </tr>
  </tbody>
  <tfoot><tr>
    <th></th>
    <th><b>Rata-rata Kelas</b></th>
    <th class="center aligned"><b>75</b></th>
    <th class="center aligned"><b>60</b></th>
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
    <a class="ui red ok inverted button" href="{{ url('teacher/score/semester') }}">
      <i class="checkmark icon"></i>
      Ya
    </a>
  </div>
</div>
<!-- /Modal Hapus -->

@endsection