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

  // Before delete modal
  $('#delete').click(function(){
    $('.ui.basic.modal').modal({blurring: true}).modal('show');
  });

  // Login page
  $('#login-role a').click(function(){
    // Reset CSS
    $('#login-role a img').css({
      'border': 'none'
    });
    $('#login-role a').css({
      'color': 'blue'
    });

    // Add CSS to selected
    $(this).find('img').css({
      'border':'5px solid red',
      'border-radius': '100%'
    });
    $(this).css({
      'color': 'red'
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

  // Teacher individu
  $('#semester').click(function(e){
      // $(this).parent().siblings('.ui.tab[data-tab="semester"]').html('lalala');
      window.location.href = 'tes';
  });
});
