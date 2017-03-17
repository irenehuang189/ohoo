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
            <h2 class="ui header">Statistik Nilai</h2>

            <!-- Statistics -->
            <!-- Overview -->
            <div class="ui three column grid">
                <div class="column">
                    <div class="ui fluid card">
                        <div class="content">
                            <div class="ui blue statistic">
                                <div class="value">74</div>
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
                                <div class="value"><i class="trophy icon"></i> 13</div>
                                <div class="label">Peringkat</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Overview -->
            <div class="ui two column grid">
                <div class="column">
                    <div class="ui fluid card">
                        <div class="content">
                            <div class="header">Histori Nilai Keseluruhan</div>
                            <div class="meta">Per Semester</div>
                        </div>
                        <div class="content">
                            <canvas id="mean-score"></canvas>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="ui fluid card">
                        <div class="content">
                            <div class="header">Histori Peringkat Kelas</div>
                            <div class="meta">Per Semester</div>
                        </div>
                        <div class="content">
                            <canvas id="rank"></canvas>
                        </div>
                    </div>
                </div>
                <div class="column">
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
                                    <select multiple="" class="ui dropdown">
                                        <option value="">All</option>
                                        <option value="AF">Bahasa Indonesia</option>
                                        <option value="AX">Bahasa Iggris</option>
                                        <option value="AL">Matematika</option>
                                        <option value="AO">Fisika</option>
                                        <option value="AI">Kimia</option>
                                    </select>
                                </div>
                            </div>
                            <canvas id="score-history"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui grid">
                <div class="six wide column">
                    <div class="ui fluid card">
                        <div class="content">
                            <div class="header">Kemampuan Siswa</div>
                            <div class="meta">Per Mata Pelajaran</div>
                        </div>
                        <div class="content">
                            <canvas id="skill"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Statistics -->

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
<script src="../../script/student-chart.js"></script>
<script src="../../script/app.js"></script>
</body>
</html>