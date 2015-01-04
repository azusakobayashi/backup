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
	
		<title>The Great Accelerator // Paul Virilio</title>
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="stylesheet" href="style.css" />
        <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.js"></script>
        <script type="text/javascript" src="http://jqueryrotate.googlecode.com/svn/trunk/jQueryRotate.js"></script>
		
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.1/jquery.mobile.structure-1.1.1.min.css" />

		<style>
		
		</style>
		
		<script>

            // http://api.jquery.com/category/events/
            // http://jquerymobile.com/test/docs/api/events.html

            $(document).bind('pageinit', init);

            function init() {
                            
                // Define URL PARAM Function to get parameters out of URL
                
					$.urlParam = function(name){
						var results = new RegExp('[\\?&amp;]' + name + '=([^&amp;#]*)').exec(window.location.href);
						return results[1] || 0;
					}
					
					function getURLParameter(name) {
						return decodeURI(
							(RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||[,null])[1]
						);
					}

				// Define update functions				
				
				
				var current_loc_A;
				var current_loc_B;
				var current_loc_on_A;
				var current_loc_on_B;
				
				var checkPlayer = setInterval(function() {
					  var player_exists = $.urlParam('player'); 
					  if (player_exists != '') {
							if (player_exists == 'A') {
								periodicUpdateA();
							}
							if (player_exists == 'B') {
								periodicUpdateB();
							}
							clearInterval(checkPlayer);
					  }
				}, 2000);
				
				function resetCallLink() {
					var player_id_call = getURLParameter('player');
					$.ajax({
						url: 'call.php?link=0&player=' + player_id_call
					});
				}
				
				function periodicUpdateA() {
					$.ajax({
						type: 'POST',
						url: 'location.php?player=A',
						dataType: 'json',
						cache: false,
							// Add current_loc class to B's link location
						success: function(data) {		
							if (data.current_loc_B != 0) {
								var var_2 = ".link-" + data.current_loc_B;
								$(var_2).addClass("current_loc_href");
							}
							if (data.current_loc_on_B == 0) {
								var_4 = ".link-" + data.current_loc_B;
								$(var_4).removeClass("current_loc_href");
							}
							if (data.call_req_B != 0) {
							
								if (data.call_req_page_B <= data.next_A) {
									$(".call").show();
									$(".call").html("<div class='call-inner'>Player B is calling you over. <a href='#one' class='goto-" + data.call_req_B + "'>Join?</a> Or <a href='#one' class='decline'>decline</a>.</div>");
								}

							}
							if (data.call_req_B == 0) {
								$(".call").hide();
							}
							
							if ((data.next_A == data.next_B) && (data.next_A == 1)) {
								$(".next_button_1").html("<a class='done' href='#two'>&rarr;</a>");
							}
							if ((data.next_A == data.next_B) && (data.next_A == 2)) {
								$(".next_button_1").html("<a class='done' href='#three'>&rarr;</a>");
							}
							if ((data.next_A == data.next_B) && (data.next_A == 3)) {
								$(".next_button_1").html("<a class='done' href='#four'>&rarr;</a>");
							}
							if ((data.next_A == data.next_B) && (data.next_A == 4)) {
								$(".next_button_1").html("<a class='done' href='http://bert.art.yale.edu/~julianovitch/2p/2p.php'>&rarr;</a>");
							}
							
						},
					 	complete: function(data) {
							setTimeout(periodicUpdateA, 1000);		
						}
					});
				} 
				
				function periodicUpdateB() {
					$.ajax({
						type: 'POST',
						url: 'location.php?player=B',
						dataType: 'json',
						cache: false,
							// Add current_loc class to A's link location
						success: function(data) {		
							if (data.current_loc_A != 0) {
								var var_1 = ".link-" + data.current_loc_A;
								$(var_1).addClass("current_loc_href");
							} 
							if (data.current_loc_on_A == 0) {
								var var_3 = ".link-" + data.current_loc_A;
								$(var_3).removeClass("current_loc_href");
							} 
							if (data.call_req_A != 0) {
								if (data.call_req_page_A <= data.next_B) {
									$(".call").show();
									$(".call").html("<div class='call-inner'>Player A is calling you over. <a href='#one' class='goto-" + data.call_req_A + "'>Join?</a> Or <a href='#one' class='decline'>decline</a>.</div>");
								}
							}
							if (data.call_req_A == 0) {
								$(".call").hide();
							}
							
							
							if ((data.next_A == data.next_B) && (data.next_A == 1)) {
								$(".next_button_1").html("<a class='done' href='#two'>&rarr;</a>");
							}
							if ((data.next_A == data.next_B) && (data.next_A == 2)) {
								$(".next_button_1").html("<a class='done' href='#three'>&rarr;</a>");
							}
							if ((data.next_A == data.next_B) && (data.next_A == 3)) {
								$(".next_button_1").html("<a class='done' href='#four'>&rarr;</a>");
							}
							if ((data.next_A == data.next_B) && (data.next_A == 4)) {
								$(".next_button_1").html("<a class='done' href='http://bert.art.yale.edu/~julianovitch/2p/2p.php'>&rarr;</a>");
							}
							
						},
					 	complete: function(data) {
							setTimeout(periodicUpdateB, 1000);						
						}
					});
				} 
				
				
				// Define page reload when Next is clicked so page info is updated
				
				
				$('.done').live('click', function(e) {
					e.preventDefault(); // Prevent the browser from handling the link normally, this stops the page from jumping around. Remove this line if you do want it to jump to the anchor as normal.
					var linkHref = $(this).attr('href'); // Grab the URL from the link
					if (linkHref.indexOf("#") != -1) { // Check that there's a # character
						var hash = linkHref.substr(linkHref.indexOf("#") + 1); // Assign the hash to a variable (it will contain "myanchor1" etc
						document.location.href = linkHref; // Go to hash
						location.reload(); // reload to get correct text
					}
				});				
				

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
                
                
                
                
				// SECONDARY LINK NAV
                
                	// Links on page 1

						// Clicking on Down
						$(".down-20").live('click', function(e) {
							$('.link-20-text').hide('slow');
							$('.link-21-text').hide('slow');
							$('.down-1-20').hide('slow');
							
							$('body,html').animate({
								scrollTop: $(document).height()
							}, 800, function(){
							
								// Rotate master div
								var curAngle = parseInt($("#master-container").getRotateAngle()) || 0;
								$("#master-container").rotate({
									angle: curAngle,
									animateTo: curAngle + 180,
									duration: 1000
								});
								
								$('body,html').animate({scrollTop: 0}, 800);
	
							});
							
							// Update location in database and toggle title
							var player_id = getURLParameter('player');
							$.ajax({
								url: 'secondary.php?link=20&player=' + player_id
							});
							$(".secondarytitle-20").toggle();
							
						});
						
						$(".down-21").live('click', function(e) {
							$('.link-20-text').hide('slow');
							$('.link-21-text').hide('slow');
							$('.down-1-21').hide('slow');
							
							$('body,html').animate({
								scrollTop: $(document).height()
							}, 800, function(){
							
								// Rotate master div
								var curAngle = parseInt($("#master-container").getRotateAngle()) || 0;
								$("#master-container").rotate({
									angle: curAngle,
									animateTo: curAngle + 180,
									duration: 1000
								});
								
								$('body,html').animate({scrollTop: 0}, 800);
	
							});
							
							// Update location in database and toggle title
							var player_id = getURLParameter('player');
							$.ajax({
								url: 'secondary.php?link=21&player=' + player_id
							});
							$(".secondarytitle-21").toggle();
							
						});
						
						

						// Link 20
                
						$(".link-20").live('click', function(e) {
							// If only this link is open and no others are open, animate closing
							if (($('.link-20-text').css('display') != 'none') && ($('.link-21-text').css('display') == 'none')) {
							
								$(".link-20-text").toggle('slow');
								$(".down-1-20").toggle('slow');
	
								$('body,html').animate({
									scrollTop: $(document).height()
								}, 800, function(){
								
									// Rotate master div
									var curAngle = parseInt($("#master-container").getRotateAngle()) || 0;
									$("#master-container").rotate({
										angle: curAngle,
										animateTo: curAngle + 180,
										duration: 1000
									});
									
									$('body,html').animate({scrollTop: 0}, 800);
		
								});
									
							}
						
							// If this link is open, and a different link is clicked, close this link, open new link, do not animate
							
							
						
							// If other links are open including this one, close links without animation and close this one
							if ($('.link-21-text').css('display') != 'none') {
							
								$(".link-21-text").hide('slow', function() {
										$(".link-20-text").show('slow');
									});
									
							}
							
						/*	// If other links are open, close without animation without animation and open this link
							if (($('.link-21-text').css('display') != 'none') && ($('.link-20-text').css('display') == 'none')){
							
								$(".link-21-text").hide('slow', function() {
										$(".link-20-text").show('slow');
									});
									
							}*/
							
							// If no links are open, animate
							if (($('.link-21-text').css('display') == 'none') && ($('.link-20-text').css('display') == 'none')) {
							
								$(".link-20-text").toggle('slow');
								$(".down-1-20").toggle('slow');
	
								$('body,html').animate({
									scrollTop: $(document).height()
								}, 800, function(){
								
									// Rotate master div
									var curAngle = parseInt($("#master-container").getRotateAngle()) || 0;
									$("#master-container").rotate({
										angle: curAngle,
										animateTo: curAngle + 180,
										duration: 1000
									});
									
									$('body,html').animate({scrollTop: 0}, 800);
		
								});
							}			
		
							// Update location in database and toggle title
							var player_id = getURLParameter('player');
							$.ajax({
								url: 'secondary.php?link=20&player=' + player_id
							});
							$(".secondarytitle-20").toggle();
							
						});
						
						// Link 21
						
						$(".link-21").live('click', function(e) {
							// If only this link is open and no others are open, animate closing
							if (($('.link-21-text').css('display') != 'none') && ($('.link-20-text').css('display') == 'none')) {
							
								$(".link-21-text").toggle('slow');
								$(".down-1-21").toggle('slow');
	
								$('body,html').animate({
									scrollTop: $(document).height()
								}, 800, function(){
								
									// Rotate master div
									var curAngle = parseInt($("#master-container").getRotateAngle()) || 0;
									$("#master-container").rotate({
										angle: curAngle,
										animateTo: curAngle + 180,
										duration: 1000
									});
									
									$('body,html').animate({scrollTop: 0}, 800);
		
								});
									
							}
						
							// If this link is open, and a different link is clicked, close this link, open new link, do not animate
							
							
						
							// If other links are open including this one, close links without animation and close this one
							if ($('.link-20-text').css('display') != 'none') {
							
								$(".link-20-text").hide('slow', function() {
										$(".link-21-text").show('slow');
									});
									
							}
							
						/*	// If other links are open, close without animation without animation and open this link
							if (($('.link-21-text').css('display') != 'none') && ($('.link-20-text').css('display') == 'none')){
							
								$(".link-21-text").hide('slow', function() {
										$(".link-20-text").show('slow');
									});
									
							}*/
							
							// If no links are open, animate
							if (($('.link-20-text').css('display') == 'none') && ($('.link-21-text').css('display') == 'none')) {
							
								$(".link-21-text").toggle('slow');
								$(".down-1-21").toggle('slow');
	
								$('body,html').animate({
									scrollTop: $(document).height()
								}, 800, function(){
								
									// Rotate master div
									var curAngle = parseInt($("#master-container").getRotateAngle()) || 0;
									$("#master-container").rotate({
										angle: curAngle,
										animateTo: curAngle + 180,
										duration: 1000
									});
									
									$('body,html').animate({scrollTop: 0}, 800);
		
								});
							}			
						
	
							// Update location in database and toggle title
							var player_id = getURLParameter('player');
							$.ajax({
								url: 'secondary.php?link=21&player=' + player_id
							});
							$(".secondarytitle-21").toggle();
							
						});
						
						
					
					
					// LINKS ON PAGE 2
					
					// Links on page 1

						// Clicking on Down
						$(".down-22").live('click', function(e) {
							$('.link-22-text').hide('slow');
							$('.link-23-text').hide('slow');
							$('.down-1-22').hide('slow');
							
							$('body,html').animate({
								scrollTop: $(document).height()
							}, 800, function(){
							
								// Rotate master div
								var curAngle = parseInt($("#master-container").getRotateAngle()) || 0;
								$("#master-container").rotate({
									angle: curAngle,
									animateTo: curAngle + 180,
									duration: 1000
								});
								
								$('body,html').animate({scrollTop: 0}, 800);
	
							});
							
							// Update location in database and toggle title
							var player_id = getURLParameter('player');
							$.ajax({
								url: 'secondary.php?link=22&player=' + player_id
							});
							$(".secondarytitle-22").toggle();
							
						});
						
						$(".down-23").live('click', function(e) {
							$('.link-22-text').hide('slow');
							$('.link-23-text').hide('slow');
							$('.down-1-23').hide('slow');
							
							$('body,html').animate({
								scrollTop: $(document).height()
							}, 800, function(){
							
								// Rotate master div
								var curAngle = parseInt($("#master-container").getRotateAngle()) || 0;
								$("#master-container").rotate({
									angle: curAngle,
									animateTo: curAngle + 180,
									duration: 1000
								});
								
								$('body,html').animate({scrollTop: 0}, 800);
	
							});
							
							// Update location in database and toggle title
							var player_id = getURLParameter('player');
							$.ajax({
								url: 'secondary.php?link=23&player=' + player_id
							});
							$(".secondarytitle-23").toggle();
							
						});
						
						

						// Link 22
                
						$(".link-22").live('click', function(e) {
							// If only this link is open and no others are open, animate closing
							if (($('.link-22-text').css('display') != 'none') && ($('.link-23-text').css('display') == 'none')) {
							
								$(".link-22-text").toggle('slow');
								$(".down-1-22").toggle('slow');
	
								$('body,html').animate({
									scrollTop: $(document).height()
								}, 800, function(){
								
									// Rotate master div
									var curAngle = parseInt($("#master-container").getRotateAngle()) || 0;
									$("#master-container").rotate({
										angle: curAngle,
										animateTo: curAngle + 180,
										duration: 1000
									});
									
									$('body,html').animate({scrollTop: 0}, 800);
		
								});
									
							}
						
							// If this link is open, and a different link is clicked, close this link, open new link, do not animate
							
							
						
							// If other links are open including this one, close links without animation and close this one
							if ($('.link-23-text').css('display') != 'none') {
							
								$(".link-23-text").hide('slow', function() {
										$(".link-22-text").show('slow');
									});
									
							}
							
						/*	// If other links are open, close without animation without animation and open this link
							if (($('.link-23-text').css('display') != 'none') && ($('.link-22-text').css('display') == 'none')){
							
								$(".link-23-text").hide('slow', function() {
										$(".link-22-text").show('slow');
									});
									
							}*/
							
							// If no links are open, animate
							if (($('.link-23-text').css('display') == 'none') && ($('.link-22-text').css('display') == 'none')) {
							
								$(".link-22-text").toggle('slow');
								$(".down-1-22").toggle('slow');
	
								$('body,html').animate({
									scrollTop: $(document).height()
								}, 800, function(){
								
									// Rotate master div
									var curAngle = parseInt($("#master-container").getRotateAngle()) || 0;
									$("#master-container").rotate({
										angle: curAngle,
										animateTo: curAngle + 180,
										duration: 1000
									});
									
									$('body,html').animate({scrollTop: 0}, 800);
		
								});
							}			
		
							// Update location in database and toggle title
							var player_id = getURLParameter('player');
							$.ajax({
								url: 'secondary.php?link=22&player=' + player_id
							});
							$(".secondarytitle-22").toggle();
							
						});
						
						// Link 23
						
						$(".link-23").live('click', function(e) {
							// If only this link is open and no others are open, animate closing
							if (($('.link-23-text').css('display') != 'none') && ($('.link-22-text').css('display') == 'none')) {
							
								$(".link-23-text").toggle('slow');
								$(".down-1-23").toggle('slow');
	
								$('body,html').animate({
									scrollTop: $(document).height()
								}, 800, function(){
								
									// Rotate master div
									var curAngle = parseInt($("#master-container").getRotateAngle()) || 0;
									$("#master-container").rotate({
										angle: curAngle,
										animateTo: curAngle + 180,
										duration: 1000
									});
									
									$('body,html').animate({scrollTop: 0}, 800);
		
								});
									
							}
						
							// If this link is open, and a different link is clicked, close this link, open new link, do not animate
							
							
						
							// If other links are open including this one, close links without animation and close this one
							if ($('.link-22-text').css('display') != 'none') {
							
								$(".link-22-text").hide('slow', function() {
										$(".link-23-text").show('slow');
									});
									
							}
							
						/*	// If other links are open, close without animation without animation and open this link
							if (($('.link-23-text').css('display') != 'none') && ($('.link-22-text').css('display') == 'none')){
							
								$(".link-23-text").hide('slow', function() {
										$(".link-22-text").show('slow');
									});
									
							}*/
							
							// If no links are open, animate
							if (($('.link-22-text').css('display') == 'none') && ($('.link-23-text').css('display') == 'none')) {
							
								$(".link-23-text").toggle('slow');
								$(".down-1-23").toggle('slow');
	
								$('body,html').animate({
									scrollTop: $(document).height()
								}, 800, function(){
								
									// Rotate master div
									var curAngle = parseInt($("#master-container").getRotateAngle()) || 0;
									$("#master-container").rotate({
										angle: curAngle,
										animateTo: curAngle + 180,
										duration: 1000
									});
									
									$('body,html').animate({scrollTop: 0}, 800);
		
								});
							}			
						
	
							// Update location in database and toggle title
							var player_id = getURLParameter('player');
							$.ajax({
								url: 'secondary.php?link=23&player=' + player_id
							});
							$(".secondarytitle-23").toggle();
							
						});
					
			
			
			
                // CALL FUNCTION
                	
                	$(".call-20").live('click', function(e) {
                		//alert("call sent");
                		var player_id = getURLParameter('player');
						$.ajax({
							url: 'call.php?link=20&link_page=1&player=' + player_id
						});
                	});
                	
                	$(".call-21").live('click', function(e) {
                		alert("call sent");
                		var player_id = getURLParameter('player');
						$.ajax({
							url: 'call.php?link=21&link_page=1&player=' + player_id
						});
                	});
                	
                	
                	$(".goto-20").live('click', function(e) {
                		
                		$(".link-20-text").toggle('slow');
                		$(".down-1-20").toggle('slow');
						$('body,html').animate({
									scrollTop: $(document).height()
								}, 800, function(){
								
									// Rotate master div
									var curAngle = parseInt($("#master-container").getRotateAngle()) || 0;
									$("#master-container").rotate({
										angle: curAngle,
										animateTo: curAngle + 180,
										duration: 1000
									});
									
									$('body,html').animate({scrollTop: 0}, 800);
		
								});
										
						var player_id = getURLParameter('player');
						$.ajax({
							url: 'secondary.php?link=20&player=' + player_id
						});
						$.ajax({
							url: 'call.php?reset=true&player=' + player_id,
							complete: function(data) {
							$(".call").hide();					
						}
							
							
						});
						
                	});
                	
                	$(".goto-21").live('click', function(e) {
                		
                		$(".link-21-text").toggle('slow');
                		$(".down-1-21").toggle('slow');
						$('body,html').animate({
							scrollTop: $(document).height()
						}, 800, function(){
						
							// Rotate master div
							var curAngle = parseInt($("#master-container").getRotateAngle()) || 0;
							$("#master-container").rotate({
								angle: curAngle,
								animateTo: curAngle + 180,
								duration: 1000
							});
							
							$('body,html').animate({scrollTop: 0}, 800);

						});
							
						var player_id = getURLParameter('player');
						$.ajax({
							url: 'secondary.php?link=21&player=' + player_id
						});
						$.ajax({
							url: 'call.php?reset=true&player=' + player_id,
							complete: function(data) {
							$(".call").hide();		
							
							}
						});
                	});
                	
                	$(".call-22").live('click', function(e) {
                		//alert("call sent");
                		var player_id = getURLParameter('player');
						$.ajax({
							url: 'call.php?link=22&link_page=1&player=' + player_id
						});
                	});
                	
                	$(".call-23").live('click', function(e) {
                		alert("call sent");
                		var player_id = getURLParameter('player');
						$.ajax({
							url: 'call.php?link=23&link_page=1&player=' + player_id
						});
                	});
                	
                	
                	$(".goto-22").live('click', function(e) {
                		$(".link-22-text").toggle('slow');
						$('body,html').animate({
							scrollTop: 0
						}, 800);
						var player_id = getURLParameter('player');
						$.ajax({
							url: 'secondary.php?link=22&player=' + player_id
						});
						$.ajax({
							url: 'call.php?reset=true&player=' + player_id
						});
                	});
                	
                	$(".goto-23").live('click', function(e) {
                		$(".link-23-text").toggle('slow');
						$('body,html').animate({
							scrollTop: 0
						}, 800);
						var player_id = getURLParameter('player');
						$.ajax({
							url: 'secondary.php?link=23&player=' + player_id
						});
						$.ajax({
							url: 'call.php?reset=true&player=' + player_id
						});
                	});
                	
                	// Decline buttons
                	
                	$(".decline").live('click', function(e) {
                		var player_id = getURLParameter('player');
                		$.ajax({
							url: 'call.php?reset=true&player=' + player_id,
							complete: function(data) {
							$(".call").hide();		
							
							}
						});
						$(".call").hide();	
                	});
                	
                
                // PAGE 1 NEXT NAVIGATION	

					var status_1;
					var body_text_1_links;
					var body_text_1_plain;
					
					$( ".next_A_1" ).bind( "click", function() {
							
						$('body,html').animate({
							scrollTop: $(document).height()
						}, 800, function(){
						
							// Rotate master div
							var curAngle = parseInt($("#master-container").getRotateAngle()) || 0;
							
							$('body,html').animate({scrollTop: 0}, 800);

						});
												
						$.ajax({
							type: 'POST',
							url: 'next.php?player=A&next=1',
							dataType: 'json',
							cache: false,
							success: function(data) {
								//alert('FIRST PLAYER load was performed.');
								
								if (data.status_1 == 0) { 
									$(".next_button_1").html("<a class='done' href='#two'>&rarr;</a>");
									$(".body_text").html(data.body_text_1_links);
									$(".call-box-1").show();
								}	
								
								if (data.status_1 == 1) { 
									$(".next_button_1").html("<a href=''>...</a>");
									$(".body_text").html(data.body_text_1_links);
									$(".call-box-1").show();
								}
								
								if (data.status_1 == 2) { 
									$(".next_button_1").html("<a href='' class='next_A_1'>Next</a>");
									$(".call-box-1").hide();
								}
								
								
								
							}
							
						});
					
	
					});
					
					$( ".next_B_1" ).bind( "click", function() {
					
						$('body,html').animate({
							scrollTop: $(document).height()
						}, 800, function(){
						
							// Rotate master div
							var curAngle = parseInt($("#master-container").getRotateAngle()) || 0;
							
							$('body,html').animate({scrollTop: 0}, 800);

						});
						
						$.ajax({
							type: 'POST',
							url: 'next.php?player=B&next=1',
							dataType: 'json',
							cache: false,
							success: function(data) {
								// alert('SECOND PLAYER load was performed.');
								
								if (data.status_1 == 0) { 
									$(".next_button_1").html("<a class='done' href='#two'>&rarr;</a>");
									$(".body_text").html(data.body_text_1_links);
									$(".call-box-1").show();
								}	
								
								// REMEMBER TO REVERSE DATA STATUSES FOR 2nd PLAYER
								if (data.status_1 == 2) { 
									$(".next_button_1").html("<a href=''>...</a>");
									$(".body_text").html(data.body_text_1_links);
									$(".call-box-1").show();
								}
								
								if (data.status_1 == 1) { 
									$(".next_button_1").html("<a href='' class='next_B_1'>Next</a>");
									$(".call-box-1").hide();
								}
								
								
								
							}
							
						});
						
					});


				// PAGE 2 NEXT NAVIGATION	

					var status_2;
					var body_text_2_links;
					var body_text_2_plain;
					
					$( ".next_A_2" ).bind( "click", function() {
					
						$('body,html').animate({
							scrollTop: $(document).height()
						}, 800, function(){
						
							// Rotate master div
							var curAngle = parseInt($("#master-container").getRotateAngle()) || 0;
							
							$('body,html').animate({scrollTop: 0}, 800);

						});
											
						$.ajax({
							type: 'POST',
							url: 'next.php?player=A&next=2',
							dataType: 'json',
							cache: false,
							success: function(data) {
								// alert('FIRST PLAYER load was performed.');
								
								if (data.status_2 == 0) { 
									$(".next_button_2").html("<a class='done' href='#three'>&rarr;</a>");
									$(".body_text").html(data.body_text_2_links);
								}	
								
								if (data.status_2 == 1) { 
									$(".next_button_2").html("<a href=''>...</a>");
									$(".body_text").html(data.body_text_2_links);
								}
								
								if (data.status_2 == 2) { 
									$(".next_button_2").html("<a href='' class='next_A_2'>Next</a>");
								}
								
							}
							
						});
	
					});
					
					$( ".next_B_2" ).bind( "click", function() {
					
						$('body,html').animate({
							scrollTop: $(document).height()
						}, 800, function(){
						
							// Rotate master div
							var curAngle = parseInt($("#master-container").getRotateAngle()) || 0;
							
							$('body,html').animate({scrollTop: 0}, 800);

						});
						
						$.ajax({
							type: 'POST',
							url: 'next.php?player=B&next=2',
							dataType: 'json',
							cache: false,
							success: function(data) {
								// alert('SECOND PLAYER load was performed.');
								
								if (data.status_2 == 0) { 
									$(".next_button_2").html("<a class='done' href='#three'>&rarr;</a>");
									$(".body_text").html(data.body_text_2_links);
								}	
								
								if (data.status_2 == 2) { 
									$(".next_button_2").html("<a href=''>...</a>");
									$(".body_text").html(data.body_text_2_links);
								}
								
								if (data.status_2 == 1) { 
									$(".next_button_2").html("<a href='' class='next_B_2'>Next</a>");
								}
								
							}
							
						});
						
					});


				// PAGE 3 NEXT NAVIGATION	

					var status_3;
					var body_text_3_links;
					var body_text_3_plain;
					
					$( ".next_A_3" ).bind( "click", function() {
					
						$('body,html').animate({
							scrollTop: $(document).height()
						}, 800, function(){
						
							// Rotate master div
							var curAngle = parseInt($("#master-container").getRotateAngle()) || 0;
							
							$('body,html').animate({scrollTop: 0}, 800);

						});
											
						$.ajax({
							type: 'POST',
							url: 'next.php?player=A&next=3',
							dataType: 'json',
							cache: false,
							success: function(data) {
								// alert('FIRST PLAYER load was performed.');
								
								if (data.status_3 == 0) { 
									$(".next_button_3").html("<a class='done' href='#four'>&rarr;</a>");
									$(".body_text").html(data.body_text_3_links);
								}	
								
								if (data.status_3 == 1) { 
									$(".next_button_3").html("<a href=''>...</a>");
									$(".body_text").html(data.body_text_3_links);
								}
								
								if (data.status_3 == 2) { 
									$(".next_button_3").html("<a href='' class='next_A_3'>Next</a>");
								}
								
							}
							
						});
	
					});
					
					$( ".next_B_3" ).bind( "click", function() {
					
						$('body,html').animate({
							scrollTop: $(document).height()
						}, 800, function(){
						
							// Rotate master div
							var curAngle = parseInt($("#master-container").getRotateAngle()) || 0;
							
							$('body,html').animate({scrollTop: 0}, 800);

						});
						
						$.ajax({
							type: 'POST',
							url: 'next.php?player=B&next=3',
							dataType: 'json',
							cache: false,
							success: function(data) {
								// alert('SECOND PLAYER load was performed.');
								
								if (data.status_3 == 0) { 
									$(".next_button_3").html("<a class='done' href='#four'>&rarr;</a>");
									$(".body_text").html(data.body_text_3_links);
								}	
								
								if (data.status_3 == 2) { 
									$(".next_button_3").html("<a href=''>...</a>");
									$(".body_text").html(data.body_text_3_links);
								}
								
								if (data.status_3 == 1) { 
									$(".next_button_3").html("<a href='' class='next_B_3'>Next</a>");
								}
								
							}
							
						});
						
					});
					
					
				// PAGE 4 NEXT NAVIGATION	

					var status_4;
					var body_text_4_links;
					var body_text_4_plain;
					
					$( ".next_A_4" ).bind( "click", function() {
					
						$('body,html').animate({
							scrollTop: $(document).height()
						}, 800, function(){
						
							// Rotate master div
							var curAngle = parseInt($("#master-container").getRotateAngle()) || 0;
							
							$('body,html').animate({scrollTop: 0}, 800);

						});
											
						$.ajax({
							type: 'POST',
							url: 'next.php?player=A&next=4',
							dataType: 'json',
							cache: false,
							success: function(data) {
								// alert('FIRST PLAYER load was performed.');
								
								if (data.status_4 == 0) { 
									$(".next_button_4").html("<a class='done' href='#five'>&rarr;</a>");
									$(".body_text").html(data.body_text_4_links);
								}	
								
								if (data.status_4 == 1) { 
									$(".next_button_4").html("<a href=''>...</a>");
									$(".body_text").html(data.body_text_4_links);
								}
								
								if (data.status_4 == 2) { 
									$(".next_button_4").html("<a href='' class='next_A_4'>Next</a>");
								}
								
							}
							
						});
	
					});
					
					$( ".next_B_4" ).bind( "click", function() {
					
						$('body,html').animate({
							scrollTop: $(document).height()
						}, 800, function(){
						
							// Rotate master div
							var curAngle = parseInt($("#master-container").getRotateAngle()) || 0;
							
							$('body,html').animate({scrollTop: 0}, 800);

						});
						
						$.ajax({
							type: 'POST',
							url: 'next.php?player=B&next=4',
							dataType: 'json',
							cache: false,
							success: function(data) {
								// alert('SECOND PLAYER load was performed.');
								
								if (data.status_4 == 0) { 
									$(".next_button_4").html("<a class='done' href='#five'>&rarr;</a>");
									$(".body_text").html(data.body_text_4_links);
								}	
								
								if (data.status_4 == 2) { 
									$(".next_button_4").html("<a href=''>...</a>");
									$(".body_text").html(data.body_text_4_links);
								}
								
								if (data.status_4 == 1) { 
									$(".next_button_4").html("<a href='' class='next_B_4'>Next</a>");
								}
								
							}
							
						});
						
					});
                
            } // End init
            
        </script>
		
	</head>
	
	<body>
	
	<div class="down down-1-20"><a class="call-20" href=''>Call</a><a class="down-20" href=''>Down</a></div>	
	<div class="down down-1-21"><a class="call-21" href=''>Call</a><a class="down-21" href=''>Down</a></div>	
	<div class="down down-2-22"><a class="call-22" href=''>Call</a><a class="down-22" href=''>Down</a></div>	
	<div class="down down-2-23"><a class="call-23" href=''>Call</a><a class="down-23" href=''>Down</a></div>	
	<div class="down down-3"><a class="" href=''>Down</a></div>	
	<div class="down down-4"><a class="" href=''>Down</a></div>	
	
	<div class="call"><div class="call-inner"></div></div>
	
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
	
	
	
	<!-- GAME INITIALIZATION -->
	
		<div data-role="page" id="new_game" class="page">
					
			<div data-role="content" data-theme="a">
			
				<div id="newgame_title">
					<p>New game</p>
				
					<a href="2p.php?#choose_player" class="new_game" data-role="button">New game</a>
				</div>
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
		
		<div data-role="page" id="one" class="page"><div id="master-container">
						
			<div class="container">
							
				<div class="title-container">	
					<div class="maintitle">
					PAUL VIRILIO<br/>
						The Great Accelerator				
						</div>
				</div>
				
			
				
				<div data-role="content" class="mainbodytext">
								
					<!-- Output correct version of body text -->
					
					<div class="body_text">
						
						<?php 
						
							// Call next button
						
							$player = $_GET['player']; 
							
							$result_1 = mysql_query("SELECT next_button FROM julia_2p WHERE id=1");
							$num_rows_1 = mysql_num_rows($result_1);
															
							for ($i = 1; $i <= $num_rows_1; $i++) {
								$row_1 = mysql_fetch_assoc($result_1);
								$next_A = $row_1['next_button'];
							}
						
							$result_2 = mysql_query("SELECT next_button FROM julia_2p WHERE id=2");
							$num_rows_2 = mysql_num_rows($result_2);
															
							for ($i = 1; $i <= $num_rows_2; $i++) {
								$row_2 = mysql_fetch_assoc($result_2);
								$next_B = $row_2['next_button'];
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
							
						?>
						
					</div>
					
					<!-- Output correct next button -->
					
					<div class="back-button"><a href="http://bert.art.yale.edu/~julianovitch/2p/2p.php">Back</a></div>
					
					
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
								
								if ($player == 'A') { echo("<a class='done' href='#two'>&rarr;</a>"); }
							
								if ($player == 'B') { echo("<a class='done' href='#two'>&rarr;</a>"); }
								
							}
						
							if (($next_A == '0') && ($next_B == '0')) {
								// Players are at level for the first time
								
								if ($player == 'A') { echo("<a href='' class='next_A_1'>Next</a>"); }
							
								if ($player == 'B') { echo("<a href='' class='next_B_1'>Next</a>"); }
								
							}
							
							if (($next_A == '1') && ($next_B == '0')) {
								// Player A has passed, Player B has not 
								
								if ($player == 'A') { echo("<a href=''>...</a>"); }
							
								if ($player == 'B') { echo("<a href='' class='next_B_1'>Next</a>"); }
								
							}
							
							if (($next_A == '0') && ($next_B == '1')) {
								// Player B has passed, Player A has not 
								
								if ($player == 'A') { echo("<a href='' class='next_A_1'>Next</a>"); }
							
								if ($player == 'B') { echo("<a href=''>...</a>"); }
								
							}
							
						?>
					
					</div>
						
				</div>

			</div> <!-- End container -->
			
			<div class="call call-box-1">
			</div>		

			<div class="secondary-container">

				<div class="secondary-text">
		
					<div class="secondary link-20-text">
					
						<div class="secondary-title">
							You're Welcome<br/>
							Couch-Surfing the Globe<br/>
							Patricia Marx, <em>The New Yorker</em>
						</div>
					
						<div class="spacer"></div>
						<div class="secondary-inner">
						
						<p>Is couch surfing for people who have no friends? How do you know the sheets are clean? What happened to &#8220;Never talk to strangers&#8221;?</p>

