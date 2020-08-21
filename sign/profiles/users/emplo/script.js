
 $("#close-sidebar").click(function() {

    $(".page-wrapper").removeClass("toggled");
  });
  $("#show-sidebar").click(function() {
    $(".page-wrapper").addClass("toggled");
  });


  var swipzzz=1;
  var maxTime = 100, // allow movement if < 1000 ms (1 sec)
  maxDistance = 50,  // swipe movement of 50 pixels triggers the swipe

  target = $('#swipezz'),
  startX = 0,
  startTime = 0,
  touch = "ontouchend" in document,
  startEvent = (touch) ? 'touchstart' : 'mousedown',
  moveEvent = (touch) ? 'touchmove' : 'mousemove',
  endEvent = (touch) ? 'touchend' : 'mouseup';

target
  .bind(startEvent, function(e){
      // prevent image drag (Firefox)
    //  e.preventDefault();
      startTime = e.timeStamp;
      startX = e.originalEvent.touches ? e.originalEvent.touches[0].pageX : e.pageX;
  })
  .bind(endEvent, function(e){
      startTime = 0;
      startX = 0;
  })
  .bind(moveEvent, function(e){
      //e.preventDefault();
      var currentX = e.originalEvent.touches ? e.originalEvent.touches[0].pageX : e.pageX,
          currentDistance = (startX === 0) ? 0 : Math.abs(currentX - startX),
          // allow if movement < 1 sec
          currentTime = e.timeStamp;
      if (startTime !== 0 && currentTime - startTime < maxTime && currentDistance > maxDistance) {
          if (currentX < startX) {
              // swipe left code here
              //target.find('h1').html('Swipe Left').fadeIn();
             // console.log("Swipe Left");
             if(swipzzz==1){
              $(".page-wrapper").removeClass("toggled");
             }
              //setTimeout(function(){
              //    target.find('h1').fadeOut();
             // }, 1000);
          }
          if (currentX > startX) {
              // swipe right code here
             // target.find('h1').html('Swipe Right').fadeIn();
             // console.log("Swipe Right");
             if(swipzzz==1){
              $(".page-wrapper").addClass("toggled");
          }
             // setTimeout(function(){
             //     target.find('h1').fadeOut();
              //}, 1000);
          }
          startTime = 0;
          startX = 0;
      }
  });

var width=screen.width;
  /*
if(width>1200){
  var e = $('#swipezz');
  e.touch();
  e.on('swipeLeft', function(event) {
    $(".page-wrapper").removeClass("toggled");
  });
  e.on('swipeRight', function(event) {
    $(".page-wrapper").addClass("toggled");
  });
}*/


if(width>700){
  rmv();
  //$("#sidem").removeClass("toggled");
}//else if(width>700){
 // console.log(screen.width);
  //$(".page-wrapper").addClass("toggled");
//}
function rmv(){
  //console.log(screen.width);
  $(".page-wrapper").addClass("toggled");
}




  $("#clozs").click(function() {

    $(".modll").removeClass("show-modll");
  });
  
  //$("#noti").click(function() {
 
    //$(".modll").addClass("show-modll");
 // });




  $("#clozs2").click(function() {

    $(".modl2").removeClass("show-modl2");
  });
  $("#log").click(function() {
 
    $(".modl2").addClass("show-modl2");
  });




  $("#clops").click(function() {
    document.getElementById("lati").value=document.getElementById("usrlati").value;
    document.getElementById("longi").value =document.getElementById("usrlongi").value;
    Notiflix.Notify.Warning('Not Updated');
    $(".modlld").removeClass("show-modlld");
  });
  $("#locationz").click(function() {

    $(".modlld").addClass("show-modlld");
  });