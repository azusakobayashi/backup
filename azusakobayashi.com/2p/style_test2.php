<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>The Great Accelerator ==3 Paul Virilio</title>
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.1/jquery.mobile.structure-1.1.1.min.css" />
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.js"></script>
	

	<style></style>
		
	<script>
		$(document).bind('pageinit', init);

		function init() {
		
			$('.followPath').bind('click', function() {
				pagenum = this.id.charAt(5);
				pathnum = this.id.charAt(6);
				pathid = "#path_" + pagenum + pathnum;
				currtitle = "#title_" + pagenum + pathnum;

				$('#title_allpaths').toggle();
								
				
				//Toggle secondary text title
				$('#title_' + pagenum + pathnum).toggle();
				
				
								
				// Toggle main text title - NOW IT NEEDS TO MOVE POS, NOT HIDE
/* 				$('#title_main').toggle(); */

				//Toggle secondary text
				$('.path_' + pagenum + pathnum + '_text').toggle('slow');
				
		
			});

		
		
		/*
$('#link_1A').toggle (function () {
			$('.path_1A_text').slideToggle('slow');
			$('body,html').animate({
					scrollTop: 0
				}, 800);
					}, function() {
			$('.path_1A_text').toggle('slow');
			$('body,html').animate({
					scrollTop: 0
				}, 800);
					});
		$('#link_1B').toggle(function () {
			$('.path_1B_text').toggle('slow');
			$('body,html').animate({
					scrollTop: 0
				}, 800);
		}, function() {
			$('.path_1B_text').toggle('slow');
			$('body,html').animate({
					scrollTop: 0
				}, 800);
				});
*/

}

	
		
		// Fixed div for running heads	
jQuery(function ($) {
    var $el = $('#title_main'), 
        top = $el.offset().top;
    
    $(window).scroll(function () {
        var pos = $(window).scrollTop();
        
        if(pos > top  && !$el.hasClass('fixed')) {
            $el.addClass('fixed');
        } else if (pos < top  && $el.hasClass('fixed')) {
            $el.removeClass('fixed');
        }
    });
})

</script>

</head>

<body>

	<div name="anchor_1A"></div>
	<div id="path_1A" class="paths">
		<div class="path_1A_text">
			<p>First Link Text ;alkjlkja;sldkjf;asdjf Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eu mauris in arcu posuere tincidunt. Integer ullamcorper ornare suscipit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam faucibus sapien at ipsum mattis non blandit neque sagittis. In ut turpis ut quam luctus aliquet. Suspendisse ac ipsum ante, id ultricies eros. Etiam vel lacus a urna tristique ornare. Nam id elit quis velit viverra luctus a vitae nulla. Nunc eleifend imperdiet mi, vel bibendum urna varius et. Duis dictum euismod dui sed ullamcorper. In hac habitasse platea dictumst. Vivamus vel tortor arcu, vel faucibus diam. Integer placerat suscipit velit, vel feugiat elit tempus eget. Praesent scelerisque dictum purus, id hendrerit leo sagittis id. Duis eu eros erat.</p>
		</div>
	</div>

	<div name="anchor_1B"></div>
	<div id="path_1B" class="paths">
		<div class="path_1B_text">
			<p>Second Link Text ;alkjlkja;sldkjf;asdjf  Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eu mauris in arcu posuere tincidunt. Integer ullamcorper ornare suscipit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam faucibus sapien at ipsum mattis non blandit neque sagittis. In ut turpis ut quam luctus aliquet. Suspendisse ac ipsum ante, id ultricies eros. Etiam vel lacus a urna tristique ornare. Nam id elit quis velit viverra luctus a vitae nulla. Nunc eleifend imperdiet mi, vel bibendum urna varius et. Duis dictum euismod dui sed ullamcorper. In hac habitasse platea dictumst. Vivamus vel tortor arcu, vel faucibus diam. Integer placerat suscipit velit, vel feugiat elit tempus eget. Praesent scelerisque dictum purus, id hendrerit leo sagittis id. Duis eu eros erat.</p>
		</div>
	</div>

<div id = "title" class="fixed">
	<div id="title_allpaths">
			<div id="title_1A">
			Link 1A Title<br />
			Link 1A Source
			</div>
			
			<div id="title_1B">
			Link 1B Title<br />
			Link 1B Source
			</div>
	</div>
	
	
	<div id="title_main">
		The Great Accelerator<br />
		Paul Virilio
	</div>
</div>



<div class="body_text">
	<p>Why don't we take this deadly overexposure of private life that is now spreading as far as the eye can see just a little bit further? Imagine that, following on from the fixed cameras set up at major intersections to ensure road traffic safety or at the entrances to buildings to ensure security, couch surfing is already taking us to the next, the ultimate, level of revelation. This is where the Google Home inspector turns up on your doorstep, covered in portable cameras designed to reveal to all and sundry the level of comfort of the bathrooms on offer to low-budget tourists benefitting from the hospitality of the Internet's social networks!</p>
	<p><a href="#anchor_1A" id="link_1A" class="followPath">'The acceleration of History</a> is disturbing. We're forced to call ourselves into question much more routinely than in the past. [...] The shifting present causes great anxiety. Our sense of the everyday is swept away by a feeling of inevitability. That feeling amounts to a kind of collective depression.' So said Nathalie Kosciusko-Morizet, France's then Secretary of State for Strategic Planning, in the summer of 2009. But talking of 'depression' isn't saying much. Wherever acceleration of the reality of the moment prevails over acceleration of the history of the famous <a href="#anchor_1B" id="link_1B" class="followPath">'shifting present,'</a> what is called into question, at every instant, is the real presence of people and things that, only yesterday, seemed to lastingly surround us. As an elderly friend, whose young wife never stopped travelling, sadly confessed to me once: 'She doesn't travel to forget she's just used to not seeing me anymore.'</p>
	<p>With the exodus of societies that have once again become dispersed, travel is a form of widowhood or widowerhood that encourages each and every one of us to no longer see what once tied us to, rooted us in, a common past, country, neighbourhood, neighbours, family or spouse. This is also what the end of private life is, this endless translation of the intimacy of the sedentary homebody into the extimacy of transportation whereby the traveller is not so much a new nomad as a passenger in the middle of getting a divorce, carried away by the inevitability of everyday exile...</p>
</div>

</body>

</html>