<!DOCTYPE html>
<html>
<head>
    <title>ohoo</title>

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="../../semantic/dist/semantic.min.css" />
    <link rel="stylesheet" type="text/css" href="../../style/app.css" />
</head>
<body>
<div class="ui top attached borderless stackable grid menu">
    <a class="item" id="sidebar-trigger">
        <i class="sidebar icon"></i>
    </a>
    <div class="item">
        <img src="../../images/logo.png" />
    </div>
    <div class="three wide column"></div>
    <div class="eight wide column item">
        <div class="ui icon fluid input">
            <input type="text" placeholder="Search...">
            <i class="search icon"></i>
        </div>
    </div>
    <div class="ui right dropdown item">
        <i class="user icon"></i>
        Tom Hawk
        <div class="menu">
            <a class="item">Ubah Password</a>
            <a class="item" href="index.html">Logout</a>
        </div>
    </div>
</div>

<div class="ui bottom attached segment pushable">
    <div class="ui inverted left inline vertical thin sidebar menu">
        <a class="item" href="{{ url('student/statistic') }}">
            <i class="line chart icon"></i>
            Statistik Nilai
        </a>
        <a class="item" href="{{ url('student/report') }}">
            <i class="file text outline icon"></i>
            Rapor
        </a>
        <a class="item" href="{{ url('student/detailed-report') }}">
            <i class="book outline icon"></i>
            Rincian Nilai
        </a>
    </div>
    <div class="pusher">
        <div class="ui basic segment">

            <!-- Page Content -->
            <h2 class="ui header">Rincian Nilai</h2>

            <!-- Filter -->
            <div class="ui segment">
                <div class="ui form">
                    <div class="fields">
                        <div class="field column">
                            <label>Kelas</label>
                            <select class="ui dropdown" id="choose-class">
                                <option value="-1" disabled selected>-- Pilih Kelas --</option>
                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }} - Semester {{  $class->semester }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="field column">
                            <label>Mata Pelajaran</label>
                            <select class="ui dropdown" id="choose-course">
                                <option value="-1" disabled selected>-- Pilih Mata Pelajaran --</option>
                            </select>
                        </div>
                        <div class="field column">
                            <button class="ui vertical animated button" id="bottom-aligned" tabindex="0">
                                <div class="visible content">
                                    <i class="search icon"></i>
                                </div>
                                <div class="hidden content">Search</div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Filter -->

            <!-- Tab -->
            <div class="ui segment">
                @if($blank == 0)
                    Anda belum memilih kelas dan mata pelajaran.
                @elseif($blank == 1)
                    <!-- Score table -->
                    <h3 class="ui header">Nilai Ujian</h3>
                    <table class="ui structured selectable celled table">
                        <thead class="center aligned">
                        <tr>
                            <th>Jenis<i class="sort content ascending icon"></i></th>
                            <th>Materi<i class="sort content ascending icon"></i></th>
                            <th>Tanggal Pelaksanaan<i class="sort content ascending icon"></i></th>
                            <th>Nilai<i class="sort content ascending icon"></i></th>
                            <th>Rata-rata Kelas</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Ulangan Harian</td>
                            <td>Persamaan Linear</td>
                            <td>21/01/2017</td>
                            <td class="positive center aligned">
                                75<i class="smile icon"></i>
                            </td>
                            <td class="center aligned">45</td>
                        </tr>
                        <tr>
                            <td>PR</td>
                            <td>Persamaan Kuadrat</td>
                            <td>21/01/2017</td>
                            <td class="negative center aligned">
                                35<i class="frown icon"></i>
                            </td>
                            <td class="center aligned">45</td>
                        </tr>
                        <tr>
                            <td>Ulangan Tengah Semester</td>
                            <td>Aljabar & Geometri</td>
                            <td>21/01/2017</td>
                            <td class="warning center aligned">
                                45<i class="meh icon"></i>
                            </td>
                            <td class="center aligned">45</td>
                        </tr>
                        </tbody>

                    </table>

                    <!-- /Score table -->
                @endif
            </div>
            <div class="ui segment">
                @if($blank == 0)
                    Anda belum memilih kelas dan mata pelajaran.
                    @elseif($blank == 1)
                            <!-- Score table -->
                    <h3 class="ui header">Nilai Tugas</h3>
                    <table class="ui structured selectable celled table">
                        <thead class="center aligned">
                        <tr>
                            <th>Jenis<i class="sort content ascending icon"></i></th>
                            <th>Materi<i class="sort content ascending icon"></i></th>
                            <th>Tanggal Pelaksanaan<i class="sort content ascending icon"></i></th>
                            <th>Nilai<i class="sort content ascending icon"></i></th>
                            <th>Rata-rata Kelas</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Ulangan Harian</td>
                            <td>Persamaan Linear</td>
                            <td>21/01/2017</td>
                            <td class="positive center aligned">
                                75<i class="smile icon"></i>
                            </td>
                            <td class="center aligned">45</td>
                        </tr>
                        <tr>
                            <td>PR</td>
                            <td>Persamaan Kuadrat</td>
                            <td>21/01/2017</td>
                            <td class="negative center aligned">
                                35<i class="frown icon"></i>
                            </td>
                            <td class="center aligned">45</td>
                        </tr>
                        <tr>
                            <td>Ulangan Tengah Semester</td>
                            <td>Aljabar & Geometri</td>
                            <td>21/01/2017</td>
                            <td class="warning center aligned">
                                45<i class="meh icon"></i>
                            </td>
                            <td class="center aligned">45</td>
                        </tr>
                        </tbody>

                    </table>

                    <!-- /Score table -->
                @endif
            </div>
            <!-- /Tab -->

            <!-- /Page Content -->

        </div>
    </div>
</div>

<!-- Script -->
<script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
<script src="../../semantic/dist/semantic.min.js"></script>
<script src="../../script/Chart.bundle.min.js"></script>
<script src="../../script/app.js"></script>

<script>
    $(document).ready(function(){
        $("#choose-class").change(function(){
            var classId = $("#choose-class :selected").val();
            $('#choose-course').empty();
            $("#choose-course").prepend("<option value='-1' selected='selected' disabled>-- Pilih Mata Pelajaran --</option>");
            $.get("/student/getCoursesByClassId/" + classId, function (data, status){
                $.each(data, function(i, course) {
                    $('#choose-course').append($('<option>', {
                        value: course.id,
                        text: course.name
                    }));
                });
                $('#choose-course').prop('selectedIndex',-1);
            });
        });
    });
</script>

</body>
</html>