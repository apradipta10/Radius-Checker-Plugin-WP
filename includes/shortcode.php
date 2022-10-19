<?php

    function rc_shortcode($atts) {
        
        if (isset($_POST['user_address'])) {
            update_option('rc_user_address', $_POST['user_address']);
            // update_option('rc_action_url_inside', $_POST['action_url_inside']);
            // update_option('rc_action_url_outside', $_POST['action_url_outside']);
        }
        
        $data = shortcode_atts(
            array(
                'user_address' => $user_address,
                'rc_gmaps_api_key_user' => get_option('rc_gmaps_api_key'),
                'rc_gmaps_zone_url_user' => get_option('rc_gmaps_zone_url')
            ),$atts
        );
        
        return '
        <style>
        .rc-form-group {
            margin-bottom: 1rem;
        }
        label {
            display: inline-block;
            margin-bottom: 0.5rem;
        }
        .rc-form-control {
            display: block;
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            max-width: -webkit-fill-available;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
        .rc-form-text {
            display: block;
            margin-top: 0.25rem;
            color:#6c757d;
        }
        .rc-btn {
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: -9.75rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            cursor:pointer;
        }
        .rc-btn-primary {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 0.25rem;
        }
        #googleMap {
          width: 100%;
          height: 400px;
          margin: 30px auto;
        }
        
        /*output box*/
        #output {
          text-align: center;
          font-size: 2em;
          margin: 20px auto;
        }
        
        #mode {
          color: black;
        }
        </style>
        <form>
        <div class="form-group" style="display:none;">
                    <label for="from" class="col-xs-2 control-label"><i class="far fa-dot-circle"></i></label>
                    <div class="col-xs-4">
                        <input type="text" id="from" placeholder="Origin" class="form-control" value="Melbourne VIC, Australia">
                    </div>
               </div>
            <div class="rc-form-group">
                <label for="user_address">Input address</label>
                <input type="text" class="rc-form-control" name="user_address" id="user_address" aria-describedby="rcinputAddressHelp" placeholder="Enter the cities">
                <small id="rcinputAddressHelp" class="rc-form-text">Please input the address that you want to check</small>
             </div>
            
        </form>
        <button type="submit" class="rc-btn rc-btn-primary" onclick="calcRoute();">Submit</button>
        
        <div class="container-fluid">
            <div id="googleMap">

            </div>
            <div id="output">

            </div>
        </div>
        
        <script src="https://maps.googleapis.com/maps/api/js?key='.get_option("rc_gmaps_api_key").'&libraries=places"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
<script>

var src = "'.get_option("rc_gmaps_zone_url").'";
//set map options
var myLatLng = { lat: -37.81340271120419, lng: 144.9541013005446 };

  var map = new google.maps.Map(document.getElementById("googleMap"), {
    center: myLatLng,
    zoom: 15,
    mapTypeId: "roadmap"
  });

  var kmlLayer = new google.maps.KmlLayer(src, {
    suppressInfoWindows: true,
    preserveViewport: false,
    map: map
  });

//create a DirectionsService object to use the route method and get a result for our request
var directionsService = new google.maps.DirectionsService();

//create a DirectionsRenderer object which we will use to display the route
var directionsDisplay = new google.maps.DirectionsRenderer();

//bind the DirectionsRenderer to the map
directionsDisplay.setMap(map);


//define calcRoute function
function calcRoute() {
    //create request
    var request = {
        origin: document.getElementById("from").value,
        destination: document.getElementById("user_address").value,
        travelMode: google.maps.TravelMode.DRIVING, //WALKING, BYCYCLING, TRANSIT
        unitSystem: google.maps.UnitSystem.IMPERIAL
    }

    //pass the request to the route method
    directionsService.route(request, function (result, status) {
        if (status == google.maps.DirectionsStatus.OK) {

            //Get distance and time
            const output = document.querySelector("#output");
            output.innerHTML = "<div>From: " + document.getElementById("from").value + ".<br />To: " + document.getElementById("user_address").value + ".<br /> Driving distance  : " + result.routes[0].legs[0].distance.text + ".<br />Duration  : " + result.routes[0].legs[0].duration.text + ".</div>";

            //display route
            directionsDisplay.setDirections(result);
        } else {
            //delete route from map
            directionsDisplay.setDirections({ routes: [] });
            //center map in London
            map.setCenter(myLatLng);

            //show error message
            output.innerHTML = "<div> Could not retrieve driving distance.</div>";
        }
    });

}

//create autocomplete objects for all inputs
var options = {
    types: ["(cities)"]
}

var input2 = document.getElementById("user_address");
var autocomplete2 = new google.maps.places.Autocomplete(input2, options);
</script>
        ';
    }

?>