<p>&#8220;This is the last thing you want to hear when you&#8217;re couch surfing,&#8221; said my host, Cortney Fielding, a thirty-year-old freelance writer, when I arrived, this winter, at her one-bedroom apartment in the Nob Hill neighborhood of San Francisco. &#8220;Couch surfing&#8221; refers to the practice of temporarily lodging with a stranger&#8212;free of charge, unless you count being incessantly sociable as payment. Fielding and I, along with 3,965,492 others, are members of CouchSurfing.org, a hospitality-exchange network that pairs travellers looking for a place to crash with locals willing to accommodate them or perhaps just meet for a beverage. There are members in every country, including North Korea, Pakistan, and the Vatican, and also in Antarctica. They speak, all told, three hundred and sixty-five languages&#8212;Saramaccan, Yapese, Quiche, and Nicaraguan Sign Language, to name some I bet you are not fluent in. The WikiLeaker Julian Assange belonged to CouchSurfing.</p>

<p>I do not find the concept of consorting with unknown persons appealing. (Is it for people who have no friends? How do you know the sheets are clean? What is it with people always wanting to get together? What happened to &#8220;Never talk to strangers&#8221;?) Still, I joined CouchSurfing recently, and I surfed in four cities on seven couches (actually, beds, mostly). Fielding and her husband, Andy Storch (he was out of town on business when I visited), are three-year veterans. &#8220;Like most Americans, we have two weeks of vacation, so we don&#8217;t get to travel much,&#8221; Fielding explained. &#8220;If we can&#8217;t go to the world, the world will come to us. So, when we&#8217;re feeling a little bored, we think, All right, why don&#8217;t we have someone from the Netherlands visit? It&#8217;s like a blind date where the person brings his toothbrush.&#8221; Fielding and Storch, who typically take in guests every month, recently hosted a dumpster-diving couple from Canada and had just said yes to some Australians. (&#8220;We&#8217;ve never had Australians. We thought we&#8217;d check another country off our list.&#8221;) And what was the news that Fielding had alluded to when I walked in, intending to spend the night on the latte-colored microfibre pull-out sectional sofa in their living room? &#8220;I just came back from the vet,&#8221; she said, &#8220;and my cat has bladder problems.&#8221; I am not a cat person in the most continental of circumstances. &#8220;How&#8217;s the dog?&#8221; I asked of the boxer that was sniffing my suitcase. The dog was fine. And off we went to the apartment of a friend of Fielding&#8217;s to watch &#8220;The Bachelor&#8221; with a group of reality-TV connoisseurs.</p>

<p>Upon joining CouchSurfing, you are instructed to compose an online profile, delineating your philosophy and mission, the skills you can teach others, your favorite music, movies, and books, and so much else that you might as well be applying to college. Members also post photographs of themselves, sometimes hundreds of them. Often, they include a picture of the sleeping accommodations, which range from sofas to sleeping bags, from shared beds to guesthouses. I&#8217;d selected Fielding and my other hosts after scrolling through hundreds of profiles, winnowing out those whose narratives included the words &#8220;party,&#8221; &#8220;vegan,&#8221; and &#8220;free spirit,&#8221; and the phrases &#8220;I believe in the journey,&#8221; &#8220;Never stop learning, never stop loving,&#8221; and &#8220;Burning Man.&#8221;</p>

<p>Among those to whom I did not write &#8220;couch requests&#8221; were &#8220;a travelling magician and professional fool&#8221; from New Mexico; a sixty-three-year-old gay semi-retired handyman in Pahoa, Hawaii, whose mission is &#8220;looking for more nudists&#8221; (there are plenty of &#8220;clothing optional&#8221; possibilities on CouchSurfing); another Hawaiian, this one describing himself as &#8220;just a guy who has three acres of land, living in a shipping container house&#8221;; a woman in Bozeman, Montana, who declared that her &#8220;home is oppression-free. Yay!&#8221; and also contains high-speed Wi-Fi; a thirty-one-year-old female &#8220;daydreamer&#8221; from Berkeley who loves pajamas; a Tarot-card reader in Marfa, Texas; a housewife in Charleston, South Carolina, who owns a pole-dancing studio called Dolphin Dance; a kite-surfing physician (again, Charleston) whose ambition is to start a flavored-envelope company; a freelance photographer in San Francisco who claims she&#8217;s had hiccups every day for the past five years; a Savannah, Georgia, scientist who is also a &#8220;free man,&#8221; doing &#8220;whatever I want, whenever I want&#8221;; a male in Antarctica who wishes to live as a female; a &#8220;lovetarian&#8221; who grew up in Doylestown, Pennsylvania; a &#8220;proud Bangladexican&#8221; (Mexican-Bangladeshi) who likes &#8220;exciting things,&#8221; by which she means animals, forests, and jumping; an Afghan man, in Kabul, who lists his occupation as &#8220;warlord&#8221;*; another man, also in Kabul, who works as an aid worker and sometimes as an optometrist; a seminarian living in Vatican City who previously attended the Navy&#8217;s flight school and would like to have coffee with anyone passing through the sacerdotal-monarchical state; an empty-nester couple in American Samoa who have two free bedrooms in their house, which is twenty feet from the beach, with &#8220;no hot water (who needs it?)&#8221;; a twenty-five-year-old Web designer and trucker in Munich whose &#8220;perfect day&#8221; includes playing football and afterward discussing politics and getting &#8220;so mad about it, so we fight with some chairs and destroy the whole bar&#8221;; Amin Awad, from Sudan, who loves &#8220;modest guests&#8221;; an archeologist in Death Valley who assures you that black-widow spiders are gently and immediately removed from her house; a professional vegetable masher in Beijing; a guy in New York City who&#8217;s hosted a lot of couch surfers and has had only three who &#8220;sucked&#8221;; and eighty-four people in Brunei Darussalam.</p>

<p>According to the CouchSurfing Web site, the average age of members is twenty-eight, with more than a third between the ages of eighteen and twenty-four (seven hundred and ninety-three members are between eighty and eighty-nine). Reasoning that these youngsters would never welcome me as a house guest, fearing perhaps that they&#8217;d have to get out the defibrillator, I subtracted nine years from my age on the profile. However, when twenty-three-year-old Sydney Provence, a University of Iowa physics grad student, picked me up in her Toyota Corolla at the airport in Cedar Rapids&#8212;the first stop on my surfing odyssey&#8212;I immediately confessed my misdeed. &#8220;To anyone in her twenties,&#8221; she said, &#8220;forties, fifties, it&#8217;s all the same.&#8221; As we drove through winter-browned fields and then, for my touristic benefit, meandered through Iowa City, Provence called my attention to local sights. She said that she first couch-surfed four years ago, as a broke college student eager to see Austria but not without a companion. On that trip, she spent Christmas in St. Valentin with a girl her age and the girl&#8217;s mother, eating homemade holiday treats. Recently, Provence and her younger brother couch-surfed in Costa Rica, where they stayed with a tavern owner, a lucky break for her brother, who discovered that he was of legal drinking age there.</p>

<p>We reached Provence&#8217;s house&#8212;a clapboard bungalow built in the early nineteen-hundreds, which she acquired with some inherited money two years ago. The house has a wooden kitchen floor convincingly painted to look like a signed Matisse cutout, holographic art created by her father, a little red panic-like button that has no purpose whatsoever, and, best of all, a large downstairs with a daybed (and bathroom) for me to share with her beer-brewing equipment. When I marvelled at how grownup her house was, she observed, &#8220;You know you&#8217;re an adult when you have separate toilet paper, paper towels, and napkins.&#8221; We had dinner at a Japanese restaurant and then stayed up late, gabbing about, oh, you know, molecular beam epitaxy, blackbody radiation, and the Topless Tuesday Pancake Dinners she attended in her undergraduate days, at the University of Virginia.</p>

<p>When I told friends that I would be sleeping in the company of strangers, the second most frequent question they asked was &#8220;How do you know you&#8217;re not going to be bludgeoned to death in the middle of the night?&#8221; The most frequent question was &#8220;What about bedbugs?&#8221; Regarding the latter, I have not come across a single mention on the Web site of these pests, so, New Yorkers, get over your paranoia. As for safety concerns, a twenty-nine-year-old woman from Hong Kong was raped when she travelled to Leeds in 2009. There have been less dire violations reported, too, such as burglaries and harassment, but Daniel Hoffer, the company&#8217;s C.E.O. and co-founder, who is thirty-four, says that, statistically speaking, couch surfing is remarkably safe. &#8220;We have had over six million positive experiences, with only a tiny fraction of one per cent negative,&#8221; he told me at the groovy new CouchSurfing headquarters, in San Francisco, a double-level aqua-and-orange-painted loft sheltering seventeen couches and two swings suspended from a roof beam.</p>

<p>O.K., but what happens if Jack the Ripper signs up? There are three protective measures, each indicated on a member&#8217;s profile. First, for a credit-card payment of twenty-five dollars, the Web site will verify your name and address (which means that a member can be certain she is hosting the real Ripper, and not an impostor). Another feature, &#8220;the vouch,&#8221; is a sort of seal of trustworthiness conferred upon a member, say, Jack, by another member, say, Mrs. Ripper. Only members who have been vouched for three times have the power to issue such an endorsement. The most helpful security information, however, is the references that hosts and guests are encouraged to write about each other after every rendezvous. According to a 2010 study conducted by researchers at the University of Michigan, the ratio of positive to negative evaluations is twenty-five hundred to one. Still, an astute reader can read between the lines in an assessment like &#8220;Jack has an awesome collection of steak knives&#8221; or &#8220;He can put out a fire really fast.&#8221; Given these safeguards, it is unlikely that anyone on CouchSurfing could get away with murder more than once. How comforting.</p>

<p>My next hotelier, cicerone, and instant buddy in Iowa City, Deborah Yarchun (age twenty-six), was neither verified nor vouched for, but she had thirteen gushing references. A strawberry blonde dressed in black who rides a unicycle and does micrography, making drawings composed of tiny words, Yarchun is pursuing an M.F.A. at the Iowa Playwrights Workshop. Over morning coffee at the Prairie Lights bookstore, she explained that she joined CouchSurfing after she moved to Iowa, in 2010, and missed having roommates. &#8220;The first time I lived alone, I lasted three days before I bought a hamster,&#8221; she said. &#8220;CouchSurfing is perfect, because I can share my space a day at a time.&#8221;</p>

<p>She went off to her classes, lending me a set of keys to her apartment, a one-bedroom appointed with furniture from the annual Iowa City-sponsored garage sale and a black futon from Walmart that has been transiently occupied by, for instance, a student from Lyons, France, in town to work on a paper about Grant Wood; a motivational speaker who visited after he and his fiancé parted ways (&#8220;His spiel was about balance&#8221;); and, most recently, by me. That night, before attending a tech rehearsal for her upcoming play, we had dinner at Hamburg Inn, a diner famous for pie milkshakes and for being a mandatory political stop for candidates during the Iowa caucuses.</p>

<p>For all this generosity, what did I offer in exchange? Many guests cook a meal, clean the house, or walk the dog. I gave Yarchun&#8212;and everyone I visited&#8212;a book, a box of chocolate cookies, and an authentic hundred-trillion-dollar bill from Zimbabwe. If the bill had been worth more than the pittance I paid for it on eBay, I would be kicked off the Web site, as would Yarchun for accepting money. &#8220;It&#8217;s about the exchange of stories, not cash,&#8221; Yarchun said, offering up a hair-raising tale about being attacked by seven vicious dogs in Ecuador.</p>

<p>CouchSurfing is neither the first nor the only organized pajama party on the block. Servas, generally regarded as the earliest hospitality exchange, was founded, in 1949, as a means of promoting world harmony (its original name was Peacebuilders). Servas is so archaic&#8212;or do I mean utopian?&#8212;that not only is it recognized by the U.N. but its members still communicate via postal letters and must be interviewed before joining. (I talked to one couple who had applied for an interview, were informed that it would take six months to be approved, and were now, a couple of years later, still waiting.) Other networks include Global Freeloaders, Be Welcome, Nomadbase, Tripping, Evergreen Bed and Breakfast Club (for those over fifty), Pasporta Servo (for speakers of Esperanto), and the Hospitality Club, which, with more than three hundred thousand members, is a distant second to CouchSurfing in terms of size.</p>

<p>CouchSurfing was the brainchild of Casey Fenton, who is thirty-four, and who told me over the phone from San Francisco that, as a boy growing up in Brownfield, Maine, he&#8217;d become fascinated by the concept of free will, cherishing the hope that someday he would have the existential wherewithal to escape his home town and explore the world. Chalk one up for volition: Fenton graduated from high school early and began travelling soon afterward. &#8220;I travelled randomly,&#8221; he said, &#8220;buying tickets that would take me as far away as I could afford to go.&#8221; In 2000, in preparation for a trip to Reykjavík, Iceland, he spammed fifteen hundred university students, canvassing for free accommodation. He received between fifty and a hundred invitations, proceeding to bunk with a few of the respondents, and even the family of one. &#8220;When else, I thought, would I have an opportunity to stay with a socialite and a nationally known R. & B. star?&#8221; he said. Eureka!</p>

<p>Fenton&#8212;by training a computer programmer&#8212;spent several years developing his travel Web site. In 2004, with the help of Daniel Hoffer and two others, who are no longer part of the team, he launched CouchSurfing as a public company. Its mission was &#8220;to internationally network people and places, create educational exchanges, raise collective consciousness, spread tolerance, and facilitate cultural understanding.&#8221; In those days, before CouchSurfing had an office, idealistic volunteers, provided with room and board, worked together out of group houses that were rented in It places like Turkey, New Zealand, Costa Rica, and Alaska. The phrase &#8220;couch-surf&#8221; was in use at the time, but, according to Fenton, it meant to watch TV on a friend&#8217;s sofa, lazily flipping through the channels. &#8220;We popularized the term and gave it an adventurous association,&#8221; Fenton said. &#8220;We changed the context so there was a community aspect.&#8221;</p>

<p>A small segment of the community became angry when, last August, CouchSurfing accepted $7.6 million in investment. Never mind that the company has used some of the funding to hire computer engineers, or that it converted from a traditional nonprofit to a B corporation, a new type of company that is contractually required to be socially and environmentally responsible. Certain diehards simply do not like doing business with the Man, or even doing business. From their perspective, CouchSurfing&#8217;s raising capital is the equivalent of the Salvation Army&#8217;s developing nuclear weapons. The discussion group on the CouchSurfing Web site that is entitled &#8220;We Are Against CS Becoming a For-Profit Organization&#8221; has more than three thousand members. To put this in context, the &#8220;Barefooters&#8221; group has eight hundred and twenty-eight members; &#8220;Pirates!&#8221; has four hundred and three; &#8220;People Who Like Singing in the Shower&#8221; has one hundred and sixty-eight; &#8220;Chin Scar!&#8221; has fifty-five; &#8220;The Cute Guys Club&#8221; has eight hundred and thirty-five; and the &#8220;Cute Guy Club of Florida&#8221; subgroup has one.</p>

<p>Speaking of moola, Bermuda is a swell place to couch-surf. I take it you know more or less what this Manhattan-size archipelago looks like, but, if not, picture a subtropical island, then doctor the picture so that the blue water is bluer and the pink beaches are pinker. Don&#8217;t forget the limestone houses painted in Necco Wafer colors, with white ridged roofs designed to funnel rainwater into cisterns. True, you may not find CouchSurfing digs chez Michael Bloomberg, Silvio Berlusconi, Ross Perot, Michael Douglas, or any of the other folks who live in the gated community of Tucker&#8217;s Town. If you are as discerning a reader of profiles as I, however, you can be put up in houses that, were they hotels, would receive five stars.</p>

<p>Night No. 1: Cris Valdes-Dapena and Ian Birch. This recently married couple in their sixties&#8212;he&#8217;s an aspiring clockmaker and paraglider from England, she&#8217;s a partly retired real-estate agent from Pennsylvania&#8212;welcomed me early one evening to their semi-detached condominium, a handsome white concrete house overlooking Hamilton Harbor and the Great Sound, a panorama I could admire through the sliding glass doors of my bedroom. (I had a marble bathroom to myself, too.) Valdes-Dapena and Birch joined CouchSurfing last year, having heard about it from Valdes-Dapena&#8217;s grandson. A few days before my stay, they hosted a sixty-four-year-old former travel agent from Victoria, Canada (&#8220;We reverse age-discriminate&#8221;), whose mission, as stated on the CouchSurfing Web site, was &#8220;to feverishly explore the world before I croak.&#8221; He&#8217;d been on a gruellingly circuitous journey in order to accumulate frequent-flier miles, and showed up late, conking out almost immediately on the sofa. I had taken a mere two-hour flight, so that night, over an unhurried dinner of spaghetti Bolognese and garlic bread, Valdes-Dapena and Birch gave me the lowdown on Bermuda politics and economics and regaled me with tales of their travels&#8212;they have places in Colorado, Mexico, and New York, and have trekked along the Annapurna Circuit, in Nepal, and Camino de Santiago, in Spain. Later this year, they will walk through New Zealand for three months.</p>

<p>I, on the other hand, accepted a lift from Birch the next day to a nearby bus stop. When, half an hour later, on the other side of the island, I stepped off the pink-and-blue-painted No. 10, Andrea Wass, a winning thirty-eight-year-old insurance underwriter, was there to escort me down the steep driveway to her charming rented house. She led me to a room that overlooked a landscaped lawn and, beyond that, a private dock where she keeps a kayak. There were flowers on the bedside table. &#8220;You have your own room,&#8221; she said. &#8220;I don&#8217;t include that on my profile, because I&#8217;d be inundated with requests.&#8221; Wass was transferred by her company to Bermuda six years ago, so by now the visits from friends and family have ebbed. (She travels regularly to the States.) Wass said that she misses having guests&#8212;and that, I suppose, is where I came in. The night I arrived, we dined with four delightful expat friends at a nice hotel restaurant, where I learned, among other things, that in 1992 a construction crew working for Ross Perot illegally blew up a coral reef so that he could moor his yacht, the Chateau Margaux, at his doorstep. The next day, Wass and I visited a cave, wandered around St. George&#8217;s (possibly the oldest continually inhabited English town in the New World), and tooled around the island on her Vespa, I, the terrified passenger, trying to fake blasé.</p>

<p>Wass has never officially couch-surfed herself, though when she was in Rome recently she posted a listing on the local event page inviting CouchSurfers to join her one night for dinner; twenty guests attended. Nor has Jeremy Sommer, a fifty-four-year-old retired furniture manufacturer, who is so seasoned a traveller that he has two passports. Sommer wined and dined and housed me and a French CouchSurfer in his large Victorian house in San Francisco (my room could have been at the Four Seasons), yet said, &#8220;Why would I want to stay with someone I don&#8217;t know?&#8221; Most members, however, have played both roles. According to additional University of Michigan studies, there appears to be a high correlation between the number of times a member hosts and the number of times he surfs, though, significantly, only between twelve and eighteen per cent of the stays are directly reciprocated. In other words, CouchSurfing is a largely rhizomatous affiliation of strangers intersecting with one another not only out of self-interest but for the good of all. How can we explain this pervasive and&#8212;some would say&#8212;unexpected coöperation? What is to prevent an overabundance of freeloaders from bringing down the system? Essentially, this is the question that George Zisiadis, a researcher at CouchSurfing, who graduated from Harvard last year, with a degree in sociology, asked in his senior thesis. After drawing a lot of diagrams with arrows to show that the dynamic between members is not a typical case of indirect reciprocity (A gives to B, B gives to C, C gives to A), Zisiadis attributed the success of CouchSurfing to its raison d&#8217;être&#8212;namely, to forge meaningful social connections. Whether you make the sofa bed or sleep in the sofa bed, you will come out a winner.</p>

<p>&#8220;I joined to save money,&#8221; Barry Hott, a genial twenty-five-year-old, said. Hott lives with his family in Great Neck when he isn&#8217;t sleeping on a couch in Eastern Europe or Asia. &#8220;But now I&#8217;d happily pay to meet these people and have these experiences,&#8221; he went on. &#8220;CouchSurfing has given me the chance to be charitable. This is where I volunteer my time and energy. Helping strangers.&#8221; Hott, who works as the social-media director for an online eyeglass company, is one of about twenty-five hundred Ambassadors, an unpaid position that involves answering questions from newcomers, organizing events in the community, and being a cheerleader for the site. I&#8217;d e-mailed him when I joined CouchSurfing, and he promptly offered to drive into Manhattan and meet me at a coffee shop, where he&#8217;d brief me about the Web site. Hott estimates that he&#8217;s met half his closest friends through CouchSurfing. Several times a week, he attends one of the many CouchSurfing activities in the city; there are potluck dinners, movie nights, Argentinean tango lessons, karaoke parties, outings to museums, concerts, and sporting events. When I asked about the regular Thursday-night meet-ups at a bar in downtown Manhattan, he said, &#8220;There&#8217;s nothing like them in terms of how open and friendly everyone is. If you go to a party or even a wedding, you mostly talk to people you know. Here you&#8217;re encouraged to join in the conversations of strangers. You&#8217;ll find warmer smiles and hugs from people you don&#8217;t know than from your friends.&#8221; Yeeks.</p>

<p>Another Ambassador, Gabriel Stempinski, from San Francisco, is so zealous about his office that he holds monthly dinners for new members, throws rooftop parties for up to two hundred guests, accommodates as many as sixteen surfers a night at his loft (five on the round bed, one on the massage table&#8212;you get the idea), and a few weeks ago he asked his girlfriend to marry him at the company&#8217;s headquarters (it&#8217;s on YouTube). What explains this unstinting conviviality? &#8220;I&#8217;m not a fan of being alone,&#8221; Stempinski said, as we toured San Francisco in his black BMW.</p>

<p>There&#8217;s always a multitude in Ithaka, a seventeen-person housing cooperative situated in two adjacent wood-shingled residences on a quiet street in Palo Alto, and the site of the final bed on my tour. Here, in this community of Stanford students, awesome hugging is commonplace; job assignments include granola maker, rag launderer, and general entropy-reduction enforcer; and smoothies are processed outside, on the bike blender, a kitchen blender mounted on the front of a stationary bicycle and powered by pedalling. I arrived after the communal dinner of bruschetta with caramelized onions, salad with weeds from the garden, and custard with blood-orange syrup (&#8220;Meals are vegetarian, even though most of us are carnivorous, but we want everyone to be able to eat&#8221;), and was taken around the rambling main house by a handful of occupants and their guests.</p>

<p>Come, let me show you around. This is Ellery&#8217;s room, but Ellery sleeps on the porch. Here&#8217;s the lounge. Here&#8217;s a bathroom. One thing you need to know about the bathroom: if yellow, let mellow. Here is Ben and Andi&#8217;s room. Here&#8217;s Dan&#8217;s room. His girlfriend is Rachel; she doesn&#8217;t live here anymore, but she&#8217;s staying here now. Last year, the two guys who lived here slept outside. Bobby lives here, but his stuff is in the car. He&#8217;s a digital nomad. Bobby believes that &#8220;the host-guest relationship is one of imposition and annoyance, made pleasant only by the novelty of the guest,&#8221; and that &#8220;neither of us is having a good time if you have to ask me every time you want to use the shower,&#8221; and that therefore, in the ideal world, call it post-couch-surfing, nobody will be a host; rather, each party will host the other. We call this room AbunDance. Mostly we dance here. We try to keep it as empty as possible. See the hula hoop, the beanbag chairs, and the bearded fellow smooching on the floor with the pretty, long-haired woman who&#8217;s wearing a shawl? This is Jonas. He doesn&#8217;t live here. He lives in a co-op in Berkeley called Fort Awesome. His sweetheart is Lena. She&#8217;s been on the road for two years, but right now she&#8217;s camping in the yard out back. Have you heard of warmshowers.org? Lena&#8217;s an unofficial showerer. Here&#8217;s the puppet theatre. A lot of couch surfers stay there. If you don&#8217;t want to sleep in the puppet theatre, you can have Jan&#8217;s room and he&#8217;ll sleep with Tess.</p>

<p>Has our relation with machines made us feel so deprived of human contact that we befriend anyone and shack up with whoever has a mattress? Moreover, how profound can a social connection be if it is arranged through paperwork and typically lasts only a day or two? &#8220;It&#8217;s sad when they leave,&#8221; Sommer, one of my San Francisco hosts, said. &#8220;But then you get another one.&#8221; People, it seems, are becoming fungible, and, as in a game of pinball, you score points by bumping up against as many of them as possible.</p>

<p>Does CouchSurfing represent something new, then, or is it simply an Internet-enabled version of the age-old practice of crashing with the friend of a friend of a neighbor of a third cousin of someone you sat next to on a bus? When I was young, I hitchhiked through Europe, staying with strangers I met along the way. I was just looking for a place to crash; I did not expect to find soul mates or playdates. Contrast this with the remarks of a cheesemonger in New York, who wrote in his profile, &#8220;I&#8217;m in this for the relationship and the person, not just the free place to sleep.&#8221; Or the thirty-three-year-old real-estate agent in New York, who warns anyone contemplating him as a host, &#8220;If you are not fun, social, cool, not looking to go out and enjoy the nightlife of NYC, please request elsewhere, I do not want someone that goes to bed at 10pm. Sorry.&#8221; On a loftier plane, consider the official objectives of CouchSurfing: &#8220;Our goal,&#8221; the company&#8217;s Web site says, &#8220;is nothing less than changing the world.&#8221; I think it has.</p>

<p>My place? I&#8217;d love to have you, but we&#8217;re sanding the floors and the fish has the flu.</p>

<p>*The original version of this story misidentified the &#8220;warlord.&#8221;</p>
						</div>
						
						<!-- <a class="call-20" href=''>Call</a> -->
	
					</div>					
					
					
					<div class="secondary link-21-text">
						
						<div class="secondary-title">
							Ville Contemporaine<br/>
							Wikipedia
						</div>
						<div class="spacer"></div>
						<div class="secondary-inner">

<p>The Ville Contemporaine ("Contemporary City") was an unrealized project to house three million inhabitants designed by the French-Swiss architect Le Corbusier in 1922.
The centerpiece of this plan was a group of sixty-story cruciform skyscrapers built on steel frames and encased in curtain walls of glass. The skyscrapers housed both offices and the flats of the most wealthy inhabitants. These skyscrapers were set within large, rectangular park-like green spaces.</p>
<p>At the center of the planned city was a transportation center which housed depots for buses and trains as well as highway intersections and at the top, an airport.
Le Corbusier segregated the pedestrian circulation paths from the roadways, and glorified the use of the automobile as a means of transportation. As one moved out from the central skyscrapers, smaller multi-story zigzag blocks set in green space and set far back from the street housed the proletarian workers.</p>

<p>Robert Hughes spoke of Le Corbusier's city planning in his series <i>The Shock of the New</i>: <i>"...the car would abolish the human street, and possibly the human foot. Some people would have airplanes too. The one thing no one would have is a place to bump into each other, walk the dog, strut, one of the hundred random things that people do... being random was loathed by Le Corbusier... its inhabitants surrender their freedom of movement to the omnipresent architect."</i></p>

<img src="villecon_3.jpg">
<img src="villecon_4.jpg">
						</div>
						<!-- <a class="call-21" href=''>Call</a> -->
		
					</div>
	
				</div>	
				
			</div>
			
		</div></div><!-- End PAGE ONE and Master Container-->	
		
		
		
		
	<!-- PAGE TWO -->
		
		<div data-role="page" id="two" class="page">
			<a name="link-1-text"></a>
			<div class="container">
			
				<div class="call call-box-2"></div>
					
				<div class="maintitle">
					The Great Accelerator<br />
					Paul Virilio
				</div>
						
				<div data-role="content" class="mainbodytext">
								
					<!-- Output correct version of body text -->
					
					<div class="body_text">
						
						<?php 
						
							// Call next button
						
							$player = $_GET['player']; 
							
							$result_3 = mysql_query("SELECT next_button FROM julia_2p WHERE id=1");
							$num_rows = mysql_num_rows($result_3);
															
							for ($i = 1; $i <= $num_rows; $i++) {
								$row = mysql_fetch_assoc($result_3);
								$next_A = $row['next_button'];
							}
						
							$result_4 = mysql_query("SELECT next_button FROM julia_2p WHERE id=2");
							$num_rows = mysql_num_rows($result_4);
															
							for ($i = 1; $i <= $num_rows; $i++) {
								$row = mysql_fetch_assoc($result_4);
								$next_B = $row['next_button'];
							}
						
							// Call text
							
							$result_text_plain_2 = mysql_query("SELECT body_text FROM julia_2p_text WHERE id=3");
							$num_rows = mysql_num_rows($result_text_plain_2);
															
							for ($i = 1; $i <= $num_rows; $i++) {
								$row = mysql_fetch_assoc($result_text_plain_2);
								$body_text_plain_2 = $row['body_text'];
							}
						
							$result_text_links_2 = mysql_query("SELECT body_text FROM julia_2p_text WHERE id=4");
							$num_rows = mysql_num_rows($result_text_links_2);
															
							for ($i = 1; $i <= $num_rows; $i++) {
								$row = mysql_fetch_assoc($result_text_links_2);
								$body_text_links_2 = $row['body_text'];
							}
						
							if (($next_A <= '1') && ($next_B <= '1')) {
								// Players have not reached level yet or are at level for the first time
								
								if ($player == 'A') { echo($body_text_plain_2); }
							
								if ($player == 'B') { echo($body_text_plain_2); }
								
							}
						
							if (($next_A == '2') && ($next_B == '2')) {
								// Players have passed level 2
								// Show text with links
								
								if ($player == 'A') { echo($body_text_links_2); }
							
								if ($player == 'B') { echo($body_text_links_2); }
								
							}
							
							if (($next_A == '2') && ($next_B == '1')) {
								// Player A has passed, Player B has not 
								
								if ($player == 'A') { echo($body_text_links_2); }
							
								if ($player == 'B') { echo($body_text_plain_2); }
								
							}
							
							if (($next_A == '1') && ($next_B == '2')) {
								// Player B has passed, Player A has not 
								
								if ($player == 'A') { echo($body_text_plain_2); }
							
								if ($player == 'B') { echo($body_text_links_2); }
								
							}
							
						?>
						
					</div>
					
					<div class="back-button"><a href="#one">Back</a></div>
					
					<!-- Output correct next button -->
					
					<div class="next_button_2">
										
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
						
							if (($next_A == '2') && ($next_B == '2')) {
								// Players have passed level 2
								// Show Continue / Done button for both
								
								if ($player == 'A') { echo("<a class='done' href='#three'>&rarr;</a>"); }
							
								if ($player == 'B') { echo("<a class='done' href='#three'>&rarr;</a>"); }
								
							}
						
							if (($next_A == '1') && ($next_B == '1')) {
								// Players are at level for the first time
								
								if ($player == 'A') { echo("<a href='' class='next_A_2'>Next</a>"); }
							
								if ($player == 'B') { echo("<a href='' class='next_B_2'>Next</a>"); }
								
							}
							
							if (($next_A == '2') && ($next_B == '1')) {
								// Player A has passed, Player B has not 
								
								if ($player == 'A') { echo("<a href=''>...</a>"); }
							
								if ($player == 'B') { echo("<a href='' class='next_B_2'>Next</a>"); }
								
							}
							
							if (($next_A == '1') && ($next_B == '2')) {
								// Player B has passed, Player A has not 
								
								if ($player == 'A') { echo("<a href='' class='next_A_2'>Next</a>"); }
							
								if ($player == 'B') { echo("<a href=''>...</a>"); }
								
							}
							
						?>
					
					</div>
						
				</div>

			</div> <!-- End container -->
			
		</div><!-- End PAGE TWO -->	
		
		
		
		
		
		<!-- PAGE THREE -->
		
		<div data-role="page" id="three" class="page">
			<a name="link-1-text"></a>
			<div class="container">
			
				<div class="call call-box-3"></div>
					
				<div class="maintitle">
					The Great Accelerator<br />
					Paul Virilio
				</div>
						
				<div data-role="content" class="mainbodytext">
								
					<!-- Output correct version of body text -->
					
					<div class="body_text">
						
						<?php 
						
							// Call next button
						
							$player = $_GET['player']; 
							
							$result_3 = mysql_query("SELECT next_button FROM julia_2p WHERE id=1");
							$num_rows = mysql_num_rows($result_3);
															
							for ($i = 1; $i <= $num_rows; $i++) {
								$row = mysql_fetch_assoc($result_3);
								$next_A = $row['next_button'];
							}
						
							$result_4 = mysql_query("SELECT next_button FROM julia_2p WHERE id=2");
							$num_rows = mysql_num_rows($result_4);
															
							for ($i = 1; $i <= $num_rows; $i++) {
								$row = mysql_fetch_assoc($result_4);
								$next_B = $row['next_button'];
							}
						
							// Call text
							
							$result_text_plain_2 = mysql_query("SELECT body_text FROM julia_2p_text WHERE id=5");
							$num_rows = mysql_num_rows($result_text_plain_2);
															
							for ($i = 1; $i <= $num_rows; $i++) {
								$row = mysql_fetch_assoc($result_text_plain_2);
								$body_text_plain_2 = $row['body_text'];
							}
						
							$result_text_links_2 = mysql_query("SELECT body_text FROM julia_2p_text WHERE id=6");
							$num_rows = mysql_num_rows($result_text_links_2);
															
							for ($i = 1; $i <= $num_rows; $i++) {
								$row = mysql_fetch_assoc($result_text_links_2);
								$body_text_links_2 = $row['body_text'];
							}
						
							if (($next_A <= '1') && ($next_B <= '1')) {
								// Players have not reached level yet or are at level for the first time
								
								if ($player == 'A') { echo($body_text_plain_2); }
							
								if ($player == 'B') { echo($body_text_plain_2); }
								
							}
						
							if (($next_A == '2') && ($next_B == '2')) {
								// Players have passed level 2
								// Show text with links
								
								if ($player == 'A') { echo($body_text_links_2); }
							
								if ($player == 'B') { echo($body_text_links_2); }
								
							}
							
							if (($next_A == '2') && ($next_B == '1')) {
								// Player A has passed, Player B has not 
								
								if ($player == 'A') { echo($body_text_links_2); }
							
								if ($player == 'B') { echo($body_text_plain_2); }
								
							}
							
							if (($next_A == '1') && ($next_B == '2')) {
								// Player B has passed, Player A has not 
								
								if ($player == 'A') { echo($body_text_plain_2); }
							
								if ($player == 'B') { echo($body_text_links_2); }
								
							}
							
						?>
						
					</div>
					
					<div class="back-button"><a href="#two">Back</a></div>
					
					<!-- Output correct next button -->
					
					<div class="next_button_3">
										
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
						
							if (($next_A == '2') && ($next_B == '2')) {
								// Players have passed level 2
								// Show Continue / Done button for both
								
								if ($player == 'A') { echo("<a class='done' href='#four'>&rarr;</a>"); }
							
								if ($player == 'B') { echo("<a class='done' href='#four'>&rarr;</a>"); }
								
							}
						
							if (($next_A == '1') && ($next_B == '1')) {
								// Players are at level for the first time
								
								if ($player == 'A') { echo("<a href='' class='next_A_3'>Next</a>"); }
							
								if ($player == 'B') { echo("<a href='' class='next_B_3'>Next</a>"); }
								
							}
							
							if (($next_A == '2') && ($next_B == '1')) {
								// Player A has passed, Player B has not 
								
								if ($player == 'A') { echo("<a href=''>...</a>"); }
							
								if ($player == 'B') { echo("<a href='' class='next_B_3'>Next</a>"); }
								
							}
							
							if (($next_A == '1') && ($next_B == '2')) {
								// Player B has passed, Player A has not 
								
								if ($player == 'A') { echo("<a href='' class='next_A_3'>Next</a>"); }
							
								if ($player == 'B') { echo("<a href=''>...</a>"); }
								
							}
							
						?>
					
					</div>
						
				</div>

			</div> <!-- End container -->
			
		</div><!-- End PAGE THEREE-->	
		
		
		
		
		
	</body>

</html>