<?php
	
	// Connect to database server.
	
	mysql_connect("mysql.julianovitch.com", "julia_cms", "juliajunction");
	
	// Choose database.
	
	mysql_select_db("julia_cms");
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	
	<head>
	
		<title>\/ The Garden of Forking Paths \/ Jorge Luis Borges \/</title>
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="stylesheet" href="style.css" />
        <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.js"></script>
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.1/jquery.mobile.structure-1.1.1.min.css" />

		<style></style>
		
		<script>

            // http://api.jquery.com/category/events/
            // http://jquerymobile.com/test/docs/api/events.html

            $(document).bind('pageinit', init);

            function init() {


				// New game

				$( ".new_game" ).bind( "click", function() {
                	$.ajax({
						url: 'insert.php?game=new'
					});
					window.location = "2p.php#choose_player";
                });
		
		
				// Choose player

                $( ".playerA" ).bind( "click", function() {
                	$.ajax({
						url: 'insert.php?player=A'
					});
					// Specify which player we are and store in URL as PHP variable
					window.location = "2p.php?player=A#one";
                });
                
                $( ".playerB" ).bind( "click", function() {
                	$.ajax({
						url: 'insert.php?player=B'
					});
					// Specify which player we are and store in URL as PHP variable
					window.location = "2p.php?player=B#one";
                });
                
                
                // Stage 1 Next navigation

                var status_1;
                var body_text_1_links;
                var body_text_1_plain;
                
                $( ".next_A_1" ).bind( "click", function() {
                	                	
                	$.ajax({
                		type: 'POST',
						url: 'next.php?player=A&next=1',
						dataType: 'json',
						cache: false,
						success: function(data) {
							alert('FIRST load was performed.');
							
							if (data.status_1 == 0) { 
								$(".next_button_1").html("<a href='#two'>Done</a>");
								$(".body_text").html(data.body_text_1_links);
							}	
							
							if (data.status_1 == 1) { 
								$(".next_button_1").html("...");
								$(".body_text").html(data.body_text_1_links);
							}
							
							if (data.status_1 == 2) { 
								$(".next_button_1").html("<a href='' class='next_A_1'>Next</a>");
							}
							
							// Toggle secondary links
							
							$(".link-1").bind("click", function() {
								$(".link-1-text").toggle('slow');
							});
							
							$(".link-1'").bind("click", function () {
								$('body,html').animate({
									scrollTop: 0
								}, 800);
								return false;
							});
							
							
						}
						
					});

                });
                
                $( ".next_B_1" ).bind( "click", function() {
                	$.ajax({
						url: 'next.php?player=B&next=1',
						success: function(data) {
							alert('Load was performed.');
							stuff_B = data;
							if (stuff_B == 0) { 
								$(".next_button_1").html("<a href='#two'>Done</a>");
								$(".body_text").html("<p>Lorem ipsum <a href='' class='link-1'>dolor</a> sit amet, consectetur adipiscing elit. Vivamus ante turpis, vestibulum a auctor laoreet, viverra sit amet augue. Pellentesque tortor nisl, mollis at cursus eget, venenatis nec nulla. Aliquam erat volutpat. Nam sollicitudin malesuada euismod. Nam rutrum, est id dictum feugiat, ipsum arcu tempus nulla, id tempor lacus sem at ante. Nullam vulputate, orci id ullamcorper condimentum, metus mauris lacinia orci, et suscipit risus libero tristique metus. Donec leo enim, scelerisque at eleifend sit amet, scelerisque fringilla ligula. Pellentesque sit amet vulputate libero. Duis nec nisl quis augue congue ornare. In in dolor quam. Ut vestibulum, odio sit amet scelerisque pharetra, magna ligula auctor erat, non semper est ipsum vitae justo. Proin pharetra enim a sem vestibulum tincidunt. In hac habitasse platea dictumst. Suspendisse quis sem ut eros consectetur sollicitudin. In consequat dictum risus, vel posuere urna blandit id. Etiam nisl magna, tempor a egestas eu, venenatis ac tellus.</p>");
							}	
							if (stuff_B == 1) { 
								$(".next_button_1").html("...");
								$(".body_text").html("<p>Lorem ipsum <a href='' class='link-1'>dolor</a> sit amet, consectetur adipiscing elit. Vivamus ante turpis, vestibulum a auctor laoreet, viverra sit amet augue. Pellentesque tortor nisl, mollis at cursus eget, venenatis nec nulla. Aliquam erat volutpat. Nam sollicitudin malesuada euismod. Nam rutrum, est id dictum feugiat, ipsum arcu tempus nulla, id tempor lacus sem at ante. Nullam vulputate, orci id ullamcorper condimentum, metus mauris lacinia orci, et suscipit risus libero tristique metus. Donec leo enim, scelerisque at eleifend sit amet, scelerisque fringilla ligula. Pellentesque sit amet vulputate libero. Duis nec nisl quis augue congue ornare. In in dolor quam. Ut vestibulum, odio sit amet scelerisque pharetra, magna ligula auctor erat, non semper est ipsum vitae justo. Proin pharetra enim a sem vestibulum tincidunt. In hac habitasse platea dictumst. Suspendisse quis sem ut eros consectetur sollicitudin. In consequat dictum risus, vel posuere urna blandit id. Etiam nisl magna, tempor a egestas eu, venenatis ac tellus.</p>");
							}	
							
							if (stuff_B == 2) { 
								$(".next_button_1").html("<a href='' class='next_B_1'>Next</a>");
							}
						}
					});
                });
                
            }
            
        </script>
		
	</head>
	
	<body>
	
	<!-- footnote visibility -->
	<script type="text/javascript">
		function toggle_visibility(id) {
		   var e = document.getElementById(id);
		   if(e.style.display == 'block')
			  e.style.display = 'none';
		   else
			  e.style.display = 'block';
		}
	</script>

	
	
		<?php
		
			// Get all text from database
			
			
		
		?>
	
		<div data-role="page" id="new_game" class="page">
					
			<div data-role="content" data-theme="a">
			
				<p>New game</p>
				
				<a href="2p.php?#choose_player" class="new_game" data-role="button">New game</a>

			</div>
			
		</div>	
		
		<div data-role="page" id="choose_player" class="page">
					
			<div data-role="content" data-theme="a">
			
				<p>Choose player</p>
				
				<a href="2p.php?player=A#one" class="playerA" data-role="button">Player A</a>
				<a href="2p.php?player=B#one" class="playerB" data-role="button">Player B</a>
				
				<p>Reset game</p>
								
			</div>
			
		</div>		

		
		<!-- PAGE ONE -->
		
		
		<div data-role="page" id="one" class="page">
			<a name="link-1-text"></a>
			<div class="container">
			
				<div class="link-1-text">
				
					
					<p>Donec leo enim, scelerisque at eleifend sit amet, scelerisque fringilla ligula. Pellentesque sit amet vulputate libero. Duis nec nisl quis augue congue ornare. In in dolor quam.</p> 
	
				</div>
					
				<div class="maintitle">
					The Garden of Forking Paths<br />
					Jorge Luis Borges
				</div>
						
				<div data-role="content" class="mainbodytext">
				
					<!-- TEST WHICH PLAYER
					<?php $player = $_GET['player']; echo($player); ?> -->
					
					
								
					<div class="body_text">
						
						<?php 
						
							// Call next button
						
							$player = $_GET['player']; 
							
							$result_1 = mysql_query("SELECT next_button FROM julia_2p WHERE id=1");
							$num_rows = mysql_num_rows($result_1);
															
							for ($i = 1; $i <= $num_rows; $i++) {
								$row = mysql_fetch_assoc($result_1);
								$next_A = $row['next_button'];
							}
						
							$result_2 = mysql_query("SELECT next_button FROM julia_2p WHERE id=2");
							$num_rows = mysql_num_rows($result_2);
															
							for ($i = 1; $i <= $num_rows; $i++) {
								$row = mysql_fetch_assoc($result_2);
								$next_B = $row['next_button'];
							}
						
							// Call text
							
							$result_text_plain = mysql_query("SELECT body_text FROM julia_2p_text WHERE id=1");
							$num_rows = mysql_num_rows($result_text_plain);
															
							for ($i = 1; $i <= $num_rows; $i++) {
								$row = mysql_fetch_assoc($result_text_plain);
								$body_text_plain = $row['body_text'];
							}
						
							$result_text_links = mysql_query("SELECT body_text FROM julia_2p_text WHERE id=2");
							$num_rows = mysql_num_rows($result_text_links);
															
							for ($i = 1; $i <= $num_rows; $i++) {
								$row = mysql_fetch_assoc($result_text_links);
								$body_text_links = $row['body_text'];
							}
						
						
							if (($next_A == '1') && ($next_B == '1')) {
								// Players have passed level 1
								// Show text with links
								
								if ($player == 'A') { echo($body_text_links); }
							
								if ($player == 'B') { echo($body_text_links); }
								
							}
						
							if (($next_A == '0') && ($next_B == '0')) {
								// Players are at level for the first time
								
								if ($player == 'A') { echo($body_text_plain); }
							
								if ($player == 'B') { echo($body_text_plain); }
								
							}
							
							if (($next_A == '1') && ($next_B == '0')) {
								// Player A has passed, Player B has not 
								
								if ($player == 'A') { echo($body_text_links); }
							
								if ($player == 'B') { echo($body_text_plain); }
								
							}
							
							if (($next_A == '0') && ($next_B == '1')) {
								// Player B has passed, Player A has not 
								
								if ($player == 'A') { echo($body_text_plain); }
							
								if ($player == 'B') { echo($body_text_links); }
								
							}
							
							// if ($player == 'A') { echo("<a href='' class='next_A_1'>Next</a>"); }
							
							// if ($player == 'B') { echo("<a href='' class='next_B_1'>Next</a>"); }
							
						?>
						
					</div>
					
					<div class="next_button_1">
										
						<?php 
						
							$player = $_GET['player']; 
							
							$result_1 = mysql_query("SELECT next_button FROM julia_2p WHERE id=1");
							$num_rows = mysql_num_rows($result_1);
															
							for ($i = 1; $i <= $num_rows; $i++) {
								$row = mysql_fetch_assoc($result_1);
								$next_A = $row['next_button'];
							}
						
							$result_2 = mysql_query("SELECT next_button FROM julia_2p WHERE id=2");
							$num_rows = mysql_num_rows($result_2);
															
							for ($i = 1; $i <= $num_rows; $i++) {
								$row = mysql_fetch_assoc($result_2);
								$next_B = $row['next_button'];
							}
						
							if (($next_A == '1') && ($next_B == '1')) {
								// Players have passed level 1
								// Show Continue / Done button for both
								
								if ($player == 'A') { echo("<a href='#two' class='next_A_1'>Done</a>"); }
							
								if ($player == 'B') { echo("<a href='#two' class='next_B_1'>Done</a>"); }
								
							}
						
							if (($next_A == '0') && ($next_B == '0')) {
								// Players are at level for the first time
								
								if ($player == 'A') { echo("<a href='' class='next_A_1'>Next</a>"); }
							
								if ($player == 'B') { echo("<a href='' class='next_B_1'>Next</a>"); }
								
							}
							
							if (($next_A == '1') && ($next_B == '0')) {
								// Player A has passed, Player B has not 
								
								if ($player == 'A') { echo("<a href='' class='next_A_1'>...</a>"); }
							
								if ($player == 'B') { echo("<a href='' class='next_B_1'>Next</a>"); }
								
							}
							
							if (($next_A == '0') && ($next_B == '1')) {
								// Player B has passed, Player A has not 
								
								if ($player == 'A') { echo("<a href='' class='next_A_1'>Next</a>"); }
							
								if ($player == 'B') { echo("<a href='' class='next_B_1'>...</a>"); }
								
							}
							
							// if ($player == 'A') { echo("<a href='' class='next_A_1'>Next</a>"); }
							
							// if ($player == 'B') { echo("<a href='' class='next_B_1'>Next</a>"); }
							
						?>
					
					</div>
						
				</div>

			</div> <!-- End container -->
			
		</div><!-- End PAGE ONE -->		
		
		<div data-role="page" id="two" class="page">
					
			<div data-role="content" data-theme="a">
			
				<p>Page two</p>
												
				<div class="back_button_2">
					<a href='#one'>Next</a>
				</div>
				
			</div>
			
		</div>		
		
	</body>

</html>