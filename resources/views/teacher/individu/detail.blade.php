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

@endsection

@section('left-column')
<h2 class="ui dividing header">
  Nilai Individu
  <div class="sub header">{{ $student->name }} / {{ $class->name }} - Sem. {{ $class->semester }}</div>
</h2>
<div class="ui segment">
  <div class="ui pointing secondary teal menu">
    <a class="item active" id="overview" href="{{ url('teacher/individu/detail/' . $student->id) }}">Overview</a>
    <a class="item" id="semester" href="{{ url('teacher/individu/report/' . $student->id) }}">Rapor Semester</a>
    <a class="item" id="midterm" href="{{ url('teacher/individu/report-bayangan/' . $student->id) }}">Rapor Bayangan</a>
    <a class="item" id="detail" href="{{ url('teacher/individu/detailed-report/' . $student->id) }}">Rincian Nilai</a>
  </div>

  <div class="ui active tab" data-tab="overview">
    <!-- Identity -->
    <input id="student-id" value="{{ $student->id }}" hidden>
    <div class="ui container grid">
      <div class="three wide column">
        Nama<br/>
        Nomor Induk<br/>
        Kelas<br/>
      </div>
      <div class="thirteen wide column">
        : {{ $student->name }}<br/>
        : {{ $student->registration_number }}<br/>
        : {{ $class->name }} - Sem. {{ $class->semester }}<br/>
      </div>
    </div>
    <!-- Overview Statistics -->
    <div class="ui three column center aligned grid">
      <div class="column">
        <div class="ui fluid card">
          <div class="content">
            <div class="ui blue statistic">
              <div class="value">{{ round($average)  }}</div>
              <div class="label">Rata-rata Nilai</div>
            </div>
          </div>
        </div>
      </div>
      <div class="column">
        <div class="ui fluid card">
          <div class="content">
            <div class="ui red statistic">
              <div class="value">{{ $nilaiMerah }}</div>
              <div class="label">Nilai Merah</div>
            </div>
          </div>
        </div>
      </div>
      <div class="column">
        <div class="ui fluid card">
          <div class="content">
            <div class="ui teal statistic">
              <div class="value"><i class="trophy icon"></i> {{ $rank }}</div>
              <div class="label">Peringkat</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Overview Statistics -->

    <!-- Statistics -->
    <div class="ui grid">
      <div class="column">
        <!-- Peta Kemampuan Siswa Card -->
        <div class="ui fluid card">
          <div class="content">
            <div class="header">Kemampuan Siswa</div>
            <div class="meta">Per Mata Pelajaran</div>
          </div>
          <div class="content">
            <canvas id="skill"></canvas>
          </div>
        </div>
        <!-- /Peta Kemampuan Siswa Card -->
      </div>
    </div>

    <div class="ui two column grid">
      <div class="column">
        <!-- Histori Nilai Keseluruhan Card -->
        <div class="ui fluid card">
          <div class="content">
            <div class="header">Histori Nilai Keseluruhan</div>
            <div class="meta">Per Semester</div>
          </div>
          <div class="content">
            <canvas id="mean-score"></canvas>
          </div>
        </div>
        <!-- /Histori Nilai Keseluruhan Card -->
      </div>
      <div class="column">
        <!-- Histori Peringkat Kelas Card -->
        <div class="ui fluid card">
          <div class="content">
            <div class="header">Histori Peringkat Kelas</div>
            <div class="meta">Per Semester</div>
          </div>
          <div class="content">
            <canvas id="rank"></canvas>
          </div>
        </div>
        <!-- /Histori Peringkat Kelas Card -->
      </div>
    </div>

  <div class="ui grid">
    <div class="column">
      <!-- Histori Nilai Mata Pelajaran Card -->
      <div class="ui fluid card">
        <div class="content">
          <div class="header">Histori Nilai Mata Pelajaran</div>
          <div class="meta">Per Semester</div>
        </div>
        <div class="content">
          <!-- Course selection -->
          <div class="ui form">
            <div class="inline field">
              <label>Mata Pelajaran</label>
              <select multiple="" class="ui dropdown " id="histori-nilai">
                <option value="">Pilih mata pelajaran</option>
                <?php $id = 0 ?>
                @foreach($courses as $course)
                  <option value={{ $id }}>{{ $course->name }}</option>
                  <?php $id++; ?>
                @endforeach
              </select>
            </div>
          </div>
          <canvas id="score-history"></canvas>
        </div>
      </div>
      <!-- /Histori Nilai Mata Pelajaran Card -->
    </div>
  </div>

  <!-- /Statistics -->
</div>

@section('js')
  <script src="{{ asset('js/individu-overview.js') }}"></script>
@endsection


</div>
@endsection