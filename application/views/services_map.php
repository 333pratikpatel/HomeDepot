<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
	
	<?php
	$gmap = "
	
	<script>
	var map;
    function initialize() {
      var myLatlng = new google.maps.LatLng(".$worker->worker_latitude." , ".$worker->worker_longitude.");
	  var infoWindow = new google.maps.InfoWindow();
      var myOptions = {
        zoom: 14,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }
      	map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);
		var marker = new google.maps.Marker({
        	map: map,
        	position: myLatlng
      	});
		var html = '<b>Shri Ram Stores</b> <br/>Galaxy Road,naroda';
      	google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
      markers.push(marker);
    }
	
	function createMarker(address) {
	  var latlng = new google.maps.LatLng(23.07595, 72.65063);
      var html = '<b>Store</b> <br/>' + address;
      var marker = new google.maps.Marker({
        map: map,
        position: latlng
      });
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
      markers.push(marker);
    }

    function loadScript() {
      var script = document.createElement('script');
      script.type = 'text/javascript';
      script.src = 'http://maps.google.com/maps/api/js?sensor=false&callback=initialize';
      document.body.appendChild(script);
    }

    window.onload = loadScript;


</script>";
echo $gmap;
?>
</head>
<body>
	<div id="map_canvas" style="height:500px;width:600px;"></div>

</body>
</html>
