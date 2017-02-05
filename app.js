$(document).ready(function(){
  // Semantic UI initialization
  $('.ui.sidebar')
    .sidebar({
      context: $('.bottom.segment'),
      dimPage: false,
      transition: 'overlay'
    })
    .sidebar('attach events', '#sidebar-trigger');

  $('.ui.dropdown').dropdown({on: 'hover'});

  // Included HTML
});