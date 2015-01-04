<?php
	
	// Connect to database server.
	
	mysql_connect("mysql.julianovitch.com", "julia_cms", "juliajunction");
	
	// Choose database.
	
	mysql_select_db("julia_cms");
	
	// Get player ID and next ID
	
	$player = $_GET['player'];
	$next = $_GET['next'];

	
	// Check Player A's next status

	$result = mysql_query("SELECT next_button FROM julia_2p WHERE id=1");
	$num_rows = mysql_num_rows($result);
									
	for ($i = 1; $i <= $num_rows; $i++) {
		$row = mysql_fetch_assoc($result);
		$next_A = $row['next_button'];
	}
	
	// Check Player B's next status
	
	$result = mysql_query("SELECT next_button FROM julia_2p WHERE id=2");
	$num_rows = mysql_num_rows($result);
									
	for ($i = 1; $i <= $num_rows; $i++) {
		$row = mysql_fetch_assoc($result);
		$next_B = $row['next_button'];
	}
	
	// Update player next statuses
	
	if ($player == 'A') {
		if ($next_A < 1) {
			mysql_query("UPDATE julia_2p SET next_button='1' WHERE id='1'");
		}
	}
	
	if ($player == 'B') {
		if ($next_B < 1) {
			mysql_query("UPDATE julia_2p SET next_button='1' WHERE id='2'");
		}
	}
	
	// Get new statuses and check to see what kind of button to make
	
	$result = mysql_query("SELECT next_button FROM julia_2p WHERE id=1");
	$num_rows = mysql_num_rows($result);
									
	for ($i = 1; $i <= $num_rows; $i++) {
		$row = mysql_fetch_assoc($result);
		$next_A = $row['next_button'];
	}
	
	$result = mysql_query("SELECT next_button FROM julia_2p WHERE id=2");
	$num_rows = mysql_num_rows($result);
									
	for ($i = 1; $i <= $num_rows; $i++) {
		$row = mysql_fetch_assoc($result);
		$next_B = $row['next_button'];
	}
	
	// GET BODY TEXT FOR ALL PAGES

		// Get body text for Page 1
		
		$result_text_plain = mysql_query("SELECT body_text FROM julia_2p_text WHERE id=1");
		$num_rows = mysql_num_rows($result_text_plain);
										
		for ($i = 1; $i <= $num_rows; $i++) {
			$row = mysql_fetch_assoc($result_text_plain);
			$body_text_1_plain = $row['body_text'];
		}
	
		$result_text_links = mysql_query("SELECT body_text FROM julia_2p_text WHERE id=2");
		$num_rows = mysql_num_rows($result_text_links);
										
		for ($i = 1; $i <= $num_rows; $i++) {
			$row = mysql_fetch_assoc($result_text_links);
			$body_text_1_links = $row['body_text'];
		}
		
		// Get body text for Page 2
		
		$result_text_plain = mysql_query("SELECT body_text FROM julia_2p_text WHERE id=1");
		$num_rows = mysql_num_rows($result_text_plain);
										
		for ($i = 1; $i <= $num_rows; $i++) {
			$row = mysql_fetch_assoc($result_text_plain);
			$body_text_1_plain = $row['body_text'];
		}
	
		$result_text_links = mysql_query("SELECT body_text FROM julia_2p_text WHERE id=2");
		$num_rows = mysql_num_rows($result_text_links);
										
		for ($i = 1; $i <= $num_rows; $i++) {
			$row = mysql_fetch_assoc($result_text_links);
			$body_text_1_links = $row['body_text'];
		}
		
		// Get body text for Page 3
		
		$result_text_plain = mysql_query("SELECT body_text FROM julia_2p_text WHERE id=1");
		$num_rows = mysql_num_rows($result_text_plain);
										
		for ($i = 1; $i <= $num_rows; $i++) {
			$row = mysql_fetch_assoc($result_text_plain);
			$body_text_1_plain = $row['body_text'];
		}
	
		$result_text_links = mysql_query("SELECT body_text FROM julia_2p_text WHERE id=2");
		$num_rows = mysql_num_rows($result_text_links);
										
		for ($i = 1; $i <= $num_rows; $i++) {
			$row = mysql_fetch_assoc($result_text_links);
			$body_text_1_links = $row['body_text'];
		}
		
		// Get body text for Page 4
		
		$result_text_plain = mysql_query("SELECT body_text FROM julia_2p_text WHERE id=1");
		$num_rows = mysql_num_rows($result_text_plain);
										
		for ($i = 1; $i <= $num_rows; $i++) {
			$row = mysql_fetch_assoc($result_text_plain);
			$body_text_1_plain = $row['body_text'];
		}
	
		$result_text_links = mysql_query("SELECT body_text FROM julia_2p_text WHERE id=2");
		$num_rows = mysql_num_rows($result_text_links);
										
		for ($i = 1; $i <= $num_rows; $i++) {
			$row = mysql_fetch_assoc($result_text_links);
			$body_text_1_links = $row['body_text'];
		}
	

	// Send results back
	
	if (($next_A == '1') && ($next_B == '1')) {
		// Players are both past first level
		echo json_encode(
			array("status" => "0", 
			"body_text_1_links" => "$body_text_1_links",
			"body_text_1_plain" => "$body_text_1_plain")
		);
	}
	
	if ($next_A > $next_B) {
		// Player A is ahead
		echo json_encode(
			array("status" => "1", 
			"body_text_1_links" => "$body_text_1_links",
			"body_text_1_plain" => "$body_text_1_plain")
		);
	}
	
	if ($next_A < $next_B) {
		// Player B is ahead
		echo json_encode(
			array("status" => "2", 
			"body_text_1_links" => "$body_text_1_links",
			"body_text_1_plain" => "$body_text_1_plain")
		);
	}
	
	
	

?>
 
 