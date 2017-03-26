<div class="ui tab" data-tab="detail">
  <!-- Exam score table -->
  <h3 class="ui header">Nilai Ujian</h3>
    <table class="ui structured selectable celled table">
      <thead class="center aligned">
      <tr>
        <th>Kelas<i class="sort content ascending small icon"></i></th>
        <th>Mata Pelajaran<i class="sort content ascending small icon"></i></th>
        <th>Jenis<i class="sort content ascending small icon"></i></th>
        <th>Materi<i class="sort content ascending small icon"></i></th>
        <th>Tanggal Pelaksanaan<i class="sort content ascending small icon"></i></th>
        <th>Nilai<i class="sort content ascending small icon"></i></th>
        <th>Rata-rata Kelas</th>
        <th></th>
      </tr>
      </thead>
      <tbody>
        <tr>
          <td>XI-IPA2</td>
          <td>Matematika</td>
          <td>[[ $exam->name ]]</td>
          <td>[[ $exam->materi ]]</td>
          <td>[[ $exam->tanggal ]]</td>
          <td class="positive center aligned">
            [[ $exam->score ]]
          </td>
          <td class="center aligned">87</td>
          <td class="center aligned">
            <a class="ui yellow basic icon mini button score-edit"><i class="pencil icon"></i></a>
          </td>
        </tr>
      </tbody>
    </table>
  <!-- /Exam score table -->
  <!-- Assignment score table -->
  <h3 class="ui header">Nilai Tugas</h3>
    <table class="ui structured selectable celled table">
      <thead class="center aligned">
      <tr>
        <th>Kelas<i class="sort content ascending small icon"></i></th>
        <th>Mata Pelajaran<i class="sort content ascending small icon"></i></th>
        <th>Jenis<i class="sort content ascending small icon"></i></th>
        <th>Materi<i class="sort content ascending small icon"></i></th>
        <th>Tanggal Pengumpulan<i class="sort content ascending small icon"></i></th>
        <th>Nilai<i class="sort content ascending small icon"></i></th>
        <th>Rata-rata Kelas</th>
        <th></th>
      </tr>
      </thead>
      <tbody>
        <tr>
          <td>XI-IPA2</td>
          <td>Matematika</td>
          <td>[[ $assigment->name ]]</td>
          <td>[[ $assigment->materi ]]</td>
          <td>[[ $assigment->tanggal ]]</td>
          <td class="negative center aligned">
            [[ $assigment->score ]]
          </td>
          <td class="center aligned">87</td>
          <td class="center aligned">
            <a class="ui yellow basic icon mini button score-edit"><i class="pencil icon"></i></a>
          </td>
        </tr>
      </tbody>
    </table>
  <!-- /Assignment score table -->
</div>

<!-- Modal edit nilai-->
<div class="ui small modal">
  <h3 class="ui header">
    Ubah Nilai
    <div class="sub header">Siti Nurjaenah / XI-IPA2</div>
  </h3>
  <div class="content">
    <div class="description">
      <div class="ui grid">
        <div class="four wide column">
          Jenis<br/>
          Materi<br/>
          Tanggal Pelaksanaan<br/>
          Nilai
        </div>
        <div class="nine wide column">
          : Ujian Tengah Semester<br/>
          : Persamaan Linear<br/>
          : 27-03-2017<br/>
          : <div class="ui small input">
            <input type="number" placeholder="0"/>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="actions">
    <div class="ui cancel button">Batal</div>
    <a class="ui ok teal button" href="{{ url('teacher/individu/detail') }}">OK</a>
  </div>
</div>
<!-- /Modal edit nilai-->