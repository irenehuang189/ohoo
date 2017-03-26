<div class="ui tab" data-tab="semester">
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