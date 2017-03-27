@extends('layouts.master')

@section('title', 'Dashboard Nilai')

@section('user-name')
  NAMA DI SINI
@endsection

@section('user-tid')
  1209727
@endsection

@section('content')
<div class="ui grid" id="context"> 
  <div class="three wide column"></div>
  <div class="twelve wide column">
    <!-- Page Content -->
    <h2 class="ui header">Statistik Nilai</h2>

    <!-- Statistics -->
    <div class="ui two column grid">
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
                  <option value="">Semua</option>
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
      <div class="column">
        <div class="ui fluid card">
          <div class="content">
            <div class="header">Frekuensi Nilai pada Ujian/Ulangan/Tugas</div>
            <div class="meta">Per Rentang Nilai (0-10)</div>
          </div>
          <div class="content">
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
            <canvas id="score-frequency"></canvas>
          </div>
        </div>
      </div>
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
