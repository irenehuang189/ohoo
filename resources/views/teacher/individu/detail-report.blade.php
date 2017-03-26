<div class="ui tab" data-tab="detail">
@if($blank == 1)
  Anda belum memilih kelas dan mata pelajaran.
@elseif($blank == 0)
  <!-- Exam score table -->
  <h3 class="ui header">Nilai Ujian</h3>
  @if(count($exams) == 0)
    Tidak ada ujian
  @else
    <table class="ui structured selectable celled table">
      <thead class="center aligned">
      <tr>
        <th>Nama<i class="sort content ascending icon"></i></th>
        <th>Materi<i class="sort content ascending icon"></i></th>
        <th>Tanggal Pelaksanaan<i class="sort content ascending icon"></i></th>
        <th>Nilai<i class="sort content ascending icon"></i></th>
        <th>Rata-rata Kelas</th>
      </tr>
      </thead>
      <tbody>
      <?php $i = 0; ?>
      @foreach($exams as $exam)
        <?php $i++ ?>
        <tr>
          <td>{{ $exam->name }}</td>
          <td>{{ $exam->materi }}</td>
          <td>{{ $exam->tanggal }}</td>
          @if($exam->score >= $skbm)
            <td class="positive center aligned">
              {{ $exam->score }}<i class="smile icon"></i>
            </td>
          @else
            <td class="negative center aligned">
              {{ $exam->score }}<i class="frown icon"></i>
            </td>
          @endif
          <td class="center aligned">{{ round($exam_averages[$i - 1]->avg) }}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
  @endif
  <!-- /Exam score table -->
  <!-- Assignment score table -->
  <h3 class="ui header">Nilai Tugas</h3>
  @if(count($assignments) == 0)
    Tidak ada tugas
  @else
    <table class="ui structured selectable celled table">
      <thead class="center aligned">
      <tr>
        <th>Nama<i class="sort content ascending icon"></i></th>
        <th>Materi<i class="sort content ascending icon"></i></th>
        <th>Tanggal Pengumpulan<i class="sort content ascending icon"></i></th>
        <th>Nilai<i class="sort content ascending icon"></i></th>
        <th>Rata-rata Kelas</th>
      </tr>
      </thead>
      <tbody>
      <?php $i = 0; ?>
      @foreach($assignments as $assigment)
        <?php $i++; ?>
        <tr>
          <td>{{ $assigment->name }}</td>
          <td>{{ $assigment->materi }}</td>
          <td>{{ $assigment->tanggal }}</td>
          @if($assigment->score >= $skbm)
            <td class="positive center aligned">
              {{ $assigment->score }}<i class="smile icon"></i>
            </td>
          @else
            <td class="negative center aligned">
              {{ $assigment->score }}<i class="frown icon"></i>
            </td>
          @endif
          <td class="center aligned">{{ round($assignment_averages[$i - 1]->avg) }}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
  @endif
  <!-- /Assignment score table -->
@endif
</div>