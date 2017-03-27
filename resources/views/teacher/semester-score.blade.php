@extends('layouts.teacher.two-column-content')

@section('title', 'Nilai Semester Kelas')

@section('user-name')
  NAMA DI SINI
@endsection

@section('user-tid')
  187290 1271 9276
@endsection

@section('right-column')
<div class="ui small form">
  <div class="field">
    <label>Kelas</label>
    <select class="ui dropdown" id="choose-class">
      <option value="-1" selected>Semua</option>
      <option value="">Kelas XI-IPA2</option>
    </select>
  </div>
  <div class="field">
    <label>Mata Pelajaran</label>
    <select class="ui dropdown" id="choose-course">
      <option value="-1" selected>Semua</option>
      <option value="">Matematika</option>
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
  <div class="middle aligned twelve wide column">
    <h2 class="ui header">Daftar Nilai Semester</h2>
  </div>
  <div class="four wide right aligned column">
    <a class="ui labeled icon compact teal button" href="{{ url('teacher/score/semester/add') }}">
      <i class="plus icon"></i>Tambah
    </a>
  </div>
</div>
<div class="ui divider"></div>
<!-- Semester score table -->
<table class="ui structured selectable celled table" id="semester-score">
  <thead class="center aligned">
  <tr>
    <th>Tahun Ajaran<i class="sort content ascending small icon" id="1"></i></th>
    <th>Kelas<i class="sort content ascending small icon" id="2"></i></th>
    <th>Mata Pelajaran<i class="sort content ascending small icon" id="3"></i></th>
    <th>Rata-rata Kelas <i class="sort content ascending small icon" id="4"></th>
    <th>Aksi</th>
  </tr>
  </thead>
  <tbody>
    <tr>
      <td>2016/2017</td>
      <td>XI-IPA2</td>
      <td>Matematika</td>
      <td class="center aligned">73</td>
      <td class="center aligned">
        <div class="ui icon mini buttons">
          <a href="{{ url('teacher/score/semester/detail') }}" class="ui blue icon basic mini button"><i class="eye icon"></i></a>
        </div>
      </td>
    </tr>
  </tbody>
</table>
<!-- /Semester score table -->

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