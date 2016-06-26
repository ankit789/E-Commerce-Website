<?php
require 'connection.php';

echo'
<html>
<head>
  <title>customer Sign in</title>
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

<h2 Style="margin-left:500px">Customer Login Form</h2>

<!--<form method="post" action="">
	<table id="login_table">

	<tr><td><label>Username/User Id:</label></td>
		<td><input type="text" name="username" maxlength="25" autocomplete=""></td></tr>
    <tr><td><label>Password:</label></td>
    	<td><input type="password" name="password" maxlength="25" min="8"></td></tr>
    <tr><td><input type="submit" value="Log In.." name="submit"></td></tr>
    </table>
</form>
-->

<div class="container" style="width:30%;margin-top:250px;">
        <form method="post">
            <div class="form-group">
                  <label for="username" style="font-size:18px;">UserName:</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required="true">
            </div>
                
             <div class="form-group">
                  <label for="pass" style="font-size:18px;">Password:</label>
                  <input type="password" class="form-control" id="pass" name="password" placeholder="Enter Password" required="true">
            </div> 
                 
            <button type="submit" style="background:#0099EE" class="btn btn-primary" name="submit">Sign in</button>

       </form>
</div>

';
if(isset($_POST['submit'])&&isset($_POST['username']) && isset($_POST['password'])){
	if(!empty($_POST['username'])&&!empty($_POST['password'])){
		//echo 'Ok.';
		$un = $_POST['username'];
		//echo '<br>';
		$pw = $_POST['password'];
		//echo '<br>';
		
//		$tp1 = document.getElementById("customer");
		//echo $tp."<br/>";
		//$pw_hash = md5($pw);
		//$pw_hash = $pw;
		
		$query = "select * from customer_login where email_id='".mysqli_real_escape_string($conn,$un)."' and password='".mysqli_real_escape_string($conn,$pw)."'";
		if($query_run = mysqli_query($conn,$query)){
			$no_res = mysqli_num_rows($query_run);
			if($no_res==0){
				echo '<script type="text/javascript">
						alert(\'Invalid Username Or Password\');
						</script>';
				//echo 'Invalid Username/Password Cobination<br>';
			}else if($no_res>0){
				$res_row = mysqli_fetch_assoc($query_run);
				$cus_name = $res_row['customer_name'];
				$cus_id = $res_row['customer_id'];
				echo $cus_name."<br/>";
				session_start();
				//$_SESSION['user_type'] = "Customer";
				$_SESSION['customer_name'] = $cus_name;
				$_SESSION['customer_id'] = $cus_id;
				$ref = $_SERVER['HTTP_REFERER'];
				//$str = 'Location: '.$ref.'';
				header('Location: home1.php');
			}
			
		}else{
			echo mysqli_error($conn);
		}
	}
	else{
		echo '<script type="text/javascript">alert(\'Please Fill Out All Fields.\');</script>';
	}
}

?>