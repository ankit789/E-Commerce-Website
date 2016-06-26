<?php
require 'connection.php';
require 'head.php';
//session_start();
//$user_type = $_SESSION['user_type'];
$user_type = "Customer";
$user = "customer_name";
//echo "Hello $user_type: ".$user."<br/>";

if(loggedin($user)){
	echo "Hello $user_type: ".$_SESSION[$user]."<br/>";
	echo'<br><div style="float:"right"><a href="logout.php">Log Out.</a></div>';
}else{
	echo'<br><div style="float:"right"><a href="customer_sign_in.php">Sign In.</a></div>'."<br>";
	echo'<br><div style="float:"right"><a href="customer_sign_up.php">Register.</a></div>';
}

?>