@extends('layouts.teacher.two-column-content')

@section('title', 'Nilai Semester Kelas')

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
      @foreach ($courseChoices as $courseChoice)
        <option value="{{ $courseChoice->id }}">{{ $courseChoice->name }}</option>
      @endforeach
    @else
      <option value="-1">Semua</option>
      @foreach ($courseChoices as $courseChoice)
      @if ($courseChoice->id == $courseId)
        <option value="{{ $courseChoice->id }}" selected>{{ $courseChoice->name }}</option>
      @else
        <option value="{{ $courseChoice->id }}">{{ $courseChoice->name }}</option>
      @endif
      @endforeach
    @endif
    </select>
  </div>
  <div class="row">
    <button class="ui horizontal animated teal large fluid button show-final" tabindex="0">
      <div class="visible content">Search</div>
      <div class="hidden content">
        <i class="search icon"></i>
      </div>
    </button>
  </div>
</div>
@endsection

@section('left-column')
<h2 class="ui dividing header">Daftar Nilai Akhir</h2>
<!-- Semester score table -->
<div class="ui grid">
  <div class="twelve wide column">
    <div class="ui teal big ribbon label">Nilai Semester</div>
  </div>
  <div class="four wide right aligned column">
    <a class="ui labeled icon compact teal button" href="{{ url('teacher/score/semester/add') }}">
      <i class="plus icon"></i>Tambah
    </a>
  </div>
</div>
<table class="ui structured selectable celled table" id="semester-score">
  <thead class="center aligned">
  <tr>
    <th rowspan="2">Tahun Ajaran<i class="sort content ascending small icon" id="1"></i></th>
    <th rowspan="2">Semester<i class="sort content ascending small icon" id="5"></i></th>
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
  @foreach ($courses as $course)
    <tr>
      <td>{{ $course->kelas->year }}/{{ $course->kelas->year + 1 }}</td>
      <td class="center aligned">{{ $course->kelas->semester }}</td>
      <td>{{ $course->kelas->name }}</td>
      <td>{{ $course->name }}</td>
      <td class="center aligned">{{ $course->students->avg('pivot.nilai') }}</td>
      <td class="center aligned">{{ $course->students->avg('pivot.nilai_praktik') }}</td>
      <td class="center aligned">
        <div class="ui icon mini buttons">
          <a href="{{ url('teacher/score/semester/detail/' . $course->id) }}" class="ui blue icon basic mini button"><i class="eye icon"></i></a>
        </div>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
<!-- /Semester score table -->

<div class="ui hidden divider"></div>
<!-- Midterm score table -->
<div class="ui grid">
  <div class="twelve wide column">
    <div class="ui teal big ribbon label">Nilai Bayangan</div>
  </div>
  <div class="four wide right aligned column">
    <a class="ui labeled icon compact teal button" href="{{ url('teacher/score/semester/add') }}">
      <i class="plus icon"></i>Tambah
    </a>
  </div>
</div>
<table class="ui structured selectable celled table" id="midterm-score">
  <thead class="center aligned">
  <tr>
    <th rowspan="2">Tahun Ajaran<i class="sort content ascending small icon" id="1"></i></th>
    <th rowspan="2">Semester<i class="sort content ascending small icon" id="5"></i></th>
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
  @foreach ($courses as $course)
    <tr>
      <td>{{ $course->kelas->year }}/{{ $course->kelas->year + 1 }}</td>
      <td class="center aligned">{{ $course->kelas->semester }}</td>
      <td>{{ $course->kelas->name }}</td>
      <td>{{ $course->name }}</td>
      <td class="center aligned">{{ $course->studentsBayangan->avg('pivot.nilai') }}</td>
      <td class="center aligned">{{ $course->studentsBayangan->avg('pivot.nilai_praktik') }}</td>
      <td class="center aligned">
        <div class="ui icon mini buttons">
          <a href="{{ url('teacher/score/bayangan/detail/' . $course->id) }}" class="ui blue icon basic mini button"><i class="eye icon"></i></a>
        </div>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
<!-- /Midterm score table -->
@endsection