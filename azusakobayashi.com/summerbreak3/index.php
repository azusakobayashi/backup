<!DOCTYPE html>
<head>
  <title>You're standing in the shade while I'm standing in the sun</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.1/jquery.mobile.structure-1.1.1.min.css" />

</head>
<body>
<div id="sb_logo">
  <a href="http://thesummerbreak.tumblr.com" target="blank"><img src="SB2_Icon_white.png"></a>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script>
jQuery(document).ready(function($) {
  $.ajax({
    url : "http://api.wunderground.com/api/63885e241b5ba717/conditions/astronomy/geolookup/rawtide/tide/q/CA/Santa_Monica.json",
    dataType : "jsonp",
    success : function(parsed_json) {
      var location = parsed_json['location']['city'];
      var setHour = parsed_json['sun_phase']['sunset']['hour'];
      var setMinute = parsed_json['sun_phase']['sunset']['minute'];
      //var age = parsed_json['moon_phase']['ageOfMoon'];
      //var illuminated = parsed_json['moon_phase']['percentIlluminated'];
      var feelsLikeF = parsed_json['current_observation']['feelslike_f'];
      var tideType = parsed_json['tide']['tideSummary']['0']['data']['type'];
      var tideHeight = parsed_json['tide']['tideSummary']['0']['data']['height'];

      var curTime = new Date();
      var curHour = curTime.getHours();
      var curMinute = curTime.getMinutes();
      // if (curMinute < 10) {
      //   curMinute = '0' + curMinute;
      // }

      var curTimeMin = (curHour * 60) + curMinute;
      var setTime = (setHour * 60) + setMinute;
      var timeDiff = setTime - curTimeMin;


      // convert time to non-military time
      // if (setHour > 12) {
      //   setHour = (setHour - 12);
      // }
    
  $('.info').html("The sun will set in " + timeDiff + " minutes in Santa Monica.<br />(It feels like " + feelsLikeF +"F.)" );

    

    }

  });

});


</script>

<div class='info'></div>


</body>
</html>