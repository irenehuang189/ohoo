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
});