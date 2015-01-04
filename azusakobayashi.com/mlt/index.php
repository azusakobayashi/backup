<!DOCTYPE html>  
<html>  
  <head>  
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
	<!--
		<link rel="stylesheet" href="test.css" />
        <link rel="stylesheet" href="themes/test.min.css" />
      -->
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.1/jquery.mobile.structure-1.1.1.min.css" />
		<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.js"></script>
		<script src="yqlgeo.js"></script>
  <script>  
    jQuery(window).ready(function(){
    	/* jQuery("#btnInit").click(initiate_geolocation);*/
		jQuery("#btnInit").click(initiate_watchlocation);
		jQuery("#btnStop").click(stop_watchlocation);
    })  
    
    function initiate_geolocation() {  
        if (navigator.geolocation)  
        {  
            navigator.geolocation.getCurrentPosition(handle_geolocation_query, handle_errors);  
        }  
        else  
        {  
            yqlgeo.get('visitor', normalize_yql_response);  
        }  
    }  
    
	var watchProcess = null;  
	function initiate_watchlocation() {  
		if (watchProcess == null) {  
			watchProcess = navigator.geolocation.watchPosition(handle_geolocation_query, handle_errors);  
		}  
	}  
	function stop_watchlocation() {  
		if (watchProcess != null) {  
			navigator.geolocation.clearWatch(watchProcess);  
			watchProcess = null;  
		}  
	}  
    function handle_errors(error) {  
        switch(error.code) {  
			case error.PERMISSION_DENIED: alert("user did not share geolocation data");  
			break;  
			case error.POSITION_UNAVAILABLE: alert("could not detect current position");  
			break;  
			case error.TIMEOUT: alert("retrieving position timedout");  
			break;  
			default: alert("unknown error");  
			break;  
        }  
    }  
    function normalize_yql_response(response) {  
        if (response.error) {  
            var error = { code : 0 };  
            handle_error(error);  
            return;  
        }  
        var position = {  
            coords :  
            {  
                latitude: response.place.centroid.latitude,  
                longitude: response.place.centroid.longitude  
            },  
            address :  
            {  
                city: response.place.locality2.content,  
                region: response.place.admin1.content,  
                country: response.place.country.content  
            }  
        };  
        handle_geolocation_query(position);  
    }  
    
    function handle_geolocation_query(position){  
		/*alert('Lat: '+position.coords.latitude+' '+'Lon: '+position.coords.longitude);  */
		var text = "Latitude: "+position.coords.latitude+"<br/>"+"Longitude: "+position.coords.longitude+"<br/>"+"Accuracy: "+position.coords.accuracy+"m<br/>"+"Time: "+new Date(position.timestamp);  
		jQuery("#info").html(text);
		var image_url = "http://maps.googleapis.com/maps/api/staticmap?sensor=false&center="+position.coords.latitude+","+position.coords.longitude+"&maptype=satellite&zoom=18&size=320x420&markers=color:blue|"+position.coords.latitude+","+position.coords.longitude+"&key=AIzaSyC08LzBujcbSZ0-Jo6GlyAkMTr3gz9xcTk";
		
		jQuery("#map").remove();  
		jQuery(document.body).append(  
			jQuery(document.createElement("img")).attr("src", image_url).attr('id','map').attr('style','z-index:10000;')
		);
	}  

</script>  
</head>  
<body>  
	<div>  
		<button id="btnInit" type="button" >Monitor my location</button>  
		<button id="btnStop" >Stop monitoring</button>  
	</div>  
	<div id=ÓinfoÓ></div>  

</body>  
</html>  