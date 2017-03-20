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
        {{$student->name}}
        <div class="menu">
            <a class="item">Ubah Password</a>
            <a class="item" href="index.html">Logout</a>
        </div>
    </div>
</div>

<div class="ui bottom attached segment pushable">
    <div class="ui inverted left inline vertical thin sidebar menu">
        <a class="item" href="statistics.html">
            <i class="line chart icon"></i>
            Statistik Nilai
        </a>
        <a class="item" href="report.html">
            <i class="file text outline icon"></i>
            Rapor
        </a>
        <a class="item" href="detail-report.html">
            <i class="book outline icon"></i>
            Rincian Nilai
        </a>
    </div>
    <div class="pusher">
        <div class="ui basic segment">

            <!-- Page Content -->
            <h2 class="ui header"></h2>

            <!-- Filter -->
            <div class="ui segment">
                <div class="ui form">
                    <div class="fields">
                        <div class="field column">
                            <label>Kelas</label>
                            <select class="ui dropdown" id="classes">
                                @foreach($classes as $class)
                                    @if($class->id == $classId)
                                        <option selected value="{{ $class->id }}">{{ $class->name }} - Semester {{ $class->semester }}</option>
                                    @else
                                        <option value="{{ $class->id }}">{{ $class->name }} - Semester {{ $class->semester }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="field column">
                            @if($blank == 1)
                                <button class="ui vertical animated button show-report-blank" id="bottom-aligned" tabindex="0">
                            @elseif($blank == 0)
                                <button class="ui vertical animated button show-report" id="bottom-aligned" tabindex="0">
                            @endif
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
                <div class="ui attached tabular menu">
                    <a class="item active" data-tab="first">Nilai Akademik</a>
                    <a class="item" data-tab="second">Ekstrakurikuler</a>
                    <a class="item" data-tab="third">Ketidakhadiran/Kepribadian</a>
                </div>
                <div class="ui attached tab segment active" data-tab="first">
                    <!-- Score table -->
                    <table class="ui structured selectable celled table">
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
                    <!-- /Score table -->
                </div>
                <div class="ui attached tab segment" data-tab="second">
                    Second
                </div>
                <div class="ui attached tab segment" data-tab="third">
                    Third
                </div>
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
        $(".show-report-blank").click(function(){
            var classId = $("#classes :selected").val();
            window.location.href = 'report/' + classId;
        });
        $(".show-report").click(function(){
            var classId = $("#classes :selected").val();
            window.location.href = classId;
        });
    });
</script>


</body>
</html>

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
