/****************************************************
WEBSITE PRELOADER
****************************************************/

$(window).on('load', function() { // makes sure the whole site is loaded 
  $('#status').fadeOut(); // will first fade out the loading animation 
  $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
  $('body').delay(350).css({'overflow':'visible'});
});

/****************************************************
DETECT iOS BROWSER
****************************************************/

/* var isSafari = !!navigator.userAgent.match(/Version\/[\d\.]+.*Safari/);
var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;

if (isSafari && iOS) {
    $('').toggleClass('');
} else if(isSafari) {
   $('').toggleClass('');
} */

/****************************************************
FUNCTIONS
****************************************************/

jQuery(document).ready(function($) {

/* Custom Cursor  */

const verticalLine = document.getElementById('verticalLine');
const horizontalLine = document.getElementById('horizontalLine');
const verticalDiv = document.getElementById('verticalDiv');
const horizontalDiv = document.getElementById('horizontalDiv');

document.addEventListener('mousemove', function(event) {
  const x = event.clientX;
  const y = event.clientY;

  verticalLine.style.left = x + 'px';
  verticalDiv.style.left = (x +10) + 'px';
  verticalDiv.textContent = `[X: ${x}]`;

  horizontalLine.style.top = y + 'px';
  horizontalDiv.style.top = (y + 10) + 'px';
  horizontalDiv.textContent = `[Y: ${y}]`;
});
  
/* MOBILE NAV */

$('.toggle-menu').click (function(){
  $(this).toggleClass('active');
  $('#mobile-nav-wrapper, #mobile-nav').toggleClass('open');
  $("#mobile-nav-wrapper, #mobile-nav li").each(function(i, li) {
      var $list = $(this).closest('ul');
      $list.delay(100).queue(function() {
          $(li).toggleClass('anim fadeInUp');
          $list.dequeue();
      });
    });
  $('body').toggleClass('no-overflow');
});

$('.menu-item a, #mobile-nav-wrapper').click (function(){
  $('#mobile-nav-wrapper, #mobile-nav').removeClass('open');
  $('.toggle-menu').removeClass('active');
  $("#mobile-nav-wrapper, #mobile-nav li").each(function(i, li) {
      var $list = $(this).closest('ul');
      $list.delay(100).queue(function() {
          $(li).toggleClass('anim fadeInUp');
          $list.dequeue();
      });
    });
  $('body').removeClass('no-overflow');
});


/* Fade in section if in viewport */

function isElementInViewport(element) {
 var rect = element.getBoundingClientRect();
 return (
  rect.top <= (window.innerHeight - 100)
 );
}

var elements = document.querySelectorAll(".fade-in");

function callbackFunc() {
 for (var i = 0; i < elements.length; i++) {
 	if(!elements[i].classList.contains("visible")){
 		if (isElementInViewport(elements[i])) {
		 	elements[i].classList.add("visible");
		}
 	}
 }
}

window.addEventListener("load", callbackFunc);
window.addEventListener("scroll", callbackFunc);  

}); /* end of as page load scripts */
