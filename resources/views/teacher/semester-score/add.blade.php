@extends('layouts.teacher.two-column-content')

@section('title', 'Perhitungan Nilai Akhir')

@section('user-name')
  {{ $teacher->name }}
@endsection

@section('user-tid')
  {{ $teacher->registration_number }}
@endsection

@section('right-column')
<div class="ui hidden divider"></div>
<div class="row">
  <a class="ui fluid right labeled icon teal button" id="add-final">
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
      <select class="ui fluid dropdown" id="choose-class-final">
        <option value="" selected>-- Pilih Kelas --</option>
      @foreach ($classes as $class)
        <option value="{{ $class->id }}">{{ $class->name }}</option>
      @endforeach
      </select>
    </div>
  </div>
  <div class="row">
    <div class="five wide column">Mata Pelajaran</div>
    <div class="eleven wide column">
      <select class="ui fluid dropdown" id="choose-course-final">
        <option value="" selected>-- Pilih Mata Pelajaran --</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="five wide column">Ujian Akhir Semester</div>
    <div class="eleven wide column">
      <div class="ui fluid right labeled input">
        <input id="endterm-exam" type="text" placeholder="25">
        <div class="ui basic label">%</div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="five wide column">Ujian Tengah Semester</div>
    <div class="eleven wide column">
      <div class="ui fluid right labeled input">
        <input id="midterm-exam" type="text" placeholder="25">
        <div class="ui basic label">%</div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="five wide column">Ulangan Harian</div>
    <div class="eleven wide column">
      <div class="ui fluid right labeled input">
        <input id="daily-exam" type="text" placeholder="25">
        <div class="ui basic label">%</div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="five wide column">Tugas</div>
    <div class="eleven wide column">
      <div class="ui fluid right labeled input">
        <input id="assignment" type="text" placeholder="25">
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
    <tbody id="student-list-review">
    </tbody>
    <tfoot><tr>
      <th></th>
      <th></th>
      <th><b>Rata-rata Kelas</b></th>
      <th class="center aligned" id="concept-mean"></th>
      <th class="center aligned" id="practical-mean"></th>
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
    <tbody id="student-list-affective">
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
    <a class="ui red ok inverted button" href="{{ Request::url() }}">
      <i class="checkmark icon"></i>
      Ya
    </a>
  </div>
</div>
<!-- /Modal Hapus -->

@endsection