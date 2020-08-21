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
    <meta charset='utf-8' />
    <title></title>
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />

    <style>
      body {
        margin: 0;
        padding: 0;
      }

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
    left:55px;
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
.distance {
    top: 10px;
    color: #cacaca;
    position: fixed;
    z-index: 9;
    width: 160px;
    height: fit-content;
    padding: 5px;
    float: none;
    display: none;
    background-color: #0000007d;
    left: 200px;
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
.distance {
    top: 75px;
    color: #cacaca;
    position: fixed;
    z-index: 9;
    width: 160px;
    height: fit-content;
    padding: 5px;
    float: none;
    display: block!important;
    background-color: #0000007d;
    left: 150px;
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


    </style>
  </head>

  <body>




    <div ><button type="button" class="elixirbtn2 glow " onclick="tohome();" ><strong>Drive to Home <i class='fa fa-circle' style='color:blue;'></i></strong></button></div>
    <div ><button type='button' class='elixirbtn glow ' onclick='toclient();' ><strong>Drive to Client <i class='fa fa-circle' style='color:red;'></i></strong></button></div>
    <div class="elixirtxt"><span>Elixir</span></div>
    <input id="currentlati" type="hidden" readonly/>
<input  id="currentlongi" type="hidden" readonly/>
<div class="distance"><span style="margin-left:10px" id="distzz"></span><br><span style="margin-left:10px" id="distzz2"></span></div>
    <div id='map'></div>
    <script>
        $('.page-wrapper').removeClass('toggled');
     Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });  
        Notiflix.Loading.Hourglass("Loading...");
    // add the JavaScript here
    mapboxgl.accessToken = 'pk.eyJ1IjoiZWxpeGlyMjAyMCIsImEiOiJjazd3eWRtMmUwMXU5M2hzZjZ1azd2OXc4In0.vi6OCULcgJTlvCoHSnvp9g';
var map = new mapboxgl.Map({
  container: 'map',
  style: 'mapbox://styles/mapbox/streets-v10',
  center: [77.217316, 8.307052], // starting position
  zoom: 12
});

var geocoder = new MapboxGeocoder({
accessToken: mapboxgl.accessToken,
marker: {
color: 'orange'
},
mapboxgl: mapboxgl
});
 
map.addControl(geocoder);

map.on('load', function() {
  geolocate.trigger();
  swipzzz=0;
  Notiflix.Loading.Remove();
});
    map.addControl(new mapboxgl.NavigationControl());
// set the bounds of the map
//var bounds = [[-123.069003, 45.395273], [-122.303707, 45.612333]];
//map.setMaxBounds(bounds);

// initialize the map canvas to interact with later
var canvas = map.getCanvasContainer();
var latitudez=document.getElementById("usrlati").value;
var longitudez=document.getElementById("usrlongi").value;
// an arbitrary start will always be the same
// only the end or destination will change
var start = [longitudez, latitudez];
//8.307052, 77.217316
//8.334467, 77.166886

var latitz=document.getElementById("clientlati").value;
var longitz=document.getElementById("clientlongi").value;
var end = [longitz, latitz];
// this is where the code for the next step will go
// create a function to make a directions request

function tohome(){


   var lat= document.getElementById("currentlati").value;
var lon= document.getElementById("currentlongi").value;
  var position = [lon, lat];

  var final =[start[0],start[1]];
  getRoute2(position,final,1);
  getRoute2(position,final,1);
//console.log(1);
//$(".elixirbtn").show();
 // $(".elixirbtn2").hide();

  if((lon!=longitudez && lat!=latitudez) && (lon!=longitz && lat!=latitz)){

$(".elixirbtn").show();//toclient
$(".elixirbtn2").hide();//tohome
}
if((lon!=longitudez && lat!=latitudez) && (lon==longitz && lat==latitz)){

$(".elixirbtn").hide();//toclient
$(".elixirbtn2").show();//tohome

}
if((lon==longitudez && lat==latitudez) && (lon!=longitz && lat!=latitz)){

$(".elixirbtn").show();//toclient
$(".elixirbtn2").hide();//tohome

}
if((lon==longitudez && lat==latitudez) && (lon==longitz && lat==latitz)){

$(".elixirbtn").hide();//toclient
$(".elixirbtn2").hide();//tohome

}

}

