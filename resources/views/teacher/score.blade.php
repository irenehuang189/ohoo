@extends('layouts.teacher.two-column-content')

@section('title', 'Nilai Kelas')

@section('user-name')
  {{ $teacher->name }}
@endsection

@section('user-tid')
  {{ $teacher->registration_number }}
@endsection

@section('right-column')
<div class="ui small form">
  <div class="field">
    <label>Kelas</label>
    <select class="ui dropdown" id="choose-class">
      <option value="-1" selected>Semua</option>
      @foreach ($classes as $class)
        <option value="{{ $class->id }}">{{ $class->name }} - Semester {{ $class->semester }} - {{ $class->year }}</option>
      @endforeach
    </select>
  </div>
  <div class="field">
    <label>Mata Pelajaran</label>
    <select class="ui dropdown" id="choose-course">
      <option value="-1" selected>Semua</option>
      @foreach ($courses as $course)
        <option value="{{ $course->id }}">{{ $course->name }} - Semester {{ $course->kelas->semester }} - {{ $course->kelas->year }}</option>
      @endforeach
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
<h2 class="ui dividing header">Daftar Nilai</h2>
<!-- Exam score table -->
<div class="ui grid">
  <div class="twelve wide column">
    <div class="ui teal big ribbon label">Nilai Ujian</div>
  </div>
  <div class="four wide right aligned column">
    <a class="ui labeled icon compact teal button" href="{{ url('teacher/score/add') }}">
      <i class="plus icon"></i>Tambah
    </a>
  </div>
</div>
<table class="ui structured selectable celled table" id="exam-score">
  <thead class="center aligned">
  <tr>
    <th>Kelas<i class="sort content ascending small icon" id="1"></i></th>
    <th>Mata Pelajaran<i class="sort content ascending small icon" id="2"></i></th>
    <th>Jenis Penilaian<i class="sort content ascending small icon" id="3"></i></th>
    <th>Materi<i class="sort content ascending small icon" id="4"></i></th>
    <th>Tanggal Pelaksanaan<i class="sort content ascending small icon" id="5"></i></th>
    <th>Rata-rata Kelas <i class="sort content ascending small icon" id="6"></th>
    <th>Aksi</th>
  </tr>
  </thead>
  <tbody>
  @foreach ($exams as $exam)
    <tr>
      <td>{{ $exam->course->kelas->name }}</td>
      <td>{{ $exam->course->name }}</td>
      <td>{{ $exam->name }}</td>
      <td>{{ $exam->materi }}</td>
      <td>{{ $exam->tanggal }}</td>
      <td class="center aligned">
        {{ $exam->students->avg('pivot.score') }}
      </td>
      <td>
        <div class="ui icon mini buttons">
          <a href="{{ url('teacher/score/detail') }}" class="ui blue basic button"><i class="eye icon"></i></a>
          <a href="{{ url('teacher/score/add') }}" class="ui yellow basic button"><i class="pencil icon"></i></a>
          <button class="ui red basic button" id="delete"><i class="trash icon"></i></button>
        </div>
      </td>
    </tr>
  @endforeach
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
    <a class="ui labeled icon compact teal button" href="{{ url('teacher/score/add') }}">
      <i class="plus icon"></i>Tambah
    </a>
  </div>
</div>
<table class="ui structured selectable celled table" id="assignment-score">
  <thead class="center aligned">
  <tr>
    <th>Kelas<i class="sort content ascending small icon" id="1"></i></th>
    <th>Mata Pelajaran<i class="sort content ascending small icon" id="2"></i></th>
    <th>Jenis Penilaian<i class="sort content ascending small icon" id="3"></i></th>
    <th>Materi<i class="sort content ascending small icon" id="4"></i></th>
    <th>Tanggal Pelaksanaan<i class="sort content ascending small icon" id="5"></i></th>
    <th>Rata-rata Kelas <i class="sort content ascending small icon" id="6"></th>
    <th>Aksi</th>
  </tr>
  </thead>
  <tbody>
    <tr>
      <td>XI-IPA2</td>
      <td>Matematika</td>
      <td>$assigment->name</td>
      <td>$assigment->materi</td>
      <td>$assigment->tanggal</td>
      <td class="center aligned">36</td>
      <td>
        <div class="ui icon mini buttons">
          <a href="{{ url('teacher/score/detail') }}" class="ui blue basic button"><i class="eye icon"></i></a>
          <a href="{{ url('teacher/score/add') }}" class="ui yellow basic button"><i class="pencil icon"></i></a>
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
    <a class="ui red ok inverted button" href="{{ url('teacher/score') }}">
      <i class="checkmark icon"></i>
      Ya
    </a>
  </div>
</div>
<!-- /Modal Hapus -->

@endsection