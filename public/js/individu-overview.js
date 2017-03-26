// Statistics
var bgColor = [
  'rgba(75, 192, 192, 0.4)', // Green
  'rgba(255, 206, 86, 0.4)', // Yellow
  'rgba(255, 99, 132, 0.4)', // Pink
  'rgba(153, 102, 255, 0.4)', // Purple
  'rgba(54, 162, 235, 0.4)', // Blue
  'rgba(255, 159, 64, 0.4)', // Orange
  'rgba(75, 192, 192, 0.4)', // Green
  'rgba(255, 206, 86, 0.4)', // Yellow
  'rgba(255, 99, 132, 0.4)', // Pink
  'rgba(153, 102, 255, 0.4)', // Purple
  'rgba(54, 162, 235, 0.4)', // Blue
  'rgba(255, 159, 64, 0.4)' // Orange
];

var color = [
  'rgba(75, 192, 192, 1)', // Green
  'rgba(255, 206, 86, 1)', // Yellow
  'rgba(255, 99, 132, 1)', // Pink
  'rgba(153, 102, 255, 1)', // Purple
  'rgba(54, 162, 235, 1)', // Blue
  'rgba(255, 159, 64, 1)', // Orange
  'rgba(75, 192, 192, 0.4)', // Green
  'rgba(255, 206, 86, 0.4)', // Yellow
  'rgba(255, 99, 132, 0.4)', // Pink
  'rgba(153, 102, 255, 0.4)', // Purple
  'rgba(54, 162, 235, 0.4)', // Blue
  'rgba(255, 159, 64, 0.4)' // Orange
];

var options = {
  scales: {
    yAxes: [{
      ticks: {
        beginAtZero:true
      }
    }]
  },
  legend: {
    position: 'bottom',
  }
};

// Histori nilai keseluruhan
$.get("/student/getMeanStatistic", function (data, status){
  var nilai = [];
  var kelas = [];
  $.each(data, function(i, statistik) {
    nilai.push(statistik.avg);
    kelas.push(statistik.name + "-" + statistik.semester);
  });
  var meanScoreDataset = [{
    label: 'Nilai Rata-rata',
    data: nilai,
    backgroundColor: bgColor[3],
    borderColor: color[3],
  }];
  var meanScoreChart = new Chart($("#mean-score"), {
    type: 'line',
    data: {
      labels: kelas,
      datasets: meanScoreDataset
    },
    options: options
  });
});

// Histori peringkat kelas
$.get("/student/getRankStatistic", function (data, status){
  var rank = [];
  var kelas = [];
  $.each(data, function(i, statistik) {
    rank.push(statistik.rank);
    kelas.push(statistik.name + "-" + statistik.semester);
  });
  var rankDataset = [{
    label: 'Peringkat',
    data: rank,
    backgroundColor: fillArray([bgColor[2], bgColor[3]], 3),
    borderColor: fillArray([color[2], color[3]], 3),
    borderWidth: 2
  }];
  var meanScoreChart = new Chart($("#rank"), {
    type: 'bar',
    data: {
      labels: kelas,
      datasets: rankDataset
    },
    options: options
  });
});

// Statistik kemampuan siswa
$.get("/student/getCapabilityStatistic", function (data, status){
  var nilai = [];
  var courses = [];
  $.each(data, function(i, statistik) {
    nilai.push(statistik.avg);
    courses.push(statistik.name);
  });
  var skillDataset = [{
    label: 'Rata-rata Nilai',
    backgroundColor: bgColor[0],
    borderColor: color[0],
    pointBackgroundColor: color[0],
    pointBorderColor: "#fff",
    pointHoverBackgroundColor: bgColor[0],
    pointHoverBorderColor: color[0],
    data: nilai
  }];
  var skillChart = new Chart($("#skill"), {
    type: 'radar',
    data: {
      labels: courses,
      datasets: skillDataset
    },
    options: options
  });
});

// Histori nilai mata pelajaran
$("#histori-nilai").change(function(){
  var courses = [];
  $('#histori-nilai :selected').each(function(i, selected){
    courses[i] = $(selected).text();
  });
  var courses = JSON.stringify(courses);
  $.get("/student/getHistoryCoursesStatistic/" + courses, function (data, status){
    var tabNilai = [];
    var kelas = [];
    // $.each(data, function(i, statistik) {
    //   nilai.push(statistik.avg);
    //   kelas.push(statistik.name + "-" + statistik.semester);
    // });
    // var meanScoreDataset = [{
    //   label: 'Nilai Rata-rata',
    //   data: nilai,
    //   backgroundColor: bgColor[3],
    //   borderColor: color[3],
    // }];
    // var meanScoreChart = new Chart($("#mean-score"), {
    //   type: 'line',
    //   data: {
    //     labels: kelas,
    //     datasets: meanScoreDataset
    //   },
    //   options: options
    // });
  });

});

// histori nilai mata pelajaran
var scoreHistoryDataset = [{
  label: 'Matematika',
  data: [70, 0, 0, 76, 82, 90],
  fill: false,
  backgroundColor: bgColor[0],
  borderColor: color[0],
}, {
  label: 'Bahasa Indonesia',
  data: [80, 90, 87, 76, 63, 93],
  fill: false,
  backgroundColor: bgColor[1],
  borderColor: color[1],
}, {
  label: 'Fisika',
  data: [55, 72, 36, 80, 68, 75],
  fill: false,
  backgroundColor: bgColor[2],
  borderColor: color[2],
}];
var scoreHistoryChart = new Chart($("#score-history"), {
  type: 'line',
  data: {
    labels: ["X-I", "X-II", "XI-I", "XI-II", "XII-I", "XII-II"],
    datasets: scoreHistoryDataset
  },
  options: options
});

function fillArray(arr, times)
{
  var result = arr;
  for (var i = 0; i < times-1; i++) {
    result = result.concat(arr);
  };
  return result;
}
