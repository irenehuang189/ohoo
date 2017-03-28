@extends('layouts.teacher.two-column-content')

@section('title')
{{ $student->name }}
@endsection

@section('user-name')
{{ $teacher->name }}
@endsection

@section('user-tid')
{{ $teacher->registration_number }}
@endsection

@section('right-column')

        <!-- Fields semester -->
{{--<div id="semester">--}}
{{--<div class="ui small form">--}}
{{--<div class="field">--}}
{{--<label>Kelas</label>--}}
{{--<select class="ui dropdown" id="classes">--}}
{{--<option selected value="$class->id">$class->name - Semester $class->semester</option>--}}
{{--</select>--}}
{{--</div>--}}
{{--<div class="row">--}}
{{--<button class="ui horizontal animated teal large fluid button show-report" tabindex="0">--}}
{{--<div class="visible content">Search</div>--}}
{{--<div class="hidden content">--}}
{{--<i class="search icon"></i>--}}
{{--</div>--}}
{{--</button>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
        <!-- /Fields semester -->

<!-- Fields mid term -->
{{--<div id="midterm">--}}
{{--<div class="ui fluid vertical inverted menu">--}}
{{--<a class="active teal item">Nilai Akademik</a>--}}
{{--<a class="teal item">Ekstrakurikuler</a>--}}
{{--<a class="teal item">Kehadiran/Kepribadian</a>--}}
{{--</div>--}}
{{--<div class="ui hidden section divider"></div>--}}
{{--<div class="ui small form">--}}
{{--<div class="field">--}}
{{--<label>Kelas</label>--}}
{{--<select class="ui dropdown" id="classes">--}}
{{--<option selected value="$class->id">$class->name - Semester $class->semester</option>--}}
{{--</select>--}}
{{--</div>--}}
{{--<div class="row">--}}
{{--<button class="ui horizontal animated teal large fluid button show-report" tabindex="0">--}}
{{--<div class="visible content">Search</div>--}}
{{--<div class="hidden content">--}}
{{--<i class="search icon"></i>--}}
{{--</div>--}}
{{--</button>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
        <!-- /Fields mid term -->

<!-- Fields rincian nilai -->
{{--<div id="detail">--}}
{{--<div class="ui small form">--}}
{{--<div class="field">--}}
{{--<label>Kelas</label>--}}
{{--<select class="ui dropdown" id="choose-class">--}}
{{--<option value="-1" disabled selected>-- Pilih Kelas --</option>--}}
{{--<option value="$class->id" selected>$class->name - Semester $class->semester</option>--}}
{{--</select>--}}
{{--</div>--}}
{{--<div class="field">--}}
{{--<label>Mata Pelajaran</label>--}}
{{--<select class="ui dropdown" id="choose-course">--}}
{{--<option value="-1" disabled selected>-- Pilih Mata Pelajaran --</option>--}}
{{--<option value="$course->id">$course->name</option>--}}
{{--</select>--}}
{{--</div>--}}
{{--<div class="row">--}}
{{--<button class="ui horizontal animated teal large fluid button show-detailed-report-blank" tabindex="0">--}}
{{--<div class="visible content">Search</div>--}}
{{--<div class="hidden content">--}}
{{--<i class="search icon"></i>--}}
{{--</div>--}}
{{--</button>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
        <!-- /Fields rincian nilai -->
@endsection

@section('left-column')
    <h2 class="ui dividing header">
        Nilai Individu
        <div class="sub header">{{ $student->name }} / {{ $class->name }} - Sem. {{ $class->semester }}</div>
    </h2>
    <div class="ui segment">
        <div class="ui pointing secondary teal menu">
            <a class="item" id="overview" href="{{ url('teacher/individu/detail/' . $student->id) }}">Overview</a>
            <a class="item" id="semester" href="{{ url('teacher/individu/report/' . $student->id) }}">Rapor Semester</a>
            <a class="item" id="midterm" href="{{ url('teacher/individu/report-bayangan/' . $student->id) }}">Rapor Bayangan</a>
            <a class="item active" id="detail" href="{{ url('teacher/individu/detailed-report/' . $student->id) }}">Rincian Nilai</a>
        </div>

        <div class="ui tab" data-tab="detail">
            <!-- Exam score table -->
            <h3 class="ui header">Nilai Ujian</h3>
            <table class="ui structured selectable celled table" id="exam-score">
                <thead class="center aligned">
                <tr>
                    <th>Kelas<i class="sort content ascending small icon" id="1"></i></th>
                    <th>Mata Pelajaran<i class="sort content ascending small icon" id="2"></i></th>
                    <th>Jenis<i class="sort content ascending small icon" id="3"></i></th>
                    <th>Materi<i class="sort content ascending small icon" id="4"></i></th>
                    <th>Tanggal Pelaksanaan<i class="sort content ascending small icon" id="5"></i></th>
                    <th>Nilai<i class="sort content ascending small icon" id="6"></i></th>
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
            <table class="ui structured selectable celled table" id="assignment-score">
                <thead class="center aligned">
                <tr>
                    <th>Kelas<i class="sort content ascending small icon" id="1"></i></th>
                    <th>Mata Pelajaran<i class="sort content ascending small icon" id="2"></i></th>
                    <th>Jenis<i class="sort content ascending small icon" id="3"></i></th>
                    <th>Materi<i class="sort content ascending small icon" id="4"></i></th>
                    <th>Tanggal Pengumpulan<i class="sort content ascending small icon" id="4"></i></th>
                    <th>Nilai<i class="sort content ascending small icon" id="5"></i></th>
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

    </div>
@endsection