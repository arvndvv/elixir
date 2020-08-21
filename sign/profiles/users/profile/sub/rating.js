$(document).ready(function() {
	$('.bar span').hide();
	$('#bar-five').animate({
	   width: '100%'}, 1000);
	$('#bar-four').animate({
	   width: '80%'}, 1000);
	$('#bar-three').animate({
	   width: '60%'}, 1000);
	$('#bar-two').animate({
	   width: '40%'}, 1000);
	$('#bar-one').animate({
	   width: '20%'}, 1000);
	
	setTimeout(function() {
	  $('.bar span').fadeIn('slow');
	}, 1000);
  });