function toclient(){
  var lat= document.getElementById("currentlati").value;
var lon= document.getElementById("currentlongi").value;
  var position = [lon, lat];

  var final =[end[0],end[1]];
  getRoute2(position,final,0);
  getRoute2(position,final,0);
 // console.log(2);
  //$(".elixirbtn").hide();
  //$(".elixirbtn2").show();

  if((lon!=longitudez && lat!=latitudez) && (lon!=longitz && lat!=latitz)){

$(".elixirbtn").hide();//toclient
$(".elixirbtn2").show();//tohome
}
if((lon!=longitudez && lat!=latitudez) && (lon==longitz && lat==latitz)){

$(".elixirbtn").hide();//toclient
$(".elixirbtn2").show();//tohome

}
if((lon==longitudez && lat==latitudez) && (lon!=longitz && lat!=latitz)){

$(".elixirbtn").show();//toclient
$(".elixirbtn2").hide();//tohome

}
if((lon==longitudez && lat==latitudez) && (lon==longitz && lat==latitz)){

$(".elixirbtn").hide();//toclient
$(".elixirbtn2").hide();//tohome

}
}




function getRoute2(position,final,dir) {
   var dir=dir;
  // make a directions request using cycling profile
  // an arbitrary start will always be the same
  // only the end or destination will change

//  var start = [-122.662323, 45.523751];
  var url = 'https://api.mapbox.com/directions/v5/mapbox/driving-traffic/' + position[0] + ',' + position[1] + ';' + final[0] + ',' + start[1] + '?steps=true&geometries=geojson&access_token=' + mapboxgl.accessToken;

  // make an XHR request https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest
  var req = new XMLHttpRequest();
  req.open('GET', url, true);
  req.onload = function() {
    var json = JSON.parse(req.response);
    var data = json.routes[0];
    var route = data.geometry.coordinates;
    //console.log(data.distance);
    var geojson = {
      type: 'Feature',
      properties: {},
      geometry: {
        type: 'LineString',
        coordinates: route
      }
    };
    // if the route already exists on the map, reset it using setData
    if (map.getSource('route2')) {
      map.getSource('route2').setData(geojson);
     
    } else { // otherwise, make a new request
      map.addLayer({
        id: 'route2',
        type: 'line',
        source: {
          type: 'geojson',
          data: {
            type: 'Feature',
            properties: {},
            geometry: {
              type: 'LineString',
              coordinates: geojson
            }
          }
        },
        layout: {
          'line-join': 'round',
          'line-cap': 'round'
        },
        paint: {
          'line-color': 'green',
          'line-width': 5,
          'line-opacity': 0.75
        }
      });


     // new mapboxgl.Popup().setHTML(data2.distance)
   //.setLngLat(start)
    //.addTo(map); 
    
    }
    if(dir==1){
      var str="<i class='fa fa-circle' style='color:#1da1f2;'></i> <i class='fa fa-arrows-h' style='color:white;'></i> <i class='fa fa-circle' style='color:blue;'></i> :   "
      var distand=data.distance/1000;
      var valuedd = str.concat(Math.round(distand), " KM"); 
      document.getElementById("distzz2").innerHTML=valuedd;
      }
      if(dir==0){
      var str="<i class='fa fa-circle' style='color:#1da1f2;'></i> <i class='fa fa-arrows-h' style='color:white;'></i> <i class='fa fa-circle' style='color:red;'></i> :   "
      var distand=data.distance/1000;
      var valuedd = str.concat(Math.round(distand), " KM"); 
      document.getElementById("distzz2").innerHTML=valuedd;
      }
    // add turn instructions here at the end
    
  };
  req.send();
}









function getRoute(start,end) {
  
  // make a directions request using cycling profile
  // an arbitrary start will always be the same
  // only the end or destination will change

//  var start = [-122.662323, 45.523751];
  var url = 'https://api.mapbox.com/directions/v5/mapbox/driving/' + start[0] + ',' + start[1] + ';' + end[0] + ',' + end[1] + '?steps=true&geometries=geojson&access_token=' + mapboxgl.accessToken;

  // make an XHR request https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest
  var req = new XMLHttpRequest();
  req.open('GET', url, true);
  req.onload = function() {
    var json = JSON.parse(req.response);
 
    var data = json.routes[0];
    var route = data.geometry.coordinates;
    //console.log(data.distance);
    var geojson = {
      type: 'Feature',
      properties: {},
      geometry: {
        type: 'LineString',
        coordinates: route
      }
    };
    // if the route already exists on the map, reset it using setData
    if (map.getSource('route')) {
      map.getSource('route').setData(geojson);
    } else { // otherwise, make a new request
      map.addLayer({
        id: 'route',
        type: 'line',
        source: {
          type: 'geojson',
          data: {
            type: 'Feature',
            properties: {},
            geometry: {
              type: 'LineString',
              coordinates: geojson
            }
          }
        },
        layout: {
          'line-join': 'round',
          'line-cap': 'round'
        },
        paint: {
          'line-color': '#3c1053',
          'line-width': 8,
          'line-opacity': 0.75
        }
      });
      
     // new mapboxgl.Popup().setHTML(data.distance)
  // .setLngLat(start)
   // .addTo(map); 

    }
    $(".distance").show();
   // console.log(data)
      var str="<i class='fa fa-circle' style='color:blue;'></i> <i class='fa fa-arrows-h' style='color:white;'></i> <i class='fa fa-circle' style='color:red;'></i> :   "
      var distand=data.distance/1000;
      var valuedd = str.concat(Math.round(distand), " KM"); 
      document.getElementById("distzz").innerHTML=valuedd;
    // add turn instructions here at the end
  };
  req.send();
}

