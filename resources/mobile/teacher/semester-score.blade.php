@extends('layouts.teacher.two-column-content')

@section('title', 'Nilai Semester Kelas')

@section('user-name')
  NAMA DI SINI
@endsection

@section('user-tid')
  187290 1271 9276
@endsection

@section('header-left-column')
  <i class="calculator icon"></i>Daftar Nilai Akhir
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
<!-- Semester score table -->
<div class="ui teal big ribbon label">Nilai Semester</div>
<table class="ui structured selectable celled table" id="semester-score">
  <thead class="center aligned">
  <tr>
    <th rowspan="2">Tahun Ajaran<i class="sort content ascending small icon" id="1"></i></th>
    <th rowspan="2">Kelas<i class="sort content ascending small icon" id="2"></i></th>
    <th rowspan="2">Mata Pelajaran<i class="sort content ascending small icon" id="3"></i></th>
    <th colspan="2">Rata-rata Kelas<i class="sort content ascending small icon" id="4"></th>
    <th rowspan="2">Aksi</th>
  </tr>
  <tr>
    <th>Konsep</th>
    <th>Praktek</th>
  </tr>
  </thead>
  <tbody>
    <tr>
      <td>2016/2017</td>
      <td>XI-IPA2</td>
      <td>Matematika</td>
      <td>73</td>
      <td>80</td>
      <td>
        <div class="ui icon mini buttons">
          <a href="{{ url('teacher/score/semester/detail') }}" class="ui blue icon basic mini button"><i class="eye icon"></i></a>
        </div>
      </td>
    </tr>
  </tbody>
</table>
<!-- /Semester score table -->

<div class="ui hidden divider"></div>
<!-- Midterm score table -->
<div class="ui teal big ribbon label">Nilai Bayangan</div>
<table class="ui structured selectable celled table" id="midterm-score">
  <thead class="center aligned">
  <tr>
    <th rowspan="2">Tahun Ajaran<i class="sort content ascending small icon" id="1"></i></th>
    <th rowspan="2">Kelas<i class="sort content ascending small icon" id="2"></i></th>
    <th rowspan="2">Mata Pelajaran<i class="sort content ascending small icon" id="3"></i></th>
    <th colspan="2">Rata-rata Kelas<i class="sort content ascending small icon" id="4"></th>
    <th rowspan="2">Aksi</th>
  </tr>
  <tr>
    <th>Konsep</th>
    <th>Praktek</th>
  </tr>
  </thead>
  <tbody>
    <tr>
      <td>2016/2017</td>
      <td>XI-IPA2</td>
      <td>Matematika</td>
      <td>73</td>
      <td>80</td>
      <td>
        <div class="ui icon mini buttons">
          <a href="{{ url('teacher/score/semester/detail') }}" class="ui blue icon basic mini button"><i class="eye icon"></i></a>
        </div>
      </td>
    </tr>
  </tbody>
</table>
<!-- /Midterm score table -->
@endsection