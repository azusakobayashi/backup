<html>

<title>
	PARK-A-LINK
</title>

<script type="text/javascript" src="jquery.js"></script>


<style>
	body {
		color: #000000;
		font-family: Helvetica, Arial, sans-serif;
		font-size: 10px;
		line-height: 20px;
		background-color: #666666;
		margin: 0;
		padding: 0;
	}
	
	p {
		margin: 0;
		padding: 0;
	}
	
	/* Remove blue outline from image links in Firefox */
	a:link img, a:visited img, a:hover img, a:active img {
		border: none;
	}
	
	#header {
		background-color: #666666;
		color: #fff;
		font-size: 30px;
		line-height: 25px;
		padding: 5px;
		position: fixed;
		left: 20px;
		top: 20px;
	}
	
	#middle_col {
		position: fixed;
		left: 220px;
		top: 20px;
		color: #fff;
		font-size: 14px;
		line-height: 20px;
		text-transform: uppercase;
	}
	
	#lot {
		position: absolute;
		left: 220px;
		top: 100px;
	
	}
	
	#spot1 {
		position: absolute;
		top: 25px;
		left: 51px;
		width: 130px;
		height: 140px;
	
	}
	
	#spot2 {
		position: absolute;
		top: 25px;
		left: 176px;
		width: 130px;
		height: 140px;
	}
	
	#spot3 {
		position: absolute;
		top: 25px;
		left: 300px;
		width: 130px;
		height: 140px;
	}
	
	#spot4 {
		position: absolute;
		top: 25px;
		left: 424px;
		width: 130px;
		height: 140px;
	}
	
	#spot5 {
		position: absolute;
		top: 25px;
		left: 548px;
		width: 130px;
		height: 140px;
	}
	
	#spot6 {
		position: absolute;
		top: 230px;
		left: 40px;
		width: 130px;
		height: 140px;
	}
	
	#spot7 {
		position: absolute;
		top: 230px;
		left: 164px;
		width: 130px;
		height: 140px;
	}
	
	#spot8 {
		position: absolute;
		top: 230px;
		left: 288px;
		width: 130px;
		height: 140px;
	}
	
	#spot9 {
		position: absolute;
		top: 230px;
		left: 412px;
		width: 130px;
		height: 140px;
	}
	
	#spot10 {
		position: absolute;
		top: 230px;
		left: 536px;
		width: 130px;
		height: 140px;
	}
	
	.lot {
		z-axis: -10;
	
	}
	
</style>

<body>

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
                $url = $_REQUEST['url'];       
                $curtime = time();
            
          	$result = mysql_query("INSERT INTO parking (`position`, `link`, `timestamp`) VALUES ('$position', '$url', '$curtime')");
            
            }
            
            
	
	?>

	<div id="header">
		
	</div>
	
	<div id="middle_col">
	
	</div>
	
	<div id="lot">
		<a href="http://www.park-a-link.com/"><img src="images/parkingcard_1.png"></a>
			<br />
			<br />
	</div>
	
	
</body>

</html>