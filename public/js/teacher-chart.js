var bgColor = [
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
  'rgba(255, 159, 64, 1)' // Orange
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

// Statistik histori nilai
var scoreHistoryChart;
var classId = $("#choose-class-history :selected").val();
var courseName= $('#choose-mapel-history :selected').text();
$.get("/teacher/getHistoryStatistic/" + classId + "/" + courseName, function (data, status){
  var nilai = [];
  var tahun = [];
  $.each(data, function(i, statistik) {
    nilai.push(statistik.avg);
    tahun.push(statistik.year);
  });
  var scoreHistoryDataset = [{
    label: courseName,
    data: nilai,
    fill: false,
    backgroundColor: bgColor[0],
    borderColor: color[0],
  }];
  scoreHistoryChart = new Chart($("#score-history"), {
    type: 'line',
    data: {
      labels: tahun,
      datasets: scoreHistoryDataset
    },
    options: options
  });
});

$("#choose-class-history").change(function(){
    var classId = $("#choose-class-history :selected").val();
    $('#choose-mapel-history').empty();
    $("#choose-mapel-history").prepend("<option value='-1' selected='selected' disabled>-- Pilih Mata Pelajaran --</option>");
    $.get("/teacher/getCoursesByClassId/" + classId, function (data, status){
      $.each(data, function(i, course) {
        $('#choose-mapel-history').append($('<option>', {
          value: course.id,
          text: course.name
        }));
      });
    });
})

$("#choose-mapel-history").change(function(){
  var classId = $("#choose-class-history :selected").val();
  var courseName = $("#choose-mapel-history :selected").text();
  scoreHistoryChart.destroy();
  $.get("/teacher/getHistoryStatistic/" + classId + "/" + courseName, function (data, status) {
    var nilai = [];
    var tahun = [];
    $.each(data, function (i, statistik) {
      nilai.push(statistik.avg);
      tahun.push(statistik.year);
    });
    var scoreHistoryDataset = [{
      label: courseName,
      data: nilai,
      fill: false,
      backgroundColor: bgColor[0],
      borderColor: color[0],
    }];
    scoreHistoryChart = new Chart($("#score-history"), {
      type: 'line',
      data: {
        labels: tahun,
        datasets: scoreHistoryDataset
      },
      options: options
    });
  });
})

// Histori nilai mata pelajaran



// Frekuensi kemunculan nilai
// var freqDataset = [{
//   label: 'Frekuensi Kemunculan Nilai',
//   data: [10, 13, 7, 6, 15, 9, 3, 9, 12, 2],
//   backgroundColor: fillArray(bgColor, 2),
//   borderColor: fillArray(color, 2),
//   borderWidth: 2
// }];
// var freqScoreChart = new Chart($("#score-frequency"), {
//   type: 'bar',
//   data: {
//     labels: ["0-9", "10-19", "20-29", "30-39", "40-49", "50-59", "60-69", "70-79", "80-89", "90-100"],
//     datasets: freqDataset
//   },
//   options: options
// });

function fillArray(arr, times)
{
    var result = arr;
    for (var i = 0; i < times-1; i++) {
      result = result.concat(arr);
    };
    return result;
}