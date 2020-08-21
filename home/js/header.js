$(document).ready(function() {
  $("#ham").click(function() {
    $("#menu").css("top", "60px");
    $("#x").css("top", "0px");
    $("#ham").css("top", "-100px");
  });
  $("#x").click(function() {
    $("#menu").css("top", "-500px");
    $("#ham").css("top", "0px");
    $("#x").css("top", "-100px");
  });
});
