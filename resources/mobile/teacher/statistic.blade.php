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
  <div class="column">
    <!-- Page Content -->
    <h3 class="ui teal header center aligned">
      <i class="line chart icon"></i>Statistik Nilai
    </h3>

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
                <br/>
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
      <div class="column">
        <div class="ui fluid card">
          <div class="content">
            <div class="header">Peringkat Kelas</div>
            <div class="meta">Per Kelas dan Angkatan</div>
          </div>
          <div class="content">
            <!-- Course selection -->
            <div class="ui form">
              <div class="fields">
                <div class="inline field">
                  <label>Mata Pelajaran</label>
                  <select class="ui dropdown">
                    <option>Semua</option>
                    <option>Bahasa Indonesia</option>
                    <option>Bahasa Iggris</option>
                    <option>Matematika</option>
                    <option>Fisika</option>
                    <option>Kimia</option>
                  </select>
                </div>
              </div>
            </div>
            <table class="ui celled table">
              <thead class="center aligned">
                <th>No. Induk</th>
                <th>Nama</th>
                <th>Peringkat</th>
              </thead>
              <tbody>
              <tr>
                <td>13231</td>
                <td>Eka Budianto</td>
                <td>1</td>
              </tr>
              <tr>
                <td>13221</td>
                <td>Julius Prawirawan</td>
                <td>2</td>
              </tr>
              <tr>
                <td>13201</td>
                <td>Eddy Kudo</td>
                <td>3</td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /Statistics -->

    <!-- /Page Content -->
  </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/teacher-chart.js') }}"></script>
@endsection
