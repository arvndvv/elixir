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
#map {
        position: absolute;
        top: 0;
        bottom: 0;
        width: 100%;
      }
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
.elixirbtn {
  /*box-shadow: 0px 0px 2px 0px #7600d8, inset 0px 0px 10px 0px #6203a0;*/
    position: fixed;
    top: 10px;
    
    left:55px;
    z-index: 1;
    width: 125px;
    font-size: 14px;
    color: #000000;
    background-color: #ffffff;
    /* font-weight: 300; */
    z-index:8;
    padding: 8px 0;
    border: none;
    display: none;
    border-radius: 1px;
    transition: 300ms;
    cursor: pointer;
}
.elixirbtn2 {
  /*box-shadow: 0px 0px 2px 0px #7600d8, inset 0px 0px 10px 0px #6203a0;*/
    position: fixed;
    top: 10px;
    z-index:8;
    left:200px;
    z-index: 1;
    width: 125px;
    font-size: 14px;
    color: #000000;
    background-color: #ffffff;
    /* font-weight: 300; */
    display: none;
    padding: 8px 0;
    border: none;
    border-radius: 1px;
    transition: 300ms;
    cursor: pointer;
}
@media screen and (max-width: 640px){
  .elixirbtn {
  /*box-shadow: 0px 0px 2px 0px #7600d8, inset 0px 0px 10px 0px #6203a0;*/
    position: fixed;
    z-index:8;
    top:75px;
    left: 10px;
    z-index: 1;
    width: 125px;
    font-size: 14px;
    color: #000000;
    background-color: #ffffff;
    /* font-weight: 300; */
    display: none;
    padding: 8px 0;
    border: none;
    border-radius: 1px;
    transition: 300ms;
    cursor: pointer;
}
.elixirbtn2 {
  /*box-shadow: 0px 0px 2px 0px #7600d8, inset 0px 0px 10px 0px #6203a0;*/
    position: fixed;
    z-index:8;
    top:75px;
    left: 150px;
    z-index: 1;
    width: 125px;
    font-size: 14px;
    color: #000000;
    background-color: #ffffff;
    /* font-weight: 300; */
    display: none;
    padding: 8px 0;
    border: none;
    border-radius: 1px;
    transition: 300ms;
    cursor: pointer;
}
}
.glow {
  
  
  text-align: center;
  -webkit-animation: glow 1s ease-in-out infinite alternate;
  -moz-animation: glow 1s ease-in-out infinite alternate;
  animation: glow 1s ease-in-out infinite alternate;
}

@-webkit-keyframes glow {
  from {
    box-shadow: 0 0 10px #ff0f0f, 0 0 20px #900096;
  }
  to {
    box-shadow: 0 0 20px #fff, 0 0 30px #cc0066;
  }
}
	/*#map { position: absolute; top: 0; bottom: 0; width: 100%;  margin-top: 135px;}*/
</style>
</head>
<body>

<div ><button type="button" class="elixirbtn2 glow" onclick="markermanuel();" ><strong>Manuel Locate <i class='glyphicon glyphicon-map-marker' style='color:blue;'></i></strong></button></div>
<div id="autolocate"><button type='button' class='elixirbtn glow' onclick='Notiflix.Report.Info("Info","<strong>Make sure the blue dot appeared on the Map.</strong>","OK"); ' ><strong>Auto Locate <i class='fa fa-circle' style='color:#1da1f2;font-size:10px;'></i></strong></button></div>
<div class="elixirtxt"><span>Elixir</span></div>
<div id="map"></div>

<script>



     Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });  
        Notiflix.Loading.Hourglass("Loading...");
 
  mapboxgl.accessToken = 'pk.eyJ1IjoiZWxpeGlyMjAyMCIsImEiOiJjazd3eWRtMmUwMXU5M2hzZjZ1azd2OXc4In0.vi6OCULcgJTlvCoHSnvp9g';
  
    var map = new mapboxgl.Map({
        container: 'map', // container id
        style: 'mapbox://styles/mapbox/streets-v10',
        center: [76.430722, 10.431007], // starting position
        
        zoom: 5 // starting zoom
    });



