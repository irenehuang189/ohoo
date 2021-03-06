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
  $('.ui.sticky').sticky({
    context: '#context'
  });
  $('.ui.accordion').accordion();

  // Edit password form popup
  $('input.popup').popup({
    on      : 'focus',
    position: 'right center'
  });

  // Before delete modal
  $('#delete').click(function(){
    $('.ui.basic.modal').modal({blurring: true}).modal('show');
  });

  // Before delete modal
  // Score management delete from teacher/score
  $('.exam-delete').click(function(){
    var examId = $(this).attr('id');
    $('.ui.basic.modal').modal({blurring: true}).modal('show');
    $('#delete-task').click(function(){
      $.get('/teacher/score/exam/delete/' + examId, function(data, status){
        var baseUrl = window.location.protocol + "//" + window.location.host;
        window.location.href = baseUrl + '/' + data;
      });
    });
  });
  $('.assignment-delete').click(function(){
    var assignmentId = $(this).attr('id');
    $('.ui.basic.modal').modal({blurring: true}).modal('show');
    $('#delete-task').click(function(){
      $.get('/teacher/score/assignment/delete/' + assignmentId, function(data, status){
        var baseUrl = window.location.protocol + "//" + window.location.host;
        window.location.href = baseUrl + '/' + data;
      });
    });
  });

  // Sort table
  $('i.ascending.icon').click(function(){
    var id = $(this).attr('id');
    var tableId = $(this).parents('table').attr('id');
    sortTable(id, tableId);
  });

  // Login page
  $('#login-role a').css({
    'color': 'grey'
  });
  $('#login-role a').click(function(){
    // Reset CSS
    $('#login-role a img').css({
      'border': 'none'
    });
    $('#login-role a').css({
      'color': 'grey'
    });

    // Add CSS to selected
    $(this).find('img').css({
      'border':'5px solid #47B7B3',
      'border-radius': '100%'
    });
    $(this).css({
      'color': '#47B7B3'
    });
  });

  // Report page ajax
  $(".show-report-blank").click(function(){
    var classId = $("#classes :selected").val();
    window.location.href = 'report/' + classId;
  });
  $(".show-report").click(function(){
    var classId = $("#classes :selected").val();
    window.location.href = classId;
  });

  // Report page ajax
  $(".show-individu-report-blank").click(function(){
    var classId = $("#classes :selected").val();
    var studentId = $("#student-id").val();
    var baseUrl = window.location.protocol + "//" + window.location.host;
    window.location.href = baseUrl + "/teacher/individu/report/" + studentId + '/' + classId;
  });
  $(".show-individu-report").click(function(){
    var classId = $("#classes :selected").val();
    var studentId = $("#student-id").val();
    var baseUrl = window.location.protocol + "//" + window.location.host;
    window.location.href = baseUrl + "/teacher/individu/report/" + studentId + '/' + classId;
  });

  // Report bayangan page
  $(".show-report-bayangan-blank").click(function(){
    var classId = $("#classes :selected").val();
    window.location.href = 'report-bayangan/' + classId;
  });
  $(".show-report-bayangan").click(function(){
    var classId = $("#classes :selected").val();
    window.location.href = classId;
  });

  studentId = $("#student-id").val();
  $(".show-individual-report-bayangan-blank").click(function(){
    var classId = $("#classes :selected").val();
    var baseUrl = window.location.protocol + "//" + window.location.host;
    window.location.href = baseUrl + "/teacher/individu/report-bayangan/" + studentId + '/' + classId;
  });
  $(".show-individual-report-bayangan").click(function(){
    var classId = $("#classes :selected").val();
    var baseUrl = window.location.protocol + "//" + window.location.host;
    window.location.href = baseUrl + "/teacher/individu/report-bayangan/" + studentId + '/' + classId;
  });

  // Detailed report page ajax
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

  studentId = $("#student-id").val();
  $(".show-individual-detailed-report-blank").click(function(){
    var classId = $("#choose-class :selected").val();
    var courseId = $("#choose-course :selected").val();
    var baseUrl = window.location.protocol + "//" + window.location.host;
    window.location.href = baseUrl + "/teacher/individu/detailed-report/" + studentId + '/' + classId + '/' + courseId;
  });
  $(".show-individual-detailed-report").click(function(){
    var classId = $("#choose-class :selected").val();
    var courseId = $("#choose-course :selected").val();
    var baseUrl = window.location.protocol + "//" + window.location.host;
    window.location.href = baseUrl + "/teacher/individu/detailed-report/" + studentId + '/' + classId + '/' + courseId;
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

  // Teacher score management page ajax
  $(".show-score").click(function(){
    var classId = $("#choose-class-teacher :selected").val();
    var courseId = $("#choose-course-teacher :selected").val();
    if (classId < 1 && courseId < 1) {
      window.location.href = 'score';
    } else if (classId >= 1 && courseId < 1) {
      window.location.href = 'score?class=' + classId;
    } else if (classId < 1 && courseId >= 1) {
      window.location.href = 'score?course=' + courseId;
    } else {
      window.location.href = 'score?class=' + classId + '&course=' + courseId;
    }
  });
  $(".show-final").click(function(){
    var classId = $("#choose-class-teacher :selected").val();
    var courseId = $("#choose-course-teacher :selected").val();
    if (classId < 1 && courseId < 1) {
      window.location.href = 'final';
    } else if (classId >= 1 && courseId < 1) {
      window.location.href = 'final?class=' + classId;
    } else if (classId < 1 && courseId >= 1) {
      window.location.href = 'final?course=' + courseId;
    } else {
      window.location.href = 'final?class=' + classId + '&course=' + courseId;
    }
  });

  $("#choose-class-teacher").change(function(){
    $('#choose-course-teacher').empty();
    $("#choose-course-teacher").prepend("<option value='-1' selected='selected'>Semua</option>").change();
    var classId = $("#choose-class-teacher :selected").val();
    if (classId >= 1) {
      var baseUrl = window.location.protocol + "//" + window.location.host;
      var url = baseUrl + "/teacher/courses/" + classId;
      $.get(url, function (data, status){
        $.each(data, function(i, course) {
          $('#choose-course-teacher').append($('<option>', {
            value: course.id,
            text: course.name
          }));
        });
      });
    }
  });

  // Teacher score management: add page
  $('div#score').hide();
  $('div#attitude').hide();
  $('.steps#add-score .step').click(function(){
    $(this).addClass('active');
    var id = $(this).attr('id');
    if(id == 'exam'){
      $('#score').removeClass('active');
      $('#attitude').removeClass('active');
      $('div#score').hide();
      $('div#attitude').hide();
      $('div#exam').show();
    } else if(id == 'score'){
      $('#exam').removeClass('active');
      $('#attitude').removeClass('active');
      $('div#exam').hide();
      $('div#attitude').hide();
      $('div#score').show();
      // TODO: Panggil ajax buat daftar siswa di sini
      $('#student-list-review').empty();
      var classId = $("#choose-class-final").val();
      var courseId = $("#choose-course-final").val();
      var endtermPercent = $("#endterm-exam").val();
      var midtermPercent = $("#midterm-exam").val();
      var dailyPercent = $("#daily-exam").val();
      var assignPercent = $("#assignment").val();
      var scoreStatus = "semester";
      var object = new Object();
      object.classId = classId;
      object.courseId = courseId;
      object.endtermPercent = endtermPercent;
      object.midtermPercent = midtermPercent;
      object.dailyPercent = dailyPercent;
      object.assignPercent = assignPercent;
      var data = JSON.stringify(object);
      var baseUrl = window.location.protocol + "//" + window.location.host;
      var url = baseUrl + '/teacher/scores/semester';
      $.ajax({
        type: 'POST',
        url: url,
        data: data,
        success: function (data) {
          data = JSON.parse(data);
          $.each(data, function (i, object) {
            $('#student-list-review').append($('<tr>', {
              id: "id-" + object.studentId
            }).append($('<td>', {
                class: "center aligned",
                text: i + 1
              }))
              .append($('<td>', {
                class: "center aligned",
                text: object.studentReg
              }))
              .append($('<td>', {
                text: object.studentName
              }))
              .append($('<td>', {
                class: "center aligned",
                id: "final-concept",
                text: object.finalConcept
              }))
              .append($('<td>', {
                class: "center aligned",
                text: object.finalConcept
              }))
            );
          });
        }
      });
    } else if(id == 'attitude'){
      $('#exam').removeClass('active');
      $('#score').removeClass('active');
      $('div#exam').hide();
      $('div#score').hide();
      $('div#attitude').show();
    }
  });
  $("#choose-class-add").change(function(){
    $('#choose-course-add').empty();
    $("#choose-course-add").prepend("<option value='' selected='selected'>Pilih Mata Pelajaran</option>").change();
    $('#student-list').empty();
    var classId = $("#choose-class-add :selected").val();
    if (classId >= 1) {
      var baseUrl = window.location.protocol + "//" + window.location.host;
      var url = baseUrl + "/teacher/courses/" + classId;
      $.get(url, function (data, status){
        $.each(data, function(i, course) {
          $('#choose-course-add').append($('<option>', {
            value: course.id,
            text: course.name
          }));
        });
      });
      url = baseUrl + "/teacher/students/" + classId;
      $.get(url, function (data, status) {
        $.each(data, function (i, student) {
          $('#student-list').append($('<tr>', {
            id: "id-" + student.id
          }).append($('<td>', {
              class: "center aligned",
              text: i + 1
            }))
            .append($('<td>', {
              text: student.name
            }))
            .append($('<td>')
              .append($('<div>', {
                class: "ui input"
              }).append("<input id= 'student-score' type='number' placeholder='0' />"))
            )
          );
        });
      });
    }
  });
  $("#choose-class-final").change(function(){
    $('#choose-course-final').empty();
    $("#choose-course-final").prepend("<option value='' selected='selected'>Pilih Mata Pelajaran</option>").change();
    $('#student-list-review').empty();
    $('#student-list-affective').empty();
    var classId = $("#choose-class-final :selected").val();
    if (classId >= 1) {
      var baseUrl = window.location.protocol + "//" + window.location.host;
      var url = baseUrl + "/teacher/courses/" + classId;
      $.get(url, function (data, status){
        $.each(data, function(i, course) {
          $('#choose-course-final').append($('<option>', {
            value: course.id,
            text: course.name
          }));
        });
      });
    }
  });
  $("#add-task-finish").click(function() {
    var classId = $("#choose-class-add").val();
    var courseId = $("#choose-course-add").val();
    var taskName = $("#task-name").val();
    var taskMatter = $("#task-matter").val();
    var taskDate = $("#task-date").val();
    var taskStatus = "finish";
    var studentIds = [];
    var studentScores = [];
    $("#student-list tr").each(function () {
      studentIds.push($(this).attr("id").split("-")[1]);
      studentScores.push($(this).find("input").val());
    });
    var object = new Object();
    object.classId = classId;
    object.courseId = courseId;
    object.taskName = taskName;
    object.taskMatter = taskMatter;
    object.taskDate = taskDate;
    object.taskStatus = taskStatus;
    object.studentIds = studentIds;
    object.studentScores = studentScores;
    var data = JSON.stringify(object);
    var baseUrl = window.location.protocol + "//" + window.location.host;
    var url = baseUrl + window.location.pathname;
    $.ajax({
      type: 'POST',
      url: url,
      data: data,
      success: function (data) {
        window.location.href = data;
      }
    });
  });
  $("#add-task-continue").click(function() {
    var classId = $("#choose-class-add").val();
    var courseId = $("#choose-course-add").val();
    var taskName = $("#task-name").val();
    var taskMatter = $("#task-matter").val();
    var taskDate = $("#task-date").val();
    var taskStatus = "continue";
    var studentIds = [];
    var studentScores = [];
    $("#student-list tr").each(function () {
      studentIds.push($(this).attr("id").split("-")[1]);
      studentScores.push($(this).find("input").val());
    });
    var object = new Object();
    object.classId = classId;
    object.courseId = courseId;
    object.taskName = taskName;
    object.taskMatter = taskMatter;
    object.taskDate = taskDate;
    object.taskStatus = taskStatus;
    object.studentIds = studentIds;
    object.studentScores = studentScores;
    var data = JSON.stringify(object);
    var baseUrl = window.location.protocol + "//" + window.location.host;
    var url = baseUrl + window.location.pathname;
    $.ajax({
      type: 'POST',
      url: url,
      data: data,
      success: function (data) {
        window.location.href = data;
      }
    });
  });
  $("#add-final").click(function() {
    var classId = $("#choose-class-final").val();
    var courseId = $("#choose-course-final").val();
    var endtermPercent = $("#endterm-exam").val();
    var midtermPercent = $("#midterm-exam").val();
    var dailyPercent = $("#daily-exam").val();
    var assignPercent = $("#assignment").val();
    var studentIds = [];
    var studentScores = [];
    $("#student-list-review tr").each(function () {
      studentIds.push($(this).attr("id").split("-")[1]);
      studentScores.push($(this).find("#final-concept").html());
    });
    var object = new Object();
    object.classId = classId;
    object.courseId = courseId;
    object.endtermPercent = endtermPercent;
    object.midtermPercent = midtermPercent;
    object.dailyPercent = dailyPercent;
    object.assignPercent = assignPercent;
    object.studentIds = studentIds;
    object.studentScores = studentScores;
    var data = JSON.stringify(object);
    var baseUrl = window.location.protocol + "//" + window.location.host;
    var url = baseUrl + window.location.pathname;
    console.log(url);
    $.ajax({
      type: 'POST',
      url: url,
      data: data,
      success: function (data) {
        window.location.href = data;
      }
    });
  });
  $("#edit-task-finish").click(function() {
    var courseId = $("#choose-course-add").val();
    var taskId = window.location.pathname.split('/').pop();
    var taskName = $("#task-name").val();
    var taskMatter = $("#task-matter").val();
    var taskDate = $("#task-date").val();
    var taskStatus = "finish";
    var taskScoreIds = [];
    var studentScores = [];
    $("#student-list tr").each(function () {
      taskScoreIds.push($(this).attr("id").split("-")[1]);
      studentScores.push($(this).find("input").val());
    });
    var object = new Object();
    object.courseId = courseId;
    object.taskId = taskId;
    object.taskName = taskName;
    object.taskMatter = taskMatter;
    object.taskDate = taskDate;
    object.taskStatus = taskStatus;
    object.taskScoreIds = taskScoreIds;
    object.studentScores = studentScores;
    var data = JSON.stringify(object);
    var baseUrl = window.location.protocol + "//" + window.location.host;
    var pathName = window.location.pathname.split('/');
    pathName.pop();
    pathName = pathName.join('/');
    var url = baseUrl + pathName;
    $.ajax({
      type: 'POST',
      url: url,
      data: data,
      success: function (data) {
        window.location.href = data;
      }
    });
  });
  $("#edit-task-continue").click(function() {
    var courseId = $("#choose-course-add").val();
    var taskId = window.location.pathname.split('/').pop();
    var taskName = $("#task-name").val();
    var taskMatter = $("#task-matter").val();
    var taskDate = $("#task-date").val();
    var taskStatus = "continue";
    var taskScoreIds = [];
    var studentScores = [];
    $("#student-list tr").each(function () {
      taskScoreIds.push($(this).attr("id").split("-")[1]);
      studentScores.push($(this).find("input").val());
    });
    var object = new Object();
    object.courseId = courseId;
    object.taskId = taskId;
    object.taskName = taskName;
    object.taskMatter = taskMatter;
    object.taskDate = taskDate;
    object.taskStatus = taskStatus;
    object.taskScoreIds = taskScoreIds;
    object.studentScores = studentScores;
    var data = JSON.stringify(object);
    var baseUrl = window.location.protocol + "//" + window.location.host;
    var pathName = window.location.pathname.split('/');
    pathName.pop();
    pathName = pathName.join('/');
    var url = baseUrl + pathName;
    $.ajax({
      type: 'POST',
      url: url,
      data: data,
      success: function (data) {
        window.location.href = data;
      }
    });
  });
  $("#score-review").click(function() {
    
  });

  // Show edit individu score modal
  $('.score-edit').click(function(){
    $('.ui.modal').modal({blurring: true}).modal('show');
  });

});

/**
 * Sorting table in html
 * @param n column position
 * @param tableId id of the table that want to be sorted
 */
function sortTable(n, tableId) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById(tableId);
  switching = true;
  dir = "asc";
  while (switching) {
    switching = false;
    rows = table.getElementsByTagName("TR");
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          shouldSwitch= true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      switchcount ++;
    } else {
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }

}
