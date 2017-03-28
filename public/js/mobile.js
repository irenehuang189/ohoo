$(document).ready(function(){
  // Secondary menu popup
  $('#report-menu').hide();
  $('#user-menu').hide();
  $('#report-mobile').click(function(){
    $('#user-menu').hide();
    $('#report-menu').show();
  });
  $('#user-mobile').click(function(){
    $('#report-menu').hide();
    $('#user-menu').show();
  });
});