<?php

echo '
<style>
       #map {
        height: 413px;
       width: 100%;
       }
       </style>
    <script>
      var map;
      var src = "'.get_option("rc_gmaps_zone_url").'";

      function initMap() {
      
        map = new google.maps.Map(document.getElementById("map"), {
          center: new google.maps.LatLng(-37.81340271120419, 144.9541013005446),
          zoom: 15
        });
        
        var kmlLayer = new google.maps.KmlLayer(src, {
          suppressInfoWindows: true,
          preserveViewport: false,
          map: map
        });
        
      }
    </script>
    <script async
    src="https://maps.googleapis.com/maps/api/js?key='.get_option("rc_gmaps_api_key").'&callback=initMap">
    </script>
';

?>