@extends('layouts.teacher.two-column-content')

@section('title', 'Nilai Individu')

@section('user-name')
  NAMA DI SINI
@endsection

@section('right-column')
@endsection

@section('header-left-column', 'Nilai Individu')

@section('left-column')
<div class="ui segment">
  <div class="ui pointing secondary menu">
    <a class="item active" data-tab="overview">Overview</a>
    <a class="item" data-tab="semester">Rapor Semester</a>
    <a class="item" data-tab="midterm">Rapor Bayangan</a>
    <a class="item" data-tab="detail">Rincian Nilai</a>
  </div>
  <!-- Overview -->
  <div class="ui active tab" data-tab="overview">
    <!-- Identity -->
    <div class="ui equal grid">
      <div class="three wide column">
        Nama<br />
        Nomor Induk<br />
        Kelas<br />
        Peringkat
      </div>
      <div class="thirteen wide column">
        : Siti Nurjaenah<br />
        : 13232<br/>
        : XI-IPA2<br />
        : 14
      </div>
    </div>

    <!-- Statistic -->
    <!-- /Statistic -->
  </div>
  <!-- /Overview -->

  <!-- Rapor Semester -->
  <div class="ui tab" data-tab="semester">
    rice no glory! A day without rice means we haven’t eat yet (although we already ate bread,
  </div>
  <!-- /Rapor Semester -->

  <!-- Rapor Bayangan -->
  <div class="ui tab" data-tab="midterm">
    rice no glory! A day without rice means we haven’t eat yet (although we already ate bread,
  </div>
  <!-- /Rapor Bayangan -->

  <!-- Rincian Nilai -->
  <div class="ui tab" data-tab="detail">
    rice no glory! A day without rice means we haven’t eat yet (although we already ate bread,
  </div>
  <!-- /Rincian Nilai -->
</div>
@endsection