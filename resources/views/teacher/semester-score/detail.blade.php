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
<h2 class="ui dividing header">
@if ($scoreType == "semester")
  Daftar Nilai Semester Kelas {{ $course->kelas->name }}
@else
  Daftar Nilai Bayangan Kelas {{ $course->kelas->name }}
@endif
  <div class="sub header">Mata Pelajaran {{ $course->name }}</div>
</h2>

<!-- Rincian Penilaian -->
<div class="ui grid">
  <div class="row">
    <div class="four wide column">Tahun Ajaran</div>
    <div class="twelve wide column">: {{ $course->kelas->year }}/{{ $course->kelas->year + 1 }}</div>
  </div>
  <div class="row">
    <div class="four wide column">Semester</div>
    <div class="twelve wide column">: {{ $course->kelas->semester }}</div>
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
  @foreach ($students as $index => $student)
    <tr>
      <td class="center aligned">{{ $index + 1 }}</td>
      <td>{{ $student->name }}</td>
    @if ($student->pivot->nilai >= $course->skbm)
      <td class="center aligned">{{ $student->pivot->nilai }}</td>
    @else
      <td class="center aligned negative">{{ $student->pivot->nilai }}</td>
    @endif
    @if ($student->pivot->nilai_praktik >= $course->skbm)
      <td class="center aligned">{{ $student->pivot->nilai_praktik }}</td>
    @else
      <td class="center aligned negative">{{ $student->pivot->nilai_praktik }}</td>
    @endif
    </tr>
  @endforeach
  </tbody>
  <tfoot><tr>
    <th></th>
    <th><b>Rata-rata Kelas</b></th>
    <th class="center aligned"><b>{{ $students->avg('pivot.nilai') }}</b></th>
    <th class="center aligned"><b>{{ $students->avg('pivot.nilai_praktik') }}</b></th>
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