map.on('load', function() {
  // make an initial directions request that
  // starts and ends at the same location
 // $(".elixirbtn").show();
  //$(".elixirbtn2").show();

  getRoute(start,end);
  // Add starting point to the map
  map.addLayer({
    id: 'point',
    type: 'circle',
    source: {
      type: 'geojson',
      data: {
        type: 'FeatureCollection',
        features: [{
          type: 'Feature',
          properties: {
            description:'hai',

          },
          geometry: {
            type: 'Point',
            coordinates: start
          }
        }
        ]
      }
    },
    paint: {
      'circle-radius': 8,
      'circle-color': 'blue'
    }
  });


  map.addLayer({
      id: 'end',
      type: 'circle',
      source: {
        type: 'geojson',
        data: {
          type: 'FeatureCollection',
          features: [{
            type: 'Feature',
            properties: {},
            geometry: {
              type: 'Point',
              coordinates: end
            }
          }]
        }
      },
      paint: {
        'circle-radius': 8,
        'circle-color': 'red'
      }
    });

map.getCanvas().style.cursor = 'pointer';
    new mapboxgl.Popup().setHTML("Your Location")
   .setLngLat(start)
    .addTo(map); 

    map.on('click', 'point', function() {
new mapboxgl.Popup()
.setLngLat(start)
.setHTML("Your Location")
.addTo(map);
});



new mapboxgl.Popup().setHTML("Client's Location")
   .setLngLat(end)
    .addTo(map); 

    map.on('click', 'end', function() {
new mapboxgl.Popup()
.setLngLat(end)
.setHTML("Client's Location")
.addTo(map);
});

    getRoute(start,end);


  // this is where the code from the next step will go
});



// Initialize the geolocate control.
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
      document.getElementById("currentlati").value=lat;
document.getElementById("currentlongi").value=lon;

var latz= lat;
var lonz= lon;

  var latitudezz=document.getElementById("usrlati").value;
var longitudezz=document.getElementById("usrlongi").value;

  var latitzz=document.getElementById("clientlati").value;
var longitzz=document.getElementById("clientlongi").value;

if((lonz!=longitudezz && latz!=latitudezz) && (lonz!=longitzz && latz!=latitzz)){

    $(".elixirbtn").hide();//toclient
  $(".elixirbtn2").show();//tohome
  }
  if((lonz!=longitudezz && latz!=latitudezz) && (lonz==longitzz && latz==latitzz)){

    $(".elixirbtn").hide();//toclient
  $(".elixirbtn2").show();//tohome

  }
  if((lonz==longitudezz && latz==latitudezz) && (lonz!=longitzz && latz!=latitzz)){

$(".elixirbtn").show();//toclient
$(".elixirbtn2").hide();//tohome

}
if((lonz==longitudezz && latz==latitudezz) && (lonz==longitz && latz==latitzz)){

$(".elixirbtn").hide();//toclient
$(".elixirbtn2").hide();//tohome

}
     // console.log(e); 
      
 
});
/*
map.on('click', function(e) {
  var coordsObj = e.lngLat;
  canvas.style.cursor = '';
  var coords = Object.keys(coordsObj).map(function(key) {
    return coordsObj[key];
  });
  var end = {
    type: 'FeatureCollection',
    features: [{
      type: 'Feature',
      properties: {},
      geometry: {
        type: 'Point',
        coordinates: coords
      }
    }
    ]
  };
  if (map.getLayer('end')) {
    map.getSource('end').setData(end);
  } else {
    map.addLayer({
      id: 'end',
      type: 'circle',
      source: {
        type: 'geojson',
        data: {
          type: 'FeatureCollection',
          features: [{
            type: 'Feature',
            properties: {},
            geometry: {
              type: 'Point',
              coordinates: coords
            }
          }]
        }
      },
      paint: {
        'circle-radius': 10,
        'circle-color': '#f30'
      }
    });
  }
  getRoute(coords);
});*/
    </script>
  </body>
</html>