// Statistics
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

// Histori nilai keseluruhan
var meanScoreDataset = [{
  label: 'Nilai Rata-rata',
  data: [90, 65, 72, 83, 62, 80],
  backgroundColor: bgColor[3],
  borderColor: color[3],
}];
var meanScoreChart = new Chart($("#mean-score"), {
  type: 'line',
  data: {
    labels: ["X-I", "X-II", "XI-I", "XI-II", "XII-I", "XII-II"],
    datasets: meanScoreDataset
  },
  options: options
});

// Histori peringkat kelas
var rankDataset = [{
  label: 'Peringkat',
  data: [10, 13, 7, 6, 15, 9],
  backgroundColor: fillArray([bgColor[2], bgColor[3]], 3),
  borderColor: fillArray([color[2], color[3]], 3),
  borderWidth: 2
}];
var meanScoreChart = new Chart($("#rank"), {
  type: 'bar',
  data: {
    labels: ["X-I", "X-II", "XI-I", "XI-II", "XII-I", "XII-II"],
    datasets: rankDataset
  },
  options: options
});

// Kemampuan siswa
var skillDataset = [{
    label: 'Rata-rata Nilai',
    backgroundColor: bgColor[0],
    borderColor: color[0],
    pointBackgroundColor: color[0],
    pointBorderColor: "#fff",
    pointHoverBackgroundColor: bgColor[0],
    pointHoverBorderColor: color[0],
    data: [67, 85, 54, 87, 72, 39, 28, 28, 93, 18, 54, 87, 72, 49]
}];
var skillChart = new Chart($("#skill"), {
  type: 'radar',
  data: {
    labels: ['Pendidikan Agama', 'Pendidikan Kewarganegaraan', 'Bahasa Indonesia', 'Bahasa Inggris', 'Matematika', 'Kesenian', 'Pendidikan Jasmani', 'Sejarah', 'Geografi', 'Ekonomi', 'Sosiologi', 'Fisika', 'Kimia', 'Biologi', 'TIK', 'Bahasa Mandarin'],
    datasets: skillDataset
  },
  options: options
});

// histori nilai mata pelajaran
var scoreHistoryDataset = [{
  label: 'Matematika',
  data: [70, 50, 35, 76, 82, 90],
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