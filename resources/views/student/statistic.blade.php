@extends('layouts.master')

@section('title', 'Rapor Semester')

@section('user-name')
  {{ $student->name }}
@endsection

@section('content')
<div class="ui grid" id="context"> 
  <div class="one wide column"></div>
  <div class="fourteen wide column">
  <!-- Page Content -->
    <h2 class="ui header">Statistik Nilai</h2>

    <!-- Statistics -->
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
    <div class="ui two column grid">
      <div class="column">
        <div class="ui fluid card">
          <div class="content">
            <div class="header">Histori Nilai Keseluruhan</div>
            <div class="meta">Per Semester</div>
          </div>
          <div class="content">
            <canvas id="mean-score"></canvas>
          </div>
        </div>
      </div>
      <div class="column">
        <div class="ui fluid card">
          <div class="content">
            <div class="header">Histori Peringkat Kelas</div>
            <div class="meta">Per Semester</div>
          </div>
          <div class="content">
            <canvas id="rank"></canvas>
          </div>
        </div>
      </div>
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
                <label>Mata Pelajaran</label>
                <select multiple="" class="ui dropdown">
                  <option value="">All</option>
                  <option value="AF">Bahasa Indonesia</option>
                  <option value="AX">Bahasa Iggris</option>
                  <option value="AL">Matematika</option>
                  <option value="AO">Fisika</option>
                  <option value="AI">Kimia</option>
                </select>
              </div>
            </div>
            <canvas id="score-history"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="ui grid">
      <div class="six wide column">
        <div class="ui fluid card">
          <div class="content">
            <div class="header">Kemampuan Siswa</div>
            <div class="meta">Per Mata Pelajaran</div>
          </div>
          <div class="content">
            <canvas id="skill"></canvas>
          </div>
        </div>
      </div>
    </div>
    <!-- /Statistics -->

    <!-- /Page Content -->
  </div>
</div>

@endsection


