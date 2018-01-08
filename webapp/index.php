<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>HoneyBot Control Panel</title>

<link rel="stylesheet" href="extras/css/index.css">

<script src="extras/js/jquery-1.12.4.min.js"></script>
<script src="extras/js/controls.js"></script>

<script>
var urlBase = "http://"+window.location.hostname+":9090/";
document.getElementById("stream_src").setAttribute("value", urlBase);
document.getElementById("vlcEmb").setAttribute("target", urlBase);
</script>

</head>
<body>
    <p>Controls</p>

	<OBJECT classid="clsid:9BE31822-FDAD-461B-AD51-BE1D1C159921" codebase="extras/player/axvlc.cab" width="800" height="600" id="vlc" events="True">
		<param id="stream_src" name="Src" value="" />
		<param name="ShowDisplay" value="True" />
		<param name="AutoLoop" value="False" />
		<param name="AutoPlay" value="True" />
		<embed id="vlcEmb" target="" type="application/x-google-vlc-plugin" version="VideoLAN.VLCPlugin.2" autoplay="yes" loop="no" width="640" height="480"></embed>
	</OBJECT>

    <div class="box">
		<div class="div_box top_row">
			<span class="up_arrow">&#9650;</span>
		</div> 
		<div class="div_box middle_row">
			<span class="left_arrow">&#x25c0;</span>
			<span class="center_box">&#x2680;</span>
			<span class="right_arrow">&#9654;</span>
		</div> 
		<div class="div_box down_row">
			<span class="down_arrow">&#9660;</span>
		</div> 
	</div>
</body>
</html>