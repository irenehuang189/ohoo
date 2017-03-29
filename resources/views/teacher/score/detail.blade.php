@extends('layouts.teacher.two-column-content')

@section('title', 'Tambah Nilai Kelas')

@section('user-name')
  {{ $teacher->name }}
@endsection

@section('user-tid')
  {{ $teacher->registration_number }}
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
      Daftar Nilai Kelas {{ $task->course->kelas->name }}
      <div class="sub header">Mata Pelajaran {{ $task->course->name }}</div>
    </h2>
  </div>
  <div class="six wide right aligned column">
    <a class="ui labeled icon compact yellow button" href="{{ url('teacher/score/' . $taskType . '/edit/' . $task->id) }}">
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
    <div class="twelve wide column">: {{ $task->name }}</div>
  </div>
  <div class="row">
    <div class="four wide column">Materi</div>
    <div class="twelve wide column">: {{ $task->materi }}</div>
  </div>
  <div class="row">
    <div class="four wide column">Tanggal Pelaksanaan</div>
    <div class="twelve wide column">: {{ date('d-m-Y', strtotime($task->tanggal)) }}</div>
  </div>
  <div class="row">
    <div class="four wide column">SKBM</div>
    <div class="twelve wide column">: {{ $task->course->skbm }}</div>
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
  @foreach ($students as $num => $student)
  @if ($student->pivot->score >= $task->course->skbm)
    <tr>
  @else
    <tr class="negative">
  @endif
      <td class="center aligned">{{ $num + 1 }}</td>
      <td>{{ $student->name }}</td>
      <td class="center aligned">{{ $student->pivot->score }}</td>
    </tr>
  @endforeach
  </tbody>
  <tfoot><tr>
    <th></th>
    <th><b>Rata-rata Kelas</b></th>
    <th class="center aligned"><b>{{ $students->avg('pivot.score') }}</b></th>
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
    <a class="ui red ok inverted button" href="{{ url('teacher/score') }}">
      <i class="checkmark icon"></i>
      Ya
    </a>
  </div>
</div>
<!-- /Modal Hapus -->

@endsection