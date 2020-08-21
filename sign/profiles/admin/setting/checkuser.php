<?php 

session_start();
require_once '../../../../essential/dbconnect.php';

$role=$_SESSION['loginrole'];
if($role=="admin"){
    $email=$_SESSION['loginemail'];
$sql = "SELECT * FROM admin WHERE email='$email'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

echo " <h2 class='heading'>Edit profile.<small></small></h2>
<hr class='colorgraph'>


    <div class='form-group'>
                  <input type='text' name='first_name' id='first_name' class='form-control input-lg' value='".$row['name']."' placeholder='Name' tabindex='1'>
    </div>
 

<div class='form-group'>
  <input type='email' name='email' id='email' class='form-control input-lg' value='".$row['email']."' placeholder='Email Address' tabindex='4' readonly>
</div>            
<hr class='colorgraph'>
<span>Only if you want to change password</span>
<div class='row'>

  <div class='col-xs-12 col-sm-6 col-md-6'>
    <div class='form-group'>
      <input type='password' name='password' id='password' class='form-control input-lg' placeholder='New Password' tabindex='5'>
    </div>
  </div>
  <div class='col-xs-12 col-sm-6 col-md-6'>
    <div class='form-group'>
      <input type='password' name='password_confirmation' id='password_confirmation' class='form-control input-lg' placeholder='Confirm Password' tabindex='6'>
    </div>
  </div>
</div><hr class='colorgraph'>
<div class='form-group'>
  <input type='password' name='password' id='oldpassword' class='form-control input-lg' placeholder='Current Password' tabindex='5'>
</div>
<hr class='colorgraph'>
<div class='row'>
  <div class='col-xs-12 col-md-6'></div>
  <div class='col-xs-12 col-md-6'><a onclick='update();' class='btn btn-success btn-block btn-lg'>Save</a></div>
</div>";
}else if($role=="client"){
    $email=$_SESSION['loginemail'];
    $sql = "SELECT * FROM client WHERE email='$email'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    echo " <h2 class='heading'>Edit profile.<small></small></h2>
    <hr class='colorgraph'>

        <div class='form-group'>
                      <input type='text' name='first_name' id='first_name' class='form-control input-lg' value='".$row['name']."' placeholder='Name' tabindex='1'>
        </div>

    <div class='form-group'>
      <input type='email' name='email' id='email' class='form-control input-lg' value='".$row['email']."' placeholder='Email Address' tabindex='4' readonly>
    </div>            
    <div class='form-group'>
      <input type='tel' name='number' id='number' class='form-control input-lg' value='".$row['mobile']."' placeholder='Phone number' tabindex=''>
    </div>
    <hr class='colorgraph'>
    <span>Only if you want to change password</span>
    <div class='row'>

      <div class='col-xs-12 col-sm-6 col-md-6'>
        <div class='form-group'>
          <input type='password' name='password' id='password' class='form-control input-lg' placeholder='New Password' tabindex='5'>
        </div>
      </div>
      <div class='col-xs-12 col-sm-6 col-md-6'>
        <div class='form-group'>
          <input type='password' name='password_confirmation' id='password_confirmation' class='form-control input-lg' placeholder='Confirm Password' tabindex='6'>
        </div>
      </div>
    </div><hr class='colorgraph'>
    <div class='form-group'>
    <input type='password' name='password' id='oldpassword' class='form-control input-lg' placeholder='Current Password' tabindex='5'>
  </div>
    <hr class='colorgraph'><div class='col-xs-12 col-md-6'><a onclick='update();' class='btn btn-success btn-block btn-lg'>Save</a></div>
    <div class='row'>
      <div class='col-xs-12 col-md-6'></div>
      <div class='col-xs-12 col-md-6'><a  class='btn btn-success btn-block btn-lg'>Delete account</a></div>
    </div>";
}else if($role=="worker"){

    $email=$_SESSION['loginemail'];
    $sql = "SELECT * FROM worker WHERE email='$email'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    echo " <h2 class='heading'>Edit profile.<small></small></h2>
    <hr class='colorgraph'>
 
        <div class='form-group'>
                      <input type='text' name='first_name' id='first_name' class='form-control input-lg' value='".$row['name']."' placeholder='Name' tabindex='1'>
        </div>

    <div class='form-group'>
      <input type='email' name='email' id='email' class='form-control input-lg' value='".$row['email']."' placeholder='Email Address' tabindex='4' readonly>
    </div>            
    <div class='form-group'>
      <input type='tel' name='number' id='number' class='form-control input-lg' value='".$row['mobile']."' placeholder='Phone number' tabindex=''>
    </div><hr class='colorgraph'>
<span>Only if you want to change password</span>
    <div class='row'>



      <div class='col-xs-12 col-sm-6 col-md-6'>
        <div class='form-group'>
          <input type='password' name='password' id='password' class='form-control input-lg' placeholder='New Password' tabindex='5'>
        </div>
      </div>
      <div class='col-xs-12 col-sm-6 col-md-6'>
        <div class='form-group'>
          <input type='password' name='password_confirmation' id='password_confirmation' class='form-control input-lg' placeholder='Confirm Password' tabindex='6'>
        </div>
      </div>
    </div><hr class='colorgraph'>
    <div class='form-group'>
  <input type='password' name='password' id='oldpassword' class='form-control input-lg' placeholder='Current Password' tabindex='5'>
</div>
    <hr class='colorgraph'><div class='col-xs-12 col-md-6'><a onclick='update();' class='btn btn-success btn-block btn-lg'>Save</a></div>
    <div class='row'>
      <div class='col-xs-12 col-md-6'></div>
      
      <div class='col-xs-12 col-md-6'><a  class='btn btn-success btn-block btn-lg'>Delete account</a></div>
    </div>";
}



?>