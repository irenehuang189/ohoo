@extends('layouts.teacher.two-column-content')

@section('title', 'Performansi Individu')

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
<h2 class="ui dividing header">
  Daftar Siswa
  <div class="sub header">Kelas X-1</div>
</h2>

<!-- Tabel Daftar Siswa -->
<div class="ui two column centered grid">
  <div class="column">
<table class="ui selectable striped table">
  <thead class="center aligned"><tr>
    <th class="one wide">No.</th>
    <th class="three wide">No. Induk</th>
    <th>Nama Lengkap</th>
    <th></th>
  </tr></thead>
  <tbody>
    <tr class="center aligned">
      <td class="center aligned">1</td>
      <td class="center aligned">13232</td>
      <td>Wina Aryasubedjo</td>
      <td class="center aligned">
        <a href="{{ url('teacher/individu/detail') }}" class="ui blue basic icon mini button"><i class="eye icon"></i></a>
      </td>
    </tr>
    <tr class="center aligned">
      <td class="center aligned">2</td>
      <td class="center aligned">13233</td>
      <td>Bekti Regan</td>
      <td class="center aligned">
        <a href="{{ url('teacher/individu/detail') }}" class="ui blue basic icon mini button"><i class="eye icon"></i></a>
      </td>
    </tr>
  </tbody>
</table>
</div>
</div>
<!-- /Tabel Daftar Siswa -->
@endsection