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
    <select class="ui dropdown" id="choose-class-teacher">
    @if (!isset($classId))
      <option value="-1" selected>Semua</option>
      @foreach ($classes as $class)
        <option value="{{ $class->id }}">{{ $class->name }} - Semester {{ $class->semester }} - {{ $class->year }}</option>
      @endforeach
    @else
      <option value="-1">Semua</option>
      @foreach ($classes as $class)
      @if ($class->id == $classId)
        <option value="{{ $class->id }}" selected>{{ $class->name }} - Semester {{ $class->semester }} - {{ $class->year }}</option>
      @else
        <option value="{{ $class->id }}">{{ $class->name }} - Semester {{ $class->semester }} - {{ $class->year }}</option>
      @endif
      @endforeach
    @endif
    </select>
  </div>
  <div class="field">
    <label>Mata Pelajaran</label>
    <select class="ui dropdown" id="choose-course-teacher">
    @if (!isset($courseId))
      <option value="-1" selected>Semua</option>
      @foreach ($courses as $course)
        <option value="{{ $course->id }}">{{ $course->name }}</option>
      @endforeach
    @else
      <option value="-1">Semua</option>
      @foreach ($courses as $course)
      @if ($course->id == $courseId)
        <option value="{{ $course->id }}" selected>{{ $course->name }}</option>
      @else
        <option value="{{ $course->id }}">{{ $course->name }}</option>
      @endif
      @endforeach
    @endif
    </select>
  </div>
  <div class="row">
    <button class="ui horizontal animated teal large fluid button show-score" tabindex="0">
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
    <a class="ui labeled icon compact teal button" href="{{ url('teacher/score/exam/add') }}">
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
      <td>{{ date('d-m-Y', strtotime($exam->tanggal)) }}</td>
      <td class="center aligned">
        {{ $exam->students->avg('pivot.score') }}
      </td>
      <td>
        <div class="ui icon mini buttons">
          <a href="{{ url('teacher/score/exam/detail/' . $exam->id) }}" class="ui blue basic button"><i class="eye icon"></i></a>
        @if ($exam->course->kelas->is_current)
          <a href="{{ url('teacher/score/exam/edit/' . $exam->id) }}" class="ui yellow basic button"><i class="pencil icon"></i></a>
          <button class="ui red basic button" id="delete"><i class="trash icon"></i></button>
        @endif
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
    <a class="ui labeled icon compact teal button" href="{{ url('teacher/score/assignment/add') }}">
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
  @foreach ($assignments as $assignment)
    <tr>
      <td>{{ $assignment->course->kelas->name }}</td>
      <td>{{ $assignment->course->name }}</td>
      <td>{{ $assignment->name }}</td>
      <td>{{ $assignment->materi }}</td>
      <td>{{ date('d-m-Y', strtotime($assignment->tanggal)) }}</td>
      <td class="center aligned">{{ $assignment->students->avg('pivot.score') }}</td>
      <td>
        <div class="ui icon mini buttons">
          <a href="{{ url('teacher/score/assignment/detail/' . $assignment->id) }}" class="ui blue basic button"><i class="eye icon"></i></a>
        @if ($assignment->course->kelas->is_current)
          <a href="{{ url('teacher/score/assignment/edit/' . $assignment->id) }}" class="ui yellow basic button"><i class="pencil icon"></i></a>
          <button class="ui red basic button" id="delete"><i class="trash icon"></i></button>
        @endif
        </div>
      </td>
    </tr>
  @endforeach
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
    <a class="ui red ok inverted button" id="delete-task">
      <i class="checkmark icon"></i>
      Ya
    </a>
  </div>
</div>
<!-- /Modal Hapus -->

@endsection