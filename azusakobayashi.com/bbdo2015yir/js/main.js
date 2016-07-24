
$(window).load(function() {

var gotime = false;
var currentSlide = 0;

var waypoints = $('.trigger').waypoint({
  handler: function(direction) {
    if ($(window).width() > 768) {
    console.log($(this.element).data("slideid"));
    if (direction == "right") {
      currentSlide = $(this.element).data("slideid");
      var nextcopy = ".copy-" + currentSlide;
      var nextimg = ".work-" + currentSlide;
      var nextcapt = ".caption-" + currentSlide;
      $(".nav-dot").removeClass("activedot");
      $(".nav").find("[data-slideid='" + currentSlide + "']").addClass("activedot");
      $(".copy, .work, .caption").removeClass("fade-in").hide();
      $(nextcopy).show().addClass("fade-in");
      $(nextcapt).show().addClass("fade-in");
      $(nextimg).show().addClass("fade-in");

    }

    if (direction == "left") {
      currentSlide = $(this.element).data("slideid") - 1;
      var prevcopy = ".copy-" + currentSlide;
      var previmg = ".work-" + currentSlide;
      var nextcapt = ".caption-" + currentSlide;
      $(".nav-dot").removeClass("activedot");
      $(".nav").find("[data-slideid='" + currentSlide + "']").addClass("activedot");
      $(".copy, .work, .caption").hide().removeClass("fade-in");
      $(prevcopy).show().addClass("fade-in");
      $(nextcapt).show().addClass("fade-in");
      $(previmg).show().addClass("fade-in");
    }
  }
  },
  horizontal: true,
  offset: 100
})



$("body").mousewheel(function(event, delta) {
  if ($(window).width() > 768) {
      this.scrollLeft -= (delta * 30);
      event.preventDefault();
    }
});

$('a').smoothScroll({
      direction: 'left',
      speed: 1000
});

$(".closebtn").click(function() {
  $(".intro-overlay").fadeOut();
  $("html,body").removeClass("noscroll");
  gotime = true;
})

$(window).keydown(function(e){
  console.log(e.which);
  if (gotime) {
    if ((e.keyCode || e.which) == 37){   
      e.preventDefault();
      //USER PRESSED LEFT
      var togo = 'a[data-slideid="' + (currentSlide - 1) + '"]'
      $(togo).click();
    }
    if ((e.keyCode || e.which) == 39){
      e.preventDefault();
      //USER PRESSED RIGHT
      var togo = 'a[data-slideid="' + (currentSlide + 1) + '"]'
      $(togo).click();
    }   
  }
});

// function setWidths() {
// var newwidth = $(window).height()*1.3389261745;
// $(".trigger").css("width",newwidth);
// }

// setWidths();

// $(window).resize(function() {
//   setWidths();
// })



});


