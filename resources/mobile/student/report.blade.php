@extends('layouts.student.two-column-content')

@section('title', 'Rapor Semester')

@section('user-name')
  {{ $student->name }}
@endsection

@section('right-column')
<div class="ui small form">
  <div class="field">
    <label>Kelas</label>
    <select class="ui dropdown" id="classes">
      @foreach($classes as $class)
        @if($class->id == $classId)
          <option selected value="{{ $class->id }}">{{ $class->name }} - Semester {{ $class->semester }}</option>
        @else
          <option value="{{ $class->id }}">{{ $class->name }} - Semester {{ $class->semester }}</option>
        @endif
      @endforeach
    </select>
  </div>
  <div class="row">
    @if($blank == 1)
    <button class="ui horizontal animated teal large fluid button show-report-blank" tabindex="0">
    @elseif($blank == 0)
    <button class="ui horizontal animated teal large fluid button show-report" tabindex="0">
    @endif
      <div class="visible content">Search</div>
      <div class="hidden content">
        <i class="search icon"></i>
      </div>
    </button>
  </div>
</div>
@endsection

@section('header-left-column', 'Rapor')

@section('left-column')
<!-- Isi Rapor -->
@if(count($courses) == 0)
  <div class="ui segment">
    Belum ada nilai
  </div>
@else
<div class="ui styled accordion segment">
  <div class="title active">
    Nilai Akademik
  </div>
  <div class="content active">
    <table class="ui single line very basic unstackable table">
      <thead class="center aligned">
        <tr>
          <th>Pelajaran</th>
          <th>Konsep</th>
          <th>Praktek</th>
          <th>Sikap</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 0; ?>
        @foreach($courses as $course)
        <?php $i++ ?>
        <tr class="center aligned">
          <td>{{ $course->name }}</td>
          <!-- Nilai Konsep -->
          @if($course->nilai < $course->skbm)
            <td class="negative center aligned">{{ $course->nilai }}</td>
          @else
            <td class="center aligned">{{ $course->nilai }}</td>
          @endif
          <!-- Nilai Praktek -->
          @if($course->nilai_praktik < $course->skbm)
            <td class="negative center aligned">{{ $course->nilai_praktik }}</td>
          @else
            <td class="center aligned">{{ $course->nilai_praktik }}</td>
          @endif

          <td class="center aligned">{{ $course->sikap }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="title">
    Ekstrakurikuler
  </div>
  <div class="content">

  </div>
  <div class="title">
    Ketidakhadiran/Kepribadian
  </div>
  <div class="content">

  </div>
</div>
@endif

@endsection