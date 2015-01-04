<html>
<head><title>\/ The Garden of Forking Paths \/ Jorge Luis Borges \/</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link rel="stylesheet" href="style.css" />
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="spin.js"></script>	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="jquery.zoomooz.min.js"></script>
</head>


<body>
<script type="text/javascript">
	function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }
</script>



<div id="spinspin">
</div>
<div id="container">
	<div id="maintext">
		<div id="maintitle">
			The Garden of Forking Paths<br />
			Jorge Luis Borges
		</div>
		<div id="mainbodytext">
			<p>On page 22 of Liddell Hart's <em>History of World War I</em> you will read that an attack against the Serre-Montauban line by thirteen British divisions (supported by 1,400 artillery pieces), planned for the 24th of July, 1916, had to be postponed until the morning of the 29th. The torrential rains, Captain Liddell Hart comments, caused this delay, an insignificant one, to be sure.</p>
			
			
			<p>The following statement, dictated, reread and signed by Dr. Yu Tsun, former professor of English at the <em>Hochschule</em> at Tsingtao, throws an unsuspected light over the whole affair. The first two pages of the document are <a href="###">missing</a>.</p>
			<p>"...and I hung up the receiver. Immediately afterwards, I recognized the voice that had answered in German. It was that of Captain Richard Madden. Madden's presence in Viktor Runeberg's apartment meant the end of our anxieties and&#8212;but this seemed, <em>or should have seemed</em>, very secondary to me&#8212;also the end of our lives. It meant that Runeberg had been arrested or murdered.<a class="footnoteNum" onclick="toggle_visibility('footnote1');">1</a> Before the sun set on that day, I would encounter the same fate. Madden was implacable. Or rather, he was obliged to be so. An Irishman at the service of England, a man accused of laxity and perhaps of treason, how could he fail to seize and be thankful for such a miraculous opportunity: the discovery, capture, maybe even the death of two agents of the German Reich? I went up to my room; absurdly I locked the door and threw myself on my back on the narrow iron cot. Through the window I saw the familiar roofs and the cloud-shaded six o'clock sun. It seemed incredible to me that day without premonitions or symbols should be the one of my inexorable death. In spite of my dead father, in spite of having been a child in a symmetrical garden of Hai Feng, was I&#8212;now&#8212;going to die? Then I reflected that everything happens to a man precisely, precisely <em>now.</em></p>
					
		</div>
	<div id="buttons">
		<button id="btnNext" type="button" >Next</button>  
		<button id="btnCall" type="button">Call</button>  
	</div>
		<div id="footnote1">
<a class="footnoteNum" onclick="toggle_visibility('footnote1');">1</a>	 An hypothesis both hateful and odd. The Prussian spy Hans Rabener, alias Viktor Runeberg, attacked with drawn automatic the bearer of the warrant for his arrest, Captain Richard Madden. The latter, in self-defense, inflicted the wound which brought about Runeberg's death. (Editor's note.)
		</div>
		
		
	</div>

	
	<script>
	// Spinner icon
		var opts = {
			lines: 11, // The number of lines to draw
			length: 0, // The length of each line
			width: 4, // The line thickness
			radius: 12, // The radius of the inner circle
			corners: 1, // Corner roundness (0..1)
			rotate: 0, // The rotation offset
			color: '#000', // #rgb or #rrggbb
			speed: 1, // Rounds per second
			trail: 72, // Afterglow percentage
			shadow: false, // Whether to render a shadow
			hwaccel: false, // Whether to use hardware acceleration
			className: 'spinner', // The CSS class to assign to the spinner
			zIndex: 2e9, // The z-index (defaults to 2000000000)
			top: 'auto', // Top position relative to parent in px
			left: 'auto' // Left position relative to parent in px
		};
		var target = document.getElementById('spinspin');
		var spinner = new Spinner(opts).spin(target);
	</script>




</body>




</html>