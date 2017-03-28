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
$.get("/parent/getMeanStatistic", function (data, status){
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
$.get("/parent/getRankStatistic", function (data, status){
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
$.get("/parent/getCapabilityStatistic", function (data, status){
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

var scoreHistoryChart;
// Histori nilai mata pelajaran
$("#histori-nilai").change(function(){
  var courses = [];
  $('#histori-nilai :selected').each(function(i, selected){
    courses[i] = $(selected).text();
  });
  var courses = JSON.stringify(courses);
  $.get("/parent/getHistoryCoursesStatistic/" + courses, function (data, status){
    var tabNilai = [];
    var kelas = [];
    var scoreHistoryDataset = [];
    var response = JSON.parse(data);
    var course_scores = response.course_scores;
    var classes = response.classes;
    for (var i=0; i<course_scores.length; i++) {
      var dataset = {
        label: course_scores[i].course_name,
        data: course_scores[i].scores,
        fill: false,
        backgroundColor: bgColor[i],
        borderColor: color[i]
      }
      scoreHistoryDataset.push(dataset);
    }
    var classNames = [];
    for (var i=0; i<classes.length; i++) {
      classNames.push(classes[i].name + "-" + classes[i].semester);
    }
    scoreHistoryChart = new Chart($("#score-history"), {
      type: 'line',
      data: {
        labels: classNames,
        datasets: scoreHistoryDataset
      },
      options: options
    });
  });

});

function fillArray(arr, times)
{
  var result = arr;
  for (var i = 0; i < times-1; i++) {
    result = result.concat(arr);
  };
  return result;
}
