
<script src="https://maps.google.com/maps/api/js?key=AIzaSyDS5AwUrTwTyRSjOA3KFWFnGFVe-6v8UOM"></script>

<script type="text/javascript">
var map;
var Markers = {};
var infowindow;
var locations = [
    <?php for($i=0;$i<sizeof($locations);$i++){ $j=$i+1;?>
    [
        '',
        '<p class="text-center"><?php echo $locations[$i]['name'];?> <br><?php echo $locations[$i]['add'];?> </p>',
        <?php echo $locations[$i]['lat'];?>,
        <?php echo $locations[$i]['lng'];?>,
        0
    ]<?php if($j!=sizeof($locations))echo ","; }?>
];
var origin = new google.maps.LatLng(locations[0][2], locations[0][3]);

function initialize() {
  var mapOptions = {
    zoom: 18,
    center: origin
  };

  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    infowindow = new google.maps.InfoWindow();

    for(i=0; i<locations.length; i++) {
        var position = new google.maps.LatLng(locations[i][2], locations[i][3]);
        var marker = new google.maps.Marker({
            position: position,
            map: map,
        });
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infowindow.setContent(locations[i][1]);
                infowindow.setOptions({maxWidth: 200});
                infowindow.open(map, marker);
            }
        }) (marker, i));
        Markers[locations[i][4]] = marker;
    }

    locate(0);

}

function locate(marker_id) {
    var myMarker = Markers[marker_id];
    var markerPosition = myMarker.getPosition();
    map.setCenter(markerPosition);
    google.maps.event.trigger(myMarker, 'click');
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>
