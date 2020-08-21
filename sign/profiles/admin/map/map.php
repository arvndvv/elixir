<?php 
 session_start();
if(isset($_SESSION['loginemail'])){
  
}
else{
header( "Location: ../../../index.php" );
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Locate the user</title>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />

<style>
	body { margin: 0; padding: 0; }
      #map { position: absolute; top: 0; bottom: 0; width: 100%; }
      .mapboxgl-ctrl-logo{
display:none!important;
      }
      .mapboxgl-ctrl-bottom-right{
display:none!important;
      }
      .elixirtxt{
  bottom: 0px;
    color: #cacaca;
    position: fixed;
    z-index: 9;
    width: 100%;
    text-align: center;
    float: none;
    display: block!important;
    background-color: #0000007d;
}
</style>
</head>
<body>
<div class="elixirtxt"><span>Elixir</span></div>
<div id="map"></div>
<script>
       Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });  
        Notiflix.Loading.Hourglass("Loading...");

	mapboxgl.accessToken = 'pk.eyJ1IjoiZWxpeGlyMjAyMCIsImEiOiJjazd3eWRtMmUwMXU5M2hzZjZ1azd2OXc4In0.vi6OCULcgJTlvCoHSnvp9g';
var map = new mapboxgl.Map({
container: 'map', // container id
style: 'mapbox://styles/mapbox/streets-v11',
center: [76.430722, 10.431007], // starting position
zoom: 6 // starting zoom
});
 
map.on('load', function() {

  Notiflix.Loading.Remove();
  geolocate.trigger();
  swipzzz=0;


});


var geocoder = new MapboxGeocoder({
accessToken: mapboxgl.accessToken,
marker: {
color: 'orange'
},
mapboxgl: mapboxgl
});
 
map.addControl(geocoder);


map.addControl(new mapboxgl.NavigationControl());

// Add geolocate control to the map.

var geolocate = new mapboxgl.GeolocateControl({
 positionOptions: {
   enableHighAccuracy: true
 },
 trackUserLocation: true,
 showUserLocation:true
});

// Add the control to the map.
map.addControl(geolocate);


geolocate.on('geolocate', function(e) {
      var lon = e.coords.longitude;
      var lat = e.coords.latitude;
     
var position = [lon, lat];


      //console.log(position); 
      
 
});



</script>
 
</body>
</html>