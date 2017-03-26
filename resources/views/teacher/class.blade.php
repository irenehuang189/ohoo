@extends('layouts.teacher.two-column-content')

@section('title', 'Nilai Kelas')

@section('user-name')
  NAMA DI SINI
@endsection

@section('user-tid')
  187290 1271 9276
@endsection

@section('right-column')
<div class="ui small form">
  <div class="field">
    <label>Mata Pelajaran</label>
    <select class="ui dropdown" id="choose-course">
      <option value="-1" disabled selected>-- Pilih Mata Pelajaran --</option>
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
<h2 class="ui dividing header">Nilai Kelas X-1</h2>
<!-- Exam score table -->
<div class="ui grid">
  <div class="twelve wide column">
    <div class="ui teal big ribbon label">Nilai Ujian</div>
  </div>
  <div class="four wide right aligned column">
    <a class="ui labeled icon compact teal button" href="{{ url('teacher/class/add') }}">
      <i class="plus icon"></i>Tambah
    </a>
  </div>
</div>
<table class="ui structured selectable celled table">
  <thead class="center aligned">
  <tr>
    <th>Jenis Penilaian<i class="sort content ascending small icon"></i></th>
    <th>Materi<i class="sort content ascending small icon"></i></th>
    <th>Tanggal Pelaksanaan<i class="sort content ascending small icon"></i></th>
    <th>Rata-rata Kelas <i class="sort content ascending small icon"></th>
    <th>Aksi</th>
  </tr>
  </thead>
  <tbody>
    <tr>
      <td>$exam->name</td>
      <td>$exam->materi</td>
      <td>$exam->tanggal</td>
      <td class="center aligned">
        71
      </td>
      <td>
        <div class="ui icon mini buttons">
          <a href="{{ url('teacher/class/detail') }}" class="ui blue basic button"><i class="eye icon"></i></a>
          <a href="{{ url('teacher/class/add') }}" class="ui yellow basic button"><i class="pencil icon"></i></a>
          <button class="ui red basic button" id="delete"><i class="trash icon"></i></button>
        </div>
      </td>
    </tr>
  </tbody>
</table>
<!-- /Exam score table -->
<div class="ui hidden divider"></div>
<!-- Assignment score table -->
<div class="ui grid">
  <div class="twelve wide column">
    <div class="ui teal big ribbon label">Nilai Tugas</div>
  </div>
  <div class="four wide right aligned column">
    <a class="ui labeled icon compact teal button" href="{{ url('teacher/class/add') }}">
      <i class="plus icon"></i>Tambah
    </a>
  </div>
</div>
<table class="ui structured selectable celled table">
  <thead class="center aligned">
  <tr>
    <th>Jenis Penilaian<i class="sort content ascending small icon"></i></th>
    <th>Materi<i class="sort content ascending small icon"></i></th>
    <th>Tanggal Pengumpulan<i class="sort content ascending small icon"></i></th>
    <th>Rata-rata Kelas<i class="sort content ascending small icon"></i></th>
    <th>Aksi</th>
  </tr>
  </thead>
  <tbody>
    <tr>
      <td>$assigment->name</td>
      <td>$assigment->materi</td>
      <td>$assigment->tanggal</td>
      <td class="center aligned">round($assignment_averages[$i - 1]->avg)</td>
      <td>
        <div class="ui icon mini buttons">
          <a href="{{ url('teacher/class/detail') }}" class="ui blue basic button"><i class="eye icon"></i></a>
          <a href="{{ url('teacher/class/add') }}" class="ui yellow basic button"><i class="pencil icon"></i></a>
          <button class="ui red basic button" id="delete"><i class="trash icon"></i></button>
        </div>
      </td>
    </tr>
  </tbody>
</table>
<!-- /Assignment score table -->

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