map.on('load', function() {
  $(".elixirbtn").show();
  $(".elixirbtn2").show();
  Notiflix.Loading.Remove();
  geolocate.trigger();
  swipzzz=0;
  var latitudezz=document.getElementById("usrlati").value;
var longitudezz=document.getElementById("usrlongi").value;

if(latitudezz!="location" || longitudezz!="location"){
  atfirst();
}

});



var geocoder = new MapboxGeocoder({
accessToken: mapboxgl.accessToken,
marker: {
color: 'orange'
},
mapboxgl: mapboxgl
});
 
map.addControl(geocoder);

      geocoder.on('result', function(ev) {
        document.getElementById('informat').innerHTML="Your Place name or Street name.";
       // console.log(ev.result.text,ev.result.center[0], ev.result.center[1]);
        document.getElementById("lati").value=ev.result.center[1];
document.getElementById("longi").value=ev.result.center[0];
str=ev.result.text;
document.getElementById("place").value=str.substr(0,str.indexOf(' '));
document.getElementById('demo').innerHTML="<center><p>Location of Orange pointer <i class='glyphicon glyphicon-map-marker' style='color:orange;'></i> is selected</p></center>";
document.getElementById('getlocokbtnz').innerHTML="<input type='button' class='bos' onclick='settheloc(1);' value='ok' />";
$(".modlld").addClass("show-modlld");
			   });

          
map.addControl(new mapboxgl.NavigationControl());






var geolocate = new mapboxgl.GeolocateControl({
 positionOptions: {
   enableHighAccuracy: true
 },
 trackUserLocation: false,
 showUserLocation:true
});

// Add the control to the map.
map.addControl(geolocate);


geolocate.on('geolocate', function(e) {
      var lon = e.coords.longitude;
      var lat = e.coords.latitude;
      document.getElementById('autolocate').innerHTML="<button type='button' class='elixirbtn glow' onclick='Autoselect();' ><strong>Auto Locate <i class='fa fa-circle' style='color:#1da1f2;font-size:10px;'></i></strong></button>";
$(".elixirbtn").show();
if((document.getElementById("geolati").value)!=lat && (document.getElementById("geolongi").value)!=lon){
  document.getElementById("geolati").value=lat;
document.getElementById("geolongi").value=lon;

  Autoselect();
}

var position = [lon, lat];
      document.getElementById("geolati").value=lat;
document.getElementById("geolongi").value=lon;

   //   console.log(e); 
      
 
});


function Autoselect(){

  document.getElementById('getlocokbtnz').innerHTML="<input type='button' class='bos' onclick='settheloc(1);' value='ok' />";
  document.getElementById('informat').innerHTML="<p>Give your Place name or Street name.</p>";
document.getElementById("place").value=null;
document.getElementById('demo').innerHTML="<center><p>Location of Blue dot <i class='fa fa-circle' style='color:#1da1f2;'></i> is selected</p></center>";
  $(".modlld").addClass("show-modlld");
  
  document.getElementById("lati").value=document.getElementById("geolati").value;
document.getElementById("longi").value=document.getElementById("geolongi").value;
//if((document.getElementById("geolati").value)!="" && (document.getElementById("geolongi").value)!=""){ 
//}
//marker2.remove();
 // navigator.geolocation.getCurrentPosition(success, error, options);
  //$(".modlld").addClass("show-modlld");
 }




function autogetnew(){
  
  marker.remove();
var cur=document.getElementById("lati").value;
var cur2=document.getElementById("longi").value;
var current=[cur2, cur];
marker2.setPopup(new mapboxgl.Popup().setHTML("<h6>New location</h6>"))
marker2.setLngLat(current)
marker2.addTo(map); 
marker2.togglePopup();
}







