<div class="ui active tab" data-tab="overview">
  <!-- Identity -->
  <div class="ui container grid">
    <div class="three wide column">
      Nama<br />
      Nomor Induk<br />
      Kelas<br />
    </div>
    <div class="thirteen wide column">
      : Siti Nurjaenah<br />
      : 13232<br/>
      : XI-IPA2<br />
    </div>
  </div>

  <!-- Overview Statistics -->
  <div class="ui three column center aligned grid">
    <div class="column">
      <div class="ui fluid card">
        <div class="content">
          <div class="ui blue statistic">
            <div class="value">80</div>
            <div class="label">Rata-rata Nilai</div>
          </div>
        </div>
      </div>
    </div>
    <div class="column">
      <div class="ui fluid card">
        <div class="content">
          <div class="ui red statistic">
            <div class="value">3</div>
            <div class="label">Nilai Merah</div>
          </div>
        </div>
      </div>
    </div>
    <div class="column">
      <div class="ui fluid card">
        <div class="content">
          <div class="ui teal statistic">
            <div class="value"><i class="trophy icon"></i> 3</div>
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
                <option value=""></option>
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
