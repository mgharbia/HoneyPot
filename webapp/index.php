<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>HoneyBot Control Panel</title>

<link rel="stylesheet" href="extras/css/index.css">

<script src="extras/js/jquery-1.12.4.min.js"></script>
<script src="extras/js/robot_controls.js"></script>
<script src="extras/js/camera_controls.js"></script>
<!--example img for testing: http://qnimate.com/wp-content/uploads/2014/03/images2.jpg-->
</head>
<body>
    <p style="margin: auto;width: 60%;">HoneyPot - Control Panel</p>
	<div class="video">
    	<img style="width:  100%;" src="http://<?php echo $_SERVER['HTTP_HOST']; ?>:8080/?action=stream">
	</div>
    <div class="box" style="right: 5px;">
		<div class="div_box top_row">
			<span class="ro_up_arrow">&#9650;</span>
		</div> 
		<div class="div_box middle_row">
			<span class="ro_left_arrow">&#x25c0;</span>
			<span class="center_box">&#174;</span>
			<span class="ro_right_arrow">&#9654;</span>
		</div> 
		<div class="div_box down_row">
			<span class="ro_down_arrow">&#9660;</span>
		</div> 
	</div>
	<div class="box">
		<div class="div_box top_row">
			<span class="cam_up_arrow">&#9650;</span>
		</div> 
		<div class="div_box middle_row">
			<span class="cam_left_arrow">&#x25c0;</span>
			<span class="center_box">&#169;</span>
			<span class="cam_right_arrow">&#9654;</span>
		</div> 
		<div class="div_box down_row">
			<span class="cam_down_arrow">&#9660;</span>
		</div> 	 
	</div>

</body>
</html>
