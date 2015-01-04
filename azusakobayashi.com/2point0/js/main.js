$(document).ready(function() {
	$('body').kinetic();
	$('img').attr('draggable', false);
});

$(window).load(function() {

    $(".info").click(function(e) {
	    e.preventDefault();
		$(".info-overlay").fadeIn();
	});
		
	$(".info-overlay").click(function(e) {
		 e.preventDefault();
		 $(".info-overlay").fadeOut();
	});

	$(".loader").fadeOut(function(){
		$(".fadein").fadeIn(function() {
			$(window).scrollLeft(Math.floor(Math.random()*($(".everything").width()-$(window).width())));
			$(window).scrollTop(Math.floor(Math.random()*($(".everything").height()-$(window).height())));
		});
	});
});