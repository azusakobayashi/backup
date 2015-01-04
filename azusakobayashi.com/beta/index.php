<!doctype html>
 
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>A Z U  2 . 0</title>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
  <link rel="stylesheet" href="style.css">
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
  <script>
  $(function() {
    console.log($('html').height());
    $(this).scrollTop(1500);
    $(this).scrollLeft(1500);

    $(".draggable").draggable();
      
      // vvv not working yet... trying to add class when hovering/focus on
    //   accept: '.draggable',
    //   over: function(event, ui) {
    //     $('.draggable').addClass('focus_in');
    //     $('.draggable').removeClass('focus_out');
    //   },
    //   out: function(event, ui) {
    //     $('.draggable').addClass('focus_out');
    //     $('.draggable').removeClass('focus_in');
    //   },
    // });
    // ---- this is where the add class attempt ends ---- 

    // put the selected draggable on top
    $( ".draggable" ).draggable({ stack: ".draggable" });

//     // getter
// var stack = $( ".selector" ).draggable( "option", "stack" );
 
// // setter
// $( ".selector" ).draggable( "option", "stack", ".products" );
    
    $(".draggable").click(function() {
    	 $(".overlay").fadeIn();
		});
		
		$(".overlay").click(function() {
    	 $(".overlay").fadeOut();
		});

  });

  </script>
</head>



<body>



<div class="stage">

<?php

  for ($i = 1; $i <= 30; $i++) {
    $toppos = rand(0, 3000);
    $leftpos = rand(0, 3000);

    echo "<div class='draggable' style='position:absolute; top:" . $toppos . "px; left:" . $leftpos . "px;'><img src='../files/origcopy_4.jpg' /></div>";
  }
?>

</div>

<div id="col1">
  <a href="http://www.azusakobayashi.com/">AZUSA KOBAYASHI<br/>
  コバヤシアヅサ</a>
</div>

<div id="col2">
  GD, ETC.
</div>

<div id="col3">
  <a href="mailto:a@azusakobayashi.com">a@azusakobayashi.com</a>
</div>
 

<div class="overlay">
  <div class="overlaytext">
    Some text will go here, maybe.
  </div>
</div>

 
</body>
</html>