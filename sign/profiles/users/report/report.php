<?php 

session_start();
if(isset($_SESSION['loginemail'])){
}
else{
header( "Location: ../../../index.php" );
}
?>
<html><head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css"/>
  <link rel="stylesheet" href="../../../Minified/notiflix-2.1.3.min.css" />
<script src="../../../Minified/notiflix-2.1.3.min.js"></script>
  <link rel="stylesheet"  href="../report/report.css"/>

</head>

<body class="bod">

<div class="">
  <footer id="contact" class="footer">
    <div class="containe">
      <div class="ro">
        <h4 class="h2 heading">Report Problems</h4>
        <form role="form" id="feedbackForm" data-toggle="validator" data-disable="false">
          <div class="form-group">
            <label class="control-label" for="name">Name <span>*</span></label>
            <div class="input-group">
              <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo $_SESSION['loginname']?>" readonly required/>
              <!--<span class="input-group-addon"><i class="glyphicon glyphicon-unchecked form-control-feedback"></i></span>-->
            </div>
            <span class="help-block" style="display: none;">Please enter your name.</span>
          </div>

          <div class="form-group">
            <label class="control-label" for="email">Email <span>*</span></label>
            <div class="input-group">
              <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo $_SESSION['loginemail']?>" readonly required/>
              <!--<span class="input-group-addon"><i class="glyphicon glyphicon-unchecked form-control-feedback"></i></span>-->
            </div>
            <div class="form-group">
            <label class="control-label" for="email">Reason<span>*</span></label>
            <select name="reason"  id="reason" class="form-control" required>
                  <!--<option value="Service Informations">Service Informations</option>-->
                  <option value="Suggestions">Suggestions</option>
                  <option value="Report bug">Report bug</option>
                  <option value="Others">Others</option>
                </select>
            <!--<span class="help-block" style="display: none;">Please enter a valid e-mail address.</span>-->
          </div>
  
          </div>
          <div class="form-group">
            <label class="control-label" for="message">Message <span>*</span></label>
            <div class="input-group">
              <textarea rows="5" cols="30" class="form-control" id="messagez" name="message" placeholder="Enter your message" required></textarea>
             <!--<span class="input-group-addon"><i class="glyphicon glyphicon-unchecked form-control-feedback"></i></span>-->
            </div>
            <span class="help-block" style="display: none;">Please enter a message.</span>
          </div>
         
        
          <button type="button" id="feedbackSubmit" onclick="report();" class="btn btn-primary btn-lg" data-loading-text="Sending..." style="display: block; margin-top: 10px;">Send Feedback</button>
        </form>
        
      </div>
      <!-- end row contact -->
    </div>
    <!-- end container footer section -->
  </footer>
</div>
  <!-- end footer -->
  
  <!-- to check http://www.nfriedly.com/techblog/2009/11/how-to-build-a-spam-free-contact-forms-without-captchas/ -->
<script>
Notiflix.Loading.Init({ svgColor:"#440045",svgSize:"60px",messageFontSize:"10px",backgroundColor:"rgba(17,17,17,0.8)", });  
        Notiflix.Loading.Hourglass("Loading...");
     $(document).ready(function(){
      Notiflix.Loading.Remove();

 });
 function report(){
  

    var reason = $("#reason").val();

    var messagez = $("#messagez").val();

      $.ajax({
        url: "../report/save.php",
        type: "POST",
        data: "&reason="+reason+"&messagez="+messagez,
       
        success: function (html) {
          if($.trim(html)=="nmsg"){
            Notiflix.Report.Warning("Warning","Give your message.","OK");
            
          }else if($.trim(html)=="true"){
            document.getElementById("message").value=null;
            $("#feedbackSubmit").attr("disabled", "disabled");
            Notiflix.Report.Success("Done","Successfully reported.","OK"); 
            
          }else{
            Notiflix.Report.Failure("Something happened","Please try later.","OK"); 
          
          }
         // console.log(html);
          
          Notiflix.Loading.Remove();
       },
       beforeSend: function () {
        Notiflix.Loading.Init({ svgColor:"#440045",svgSize:"60px",messageFontSize:"10px",backgroundColor:"rgba(17,17,17,0.8)", });  
        Notiflix.Loading.Hourglass("Loading...");
       }
      });

    }

</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>
</html>