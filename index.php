<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>QassimAjax Plugin</title>
	<script type="text/javascript" src="jquery-1.12.1.min.js"></script>
	<script type="text/javascript" src="QassimAjax.js"></script>
	<script type="text/javascript">
		jQuery(function(){

			/*
				QassimAjax Options
                	resultWrap: 0, // This option to display result in HTML element using CSS selector, for example "#my-wrap", defalut is 0, if value is 0 will be display the result in alert message
                	fadeEffect: 1, // If "resultWrap" has CSS selector, will be display the result with fade effect, default is 1, 1 = enable, to disable it enter 0
                	setEvent: 0, // This option for event, for example if you want to create LIKE BUTTON, enter value 1, default is 0
                	eventTo: 0, // This option for event, for example to get likes count, enter CSS selector, default is 0
                	eventType: "GET", // This option for event, default event is GET, if you want POST, enter POST (upper case)
                	theMessage: 0, // This option for event and form, for example if value is 0, will be display the result in alert message, enter custom message, for example "Cookie has been added!"
			*/

			jQuery("#post-form").QassimAjax( { resultWrap: "#post-form-result", fadeEffect: 1 } );

			jQuery("#get-form").QassimAjax(); // default is no fade effect and the result will be display in alert message

			jQuery("#get-event").QassimAjax( { setEvent: 1, eventType: "GET", eventTo: "#event-cookie" } );
			// another example: jQuery("#get-event").QassimAjax( { setEvent: 1, eventType: "GET", theMessage: "Cookie has been added! Please refresh the page."} ); // will be display alert message

			jQuery("#post-event").QassimAjax( { setEvent: 1, eventType: "POST", eventTo: "#like-count" } );
			// another example: jQuery("#post-event").QassimAjax( { setEvent: 1, eventType: "POST"} ); // the result will be display in alert message

		});
	</script>

	<?php 
		if( isset($_COOKIE["background"]) ){
			?>
				<style type="text/css">
					body{
						background-color: #555;
					}
				</style>
			<?php
		}
	?>
</head>
<body>

<div id="event-cookie"></div>

<h3>Form POST Method</h3>
<form id="post-form" method="post" action="post.php">
	<input name="your-name" type="text" value="">
	<input type="submit" value="submit" id="submit">
</form>

<p id="post-form-result"></p>

<p>------------------------</p>

<h3>Form GET Method</h3>
<form id="get-form" method="get" action="get.php">
	<input name="your-name" type="text" value="">
	<input type="submit" value="submit" id="submit">
</form>

<p id="get-form-result"></p>

<p>------------------------</p>

<h3>AJAX Events</h3>
<p>GET Type: <a id="get-event" href="event_get.php">Change background color</a> and refresh the page :)</p>
<p>POST Type: <a id="post-event" href="event_post.php">Like</a> - <span id="like-count"><?php echo file_get_contents("likes.txt"); ?></span> liked.</p>


<p>------------------------</p>
<h3>Download & Usage</h3>
<p><a href="http://wp-time.com/qassimajax-jquery-ajax-plugin/" target="_blank">QassimAjax jQuery Ajax Plugin</a></p>
</body>
</html>