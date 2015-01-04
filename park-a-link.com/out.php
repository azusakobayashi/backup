<?php 
	 
		// Connect to database server
		mysql_connect("mysql.azusakobayashi.com", "azusa_nt", "ank698");      
	
		// Select database
		mysql_select_db("azusakobayashi_nt");
			
		// Get referral URL
		$source = $_SERVER['HTTP_REFERER'];
		
		// if the user is parking, add to Database
		
		
		if (isset($_REQUEST["position"])) {
            
                $position = $_REQUEST['position'];
                $url = "NULL";       
                $curtime = time();
            
          	$result = mysql_query("INSERT INTO parking (`position`, `link`, `timestamp`) VALUES ('$position', '$url', '$curtime')");
          	
          	$go = $_REQUEST['url'];
            
            }
            
            
		

	?>
<html>
<head>
<title>
	PARK-A-LINK—REDIRECTING</title>
<META HTTP-EQUIV="refresh" CONTENT="1;URL=<?php echo($go); ?>">
</head>

<body>
>>>> EXIT THIS WAY >>>>
—GOODBYE

	
</body>

</html>