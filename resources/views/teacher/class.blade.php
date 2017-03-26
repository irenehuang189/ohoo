@extends('layouts.teacher.two-column-content')

@section('title', 'Nilai Kelas')

@section('user-name')
  NAMA DI SINI
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

@section('header-left-column')
Nilai Kelas X-1
<div class="ui divider"></div>
@endsection

@section('left-column')
  <!-- Exam score table -->
  <div class="ui grid">
    <div class="twelve wide column">
      <h3 class="ui header">Nilai Ujian</h3>
    </div>
    <div class="four wide right aligned column">
      <button class="ui labeled icon compact teal button">
        <i class="plus icon"></i>Tambah
      </button>
    </div>
  </div>
  <table class="ui structured selectable celled table">
    <thead class="center aligned">
    <tr>
      <th>Nama<i class="sort content ascending small icon"></i></th>
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
            <button class="ui blue button"><i class="eye icon"></i></button>
            <button class="ui yellow button"><i class="pencil icon"></i></button>
            <button class="ui red button"><i class="trash icon"></i></button>
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
      <h3 class="ui header">Nilai Tugas</h3>
    </div>
    <div class="four wide right aligned column">
      <button class="ui labeled icon compact teal button">
        <i class="plus icon"></i>Tambah
      </button>
    </div>
  </div>
  <table class="ui structured selectable celled table">
    <thead class="center aligned">
    <tr>
      <th>Nama<i class="sort content ascending small icon"></i></th>
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
            <button class="ui blue button"><i class="eye icon"></i></button>
            <button class="ui yellow button"><i class="pencil icon"></i></button>
            <button class="ui red button"><i class="trash icon"></i></button>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
  <!-- /Assignment score table -->

@endsection