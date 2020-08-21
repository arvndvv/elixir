
  $(".hover").mouseleave(
    function () {
      $(this).removeClass("hover");
    }
  );


  $(".formBtn").click(function() {
    $(".modl").removeClass("show-modl");
   // $(".modll2").removeClass("show-modll2");
    $(".modll3").removeClass("show-modll3");
  });

  $(".details").click(function() {
    $(".modl").addClass("show-modl");
  });

  //$(".accept").click(function() {
   // $(".modll2").addClass("show-modll2");
  //});

  $(".reject").click(function() {
    $(".modll3").addClass("show-modll3");
  });
  