var marker = new mapboxgl.Marker({
draggable: true,
color: 'blue'
})
//marker.setLngLat(start)


function markermanuel(){
 
 
   Notiflix.Report.Info("Info",'<strong> Drag the Blue pointer to your correct location.</strong>',"OK"); 
  var latitudez=document.getElementById("usrlati").value;
var longitudez=document.getElementById("usrlongi").value;

if(latitudez!="location" || longitudez!="location"){

  var sta=document.getElementById("lati").value;
var sta2=document.getElementById("longi").value;
var start=[sta2, sta];



marker.setLngLat(start)

  marker.addTo(map);
  //marker2.remove();
}else{

  var sta=document.getElementById("geolati").value;
var sta2=document.getElementById("geolongi").value;
var start=[sta2, sta];



marker.setLngLat(start)

  marker.addTo(map);
  //marker2.remove();
}


 }







function onDragEnd() {

var latitudez=document.getElementById("usrlati").value;
var longitudez=document.getElementById("usrlongi").value;

if(latitudez!="location" || longitudez!="location"){
    document.getElementById('getlocokbtnz').innerHTML="<input type='button' class='bos' onclick='settheloc(0);' id='getloc' value='ok' />";

}else{
  document.getElementById('getlocokbtnz').innerHTML="<input type='button' class='bos' onclick='settheloc(3);' id='getloc' value='ok' />";

}
document.getElementById('demo').innerHTML="<center><p>Location of Blue pointer <i class='glyphicon glyphicon-map-marker' style='color:blue;'></i> is selected</p></center>";

    $(".modlld").addClass("show-modlld");
var lngLat = marker.getLngLat();
document.getElementById("lati").value=lngLat.lat;
document.getElementById("longi").value=lngLat.lng;
document.getElementById('informat').innerHTML="<p>Give your Place name or Street name.</p>";
document.getElementById("place").value=null;


if(latitudez!="location" || longitudez!="location"){
currentget();
}
//coordinates.style.display = 'block';
//coordinates.innerHTML =
//'Longitude: ' + lngLat.lng + '<br />Latitude: ' + lngLat.lat;
}
 
marker.on('dragend', onDragEnd);


function markerpopup(){

  marker2.togglePopup();
  marker2.setPopup(new mapboxgl.Popup().setHTML("<h6>Previous location</h6>"))
marker2.togglePopup();
  //currentget();
  marker.setPopup(new mapboxgl.Popup().setHTML("<h6>New location</h6>"))
marker.togglePopup();

}
function markerpopupz(){
//currentget();
marker.setPopup(new mapboxgl.Popup().setHTML("<h6>New location</h6>"))
marker.togglePopup();

}







var marker2 = new mapboxgl.Marker({
  
color: 'brown'
})


function atfirst(){
var cur=document.getElementById("usrlati").value;
var cur2=document.getElementById("usrlongi").value;
var current=[cur2, cur];
marker2.setPopup(new mapboxgl.Popup().setHTML("<h6>Located here</h6>"))
marker2.setLngLat(current)
marker2.addTo(map); 
marker2.togglePopup();
}


function currentget(){

var cur=document.getElementById("usrlati").value;
var cur2=document.getElementById("usrlongi").value;

var ended=document.getElementById("lati").value
var ended2=document.getElementById("longi").value

var endedd=[ended2, ended];
var current=[cur2, cur];


if(cur==ended && cur2==ended2){
  marker2.setLngLat(current)
  marker2.remove();
//  marker.setLngLat(endedd)
//marker.addTo(map);
}else{
  marker2.setPopup(new mapboxgl.Popup().setHTML("<h6>Previous location</h6>")) // add popup
  
  marker2.setLngLat(current)
marker2.addTo(map); 
marker2.togglePopup();
}
}





</script>

</body>
</html>