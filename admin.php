

<?php
//session_start();
require 'connection.php';
require 'head.php';
require 'test.php'
?>

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="req.js"></script>
</head>
<!--
<script>
function myAjax() {
      $.ajax({
           type: "POST",
           url: 'admin.php',
           data:{action:'call_this'},
           success:function(html) {
             alert(html);
           }

      });
 }
</script>
-->

<?php
//session_start();
//$user_type = $_SESSION['user_type'];
$user_type = "Admin";
if(isset($_SESSION['admin']))
	$user = $_SESSION['admin'];
else $user = null;
//echo "Hello $user_type: ".$user."<br/>";

if(loggedin($user)){
	echo "Hello $user_type: ".$_SESSION[$user]."<br/>";
	echo'<br><div style="float:"right"><a href="admin_logout.php">Log Out.</a></div>';
}else{
	echo'<br><div style="float:"right"><a href="admin_login.php">Sign In.</a></div>'."<br>";
	die();
	//echo'<br><div style="float:"right"><a href="sign_up.php">Register.</a></div>';
}

$query = "select * from request_table";
$res = mysqli_query($conn,$query);


//$_POST['request']=="processed";
?>

<table>

<?php

$clicked = 0;
if(mysqli_num_rows($res)>0){
	?>

	<tr>
		<th>Product Name</th>
		<th>Product id</th>
		<th>Seller name</th>
		<th>Seller Id</th>
		<th>Request Type</th>
	</tr>

	<?php

	for($i=0;$i<mysqli_num_rows($res);$i++){
		for($j=0;$j<8;$j++)
		$res_array[$i][$j] = null;
		$req_index[$i] = null;
	}
	$curr_rows = mysqli_num_rows($res);
	$i=0;
	while($row = mysqli_fetch_assoc($res)){

	//$row=mysqli_fetch_array($res);
	$query_type=$row['request_type'];
	$cat_id = $row['cat_id'];
	$sub_cat_id = $row['sub_cat_id'];
	$product_name = $row['product_name'];
	$seller_id = $row['seller_id'];
	$price = $row['price'];
	$product_id = $row['product_id'];

	$q_seller = "select seller_name from seller_login where seller_id = $seller_id";
	$q_seller_res = mysqli_query($conn,$q_seller);

	if(mysqli_num_rows($q_seller_res)>0){
		$sell_arr  = mysqli_fetch_array($q_seller_res);
		$seller_name = $sell_arr['seller_name'];
	}

	//echo $seller_name.'<br>';

	$req_index[$i] = $product_name;

	$res_array[$i][0]=$query_type;
	//echo '<br>';
	$res_array[$i][1]=$cat_id;
	//echo '<br>';
	$res_array[$i][2]=$sub_cat_id;
	$res_array[$i][3]=$product_name;
	$res_array[$i][4]=$seller_id;
	$res_array[$i][5]=$price;
	$res_array[$i][6]=$product_id;
	$res_array[$i][7]=$seller_name;
	//echo '<br>';
	//echo $res_array[$i][3].'<br>';
	//echo '<h2>'.$query_type.'</h2>';
	//echo $cat_id.' ';
	//echo $sub_cat_id;

	?>

	<tr>
		<td><?php echo $product_name;?></td>
		<td><?php echo $product_id;?></td>
		<td><?php echo $seller_name;?></td>
		<td><?php echo $seller_id;?></td>
		<td><?php echo $query_type;?></td>
		<!--
		<td><input type="submit" class="button" name="request" value="<?php echo $query_type ?>"></td>
		-->
		
		<td>
			<form method="post" action="admin.php">
				<label><b><?php echo ($query_type).':' ?></b></label>
				<input type="submit" value="<?php  echo $query_type; echo '--'.$product_name; ?> " name="request" >
				<label><b>Ignore:</b></label>
				<input type="submit" value="<?php echo $query_type.'--'.$product_name?>" name="ignore">
			</form>	
		</td>
		
		<!--
		<td><input type="button" value="<?php echo $query_type ?>" onclick="res_query(<?php echo $query_type ?>)" class="request" id="<?php echo 
					'request_'.$query_type; ?>" name="<?php  echo $query_type?>"></td>
		-->
	
	</tr>




<?php 
	$i++;
}
}

