@extends('layouts.teacher.two-column-content')

@section('title')
{{ $student->name }}
@endsection

@section('user-name')
{{ $teacher->name }}
@endsection

@section('user-tid')
{{ $teacher->registration_number }}
@endsection

@section('right-column')

<!-- Fields rincian nilai -->
<div id="detail">
  <input value="{{  $student->id }}" id="student-id" hidden>
  <div class="ui small form">
    <div class="field">
      <label>Kelas</label>
      <select class="ui dropdown" id="choose-class">
        <option value="-1" disabled selected>-- Pilih Kelas --</option>
        @foreach($classes as $class)
          @if($class->id == $classId)
            <option value="{{ $class->id }}" selected>{{ $class->name }} - Semester {{  $class->semester }}</option>
          @else
            <option value="{{ $class->id }}">{{ $class->name }} - Semester {{  $class->semester }}</option>
          @endif
        @endforeach
      </select>
    </div>
    <div class="field">
      <label>Mata Pelajaran</label>
      <select class="ui dropdown" id="choose-course">
        <option value="-1" disabled selected>-- Pilih Mata Pelajaran --</option>
        @foreach($courses as $course)
          @if($course->id == $courseId)
            <option value="{{ $course->id }}" selected>{{ $course->name }}</option>
          @else
            <option value="{{ $course->id }}">{{ $course->name }}</option>
          @endif
        @endforeach
      </select>
    </div>
    <div class="row">
      @if($blank == 1)
        <button class="ui horizontal animated teal large fluid button show-individual-detailed-report-blank" tabindex="0">
      @elseif($blank == 0)
        <button class="ui horizontal animated teal large fluid button show-individual-detailed-report" tabindex="0">
      @endif
      <div class="visible content">Search</div>
      <div class="hidden content">
        <i class="search icon"></i>
      </div>
        </button>
    </div>
  </div>
</div>
    <!-- /Fields rincian nilai -->
@endsection

@section('left-column')
  <h2 class="ui dividing header">
    Nilai Individu
    <div class="sub header">{{ $student->name }}</div>
  </h2>
  <div class="ui segment">
    <div class="ui pointing secondary teal menu">
      <a class="item" id="overview" href="{{ url('teacher/individu/detail/' . $student->id) }}">Overview</a>
      <a class="item" id="semester" href="{{ url('teacher/individu/report/' . $student->id) }}">Rapor Semester</a>
      <a class="item" id="midterm" href="{{ url('teacher/individu/report-bayangan/' . $student->id) }}">Rapor Bayangan</a>
      <a class="item active" id="detail" href="{{ url('teacher/individu/detailed-report/' . $student->id) }}">Rincian Nilai</a>
    </div>

    <div class="ui tab active">
      <!-- Exam score table -->
      @if($blank == 1)
        Anda belum memilih kelas dan mata pelajaran.
      @elseif($blank == 0)
      <!-- Exam score table -->
        <h3 class="ui header">Nilai Ujian</h3>
        @if(count($exams) == 0)
          Tidak ada ujian
        @else
          <table class="ui structured selectable celled table" id="exam-score">
            <thead class="center aligned">
            <tr>
              <th>Nama<i class="sort content ascending small icon" id="1"></i></th>
              <th>Materi<i class="sort content ascending small icon" id="2"></i></th>
              <th>Tanggal Pelaksanaan<i class="sort content ascending small icon" id="3"></i></th>
              <th>Nilai<i class="sort content ascending small icon" id="4"></i></th>
              <th>Rata-rata Kelas</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 0; ?>
            @foreach($exams as $exam)
              <?php $i++ ?>
              <tr>
                <td>{{ $exam->name }}</td>
                <td>{{ $exam->materi }}</td>
                <td>{{ $exam->tanggal }}</td>
                @if($exam->score >= $skbm)
                  <td class="positive center aligned">
                    {{ $exam->score }}<i class="smile icon"></i>
                  </td>
                @else
                  <td class="negative center aligned">
                    {{ $exam->score }}<i class="frown icon"></i>
                  </td>
                @endif
                <td class="center aligned">{{ round($exam_averages[$i - 1]->avg) }}</td>
              </tr>
            @endforeach
            </tbody>
          </table>
          @endif
              <!-- /Exam score table -->
          <!-- Assignment score table -->
          <h3 class="ui header">Nilai Tugas</h3>
          @if(count($assignments) == 0)
            Tidak ada tugas
          @else
            <table class="ui structured selectable celled table" id="assignment-score">
              <thead class="center aligned">
              <tr>
                <th>Nama<i class="sort content ascending small icon" id="1"></i></th>
                <th>Materi<i class="sort content ascending small icon" id="2"></i></th>
                <th>Tanggal Pengumpulan<i class="sort content ascending small icon" id="3"></i></th>
                <th>Nilai<i class="sort content ascending small icon" id="4"></i></th>
                <th>Rata-rata Kelas</th>
              </tr>
              </thead>
              <tbody>
              <?php $i = 0; ?>
              @foreach($assignments as $assigment)
                <?php $i++; ?>
                <tr>
                  <td>{{ $assigment->name }}</td>
                  <td>{{ $assigment->materi }}</td>
                  <td>{{ $assigment->tanggal }}</td>
                  @if($assigment->score >= $skbm)
                    <td class="positive center aligned">
                      {{ $assigment->score }}<i class="smile icon"></i>
                    </td>
                  @else
                    <td class="negative center aligned">
                      {{ $assigment->score }}<i class="frown icon"></i>
                    </td>
                  @endif
                  <td class="center aligned">{{ round($assignment_averages[$i - 1]->avg) }}</td>
                </tr>
              @endforeach
              </tbody>
            </table>
          @endif
          <!-- /Assignment score table -->
        @endif
    <!-- /Modal edit nilai-->

  </div>
@endsection