<!DOCTYPE html>
<html>
<head>
	<title>BD Work</title>

	<script src="https://maps.googleapis.com/maps/api/js"></script>
	<script src="<?=base_url()?>assets/js/jquery.js"></script>

	<script type="text/javascript">
		function initialize() {
	        var mapCanvas = document.getElementById('map');
	        var mapOptions = {
				center: new google.maps.LatLng(-15.763826, -47.892052),
				zoom: 15,
				mapTypeId: google.maps.MapTypeId.ROADMAP
	        }
	        var map = new google.maps.Map(mapCanvas, mapOptions);
	        marker = new google.maps.Marker({
				map: map,
				draggable: true,
				animation: google.maps.Animation.DROP,
				position: {
					lat: -15.763826, 
					lng: -47.892052
				}
			});
	    }
	    google.maps.event.addDomListener(window, 'load', initialize);

		function change_location(){
			if (marker) {
		        $("#latitude").val(marker.getPosition().lat().toString());
		        $("#longitude").val(marker.getPosition().lng().toString());
		    } else {
		        $("#latitude").val("not entered");
		        $("#longitude").val("not entered");
		    }
		}
	</script>

	<style>
		#map {
			width: 500px;
			height: 400px;
			background-color: #CCC;
		}
	</style>
</head>
<body>
