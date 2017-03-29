@extends('layouts.teacher.two-column-content')

@section('title', 'Performansi Individu')

@section('user-name')
  {{ $teacher->name }}
@endsection

@section('user-tid')
  {{ $teacher->registration_number }}
@endsection

@section('header-left-column')
  <i class="calculator icon"></i>Daftar Siswa
@endsection

@section('right-column')
<div class="ui small form">
  <div class="field">
    <label>Nama Siswa</label>
    <input type="text" placeholder="Masukan nama siswa.." id="searchName" onkeyup="searchTable()">
  </div>
</div>
@endsection

@section('left-column')
<h3 class="ui dividing header">
  Kelas X-1
</h3>

<!-- Tabel Daftar Siswa -->
<div class="ui two column centered grid">
  <div class="column">
<table class="ui selectable striped table" id="student_name">
  <thead class="center aligned"><tr>
    <th class="one wide">No.</th>
    <th class="three wide">No. Induk</th>
    <th>Nama Lengkap</th>
    <th></th>
  </tr></thead>
  <tbody>
    <?php $i = 0 ?>
    @foreach($students as $student)
      <?php $i++ ?>
      <tr class="center aligned">
        <td>{{ $i }}</td>
        <td>{{ $student->registration_number }}</td>
        <td>{{ $student->name }}</td>
        <td>
          <a href="{{ url('teacher/individu/detail/' . $student->id) }}" class="ui blue basic icon mini button"><i class="eye icon"></i></a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>
<!-- /Tabel Daftar Siswa -->

<script>
  function searchTable() {
    // Declare variables
    var input, filter, table, tr, td, i;
    input = document.getElementById("searchName");
    filter = input.value.toUpperCase();
    table = document.getElementById("student_name");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[2];
      if (td) {
        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
</script>

@endsection