jQuery(document).ready(function ($) {

  $('.main-header').show();

  if(typeof(fsSlider)!='undefined'){
    $('.bx-slider').bxSlider({
      pager:fsSlider.pager,
      controls:fsSlider.controls,
      mode:fsSlider.mode,
      auto: fsSlider.auto,
      speed:fsSlider.speed,
      pause:fsSlider.pause,
    });
  }


  new WOW().init();
  var winwidth = $(window).width();
  if(winwidth >= 1097){var mslide = 4; slidew = 260;}
  else if(winwidth <= 1096 && winwidth >= 801){var mslide = 3; slidew = 220;}
  else if(winwidth <= 800 && winwidth >= 541){var mslide = 2; slidew = 220;}
  else if(winwidth <= 540 && winwidth >= 320){var mslide = 1; slidew = 300;}

  $('.team-slide').bxSlider({
    controls:true,
    auto:true,
    pager: false,
    minSlides: 1,
    maxSlides: mslide,
    slideWidth: slidew,
    speed:1000,
    moveSlides:1, 
    autoHover: true,
  });
  $('.clients-logos').bxSlider({
    controls:true,
    auto:true,
    pager: false,
    minSlides: 1,
    maxSlides: mslide,
    slideWidth: slidew,
    speed:1000,
    moveSlides:1,
    slideMargin: 15,
    autoHover: true,
  });


  $('.testimonial-slide').bxSlider({
    controls:false,
    auto:true,
    pager: true,
    minSlides: 1,
    maxSlides: 1,
    speed:1000,
    moveSlides:1,
    autoHover: true,
  });


// classyloader function
$('.classyloader').each(function () {
  var that = $(this);
  var percent = that.attr("data-percentage");
  var color = that.attr("color");

  that.waypoint({
    handler: function (direction) {
      that.ClassyLoader({
        percentage: percent,
        diameter: 70,
        lineWidth: 15,
        speed: 30,
        lineColor: color,
        remainingLineColor: 'rgba(0, 70, 106, 1)',
      });
    },
    offset: '95%'
  });
});

/* sticky header */
if($("#masthead").hasClass('sticky')){
  var topPos = $("#masthead.sticky").offset().top;
  $(window).scroll(function(){
    if($(window).scrollTop() > topPos){
      $('#masthead.sticky').addClass('fixed');
    }else{
      $('#masthead.sticky').removeClass('fixed');
    }
  }).scroll();
}

$(window).scroll(function() {
  if ($(this).scrollTop() > 200) {
    $('#back-top').fadeIn();
  } else {
    $('#back-top').fadeOut();
  }
});

// scroll body to 0px on click
$('#back-top').click(function() {
  $('body,html').animate({
    scrollTop: 0
  }, 800);
  return false;
});

//new added
$('.ed-toggle-title.open span i').text('-');
$('.ed-toggle-title.close span i').text('+');
$('.ed-toggle-title.close').next('.ed-toggle-content').hide();
$('.ed-toggle-title').click(function(){
  $(this).next('.ed-toggle-content').slideToggle();
  if($(this).hasClass('open')){
    $(this).find('span i').text('+');
    $(this).removeClass('open').addClass('close');
  }else{
    $(this).find('span i').text('-');
    $(this).removeClass('close').addClass('open');
  }
});

/** js for to hide and show faq */
$('.faqs .faq-answer').hide();
$('.faq-question').click(function(){
  $(this).next('.faq-answer').slideToggle();
  $(this).toggleClass('active');
})  ;

/** Widgets Progress Bar **/
$('.ed-progress-bar').each(function(){
  $(this).waypoint(function() {
    var progressWidth = $(this).find('.ed-progress-bar-percentage').data('width')+'%';
    $(this).find('.ed-progress-bar-percentage').animate({width:progressWidth},2000);
  }, { offset: '80%' });
});

/** Short Codes Js */
//slider shortcode
$('.shortcode-slider .slider_wrap').bxSlider();

$('.ed_toggle.close .ed_toggle_content').hide();
$('.ed_toggle_title').click(function(){
  if($(this).parent('div').hasClass('close')){
    $(this).parent('div').removeClass('close').addClass('open');
  }else{
    $(this).parent('div').removeClass('open').addClass('close');
  }
  $(this).next('.ed_toggle_content').slideToggle();
});


$('.ed_tab_wrap').prepend('<div class="ed_tab_group clearfix"></div>');

$('.ed_tab_wrap').each(function(){
  $(this).children('.ed_tab').find('.tab-title').prependTo($(this).find('.ed_tab_group'));
  $(this).children('.ed_tab').wrapAll( "<div class='ed_tab_content' />");
});

$('#page').each(function(){
  $(this).find('.ed_tab:first-child').show();
  $(this).find('.tab-title:first-child').addClass('active')
});


$('.ed_tab_group .tab-title').click(function(){
  $(this).siblings().removeClass('active');
  $(this).addClass('active');
  $(this).parent('.ed_tab_group ').next('.ed_tab_content').find('.ed_tab').hide();
  var ed_id = $(this).attr('id');
  $(this).parent('.ed_tab_group ').next('.ed_tab_content').find('.'+ed_id).show();
});

//Счиаем наши загаловки
var head_col_count =  $('table.plans-wrap thead tr th').size();
//alert(head_col_count);
//Считаем наши th элементы в таблице
for ( j=0; j <= head_col_count; j++ )  {
// Работа с текстом
var head_col_price = $('table.plans-wrap thead tr th:nth-child('+ j +') .plan-price').text();
var head_col_title = $('table.plans-wrap thead tr th:nth-child('+ j +') .plan-title').text();
//Каждому td присваиваем data-title, который потом выводим через css
if(j==1){
  $('table.plans-wrap tbody tr td:nth-child('+ j +')').replaceWith(
    function(){
      return $('<td class="column-'+j+'" data-title="Plan Feature">').append($(this).contents());
    }
    );
}else{
  $('table.plans-wrap tbody tr td:nth-child('+ j +')').replaceWith(
    function(){
      return $('<td class="column-'+j+'" data-title="'+ head_col_title + " " + head_col_price +'">').append($(this).contents());
    }
    );
}
}
});