
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<input id="myPassword" type="password">

    <input id="myConfirmPassword" type="password">
    <div id="errors"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script src="jquery.password-validation.js"></script>

<script>
$("#myPassword").passwordValidation({"confirmField": "#myConfirmPassword"}, function(element, valid, match, failedCases) {

	  $("#errors").html("<pre>" + failedCases.join("\n") + "</pre>");

	   if(valid) $(element).css("border","2px solid green");

	   if(!valid) $(element).css("border","2px solid red");

	   if(valid && match) $("#myConfirmPassword").css("border","2px solid green");

	   if(!valid || !match) $("#myConfirmPassword").css("border","2px solid red");

	});

</script>
</body>
</html>