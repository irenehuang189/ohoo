@extends('layouts.master')

@section('title', 'Statistik Nilai')

@section('user-name')
  {{ $student->name }}
@endsection

@section('content')
<div class="ui grid"> 
  <div class="one wide column"></div>
  <div class="fourteen wide column">
  <!-- Page Content -->
    <h2 class="ui header">Statistik Nilai</h2>

    <!-- Overview -->
    <div class="ui three column grid">
      <div class="column">
        <div class="ui fluid card">
          <div class="content">
            <div class="ui blue statistic">
              <div class="value">{{ round($averageScore) }}</div>
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
    <!-- /Overview -->

    <!-- Statistics -->
    <div class="ui two column grid">
      <div class="ui column">
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
      <div class="ui column">
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

    <!-- /Page Content -->
  </div>
</div>

@endsection


