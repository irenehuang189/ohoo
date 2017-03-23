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
                                    @if($class->id == $classId)
                                        <option value="{{ $class->id }}" selected>{{ $class->name }} - Semester {{  $class->semester }}</option>
                                    @else
                                        <option value="{{ $class->id }}">{{ $class->name }} - Semester {{  $class->semester }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="field column">
                            <label>Mata Pelajaran</label>
                            <select class="ui dropdown" id="choose-course">
                                <option value="-1" disabled selected>-- Pilih Mata Pelajaran --</option>
                                @foreach($courses as $course)
                                    @if($course->id == $courseId)
                                        <option value="{{ $course->id }}" selected>{{ $course->name }}</option>
                                    @else
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="field column">
                            @if($blank == 1)
                                <button class="ui vertical animated button show-detailed-report-blank" id="bottom-aligned" tabindex="0">
                            @elseif($blank == 0)
                                <button class="ui vertical animated button show-detailed-report" id="bottom-aligned" tabindex="0">
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
                @if($blank == 1)
                    Anda belum memilih kelas dan mata pelajaran.
                @elseif($blank == 0)
                    <!-- Score table -->
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
                    <!-- /Score Ujian table -->
                @endif
            </div>
            @if($blank != 1)
                <div class="ui segment">
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
                </div>
            @endif
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
        $(".show-detailed-report-blank").click(function(){
            var classId = $("#choose-class :selected").val();
            var courseId = $("#choose-course :selected").val();
            window.location.href = 'detailed-report/' + classId + '/' + courseId;
        });
        $(".show-detailed-report").click(function(){
            var classId = $("#choose-class :selected").val();
            var courseId = $("#choose-course :selected").val();
            window.location.href = '/student/detailed-report/' + classId + '/' + courseId;
        });
    });
</script>

</body>
</html>