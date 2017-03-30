@extends('layouts.teacher.two-column-content')

@if (isset($task))
@section('title', 'Ubah Nilai Kelas')
@else
@section('title', 'Tambah Nilai Kelas')
@endif

@section('user-name')
  {{ $teacher->name }}
@endsection

@section('user-tid')
  {{ $teacher->registration_number }}
@endsection

{{ csrf_field() }}
@section('right-column')
<div class="ui hidden divider"></div>
<div class="row">
@if (isset($task))
  <a class="ui fluid right labeled icon teal button" id="edit-task-finish">
@else
  <a class="ui fluid right labeled icon teal button" id="add-task-finish">
@endif
    Simpan & Selesai<i class="save icon"></i>
  </a>
</div>
<div class="row">
@if (isset($task))
  <a class="ui fluid right labeled icon button" id="edit-task-continue">
@else
  <a class="ui fluid right labeled icon button" id="add-task-continue">
@endif
    Simpan & Lanjutkan<i class="pencil icon"></i>
  </a>
</div>
<div class="row">
  <button class="ui fluid right labeled icon red button" id="delete">
    Batal<i class="trash icon"></i>
  </button>
</div>
@endsection

@section('left-column')
<h2 class="ui dividing header">
@if (isset($task))
  Ubah Nilai
@else
  Tambah Nilai
@endif
</h2>
<div class="ui two steps" id="add-score">
  <a class="active step" id="exam">
    <i class="file text icon"></i>
    <div class="content">
      <div class="title">Rincian Penilaian</div>
    @if ($taskType == 'assignment')
    @if (isset($task))
      <div class="description">Ubah rincian tugas</div>
    @else
      <div class="description">Tambahkan rincian tugas</div>
    @endif
    @else
    @if (isset($task))
      <div class="description">Ubah rincian ujian/ulangan</div>
    @else
      <div class="description">Tambahkan rincian ujian/ulangan</div>
    @endif
    @endif
    </div>
  </a>
  <a class="step" id="score">
    <i class="child icon"></i>
    <div class="content">
      <div class="title">Nilai</div>
    @if (isset($task))
      <div class="description">Ubah nilai siswa</div>
    @else
      <div class="description">Masukan nilai siswa</div>
    @endif
    </div>
  </a>
</div>

<!-- Rincian Penilaian -->
<div class="ui grid" id="exam">
  <div class="ui hidden divider"></div>
  <div class="row">
    <div class="four wide column">Kelas</div>
    <div class="twelve wide column">
    @if (isset($task))
      <select class="ui fluid dropdown" id="choose-class-add" disabled>
        <option value="{{ $task->course->kelas->id }}" selected>{{ $task->course->kelas->name }}</option>
    @else
      <select class="ui fluid dropdown" id="choose-class-add">
        <option value="" selected>-- Pilih Kelas --</option>
      @foreach ($classes as $class)
        <option value="{{ $class->id }}">{{ $class->name }}</option>
      @endforeach
    @endif
      </select>
    </div>
  </div>
  <div class="row">
    <div class="four wide column">Mata Pelajaran</div>
    <div class="twelve wide column">
    @if (isset($task))
      <select class="ui fluid dropdown" id="choose-course-add" disabled>
        <option value="{{ $task->course->id }}" selected>{{ $task->course->name }}</option>
    @else
      <select class="ui fluid dropdown" id="choose-course-add">
        <option value="" selected>-- Pilih Mata Pelajaran --</option>
    @endif
      </select>
    </div>
  </div>
  <div class="row">
    <div class="four wide column">Jenis Penilaian</div>
    <div class="twelve wide column">
      <div class="ui fluid input">
      @if (isset($task))
        <input id="task-name" type="text" value="{{ $task->name }}" />
      @else
      @if ($taskType == "assignment")
        <input id="task-name" type="text" placeholder="Tugas Makalah" />
      @else
        <input id="task-name" type="text" placeholder="Ujian Tengah Semester" />
      @endif
      @endif
      </div>
    </div>
  </div>
  <div class="row">
    <div class="four wide column">Materi</div>
    <div class="twelve wide column">
      <div class="ui fluid input">
      @if (isset($task))
        <input id="task-matter" type="text" placeholder="Persamaan Linear" value="{{ $task->materi }}" />
      @else
        <input id="task-matter" type="text" placeholder="Persamaan Linear" />
      @endif
      </div>
    </div>
  </div>
  <div class="row">
    <div class="four wide column">Tanggal Pelaksanaan</div>
    <div class="twelve wide column">
    @if (isset($task))
      <div class="ui fluid input"><input id="task-date" type="date" value="{{ $task->tanggal }}" /></div>
    @else
      <div class="ui fluid input"><input id="task-date" type="date" value="{{ date('Y-m-d') }}" /></div>
    @endif
    </div>
  </div>
</div>
<!-- /Rincian Penilaian -->

<!-- Tabel Daftar Siswa -->
<div class="ui hidden divider"></div>
<div id="score">
  <div class="ui hidden divider"></div>
  <table class="ui striped very compact table">
    <thead class="center aligned"><tr>
      <th class="one wide">No.</th>
      <th>Nama Lengkap</th>
      <th class="two wide">Nilai</th>
    </tr></thead>
    <tbody id="student-list">
    @if (isset($task))
    @foreach ($task->students as $index => $student)
    @if (isset($task))
      <tr id="id-{{ $student->pivot->id }}">
    @else
      <tr id="id-{{ $student->id }}">
    @endif
        <td class="center aligned">{{ $index + 1 }}</td>
        <td>{{ $student->name }}</td>
        <td>
          <div class="ui input">
            <input type="number" placeholder="0" value="{{ $student->pivot->score }}" />
          </div>
        </td>
      </tr>
    @endforeach
    @endif
    </tbody>
  </table>
  <div class="ui hidden divider"></div>
</div>
<!-- /Tabel Daftar Siswa -->

<!-- Modal Hapus -->
<div class="ui basic modal">
  <div class="ui icon header">
    <i class="archive icon"></i>
    Apakah Anda yakin ingin menghapus?
  </div>
  <div class="content">
    <p>Data akan dihapus segera. Anda tidak dapat mengembalikan data yang telah dihapus.</p>
  </div>
  <div class="actions">
    <div class="ui basic cancel inverted button">
      <i class="remove icon"></i>
      Tidak
    </div>
    <a class="ui red ok inverted button" href="{{ Request::url() }}">
      <i class="checkmark icon"></i>
      Ya
    </a>
  </div>
</div>
<!-- /Modal Hapus -->

@endsection