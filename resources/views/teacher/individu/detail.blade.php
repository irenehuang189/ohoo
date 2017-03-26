@extends('layouts.teacher.two-column-content')

@section('title')
  Siti Nurjaenah
@endsection

@section('user-name')
  NAMA DI SINI
@endsection

@section('user-tid')
  187290 1271 9276
@endsection

@section('right-column')

<!-- Fields semester -->
<div id="semester">
  <div class="ui fluid vertical inverted menu">
    <a class="active teal item">Nilai Akademik</a>
    <a class="teal item">Ekstrakurikuler</a>
    <a class="teal item">Kehadiran/Kepribadian</a>
  </div>
  <div class="ui hidden section divider"></div>
  <div class="ui small form">
    <div class="field">
      <label>Kelas</label>
      <select class="ui dropdown" id="classes">
        <option selected value="$class->id">$class->name - Semester $class->semester</option>
      </select>
    </div>
    <div class="row">
      <button class="ui horizontal animated teal large fluid button show-report" tabindex="0">
        <div class="visible content">Search</div>
        <div class="hidden content">
          <i class="search icon"></i>
        </div>
      </button>
    </div>
  </div>
</div>
<!-- /Fields semester -->

<!-- Fields mid term -->
<div id="midterm">
  <div class="ui fluid vertical inverted menu">
    <a class="active teal item">Nilai Akademik</a>
    <a class="teal item">Ekstrakurikuler</a>
    <a class="teal item">Kehadiran/Kepribadian</a>
  </div>
  <div class="ui hidden section divider"></div>
  <div class="ui small form">
    <div class="field">
      <label>Kelas</label>
      <select class="ui dropdown" id="classes">
        <option selected value="$class->id">$class->name - Semester $class->semester</option>
      </select>
    </div>
    <div class="row">
      <button class="ui horizontal animated teal large fluid button show-report" tabindex="0">
        <div class="visible content">Search</div>
        <div class="hidden content">
          <i class="search icon"></i>
        </div>
      </button>
    </div>
  </div>
</div>
<!-- /Fields mid term -->

<!-- Fields rincian nilai -->
<div id="detail">
  <div class="ui small form">
    <div class="field">
      <label>Kelas</label>
      <select class="ui dropdown" id="choose-class">
        <option value="-1" disabled selected>-- Pilih Kelas --</option>
        <option value="$class->id" selected>$class->name - Semester $class->semester</option>
      </select>
    </div>
    <div class="field">
      <label>Mata Pelajaran</label>
      <select class="ui dropdown" id="choose-course">
        <option value="-1" disabled selected>-- Pilih Mata Pelajaran --</option>
        <option value="$course->id">$course->name</option>
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
</div>
<!-- /Fields rincian nilai -->
@endsection

@section('left-column')
<h2 class="ui dividing header">
  Nilai Individu
  <div class="sub header">Siti Nurjaenah / XI-IPA2</div>
</h2>
<div class="ui segment">
  <div class="ui pointing secondary teal menu">
    <a class="active item" data-tab="overview" id="overview">Overview</a>
    <a class="item" data-tab="semester" id="semester">Rapor Semester</a>
    <a class="item" data-tab="midterm" id="midterm">Rapor Bayangan</a>
    <a class="item" data-tab="detail" id="detail">Rincian Nilai</a>
  </div>
  
  @include('teacher.individu.overview')
  <div class="ui tab" data-tab="semester">
    semester
  </div>
  <div class="ui tab" data-tab="midterm">
    midterm
  </div>
  <div class="ui tab" data-tab="detail">
    semester
  </div>

</div>
@endsection