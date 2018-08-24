<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Google Maps</title>
    <script src="http://maps.google.com/maps?file=api&amp;v=2.x&amp;key=AIzaSyAUDmBaRZYtnwpnt1-LxVpT9hxNySSNmMc" type="text/javascript"></script>
    <script type="text/javascript">

    var map = null;
    var geocoder = null;

    function initialize() {
        map = new GMap2(document.getElementById("map_canvas"));
        geocoder = new GClientGeocoder();
	      var receivedaddress=document.getElementById("address").value;
        if (geocoder) {
        geocoder.getLatLng(receivedaddress,function(point) {
            if (!point) {
              alert(receivedaddress + " not found");
            } else {
              map.setCenter(point, 13);
              var marker = new GMarker(point);
              map.addOverlay(marker);
              marker.openInfoWindowHtml(receivedaddress);
            }
       });
      }
    }
  </script>
  </head>

  <body onload="initialize()" >
    <form >
        <input type="hidden" name="address" id="address" value="<?php echo $_GET["address"] ?>" />
        <div id="map_canvas" style="width: 500px; height: 300px" style="margin:auto;"></div>
    </form>
  </body>
</html>
