<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
<meta name="description" content="WebRTC code samples">
<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1, maximum-scale=1">
<meta itemprop="description" content="Client-side WebRTC code samples">
<meta itemprop="name" content="WebRTC code samples">
<meta name="mobile-web-app-capable" content="yes">
<meta id="theme-color" name="theme-color" content="#ffffff">
<base target="_blank">
<title>getUserMedia to canvas</title>

<style>
img {
	max-width: 100%; 
	height: auto; 
}

body {
	margin: 0;
	text-align: center;
}

:fullscreen {
	background-color: #5dc1e4;
}
:fullscreen button {
	background-color: #333;
	border-color: #333;
	color: #fff;
}
</style>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-capable" content="yes">
<link rel="manifest" href="/manifest.json">

</head>
<body>

<button  class="button" style="position: absolute; right: 20px; top: 10px; z-index: 10">ORIG</button>

<div id="container" >
    <video playsinline autoplay></video>
     <button>Take snapshot</button> 
    <canvas></canvas>
</div>

<div id="overlay" style="position: absolute; left: 0px; top: 0px; z-index: 1" >
 	<div id="image"><img src="01.jpg" style="opacity: 0.9" /></div>
</div>  

<script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>
<script src="main.js" async></script>
<script src="ga.js"></script>

<script>

  $( function() {
    $( ".button" ).button();
    $( ".button" ).click( function( event ) {
      event.preventDefault();
			
			if (($('button').text()).localeCompare("ORIG")>0)
			{
				$(this).button('option', 'label', 'CAM'); 
 			  $("#image").css("opacity", 0);
			}  
			else 
			{
 				$(this).button('option', 'label', 'ORIG'); 
				$("#image").css("opacity", 1);
			}
	    });
		});
		
</script>

	
<button type="button" id="toggle" style="position: absolute; left: 20px; top: 20px; z-index: 20">Activate fullscreen</button>
	
<script>

// FULLSCREEN

	if (document.fullscreenEnabled) {
		
		var btn = document.getElementById("toggle");
		
		btn.addEventListener("click", function (event) {
			
			if (!document.fullscreenElement) {
				document.documentElement.requestFullscreen();
			} else {
				document.exitFullscreen();
			}
			
		}, false);
		
		
		document.addEventListener("fullscreenchange", function (event) {
			
			console.log(event);
			
			if (!document.fullscreenElement) {
				btn.innerText = "Activate fullscreen";
			} else {
				btn.innerText = "Exit fullscreen";
			}
		});
		
		document.addEventListener("fullscreenerror", function (event) {
			
			console.log(event);
			
		});
	}
		
</script>

</body>
</html>
