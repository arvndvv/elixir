<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" type="text/css" href="sub/form.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css">


</head>
<body>
    <div class="boddd">
    <div class="container">
        <div class="row justify-content-center">
           <div class="col-12 col-md-9"><br>
           <h1>Your Review</h1>
              <form class="form-row">
                 
                 <div class="form-group input-group-sm col-12 col-sm-6 col-lg">
                    <label for="negotiate-name">Title</label>
                    <input type="text" class="form-control" id="negotiate-name">
                 </div>
                 <!--<div class="form-group input-group-sm col-12 col-sm-6 col-lg">
                    <label for="negotiate-email">E-mail</label>
                    <input type="email" class="form-control" id="negotiate-email">
                 </div>-->
                 <div class="form-group input-group-sm col-auto">
                    <label>Rating</label>
                    <div class="rating custom-radio">
                       <input type="radio" id="value5" name="rating" class="custom-control-input" value="5"/>
                       <label for="value5" class="custom-control-label"></label>
                       <input type="radio" id="value4" name="rating" class="custom-control-input" value="4"/>
                       <label for="value4" class="custom-control-label"></label>
                       <input type="radio" id="value3" name="rating" class="custom-control-input" value="3"/>
                       <label for="value3" class="custom-control-label"></label>
                       <input type="radio" id="value2" name="rating" class="custom-control-input" value="2"/>
                       <label for="value2" class="custom-control-label"></label>
                       <input type="radio" id="value1" name="rating" class="custom-control-input" value="1" />
                       <label for="value1" class="custom-control-label"></label>
                    </div>
                 </div>
                 <div class="form-group input-group-sm col-12">
                    <label for="negotiate-comments">Description</label>
                    <textarea class="form-control" rows="2" id="negotiate-comments"></textarea>
                 </div>
     
                 <div class="form-group col-auto ml-auto">
                    <button type="button" id="rat" class="btn btn-primary">Send</button>
                 </div>
              </form>
           </div>
        </div>
     </div>
    </div>




  </body>
</html>