?>
</table>




<!--
<script>
function myfun(){
	alert 'Clicked!';
}
</script>
-->

<?php
	if(isset($_POST['request'])){
		$str = $_POST['request'];
		$curr_ind ;
		list($q_type,$p_name1) = explode('--',$str);

		//echo $q_type.'<br>'.$p_name.'<br>';
		$p_name = rtrim($p_name1);
		$query_type = $q_type;
		/*
		for($i=0;$i<strlen($p_name);$i++){
			echo $p_name[$i].'-';
		}
		echo '<br>';
		
		for($i=0;$i<mysqli_num_rows($res);$i++){
			for($j=0;$j<8;$j++)
				echo $res_array[$i][$j].' -- ';
				echo '<br>';			
		}
		
		echo '<br>';
		*/
		for($i=0;$i<$curr_rows;$i++){
			
			//echo $res_array[$i][3].' '.$p_name.'<br>';
			//echo strlen($res_array[$i][3]).' '.strlen($p_name).'<br>';
			if(strcmp($res_array[$i][0], $q_type)==0  && strcmp($res_array[$i][3],$p_name)==0 ){
				//echo 'Curr Index: '.$i.'<br>';
				break;
			}
		}
		

		//echo $res_array[$i][0].' '.$res_array[$i][3].'<br>';
		//echo 'Curr Index: '.$i.'<br>';
		
		$c_id = $res_array[$i][1];
		$sc_id = $res_array[$i][2];
		$sell_id = $res_array[$i][4];
		$prc = $res_array[$i][5];
		$prd_id = $res_array[$i][6];
		$sell_name = $res_array[$i][7];


		echo '<script type='.'text/javascript'.'>alert(\''.$p_name.' --> '.$q_type.' --> '.$prd_id.'\');</script>';
		if($query_type=="add"){
			echo '<script type="text/javascript">alert(\'Inside Add.\');</script>';
			$q1_search = "select * from product where product_name='$p_name' && seller_id='$sell_id'";
			$q1_search_res = mysqli_query($conn,$q1_search);
			if(mysqli_num_rows($q1_search_res)==0){
			
				//echo '<script type="text/javascript">alert(\'Yes u can add.\');</script>';
				$q1 = "insert into product (cat_id,sub_cat_id,seller_id,price,product_name) values('$c_id','$sc_id','$sell_id','$prc','$p_name')";
				//$q1 = "insert into product (cat_id,sub_cat_id,seller_id,price,product_name) values(1,1,1,14165,'htc desire')";
				//mysqli_query($conn,$q1);
				if(mysqli_query($conn,$q1)){
					echo '<script type="text/javascript">alert(\'Added Successfully.\');</script>';
				}
				else{
					echo mysql_error();
				}
				
				$q5 = "select product_id from product where cat_id = '$c_id' and sub_cat_id='$sc_id' and seller_id = '$sell_id' and product_name = '$p_name'";
				$q5_res = mysqli_query($conn,$q5);

				if(mysqli_num_rows($q5_res)>0){
					$q5_row = mysqli_fetch_array($q5_res);
					$prd_id = $q5_row['product_id'];
				}

				//echo $prd_id.'<br>';			
				$size = sizeof($arr[$sc_id-1]);
				

				$q2 = "select * from sub_category where sub_cat_id = '$sc_id'";
				$q2_res = mysqli_query($conn,$q2);
				
				$q2_row = mysqli_fetch_array($q2_res);
				$rspecs_t = $q2_row['request_table_name'];



				$q3 = "select * from ".$rspecs_t." where sub_cat_id = '$sc_id' and seller_id = '$sell_id' && name = '$p_name'";
				//echo $q3.'<br>';
				$q3_res = mysqli_query($conn,$q3);

				if(mysqli_num_rows($q3_res)>0){
					
					$q3_row = mysqli_fetch_array($q3_res);

					$img = $q3_row['pimage'];

					$i=2;
					$final = "".$sc_id.",".$prd_id.",";
					while($i<$size){
						$final = $final."'".$q3_row[$arr[$sc_id-1][$i]]."'";
						$i++;
						if($i<$size)
							$final = $final.",";
					}
				}
				//$final = $final.';';
				//echo $final.'<br>';
				$specs_t = substr($rspecs_t,2,strlen($rspecs_t)-2);
				//echo 'here<br>';


				$q4 = "insert into $specs_t values ($final)";
				//echo $q4.'<br>';
				
				if(mysqli_query($conn,$q4)){
					echo '<script type="text/javascript">alert("Inserted Successfully");</script>';

					
					$q7 = "delete from ".$rspecs_t." where sub_cat_id = '$sc_id' and seller_id = '$sell_id' && name = '$p_name'";
					//echo $q7.'<br>';
					$q7_res = mysqli_query($conn,$q7);
					if(mysqli_query($conn,$q7)){
						echo '<script type="text/javascript">alert("Deleted from request specs table Successfully");</script>';
					}else{
						echo '<script type="text/javascript">alert("Couldn\'t delete");</script>';	
					}

				}
				else{
					echo '<script type="text/javascript">alert("Couldn\'t Insert into specs table.");</script>';	
				}
				
				$q6 = "update product set pimage = '$img' where product_id = '$prd_id'";
				//echo $q6;

				if(mysqli_query($conn,$q6)){
					//echo '<script type="text/javascript">alert("Inserted Successfully");</script>';
				}
				else{
					echo '<script type="text/javascript">alert("Couldn\'t insert Product Image");</script>';	
				}
				
				
				/*** UNCOMMENT THIS PORTION TO DELETE THE REQUEST TABLE ENTRIES *****************/
				
				$q8 = "delete from request_table where product_name='$p_name' && seller_id='$sell_id' && cat_id = '$c_id' && sub_cat_id='$sc_id'
						 && request_type='$q_type' ";
				mysqli_query($conn,$q8);
			}else{

				echo '<script type="text/javascript">alert('.'"Item alredy exists"'.');</script>';
				
				/*** UNCOMMENT THIS PORTION TO DELETE THE REQUEST TABLE ENTRIES *****************/
				
				$q2 = "delete from request_table where product_name='$p_name' && seller_id='$sell_id' && cat_id = '$c_id' && sub_cat_id='$sc_id'
						 && request_type='$q_type' ";
				mysqli_query($conn,$q2);

				$q3 = "select * from sub_category where sub_cat_id = '$sc_id'";
				$q3_res = mysqli_query($conn,$q3);
				
				$q3_row = mysqli_fetch_array($q3_res);
				$rspecs_t = $q3_row['request_table_name'];

				$q7 = "delete from ".$rspecs_t." where sub_cat_id = '$sc_id' and seller_id = '$sell_id' && name = '$p_name'";
				//echo $q7.'<br>';
				$q7_res = mysqli_query($conn,$q7);
				if(mysqli_query($conn,$q7)){
					echo '<script type="text/javascript">alert("Deleted from request specs table Successfully");</script>';
				}else{
					echo '<script type="text/javascript">alert("Couldn\'t delete");</script>';	
				}
				
			}

		}
		else if($query_type=="modify"){
			echo '<script type="text/javascript">alert(\'Inside Modify.\');</script>';
			//echo 'Product Id: '.$prd_id.'<br>';

			$q1_search = "select * from product where product_id = '$prd_id'";
			//echo '<br>';
			$q1_search_res = mysqli_query($conn,$q1_search);
			if(mysqli_num_rows($q1_search_res)==0){
				echo '<script type="text/javascript">alert(\'No such item exists.\');</script>';
			}else{
				//echo '<script type="text/javascript">alert(\'Yes u can modify.\');</script>';
				$q1 = "update product set price = '$prc' where product_id = '$prd_id'";
				if(mysqli_query($conn,$q1)){
					//echo '<script type="text/javascript">alert(\'Modified Successfully.\');</script>';
					echo '<script type='.'text/javascript'.'>alert('.'Modified Successfully.'.');</script>';
				}
				else{
					echo mysql_error();
				}
			$q2 = "delete from request_table where product_name='$p_name' && seller_id='$sell_id' && cat_id = '$c_id' && sub_cat_id='$sc_id'
						 && request_type='$q_type' ";
			mysqli_query($conn,$q2);
			}

		}
		else if($query_type=="delete"){
			echo '<script type="text/javascript">alert(\'Inside Delete.\');</script>';
			$q1_search = "select * from product where product_name='$p_name' && seller_id='$sell_id'";
			$q1_search_res = mysqli_query($conn,$q1_search);
			if(mysqli_num_rows($q1_search_res)==0){
				echo '<script type="text/javascript">alert(\'No such item exists.\');</script>';


			}
			else{
				//echo '<script type="text/javascript">alert(\'Yes u can delete.\');</script>';

				$q2 = "select * from product where product_id = '$prd_id'";
				$q2_res = mysqli_query($conn,$q2);

				if(mysqli_num_rows($q2_res)>0){
					$q2_row = mysqli_fetch_array($q2_res);
					$sc_id = $q2_row['sub_cat_id'];
					$sell_id = $q2_row['seller_id'];
				}

				$q3 = "select * from sub_category where sub_cat_id = '$sc_id'";
				$q3_res = mysqli_query($conn,$q3);

				if(mysqli_num_rows($q3_res)>0){
					$q3_row = mysqli_fetch_array($q3_res);
					$rspecs_t = $q3_row['request_table_name'];
					//echo $rspecs_t.'<br>';
				}

				$specs_t = substr($rspecs_t,2,strlen($rspecs_t)-2);

				$q4 = "delete from $specs_t where product_id = '$prd_id'";
				if(mysqli_query($conn,$q4)){
					echo '<script type="text/javascript">alert(\'Deleted From Product Specs Table Successfully.\');</script>';
				}
				else{
					echo mysql_error();
				}

				$q6 = "delete from product where product_id = '$prd_id'";
				if(mysqli_query($conn,$q6)){
					echo '<script type="text/javascript">alert(\'Deleted From Product Table Successfully.\');</script>';
				}
				else{
					echo mysql_error();
				}


			}
			$q5 = "delete from request_table where product_name='$p_name' && seller_id='$sell_id' && cat_id = '$c_id' && sub_cat_id='$sc_id'
					 && request_type='$q_type' ";
			if(mysqli_query($conn,$q5)){
				echo '<script type="text/javascript">alert(\'Deleted From Request Table Successfully.\');</script>';
			}
			else{
				echo mysql_error();
			}

		}
		unset($_POST['request']);
		//$clicked=0;
	}

	else if(isset($_POST['ignore'])){
		$str = $_POST['ignore'];
		$curr_ind ;
		list($q_type,$p_name1) = explode('--',$str);

		//echo $q_type.'<br>'.$p_name.'<br>';
		$p_name = rtrim($p_name1);
		//echo $status.' '.$q_type.' '.$p_name.'<br>';
		for($i=0;$i<$curr_rows;$i++){
			
			//echo strlen($res_array[$i][0]).' '.strlen($q_type).'<br>';
			//echo strlen($res_array[$i][3]).' '.strlen($p_name).'<br>';
			if(strcmp($res_array[$i][0], $q_type)==0  && strcmp($res_array[$i][3],$p_name)==0 ){
				//echo 'Curr Index: '.$i.'<br>';
				break;
			}
		}

		//echo $res_array[$i][0].' '.$res_array[$i][3].'<br>';
		//echo 'Curr Index: '.$i.'<br>';
		$c_id = $res_array[$i][1];
		$sc_id = $res_array[$i][2];
		$sell_id = $res_array[$i][4];
		$prc = $res_array[$i][5];
		$prd_id = $res_array[$i][6];
		$sell_name = $res_array[$i][7];

		$size = sizeof($arr[$sc_id]);
			

		$q2 = "select * from sub_category where sub_cat_id = '$sc_id'";
		$q2_res = mysqli_query($conn,$q2);
		
		$q2_row = mysqli_fetch_array($q2_res);
		$rspecs_t = $q2_row['request_table_name'];		

		$q9 = "delete from $rspecs_t where sub_cat_id = '$sc_id' and seller_id = '$sell_id'";
		$q9_res = mysqli_query($conn,$q9);

		$q10 = "delete from request_table where request_type = '$q_type' and cat_id = '$c_id' and sub_cat_id = '$sc_id' and seller_id = '$sell_id'";
		$q10_res = mysqli_query($conn,$q10);

		unset($_POST['ignore']);
	} 
	//header("Location: admin.php");
?>
