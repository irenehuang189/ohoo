@extends('layouts.teacher.two-column-content')

@section('title', 'Tambah Nilai Kelas')

@section('user-name')
  {{ $teacher->name }}
@endsection

@section('user-tid')
  {{ $teacher->registration_number }}
@endsection

@section('right-column')
<div class="ui hidden divider"></div>
<div class="row">
  <a class="ui fluid right labeled icon teal button" id="add-task">
    Simpan & Selesai<i class="save icon"></i>
  </a>
</div>
<div class="row">
  <a href="{{ url('teacher/score/add') }}" class="ui fluid right labeled icon button">
    Simpan & Lanjutkan<i class="pencil icon"></i>
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
<div class="ui two steps" id="add-score">
  <a class="active step" id="exam">
    <i class="file text icon"></i>
    <div class="content">
      <div class="title">Rincian Penilaian</div>
      <div class="description">Tambahkan rincian ujian/ulangan/tugas</div>
    </div>
  </a>
  <a class="step" id="score">
    <i class="child icon"></i>
    <div class="content">
      <div class="title">Nilai</div>
      <div class="description">Masukan nilai siswa</div>
    </div>
  </a>
</div>

<!-- Rincian Penilaian -->
<div class="ui grid" id="exam">
  <div class="ui hidden divider"></div>
  <div class="row">
    <div class="four wide column">Kelas</div>
    <div class="twelve wide column">
      <select class="ui fluid dropdown" id="choose-class-add">
        <option value="" selected>-- Pilih Kelas --</option>
      @foreach ($classes as $class)
        <option value="{{ $class->id }}">{{ $class->name }}</option>
      @endforeach
      </select>
    </div>
  </div>
  <div class="row">
    <div class="four wide column">Mata Pelajaran</div>
    <div class="twelve wide column">
      <select class="ui fluid dropdown" id="choose-course-add">
        <option value="" selected>-- Pilih Mata Pelajaran --</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="four wide column">Jenis Penilaian</div>
    <div class="twelve wide column">
      <div class="ui fluid input">
        <input id="task-name" type="text" placeholder="Ujian Tengah Semester" />
      </div>
    </div>
  </div>
  <div class="row">
    <div class="four wide column">Materi</div>
    <div class="twelve wide column">
      <div class="ui fluid input">
        <input id="task-matter" type="text" placeholder="Persamaan Linear" />
      </div>
    </div>
  </div>
  <div class="row">
    <div class="four wide column">Tanggal Pelaksanaan</div>
    <div class="twelve wide column">
      <div class="ui fluid input"><input id="task-date" type="date" /></div>
    </div>
  </div>
</div>
<!-- /Rincian Penilaian -->

<!-- Tabel Daftar Siswa -->
<div class="ui hidden divider"></div>
<div id="score">
  <div class="ui hidden divider"></div>
  <table class="ui striped very compact table">
    <thead class="center aligned"><tr>
      <th class="one wide">No.</th>
      <th>Nama Lengkap</th>
      <th class="two wide">Nilai</th>
    </tr></thead>
    <tbody id="student-list">
    </tbody>
  </table>
  <div class="ui hidden divider"></div>
</div>
<!-- /Tabel Daftar Siswa -->

<!-- Modal Hapus -->
<div class="ui basic modal">
  <div class="ui icon header">
    <i class="archive icon"></i>
    Apakah Anda yakin ingin menghapus?
  </div>
  <div class="content">
    <p>Data akan dihapus segera. Anda tidak dapat mengembalikan data yang telah dihapus.</p>
  </div>
  <div class="actions">
    <div class="ui basic cancel inverted button">
      <i class="remove icon"></i>
      Tidak
    </div>
    <a class="ui red ok inverted button" href="{{ url('teacher/score') }}">
      <i class="checkmark icon"></i>
      Ya
    </a>
  </div>
</div>
<!-- /Modal Hapus -->

@endsection