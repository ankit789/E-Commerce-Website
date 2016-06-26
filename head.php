<?php
ob_start();
session_start();
if(isset($_SERVER['HTTP_REFERER'])&&!empty($_SERVER['HTTP_REFERER'])){
	$ref = $_SERVER['HTTP_REFERER'];
}

function loggedin($type1){
	if(isset($_SESSION[$type1]) && !empty($_SESSION[$type1])){
		return true;	
	}else{
		return false;
	}
}
function getfield($field){
	if(isset($_SESSION['username'])&& !empty($_SESSION['username'])){
		$uid= $_SESSION['username'];	
		$query = "select $field from admin where username = '$uid'";
		if($query_run = mysql_query($query)){
			return mysql_result($query_run,0,$field);
		}else{
			echo mysql_error();	
		}
	}
}
?>