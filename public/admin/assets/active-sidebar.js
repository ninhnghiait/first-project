/** add active class and stay opened when selected */
  var url = window.location; 

  $('ul.nav-children li a').filter(function() {
     return this.href == url;
  }).parent().parent().parent().addClass('nav-expanded');
  $('ul.nav-children li a').filter(function() {
     return this.href == url;
  }).parent().parent().addClass('appear-animation fadeInDown').attr('data-appear-animation', 'fadeInDown');
