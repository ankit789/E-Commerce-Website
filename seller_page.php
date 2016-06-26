<!DOCTYPE Html>

<html lang="en">
<head>
  <title>Nav-Tabs</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" >
	<div class="row">
		
<?php
include('connection.php');
include('head.php');
if(loggedin('seller_id')){
$sid=$_SESSION['seller_id'];

$query="select * from seller_login where seller_id='$sid'";
$res=mysqli_query($conn,$query);
if(mysqli_num_rows($res)>0){
	
	$row=mysqli_fetch_array($res);
	$seller_name=$row['seller_name'];
	$email_id=$row['email_id'];
	$contact_no=$row['contact_no'];
	echo '<h1>'.$seller_name.'</h1>';
	echo '
		<div class="" style="float: right"><button ><a href="seller_logout.php">Log Out</a></button></div>
	';
	echo '
	<p>'.$email_id.'</p>
	<p>'.$contact_no.'</p>';
echo'<ul class="list-group">   

			<div class="row">
			<div class="col-md-4" style="float:left;">
			<li class="list-group-item">product id</li>
			</div>
			<div class="col-md-4" style="float:left;">
			<li class="list-group-item">product name</li>
			</div>
			<div class="col-md-4" style="float:left;">
			<li class="list-group-item">product price</li></div>';
	$query1="select * from product where seller_id='$sid'";
	$res1=mysqli_query($conn,$query1);

	if(mysqli_num_rows($res1)>0){
			

		while($row1=mysqli_fetch_array($res1)){
			$product_name=$row1['product_name'];
			$product_id=$row1['product_id'];
			$price=$row1['price'];
			echo '<div class="col-md-4" style="float:left;">
			<li class="list-group-item">'.$product_id.'</li></div>
			<div class="col-md-4" style="float:left;"><li class="list-group-item">'.$product_name.'</li></div>
			<div class="col-md-4" style="float:left"><li class="list-group-item">'.$price.'</li></div>';


		}
		echo'
		</div>
		
		</ul>';
	}



	}

?>

<div class="container" style="float:left">
<h2>Add</h2>
<div class="panel panel-primary">
    <div class="panel-heading">Request Add</div>
    <div class="panel-body">

    	<button type="submit" class="btn btn-default" name="add" id="add" style="width:100%;" onClick=" return difflocation()">Add Item</button>

    </div>
  </div>
  <h2>Modify</h2>
<div class="panel panel-primary">
    <div class="panel-heading">Request modify</div>
    <div class="panel-body">
    <div class="row">
    
<form class="form-inline" role="form" method="post">
<div class="col-md-4">
  <div class="form-group">
  <label for="product_id">Product_id:</label>
  <input type="text" class="form-control" id="pid" name="pid">
  </div>
  </div>
   <div class="col-md-4">
   <div class="form-group">
  <label for="usr">Product Name:</label>
  <input type="text" class="form-control" id="usr" name="usr">
  </div>
  </div>
  <div class="col-md-4">
  <div class="form-group">
  <label for="price">Price:</label>
  <input type="text" class="form-control" id="price" name="price">
  </div>
  </div>
  

    	<button type="submit" class="btn btn-default" name="modify" id="modify" style="width:100%;">Modify Item</button>
</form>
</div>
    </div></div>
 
    <h2>Delete</h2>
<div class="panel panel-primary">
    <div class="panel-heading">Request delete</div>
    <div class="panel-body">
    <div class="row">
    
<form class="form-inline" role="form" method="post">
<div class="col-md-6">
  <div class="form-group">
  <label for="product_id">Product_id:</label>
  <input type="text" class="form-control" id="pid" name="pid"style="width:50%;">
  </div>
  </div>
   <div class="col-md-6">
   <div class="form-group">
  <label for="usr">Product Name:</label>
  <input type="text" class="form-control" id="usr" name="usr"style="width:50%;">
  </div>
  </div>
  
  

    	<button type="submit" class="btn btn-default" name="delete" id="delete" style="width:100%;">delete Item</button>
</form>
    </div></div>
  </div>
  </div>

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




if(isset($_POST['modify'])){
	
$usr=$_POST['usr'];
$price=$_POST['price'];
$pid=$_POST['pid'];
$request_type="modify";
if(is_numeric($pid))
{
	if(is_numeric($price))
	{
		$query="select *from product where seller_id='$sid' and product_name='$usr' and product_id='$pid'";
		$res=mysqli_query($conn,$query);
		if(mysqli_num_rows($res)>0){
			$rows=mysqli_fetch_array($res);
			$cat_id=$rows['cat_id'];
			$sub_cat_id=$rows['sub_cat_id'];
			$query="insert into request_table values('$request_type','$pid','$price','$usr',$cat_id,$sub_cat_id,'$sid')";
			mysqli_query($conn,$query);

		}
		else{

			echo '<script language="javascript">';
			echo 'alert("product not listed ")';
			echo '</script>';
		}
	}
	else{
		echo '<script language="javascript">';
echo 'alert("please enter a numeric value for price")';
echo '</script>';
	}


}
else{


	echo '<script language="javascript">';
echo 'alert("please enter a numeric value for product_id")';
echo '</script>';
}
}



if(isset($_POST['delete'])){
	
$usr=$_POST['usr'];
$pid=$_POST['pid'];
$request_type="delete";
if(is_numeric($pid))
{
	
	
		$query="select *from product where seller_id='$sid' and product_name='$usr' and product_id='$pid'";
		$res=mysqli_query($conn,$query);
		
		if(mysqli_num_rows($res)>0){
			
		$rows=mysqli_fetch_array($res);
			$cat_id=$rows['cat_id'];
			$sub_cat_id=$rows['sub_cat_id'];
			$query="insert into request_table values('$request_type','$pid',1,'$usr',$cat_id,$sub_cat_id,'$sid')";
			mysqli_query($conn,$query);

		}
		else{

			echo '<script language="javascript">';
		echo 'alert("product not listed ")';
		echo '</script>';
		}
	


}
else{


	echo '<script language="javascript">';
	echo 'alert("please enter a numeric value for product_id")';
	echo '</script>';
}

}
}

?>	



<script>

	function difflocation(){

		var v1=<?php echo $sid?>;
		window.location.href="request_table_add.php";


	}


</script>

</body>
</html>