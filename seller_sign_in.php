<?php

include ('connection.php');

echo'
<html>
<head>
  <title>seller Sign in</title>
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
</style></head>
<body>
<h2 style="margin-left:500px">Seller Sign In</h2>
  <div class="container" style="width:30%;margin-top:250px;">
        <form method="post">
            <div class="form-group">
                  <label for="email style="font-size:18px;">Email:</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required="true">
            </div>
                
             <div class="form-group">
                  <label for="pass" style="font-size:18px;">Password:</label>
                  <input type="password" class="form-control" id="pass" name="pass" placeholder="Enter Password" required="true">
            </div> 
                 
            <button type="submit" style="background:#0099EE" class="btn btn-primary" name="sign_in">Sign in</button>
            <button type="submit" style="background:#0099EE" class="btn btn-primary" name="register">
                  <a href="seller_sign_up.php" style="color:#fff;text-decoration:none">Register</a>
            </button>
        </form>
  </div>


</body>
</html>';

if(isset($_POST['sign_in'])){


    $email_id=$_POST['email'];
    $pass=$_POST['pass'];
    /*echo '<script language="javascript">';
    echo 'alert("'.$email_id.'")';
    echo '</script>';*/
    $query="select * from seller_login where email_id='$email_id' and password='$pass'";
    $res=mysqli_query($conn,$query);
      if(mysqli_num_rows($res)>0){

        $row=mysqli_fetch_assoc($res);
        $sid=$row['seller_id'];
        echo '<script language="javascript">';
        echo 'alert("sign in success")';
        echo '</script>';
        session_start();
        $_SESSION['seller_id']=$row['seller_id'];
        $_SESSION['pass']=$row['password'];

        $b="Location:seller_page.php?sid=".$sid;
        header($b);

      }
}

?>

