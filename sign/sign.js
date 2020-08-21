$(function () {
  $(".btn").click(function () {
    toggling();
  });
});
$(function () {
  $("#worker").click(function () {
    $(".worker").toggleClass("hide");
    $(".frame-long").toggleClass("frame-super");
  });
});


function toggling(){
  $("#add_err2").hide();
  $(".form-signin").toggleClass("form-signin-left");
  $(".form-signup").toggleClass("form-signup-left");
  $(".frame").toggleClass("frame-long");
  $(".signup-inactive").toggleClass("signup-active");
  $(".signin-active").toggleClass("signin-inactive");
  $(".forgot").toggleClass("forgot-left");
  $(".frame").removeClass("frame-super");
  $(".worker").addClass("hide");

  $("#worker").prop("checked", true);

  $(this).removeClass("idle").addClass("active");
}


//updated 24-4-2020
/*
$("#myPassword").passwordValidation(
  { confirmField: "#myConfirmPassword" },
  function(element, valid, match, failedCases) {
    $("#errors").html("<pre>" + failedCases.join("\n") + "</pre>");

    if (valid) $(element).css("border", "2px solid green");

    if (!valid) $(element).css("border", "2px solid red");

    if (valid && match)
      $("#myConfirmPassword").css("border", "2px solid green");

    if (!valid || !match)
      $("#myConfirmPassword").css("border", "2px solid red");
  }
);
*/
