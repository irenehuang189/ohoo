<!DOCTYPE html>
<html>
<head>
  <title>Rapor Semester</title>

  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
  <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    
  <!-- Style -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/semantic.min.css') }}" />
</head>
<body>

<div class="ui container">
  <div class="ui grid">
    <div class="two wide column">
      <img src="{{ asset('images/school-logo.jpg') }}" class="ui fluid image">
    </div>
    <h2 class="fourteen wide column">
      LAPORAN HASIL BELAJAR PESERTA DIDIK<br/>
      SMA Bukit Asam
    </h2>
  </div>
  <div class="ui grid">
    <div class="three wide column">Nama</div>
    <div class="five wide column">: {{ $student->name }} </div>
    <div class="three wide column">Tahun Pelajaran</div>
    <div class="five wide column">: {{ $class->year }} / {{ $class->year+1 }}</div>
    <div class="three wide column">Nomor Induk</div>
    <div class="five wide column">: {{ $student->registration_number }}</div>
    <div class="three wide column">Kelas / Semester</div>
    <div class="five wide column">: {{ $class->name }} / {{ $class->semester }}</div>
  </div>

  <table class="ui structured celled table">
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

  <!-- Pengesahan -->
  <div class="ui equal width center aligned grid">
    <div class="column">
      Mengetahui,<br/>
      Orang Tua / Wali
      <div class="ui hidden section divider"></div>
      ..................................
    </div>
    <div class="column">
      Disahkan oleh:<br/>
      Kepala Sekolah
      <div class="ui hidden section divider"></div>
      Junio Lakamura, M.Pd.
    </div>
    <div class="column">
      Diberikan di Muara Enim, {{date('d-m-Y')}}<br/>
      Wali Kelas
      <div class="ui hidden section divider"></div>
      {{ $class->teacher->name }}
    </div>
  </div>
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

</body>
</html>