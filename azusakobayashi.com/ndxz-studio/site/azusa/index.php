<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--BG-->
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>

<title><%title%> : <%obj_name%></title>

<link rel='stylesheet' href='<%baseurl%><%basename%>/site/<%obj_theme%>/style.css' type='text/css' />
<!--[if lte IE 6]>
<link rel='stylesheet' href='<%baseurl%><%basename%>/site/<%obj_theme%>/ie.css' type='text/css' />
<![endif]-->
<plug:front_lib_css />
<plug:front_dyn_css />
<script type='text/javascript' src='<%baseurl%><%basename%>/site/js/jquery.js'></script>
<script type='text/javascript' src='<%baseurl%><%basename%>/site/js/cookie.js'></script>
<!--
<script type='text/javascript' src='<%baseurl%><%basename%>/site/js/expandingMenus.js'></script>
-->
<plug:front_lib_js />
<script type='text/javascript'>
path = '<%baseurl%>/files/gimgs/';

$(document).ready(function()
{
	setTimeout('move_up()', 1);
	expandingMenu(0); 
	expandingMenu(1);
	expandingMenu(2); 
	expandingMenu(3);
	expandingMenu(4);
});
</script>
<plug:front_dyn_js />
<plug:backgrounder color='<%color%>', img='<%bgimg%>', tile='<%tiling%>' />
</head>

<body class='section-<%section_id%>'>
<div id='menu'>
<div class='container'>

<%obj_itop%>
<plug:front_index />
<%obj_ibot%>

<!-- you must provide a link to Indexhibit on your site someplace - thank you -->


</div>	
</div>	

<div id='content'>
<div class='container'>

<!-- text and image -->
<plug:front_exhibit />
<!-- end text and image -->

</div>
</div>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try{
var pageTracker = _gat._getTracker("UA-7836627-2");
pageTracker._trackPageview();
} catch(err) {}
</script>

</body>
</html>