$(document).ready(function(){
  // Semantic UI initialization
  $('.ui.sidebar')
    .sidebar({
      context: $('.bottom.segment'),
      dimPage: true,
      transition: 'overlay'
    })
    .sidebar('attach events', '#sidebar-trigger');

  $('.ui.menu .item').tab();
  $('.ui.dropdown').dropdown({on: 'hover'});

  // Statistics
  var bgColor = [
    'rgba(255, 99, 132, 0.2)',
    'rgba(54, 162, 235, 0.2)',
    'rgba(255, 206, 86, 0.2)',
    'rgba(75, 192, 192, 0.2)',
    'rgba(153, 102, 255, 0.2)',
    'rgba(255, 159, 64, 0.2)'
  ];
  var borderColor = [
    'rgba(255,99,132,1)',
    'rgba(54, 162, 235, 1)',
    'rgba(255, 206, 86, 1)',
    'rgba(75, 192, 192, 1)',
    'rgba(153, 102, 255, 1)',
    'rgba(255, 159, 64, 1)'
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

  // Score history chart
  var scoreHistoryDataset = [{
    label: 'Matematika',
    data: [70, 50, 35, 76, 82, 90],
    fill: false,
    backgroundColor: 'rgba(255, 99, 132, 0.2)',
    borderColor: 'rgba(255, 99, 132, 1)',
  }, {
    label: 'Bahasa Indonesia',
    data: [80, 90, 87, 76, 63, 93],
    fill: false,
    backgroundColor: 'rgba(54, 162, 235, 0.2)',
    borderColor: 'rgba(54, 162, 235, 1)',
  }, {
    label: 'Fisika',
    data: [55, 72, 36, 80, 68, 75],
    fill: false,
    backgroundColor: 'rgba(255, 206, 86, 0.2)',
    borderColor: 'rgba(255, 206, 86, 1)',
  }];
  var scoreHistoryChart = new Chart($("#score-history"), {
    type: 'line',
    data: {
      labels: ["X-I", "X-II", "XI-I", "XI-II", "XII-I", "XII-II"],
      datasets: scoreHistoryDataset
    },
    options: options
  });

  // Mean score chart
  var meanScoreDataset = [{
    label: 'Nilai Rata-rata',
    data: [90, 65, 72, 83, 62, 80],
    backgroundColor: 'rgba(255, 99, 132, 0.2)',
    borderColor: 'rgba(255, 99, 132, 1)',
  }];
  var meanScoreChart = new Chart($("#mean-score"), {
    type: 'line',
    data: {
      labels: ["X-I", "X-II", "XI-I", "XI-II", "XII-I", "XII-II"],
      datasets: meanScoreDataset
    },
    options: options
  });

  // Rank chart
  var rankDataset = [{
    label: 'Peringkat',
    data: [10, 13, 7, 6, 15, 9],
    backgroundColor: bgColor,
    borderColor: borderColor,
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

  // Student skill chart
  var skillDataset = [{
      label: 'Rata-rata Nilai',
      backgroundColor: "rgba(255,99,132,0.2)",
      borderColor: "rgba(255,99,132,1)",
      pointBackgroundColor: "rgba(255,99,132,1)",
      pointBorderColor: "#fff",
      pointHoverBackgroundColor: "#fff",
      pointHoverBorderColor: "rgba(255,99,132,1)",
      data: [67, 85, 54]
  }];
  var skillChart = new Chart($("#skill"), {
    type: 'radar',
    data: {
      labels: ['Pendidikan Agama', 'Pendidikan Kewarganegaraan', 'Bahasa Indonesia', 'Bahasa Inggris', 'Matematika', 'Kesenian', 'Pendidikan Jasmani', 'Sejarah', 'Geografi', 'Ekonomi', 'Sosiologi', 'Fisika', 'Kimia', 'Biologi', 'TIK', 'Bahasa Mandarin'],
      datasets: skillDataset
    }
  });
});