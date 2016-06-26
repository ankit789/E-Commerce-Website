<!DOCTYPE Html>

<html lang="en">
<head>
  <title>Nav-Tabs</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="bootstrap-3.3.5/dist/css/home.css">
  <link rel="stylesheet" type="text/css" href="bootstrap-3.3.5/dist/css/style_common.css">
  <link rel="stylesheet" type="text/css" href="bootstrap-3.3.5/dist/css/style1.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" >
	<div class="row">
<?php
include('head.php');
include('connection.php');

if(loggedin('seller_id')){
$sid=$_SESSION['seller_id'];
$query="select * from seller_login where seller_id='$sid'";
$res=mysqli_query($conn,$query);
if(mysqli_num_rows($res)>0){
	
	$row=mysqli_fetch_array($res);
	$seller_name=$row['seller_name'];
	$email_id=$row['email_id'];
	$contact_no=$row['contact_no'];
	echo '<h1>'.$seller_name.'</h1>
	<p>'.$email_id.'</p>
	<p>'.$contact_no.'</p>';
	if(isset($_GET['cat_id'])){
			$cat_id=$_GET['cat_id'];
			echo'<ul class="list-group">   

			<div class="row">
			<div class="col-md-6" style="float:left;">
			<li class="list-group-item">sub category id</li>
			</div>
			<div class="col-md-5" style="float:left;">
			<li class="list-group-item">sub category name</li>
			</div>';
	$query1="select * from sub_category where cat_id='$cat_id'";
	$res1=mysqli_query($conn,$query1);

	if(mysqli_num_rows($res1)>0){
			

		while($row1=mysqli_fetch_array($res1)){
			$sub_category_name=$row1['sub_category_name'];
			$sub_category_id=$row1['sub_cat_id'];
			echo '<div class="col-md-6" style="float:left;">
			<li class="list-group-item">'.$sub_category_id.'</li></div>
			<div class="col-md-5" style="float:left;"><li class="list-group-item">'.$sub_category_name.'</li></div>
			<div style="float:left"><input type="checkbox" id="'.$sub_category_id.'" onClick="difflocation(this)"></div>';


		}
		echo'
		</div>
		
		</ul>';
	}








	}
	


	}

?>



<?php
/*if(isset($_POST['add'])){
	
$usr=$_POST['usr'];
$price=$_POST['price'];
$ca_name=$_POST['cat'];
$sub_ca_name=$_POST['sub_cat'];
$request_type="add";
echo '<script language="javascript">';
echo 'alert("email is already present'.$ca_name.'")';
echo '</script>';

$query1="select * from sub_category where sub_category_name='$sub_ca_name'";
$query="select *from category where category_name='$ca_name'";
		$res=mysqli_query($conn,$query);


$res1=mysqli_query($conn,$query1);
if(mysqli_num_rows($res)>0){
	echo '<script language="javascript">';
echo 'alert("product yuhoo listed ")';
echo '</script>';
	if(mysqli_num_rows($res1)>0){
	$row=mysqli_fetch_array($res);
	$row1=mysqli_fetch_array($res1);
	$cat=$row['cat_id'];
	$sub_cat=$row1['sub_cat_id'];
	if(is_numeric($price))
	{
		$query="select * from product where seller_id='$sid' and product_name='$usr'";
		$res=mysqli_query($conn,$query);
		if(mysqli_num_rows($res)==0){
			 echo '<script language="javascript">';
echo 'alert("email is already present")';
echo '</script>';
			$query="insert into request_table values('$request_type',1,'$price','$usr','$cat','$sub_cat','$sid')";
			mysqli_query($conn,$query);

		}
		else{

			echo '<script language="javascript">';
echo 'alert("product already listed ")';
echo '</script>';
		}
	}
	else{
		echo '<script language="javascript">';
echo 'alert("please enter a numeric value for price")';
echo '</script>';
	}


}
}
else{


	echo '<script language="javascript">';
echo 'alert("please enter a numeric value for category_id as well as sub_category_id")';
echo '</script>';
}







}*/




}

?>	



<script>

	function difflocation(xl){
		var s=$(xl).attr("id");
		var v1=<?php echo $sid?>;
		var v2=<?php echo $cat_id?>;
		window.location.href="product_specification.php?cat_id="+v2+"&sub_cat_id="+s;


	}



</script>

</body>
</html>