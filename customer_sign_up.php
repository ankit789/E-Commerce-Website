<?php
require 'connection.php';
require 'head.php';

echo'
<html>
<head>
  <title>customer Sign Up</title>
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

<h2 Style="margin-left:500px">Customer Sign Up Form.</h2>


 <div class="container-fluid">
      <form style="width:400px;margin-left:450px;margin-top:10px" method="post">
         <div class="form-group" >
              <label for="name" style="font-size:18px;">Customer Name:</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter customer Name" required="true">
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
     	
	      <div class="form-group">
	          <label for="cpass" style="font-size:18px;">Address:</label>
	          <input type="text" class="form-control" id="cpass" name="addr" placeholder="Address" required="true">
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
	    </div>
';
//echo '<script type="text/javascript">alert("outside")</script>';
if(isset($_POST['register'])){
	$name= $_POST['name'];
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$cpass=$_POST['cpass'];
	$addr=$_POST['addr'];
	$state=$_POST['state'];
	$city=$_POST['city'];
	$zipcode=$_POST['zipcode'];
	$contact_no=$_POST['contact_no'];
//    echo '<script type="text/javascript">alert("outside")</script>';
  
if($pass==$cpass){
   $query="select * from customer_login where email_id = '$email'";
   $res=mysqli_query($conn,$query);
     
   if(mysqli_num_rows($res)==0){
     $q2 = "INSERT INTO customer_login(customer_name,email_id,contact_no,password,addr,city,state,zipcode) VALUES('$name','$email',$contact_no,'$pass','$addr','$city','$state',$zipcode)";
    //echo '<script type="text/javascript">alert($q2)</script>';
    mysqli_query($conn,$q2);
    $err = 'Registered Successfully';
       # render($err);
    $b="Location:customer_sign_in.php";  
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

/*
@session_start();
if(!isset($_SESSION['captcha'])){
	$text = random();
	$_SESSION['captcha']= $text;
}else{
	if(isset($_POST['refresh'])){
		//echo 'Refresh!';
		$text = random();
		$_SESSION['captcha']= $text;
	}	
}

if(isset($_POST['register'])){
	$fn = $_POST['fname'];
	$ln = $_POST['lname'];
	$uid = $_POST['userid'];
	$dob = $_POST['dob'];
	$email = $_POST['emailid'];
	$pw = $_POST['password'];
	$pw_c = $_POST['confpass'];
	$pw_hash = md5($pw);
	
	if(!empty($fn)&&!empty($ln)&&!empty($dob)&&!empty($email)&&!empty($pw)&&!empty($pw_c)&&!empty($uid) &&!empty($_POST['captcha'])){
			if($_SESSION['captcha']==$_POST['captcha']){
				//echo 'Correct!';
				if($pw==$pw_c){
					//echo 'Thanks! '.$fn.' '.$ln.' You Has Been Registered.<br>';
					$query = "insert into details values('".$fn."','".$ln."','".$uid."','".$dob."','".$email."','".$pw_hash."')";
					if($query_run=mysql_query($query)){
					//echo 'Data Has Been Inserted!';
					echo '<script type="text/javascript">alert("Thanks! You are Registerd! Go to Login Page to Login into Your Account.");</script>';
					$text = random();
					$_SESSION['captcha']= $text;
		
					}else{
						$sql_err =  mysql_error();
						if($sql_err=="Duplicate entry '$uid' for key 'userid'")	{
							//echo 'User Id: ".$uid." Alredy Exits. Please Try Something Else.';
							echo '<script type="text/javascript">alert("User Id: '.$uid.' Alredy Exits. Please Try Something Else.");</script>';
							$text = random();
							$_SESSION['captcha']= $text;
						}
						else{
							//echo mysql_error();
							echo '<script type="text/javascript">alert("Sorry! Unable to register you at this time. Try again Later.");</script>';
							$text = random();
							$_SESSION['captcha']= $text;
						}
					}
				}
				else{
					//echo 'Passwords Do not Match! Please enter Correctly.';
					echo '<script type="text/javascript">alert(\'Passwords Do not Match! Please enter Correctly.\');</script>';
					}
			//echo '<br'.$fn.'<br'.$ln.'<br'.$dob.'<br'.$pw.'<br'.$pw_c;
			}
			else{
				echo '<script type="text/javascript">alert(\'Incorrect Captcha.\');</script>';
				$text = random();
				$_SESSION['captcha']= $text;
			}
		}
			
	else{
		if(empty($_POST['captcha'])){
		echo '<script type="text/javascript">alert(\'Please Enter Captcha.\');</script>';
		$text = random();
		$_SESSION['captcha']= $text;
		}
		//echo 'Please Fill Out All Fields!';
		else{
			echo '<script type="text/javascript">alert(\'Please Fill Out All Fields.\');</script>';
			$text = random();
			$_SESSION['captcha']= $text;
		}
		
	}
}else{
	
}

function random(){
	$num = rand(1000,9999);
	$nm = md5($num);
	$text = substr($nm,0,5);
	return $text;
}
*/
?>

