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
            <h2 class="ui header">Rapor</h2>

            <!-- Filter -->
            <div class="ui segment">
                <div class="ui form">
                    <div class="fields">
                        <div class="field column">
                            <label>Kelas</label>
                            <select class="ui dropdown">
                                <option>Semua</option>
                                <option>Kelas X-1</option>
                                <option>Kelas XI-2</option>
                                <option>Kelas XII-2</option>
                            </select>
                        </div>
                        <div class="field column">
                            <label>Semester</label>
                            <select class="ui dropdown">
                                <option>Semua</option>
                                <option>Semester Ganjil</option>
                                <option>Semester Genap</option>
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
                        <tr>
                            <td>1.</td>
                            <td>Pendidikan Agama</td>
                            <td class="center aligned">75</td>
                            <td class="center aligned">100</td>
                            <td class="center aligned">Seratus</td>
                            <td class="center aligned">-</td>
                            <td class="center aligned">-</td>
                            <td class="center aligned">A</td>
                            <td class="center aligned">72</td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>Pendidikan Kewarganegaraan</td>
                            <td class="center aligned">70</td>
                            <td class="negative center aligned">60</td>
                            <td class="negative center aligned">Enam puluh</td>
                            <td class="center aligned">-</td>
                            <td class="center aligned">-</td>
                            <td class="center aligned">A</td>
                            <td class="center aligned">72</td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>Bahasa Indonesia</td>
                            <td class="center aligned">65</td>
                            <td class="center aligned">89</td>
                            <td class="center aligned">Delapan puluh sembilan</td>
                            <td class="center aligned">75</td>
                            <td class="center aligned">Tujuh puluh lima</td>
                            <td class="center aligned">AB</td>
                            <td class="center aligned">72</td>
                        </tr>
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
</body>
</html>