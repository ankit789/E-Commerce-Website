<?php

include ('connection.php');
echo'
<html>
<head>
  <title>seller Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap-3.3.5/dist/css/sign_in.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style>
body{
background-image:url("images/woood.jpg");
background-size:1366px 768px;
background-repeat:no-repeat;
}
</style>
</head>

<body>
<h2 style="margin-left:500px">Seller Sign Up Form</h2>
    <div class="container-fluid">
      <form style="width:400px;margin-left:450px;margin-top:100px" method="post">
         <div class="form-group" >
              <label for="name" style="font-size:18px;">Seller Name:</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter seller Name" required="true">
         </div>
            
      <div class="form-group">
            <label for="email" style="font-size:18px;">Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required="true">
      </div>
      
      <div class="form-group">
            <label for="pass" style="font-size:18px;">Contact Number:</label>
            <input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Enter Contact Number" required="true">
      </div> 
      
      <div class="form-group">
            <label for="pass" style="font-size:18px;">Password:</label>
            <input type="password" class="form-control" id="pass" name="pass" placeholder="Enter Password" required="true">
      </div> 
          
      <div class="form-group">
          <label for="cpass" style="font-size:18px;">Confrim Password:</label>
          <input type="password" class="form-control" id="cpass" name="cpass" placeholder="Re-enter Password" required="true">
      </div>
      
      <div class="row">
        
        <div class="col-md-4">
          <div class="form-group">
            <label for="pass" style="font-size:18px;">State:</label>
            <input type="text" class="form-control" id="state" name="state" placeholder="Enter State" required="true">
          </div>
        </div> 
        
        <div class="col-md-4">
          <div class="form-group">
            <label for="pass" style="font-size:18px;">City:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Enter city" required="true">
          </div>
        </div> 
        
        <div class="col-md-4">
          <div class="form-group">
            <label for="pass" style="font-size:18px;">Zipcode:</label>
            <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Enter Zipcode" required="true">
          </div> 
        </div>
      </div>
      
       <button type="submit" style="background:#0099EE" class="btn btn-primary" name="register">Register</button>
          
    </div>
    </form>


</body>
</html>';

if(isset($_POST['register'])){
$name= $_POST['name'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$cpass=$_POST['cpass'];
$state=$_POST['state'];
$city=$_POST['city'];
$zipcode=$_POST['zipcode'];
$contact_no=$_POST['contact_no'];
if($pass==$cpass){
   $query="select * from seller_login where email_id = '$email'";
   $res=mysqli_query($conn,$query);
   
   if(mysqli_num_rows($res)==0){
     mysqli_query($conn,"INSERT INTO seller_login(seller_name,email_id,contact_no,password,state,city,zipcode) VALUES('$name','$email',$contact_no,'$pass','$state','$city',$zipcode)");
    	$err = 'Registered Successfully';
       # render($err);
      $b="Location:seller_sign_in.php";  
      header($b);
   }
   else{
        $err="email is already present.";
        echo '<script language="javascript">';
        echo 'alert("email is already present")';
        echo '</script>';
       # render($err);
   }

}
else{
	    echo '<script language="javascript">';
      echo 'alert("meismatched password")';
      echo '</script>';
    	$err="mismatched passwords";
    	#render($err);
}
}

?>