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
  $("#choose-class-teacher").change(function(){
    $('#choose-course-teacher').empty();
    $("#choose-course-teacher").prepend("<option value='-1' selected='selected'>Semua</option>");
    var classId = $("#choose-class-teacher :selected").val();
    if (classId >= 1) {
      $.get("courses/" + classId, function (data, status){
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
  $('.steps#add-score .step').click(function(){
    $(this).addClass('active');
    var id = $(this).attr('id');
    if(id == 'exam'){
      $('#score').removeClass('active');
      $('div#score').hide();
      $('div#exam').show();
    } else if(id == 'score'){
      $('#exam').removeClass('active');
      $('div#exam').hide();
      $('div#score').show();
      // TODO: Panggil ajax buat daftar siswa di sini
    };
  });

  // Teacher individu page
  // Right menu on individu detail
  $('div#semester').hide();
  $('div#midterm').hide();
  $('div#detail').hide();
  $('.item#overview').click(function(){
    $('div#midterm').hide();
    $('div#detail').hide();
    $('div#semester').hide();
  });
  $('.item#semester').click(function(){
    $('div#midterm').hide();
    $('div#detail').hide();
    $('div#semester').show();
  });
  $('.item#midterm').click(function(){
    $('div#semester').hide();
    $('div#detail').hide();
    $('div#midterm').show();
  });
  $('.item#detail').click(function(){
    $('div#semester').hide();
    $('div#midterm').hide();
    $('div#detail').show();
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
