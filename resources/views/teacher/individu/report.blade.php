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

<!-- Fields semester -->
<div id="semester">
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
    <input value="{{ $student->id }}" id="student-id" hidden>
    <div class="row">
      @if($blank == 1)
        <button class="ui horizontal animated teal large fluid button show-individu-report-blank" tabindex="0">
      @elseif($blank == 0)
        <button class="ui horizontal animated teal large fluid button show-individu-report" tabindex="0">
          @endif
          <div class="visible content">Search</div>
          <div class="hidden content">
            <i class="search icon"></i>
          </div>
        </button>
    </div>
  </div>
</div>

@endsection

@section('left-column')
  <h2 class="ui dividing header">
    Nilai Individu
    <div class="sub header">{{ $student->name }} / {{ $class->name }} - Sem. {{ $class->semester }}</div>
  </h2>
  <div class="ui segment">
    <div class="ui pointing secondary teal menu">
      <a class="item" id="overview" href="{{ url('teacher/individu/detail/' . $student->id) }}">Overview</a>
      <a class="item active" id="semester" href="{{ url('teacher/individu/report/' . $student->id) }}">Rapor Semester</a>
      <a class="item" id="midterm" href="{{ url('teacher/individu/report-bayangan/' . $student->id) }}">Rapor Bayangan</a>
      <a class="item" id="detail" href="{{ url('teacher/individu/detailed-report/' . $student->id) }}">Rincian Nilai</a>
    </div>

    <div class="ui active tab">
      <!-- Score table -->
      @if(count($courses) == 0)
        Belum ada nilai
      @else
        <table class="ui structured selectable celled teal compact table">
          <thead class="center aligned">
          <tr>
            <th rowspan="3" class="one wide">No.</th>
            <th rowspan="3" class="four wide">Mata Pelajaran</th>
            <th rowspan="2">SKBM</th>
            <th colspan="5">Nilai Hasil Belajar</th>
            <th rowspan="3" class="one wide">Rata-rata Kelas</th>
          </tr>
          <tr>
            <th colspan="2">Pengetahuan/<br/>Pemahaman Konsep</th>
            <th colspan="2">Praktek</th>
            <th>Sikap</th>
          </tr>
          <tr>
            <th class="one wide">Angka</th>
            <th class="one wide">Angka</th>
            <th class="three wide">Huruf</th>
            <th class="one wide">Angka</th>
            <th class="three wide">Huruf</th>
            <th class="one wide">Predikat</th>
          </tr>
          </thead>
          <tbody>
          <?php $i = 0; ?>
          @foreach($courses as $course)
            <?php $i++ ?>
            <tr>
              <td class="center aligned">{{ $i }}</td>
              <td>{{ $course->name }}</td>
              <td class="center aligned">{{ $course->skbm }}</td>
              @if($course->nilai < $course->skbm)
                <td class="negative center aligned">{{ $course->nilai }}</td>
                <td class="negative center aligned">{{ Terbilang($course->nilai) }}</td>
              @else
                <td class="center aligned">{{ $course->nilai }}</td>
                <td class="center aligned">{{ Terbilang($course->nilai) }}</td>
              @endif
              @if($course->nilai_praktik < $course->skbm)
                <td class="negative center aligned">{{ $course->nilai_praktik }}</td>
                <td class="negative center aligned">{{ Terbilang($course->nilai_praktik) }}</td>
              @else
                <td class="center aligned">{{ $course->nilai_praktik }}</td>
                <td class="center aligned">{{ Terbilang($course->nilai_praktik) }}</td>
              @endif
              <td class="center aligned">{{ $course->sikap }}</td>
              <td class="center aligned">{{ round($averages[$i - 1]->avg) }}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
        @endif
            <!-- /Score table -->

    </div>

    <!-- Fungsi php -->
    <?php
    function Terbilang($x)
    {
      $abil = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
      if ($x < 12)
        return " " . $abil[$x];
      elseif ($x < 20)
        return Terbilang($x - 10) . "Belas";
      elseif ($x < 100)
        return Terbilang($x / 10) . " Puluh" . Terbilang($x % 10);
      elseif ($x < 200)
        return " Seratus" . Terbilang($x - 100);
    }
    ?>

  </div>
@endsection