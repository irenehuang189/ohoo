@extends('layouts.master')

@section('title', 'Dashboard Nilai')

@section('user-name')
  {{ $teacher->name }}
@endsection

@section('user-tid')
  {{ $teacher->registration_number }}
@endsection

@section('content')
<div class="ui grid" id="context"> 
  <div class="three wide column"></div>
  <div class="twelve wide column">
    <!-- Page Content -->
    <h2 class="ui header">Statistik Nilai</h2>

    <!-- Statistics -->
    <div class="ui one column grid">
      <div class="column">
        <div class="ui fluid card">
          <div class="content">
            <div class="header">Histori Nilai Mata Pelajaran</div>
            <div class="meta">Per Semester</div>
          </div>
          <div class="content">
            <!-- Course selection -->
            <div class="ui form">
              <div class="inline field">
                <label>Kelas</label>
                <select class="ui dropdown" id="choose-class-history">
                  @foreach($class_names as $name)
                    @if($name->id == $currentClassId)
                      <option value="{{ $name->id }}" selected>{{ $name->name }}</option>
                    @else
                      <option value="{{ $name->id }}">{{ $name->name }}</option>
                    @endif
                  @endforeach
                </select>
                <label>Mata Pelajaran</label>
                <select class="ui dropdown" id="choose-mapel-history">
                  @foreach($courses as $course)
                    @if($course->id == $currentCourseId)
                      <option value="{{ $course->id }}" selected>{{ $course->name }}</option>
                    @else
                      <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endif
                  @endforeach
                </select>
              </div>
            </div>
            <canvas id="score-history"></canvas>
          </div>
        </div>
      </div>
      {{--<div class="column">--}}
        {{--<div class="ui fluid card">--}}
          {{--<div class="content">--}}
            {{--<div class="header">Frekuensi Nilai pada Ujian/Ulangan/Tugas</div>--}}
            {{--<div class="meta">Per Rentang Nilai (0-10)</div>--}}
          {{--</div>--}}
          {{--<div class="content">--}}
            {{--<div class="ui form">--}}
              {{--<div class="fields">--}}
                {{--<div class="inline field">--}}
                  {{--<label>Mata Pelajaran</label>--}}
                  {{--<select class="ui dropdown">--}}
                    {{--<option>Semua</option>--}}
                    {{--<option>Bahasa Indonesia</option>--}}
                    {{--<option>Bahasa Iggris</option>--}}
                    {{--<option>Matematika</option>--}}
                    {{--<option>Fisika</option>--}}
                    {{--<option>Kimia</option>--}}
                  {{--</select>--}}
                {{--</div>--}}
              {{--</div>--}}
            {{--</div>--}}
            {{--<canvas id="score-frequency"></canvas>--}}
          {{--</div>--}}
        {{--</div>--}}
      {{--</div>--}}
    </div>
    <!-- /Statistics -->

    <!-- /Page Content -->
  </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/teacher-chart.js') }}"></script>
@endsection
