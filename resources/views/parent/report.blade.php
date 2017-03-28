@extends('layouts.student.two-column-content')

@section('title', 'Rapor Semester')

@section('user-name')
  {{ $parent->name }}
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
<div class="ui attached tabular teal menu">
  <a class="item active" data-tab="first">Nilai Akademik</a>
  <a class="item" data-tab="second">Ekstrakurikuler</a>
  <a class="item" data-tab="third">Ketidakhadiran/Kepribadian</a>
</div>
<div class="ui attached tab segment active" data-tab="first">
  <!-- Score table -->
  @if(count($courses) == 0)
      Belum ada nilai
  @else
    <table class="ui structured selectable celled teal table">
      <thead class="center aligned">
      <tr>
        <th rowspan="3">No.</th>
        <th rowspan="3">Mata Pelajaran</th>
        <th rowspan="2">SKBM</th>
        <th colspan="5">Nilai Hasil Belajar</th>
        <th rowspan="3">Rata-rata<br />Kelas</th>
      </tr>
      <tr>
        <th colspan="2">Pengetahuan/Pemahaman Konsep</th>
        <th colspan="2">Praktek</th>
        <th>Sikap</th>
      </tr>
      <tr>
        <th>Angka</th>
        <th>Angka</th>
        <th>Huruf</th>
        <th>Angka</th>
        <th>Huruf</th>
        <th>Predikat</th>
      </tr>
      </thead>
      <tbody>
      <?php $i = 0; ?>
      @foreach($courses as $course)
        <?php $i++ ?>
        <tr>
          <td>{{ $i }}</td>
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
<div class="ui attached tab segment" data-tab="second">
  Second
</div>
<div class="ui attached tab segment" data-tab="third">
  Third
</div>
@endsection

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
