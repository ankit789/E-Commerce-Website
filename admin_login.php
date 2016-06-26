<h2>Admin Login Form</h2>
<form method="post" action="">
	<table id="login_table">

	<tr><td><label>Username/User Id:</label></td>
		<td><input type="text" name="username" maxlength="25" autocomplete=""></td></tr>
    <tr><td><label>Password:</label></td>
    	<td><input type="password" name="password" maxlength="25" min="8"></td></tr>
    <tr><td><input type="submit" value="Log In.." name="submit"></td></tr>
    </table>
</form>


<?php
require 'connection.php';

?>

<?php

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
		
		$query = "select * from admin_login where username='".mysqli_real_escape_string($conn,$un)."' and password='".mysqli_real_escape_string($conn,$pw)."'";
		if($query_run = mysqli_query($conn,$query)){
			$no_res = mysqli_num_rows($query_run);
			if($no_res==0){
				echo '<script type="text/javascript">
						alert(\'Invalid Username Or Password\');
						</script>';
				//echo 'Invalid Username/Password Cobination<br>';
			}else if($no_res>0){
				$res_row = mysqli_fetch_assoc($query_run);
				$admin = $res_row['username'];
				//$cus_id = $res_row['customer_id'];
				//echo $cus_name."<br/>";
				session_start();
				//$_SESSION['user_type'] = "Customer";
				$_SESSION['admin'] = $admin;
				header('Location: admin.php');
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