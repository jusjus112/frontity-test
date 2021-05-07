jQuery(document).ready(function( $ ) {

  $('.card-link').click(function (e){
    var _self = $(this);
    var _location = ADMIN_URL + _self.attr('location');

    e.preventDefault();

    $("#wpwrap").load(_location, function (){
      $('#overlay-page').addClass('short');
    });
  });

  // $('.vertical-widgets').slick({
  //   dots: false,
  //   slidesToShow: 5,
  //   slidesToScroll: 1,
  //   cssEase:'ease',
  //   useCSS:true,
  //   variableWidth:true,
  // });

});