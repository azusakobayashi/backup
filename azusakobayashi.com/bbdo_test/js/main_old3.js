var currentSlide = 0;

var waypoints = $('.trigger').waypoint({
  handler: function(direction) {
    if (direction == "right") {
      currentSlide = $(this.element).data("slideid");
      var nextcopy = "." + $(this.element).data("relatedcopy");
      $(".copy").stop().fadeOut(500).promise().done(
        function() { 
            $(nextcopy).stop().fadeIn(500);
        });
    }

    if (direction == "left") {
      currentSlide = $(this.element).data("slideid") - 1;
      var prevcopy = "." + $(this.element).prev().data("relatedcopy");
      $(".copy").stop().fadeOut(500).promise().done(
        function() { 
            $(prevcopy).stop().fadeIn(500);
        });
    }
  },
  horizontal: true
})



$("body").mousewheel(function(event, delta) {
			this.scrollLeft -= (delta * 30);
			event.preventDefault();
});

$('a').smoothScroll({
      direction: 'left',
      speed: 1000
});

$(window).keydown(function(e){
    if ((e.keyCode || e.which) == 37)
    {   
      //USER PRESSED LEFT
      var togo = 'a[data-slideid="' + (currentSlide - 1) + '"]'
      $(togo).click();
    }
    if ((e.keyCode || e.which) == 39)
    {
      //USER PRESSED RIGHT
      var togo = 'a[data-slideid="' + (currentSlide + 1) + '"]'
      $(togo).click();
    }   
});