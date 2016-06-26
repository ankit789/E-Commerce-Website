<?php

include('connection.php');
include('test.php');
include('head.php');




echo'
<!DOCTYPE Html>

<html lang="en">
<head>
  <title>Nav-Tabs</title>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="bootstrap-3.3.5/dist/css/home.css">
  <link rel="stylesheet" type="text/css" href="bootstrap-3.3.5/dist/css/style_common_pro.css">
  <link rel="stylesheet" type="text/css" href="bootstrap-3.3.5/dist/css/style1_pro.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header col-md-3">
      <a class="navbar-brand" href="home1.php">ASA Services</a>
    </div>
 
      <div class="col-md-6">
        <form class="navbar-form" role="search" method = "post">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="q" id="search1">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit" name="submit" onClick="return search()"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
      </div>

      <div class="col-md-3">';
    $i=0;
    if(loggedin('customer_id')){
      $cusid=$_SESSION['customer_id'];
    $i=0;
    $query="select * from add_to_cart where customer_id=$cusid";
    $res=mysqli_query($conn,$query);
    while($row=mysqli_fetch_array($res)){
      $i=$i+1;
    }
}

    echo'
      <button type="button" class="btns btn-default" id="cart" name="cart" onClick="redirect()">Cart ('.$i.')</button>


      
    </div>

  </div>
</nav>

<nav class="navbar navbar-inverse">
    <div class="container">
      <ul class="nav navbar-nav">';
     
  $query="select * from category";
  $res=mysqli_query($conn,$query);
  while($row=mysqli_fetch_array($res)){


     echo'
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">'.$row['category_name'].' <span class="caret"></span></a>
        <ul class="dropdown-menu">
        ';
        $query="select sub_category_name from sub_category where cat_id =".$row['cat_id'];
        $res1=mysqli_query($conn,$query);
        while($row1=mysqli_fetch_array($res1)){

        echo'
          
            <li><a href="searchresult.php?search_name='.$row1['sub_category_name'].'">'.$row1['sub_category_name'].'</a></li>
            
            ';
          }

            echo'
          </ul>
        </li>';
     
      
        
       
     }



       echo'
       </ul>

      <ul class="nav navbar-nav navbar-right">
        ';

        if(loggedin('customer_id')){
          echo '
            <li><a><span class="glyphicon glyphicon-user"></span> Hi '.$_SESSION['customer_name'].'</a></li>
            <li><a href="customer_logout.php"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
          ';
        }
        else{
          echo '
          <li><a href="customer_sign_up.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
          <li><a href="customer_sign_in.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          ';
        }
        echo '
      </ul>
    </div>
  </div>
</nav>

';


/*if(isset($_POST['submit'])){


$search_data=$_POST['q'];
if (is_null($search_data)){
$b="Location:home.php";
    header($b);

}
$query1="select * from category where category_name like '%$search_data%'" ;
$res=mysqli_query($conn,$query1);
if(mysqli_num_rows($res)>0){
	 
	$row=mysqli_fetch_array($res);
	echo '<script language="javascript">';
    echo 'alert("send to another page")';
    echo '</script>';
    $cat_id=$row['cat_id'];
    $b="Location:searchresult.php?search_id=1&cat_id=".$cat_id;
    header($b);
}
else{
 $query2="select * from sub_category where sub_category_name like '%$search_data%'" ;
$res=mysqli_query($conn,$query2);
if(mysqli_num_rows($res)>0){
 	$row=mysqli_fetch_array($res);
 	echo 'alert("send to another page2")';
    echo '</script>';
    $sub_cat_id=$row['sub_cat_id'];
$b="Location:searchresult.php?search_id=2&sub_cat_id=".$sub_cat_id;
    header($b);

}
    else{
    		$query2="select * from product where product_name like '%$search_data%'" ;
$res=mysqli_query($conn,$query2);
if(mysqli_num_rows($res)>0){
 	$row=mysqli_fetch_array($res);
  $b="Location:searchresult.php?search_id=3&name=".$search_data;
    header($b);
 	echo '<script language="javascript">';
    echo 'alert("send to another page3")';
    echo '</script>';}

    }


}
}*/
?>


<?php
//****************** BODY OF THE HOME PAGE GOES HERE *************************////

if(isset($_GET['pid'])){

$product_id=$_GET['pid'];
$query="select * from product where product_id=$product_id";
$res=mysqli_query($conn,$query);
if(mysqli_num_rows($res)>0){

    $rows=mysqli_fetch_array($res);
    $product_name=$rows['product_name'];
    $pimage=$rows['pimage'];
    $price=$rows['price'];
    $seller_id=$rows['seller_id'];
    $sub_cat_id=$rows['sub_cat_id'];
   // $query1="select request_table_name from sub_category where sub_cat_id='$sub_cat_id'";
    $query1="select request_table_name from sub_category where sub_cat_id='$sub_cat_id'";
    $res1=mysqli_query($conn,$query1);


    $row1=mysqli_fetch_array($res1);
    $request_table_name=$row1['request_table_name'];
    $i=2;
    $request_table_name1="";
    while($i<strlen($request_table_name)){
      $request_table_name1=$request_table_name1.$request_table_name[$i];
      $i=$i+1;
    }

    $query2="select * from $request_table_name1 where product_id=$product_id";
    $res_request_specs=mysqli_query($conn,$query2);
    $row_res_request_specs=mysqli_fetch_array($res_request_specs);


    $seller_id=$rows['seller_id'];
    $query1="select * from seller_login where seller_id='$seller_id'";
    $res1=mysqli_query($conn,$query1);
    $row1=mysqli_fetch_array($res1);
    $seller_name=$row1['seller_name'];
    
    $qr3 = "select * from product_rating where product_id = $product_id";
    $qr3_res  = mysqli_query($conn,$qr3);
    if(mysqli_num_rows($qr3_res)==0){
        $msg = "Not rated yet!";
    }
    else{
        $qr3_row = mysqli_fetch_array($qr3_res);
        $r = $qr3_row['rating'];
        //$count = $qr3_row[]
        $msg = $r.'/10';
    }
    

    echo'
      <div class="container" style="margin-top:10px">
      
      <div class="row">

      <div class="col-md-4" style="float:left;">
      <a href="#"  class="thumbnail" style="margin-right:50px;" id="'.$product_id.'"  onclick="markthislink(this)" >
      
      <img src="'.$pimage.'" class="img-rounded" alt="Cinque Terre" style="width:270px;height:270px;" />
      
      </a>
      </div>

      <div class="col-md-8" style="float:left;">
        <div class="thumbnail" style="margin-right:50px;" id="'.$product_id.'"  onclick="markthislink(this)" >
          <h2 style="margin-left: 20px">'.ucfirst($product_name).'</h2>
          <h4>Rating: '.$msg.'</h4>
          <p><b>Sold By: '.ucfirst($seller_name).'<br>Price: Rs. '.$price.'/- </b></p>
        </div>
      </div>
      <div class="col-md-2" style="float:left;">
      <form method="post">
        <button type="submit" class="btn btn-primary" name="add_to_cart" id="add_to_cart" style="width:100%;" >Add to cart</button>
        </form>


      </div>
      <div class="col-md-2" style="float:left;">
      <form method="post">
        <button type="submit" class="btn btn-primary" name="buy_now" id="buy_now" style="width:100%;" >Buy Now</button>
        </form>


      </div>
      
      <div class="col-md-12" style="float:left;">
      <div class="panel panel-primary">
    <div class="panel-heading">Product Specification</div>
    <div class="panel-body">';
        
        // code the remaining part of product specification here!!.
        $i=2;
        

        while($i<sizeof($arr[$sub_cat_id-1]))
        {?>

          <div class="col-md-6" style="float:left">
      <li class="list-group-item" ><?php echo $arr[$sub_cat_id-1][$i]?></li></div>
      <div class="col-md-6" style="float:left"><li class="list-group-item"><?php echo $row_res_request_specs[$arr[$sub_cat_id-1][$i]]?></li></div>
      <?php
      $i=$i+1;
        }
        // take the values from array!!.

        ?>
        <?php
        echo'
        </div>
        </div>
        </div>
      </div>  
      ';
      ?>

      <div class="panel panel-primary">
      <div class="panel-heading">Rate this product</div>
      <div class="panel-body">
          <form method="post" action="">
              <input type="text" class="" name="rat_input" placeholder="Enter rating out of 10">
              <input type="submit" class="" name="rat_submit">
          </form>
      </div>
      </div>

      <?php echo '
      <div class="panel panel-primary">
      <div class="panel-heading">People who bought this also reviewed these</div>
      <div class="panel-body">
     
        ';
      
        $q4  = "select * from product where product_id = '$product_id'";
        $q4_res = mysqli_query($conn,$q4);
        if(mysqli_num_rows($q4_res)>0){
          $q4_row = mysqli_fetch_array($q4_res);
          $price = $q4_row['price'];
          $cat_id = $q4_row['cat_id'];
          $sub_cat_id = $q4_row['sub_cat_id'];
        }

        $min_price = (int)($price - (0.2*$price));
        $max_price = (int)($price + (0.2*$price));

        //echo 'Range: '.$min_price.'-'.$max_price.'<br>';

        $q5 = "select * from product where cat_id = '$cat_id' and sub_cat_id='$sub_cat_id' and price >= '$min_price' and price <= '$max_price'";
        $q5_res = mysqli_query($conn,$q5);

        if(mysqli_num_rows($q5_res)>0){
          while($q5_row = mysqli_fetch_assoc($q5_res)){
              $p_name = $q5_row['product_name'];
              $prc = $q5_row['price'];
              $prd_id = $q5_row['product_id'];
              $pimage=$q5_row['pimage'];
              if($prd_id != $product_id){
                //echo $p_name.' '.$prc.'<br>';
                  echo'
                    <div class="col-md-4">
                      <div class="view view-first">
                          ';
                          //echo $p_name.' '.$prc;
                          ?>
                          <div class="view view-first">
                            <img src="<?php echo $pimage ?>" style="width:130px;height:150px"/>
                            <div class="mask">
                              <a href="product.php?pid=<?php echo $prd_id?>">
                                <h2><?php echo $p_name?></h2>
                                <h2><?php echo 'Rs. '.$prc.'/-'?></h2>
                              </a>
                              <div>
                                 <form method="post">
                                    <label name="<?php echo $prd_id?>"</label>
                                 </form> 
                              </div>
                            </div>   
                          </div>
                          <?php
                          echo'
                      </div>
                    </div>
                  ';
              }
                
          }  
        }

        echo'
        
          
      </div>
      </div>
      </div>
      </div>


    ';

}



}

if(isset($_POST['rat_submit']) && isset($_POST['rat_input']) && !empty($_POST['rat_input'])){
    $qr = "select * from product_rating where product_id = $product_id";
    $qr_res = mysqli_query($conn,$qr);
    if(mysqli_num_rows($qr_res)==0){
        $count = 1;
        $rating = $_POST['rat_input'];

        echo $qr2 = "insert into product_rating values($product_id,$rating,$count)";
        $qr2_res = mysqli_query($conn,$qr2);
        
    }
    else if(mysqli_num_rows($qr_res)>0){
      $qr_row = mysqli_fetch_array($qr_res);
      $count = $qr_row['count'];
      $rating = $qr_row['rating'];

      $ct = $count+1;
      $ave = ($rating*$count)+$_POST['rat_input'];
      $ave = ($ave/$ct);
      $ave = round($ave,1);
      echo 'Rating: '.$ave.'<br>';

      echo $qr2 = "update product_rating set rating= $ave, count= $ct where product_id = $product_id ";
      $qr2_res = mysqli_query($conn,$qr2);
      

    }

    unset($_POST['rat_submit']);
    header("Location:product.php?pid=$product_id");
    
}

if(isset($_POST['add_to_cart']) && isset($_SESSION['customer_id'])){

  $usr='customer_id';
  $cusid=$_SESSION[$usr];
  //echo $cusid;
  if(loggedin("customer_id")){
  
  $customer_id=$_SESSION["customer_id"];
  $query="select * from add_to_cart where product_id=$product_id and customer_id=$customer_id";
  $res=mysqli_query($conn,$query);
  if(mysqli_num_rows($res)>0){
    $query="update add_to_cart set qty=qty+1 where product_id=$product_id and customer_id=$customer_id";
    mysqli_query($conn,$query);
  }
  else{

  $query="insert into add_to_cart values($product_id,$seller_id,1,$price,$customer_id)";
  mysqli_query($conn,$query);
  }

}
header("Location:product.php?pid=".$product_id);
}

if(isset($_POST['buy_now']) && isset($_SESSION['customer_id'])){

  $usr='customer_id';
  $cusid=$_SESSION[$usr];

  //echo $cusid;
  if(loggedin("customer_id")){
  
  $customer_id=$_SESSION["customer_id"];
  $query="select * from add_to_cart where product_id=$product_id and customer_id=$customer_id";
  $res=mysqli_query($conn,$query);
  if(mysqli_num_rows($res)>0){
    $query="update add_to_cart set qty=qty+1 where product_id=$product_id and customer_id=$customer_id";
    mysqli_query($conn,$query);
  }
  else{

  $query="insert into add_to_cart values($product_id,$seller_id,1,$price,$customer_id)";
  mysqli_query($conn,$query);
  }
  header("Location:checkout_page.php");

}
}
/*
if(isset($_POST['add_to_cart2']) && isset($_SESSION['customer_id'])){

  $usr='customer_id';
  $cusid=$_SESSION[$usr];
  //echo $_POST['']
  //echo $cusid;
  if(loggedin("customer_id")){
  
  $customer_id=$_SESSION["customer_id"];
  $query="select * from add_to_cart where product_id=$product_id and customer_id=$customer_id";
  $res=mysqli_query($conn,$query);
  if(mysqli_num_rows($res)>0){
    $query="update add_to_cart set qty=qty+1 where product_id=$product_id and customer_id=$customer_id";
    mysqli_query($conn,$query);
  }
  else{

  $query="insert into add_to_cart values($product_id,$seller_id,'$product_name',1,$price,$customer_id)";
  mysqli_query($conn,$query);
  }

}

//echo $query;
  
}
*/
?>

<hr Style="margin-top:105px;"> 
<footer Style="background-color:#111">
      <div class="container ">
        <div class="row">
          <div class="col-sm-2">
              <h2>Service</h2>
              <ul class="nav nav-pills nav-stacked">
                <li><a href="" Style="padding:2px;">Online Help</a></li>
                <hr Style="margin:0px;">
                <li><a href="" Style="padding:2px;">Contact Us</a></li>
                <hr Style="margin:0px;">
                <li><a href="" Style="padding:2px;">Order Status</a></li>
                <hr Style="margin:0px;">
                <li><a href="" Style="padding:2px;">Change Location</a></li>
                <hr Style="margin:0px;">
                <li><a href="" Style="padding:2px;">FAQ’s</a></li>
              </ul>
          </div>
          <div class="col-sm-2">
              <h2>Quick Shop</h2>
              <ul class="nav nav-pills nav-stacked">
                <li><a href="searchresult.php?search_name=mobiles" Style="padding:2px;">Mobiles</a></li>
                <hr Style="margin:0px;">
                <li><a href="searchresult.php?search_name=mens" Style="padding:2px;">Mens</a></li>
                <hr Style="margin:0px;">
                <li><a href="searchresult.php?search_name=watches" Style="padding:2px;">Watches</a></li>
                <hr Style="margin:0px;">
                <li><a href="searchresult.php?search_name=cameras" Style="padding:2px;">Cameras</a></li>
                <hr Style="margin:0px;">
                <li><a href="searchresult.php?search_name=shoes" Style="padding:2px;">Shoes</a></li>
              </ul>
          </div>
          <div class="col-sm-2">
              <h2>Policies</h2>
              <ul class="nav nav-pills nav-stacked">
                <li><a href="" Style="padding:2px;">Terms of Use</a></li>
                <hr Style="margin:0px;">
                <li><a href="" Style="padding:2px;">Privecy Policy</a></li>
                <hr Style="margin:0px;">
                <li><a href="" Style="padding:2px;">Refund Policy</a></li>
                <hr Style="margin:0px;">
                <li><a href="" Style="padding:2px;">Billing System</a></li>
                <hr Style="margin:0px;">
                <li><a href="" Style="padding:2px;">Ticket System</a></li>
              </ul>
          </div>
          <div class="col-sm-2">
              <h2>About </h2>
              <ul class="nav nav-pills nav-stacked">
                <li><a href="" Style="padding:2px;">Company Information</a></li>
                <hr Style="margin:0px;">
                <li><a href="seller_sign_in.php" Style="padding:2px;color:#968;">Sell To Us</a></li>
                <hr Style="margin:0px;">
                <li><a href="" Style="padding:2px;">Store Location</a></li>
                <hr Style="margin:0px;">
                <li><a href="" Style="padding:2px;">Affillate Program</a></li>
                <hr Style="margin:0px;"><li><a href="" Style="padding:2px;">Copyright</a></li>
              </ul>
          </div>
          <div class="col-sm-3 col-sm-offset-1">
              <h2>About Shopper</h2>
                <p>Get the most recent updates from <br />our site and be updated your self...</p>
          </div>
          
      
      </div>
    </div>
    
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <p class="pull-left">Copyright © 2015 <b>ASA</b> Services. All rights reserved.</p>
          <p class="pull-right">Designed by <b>ASA</b></p>
        </div>
      </div>
    </div>
    
  </footer>
  
 <script>
   function search(){



                      var title=document.getElementById("search1").value;
                     // alert("blah blah black "+title);
                      window.location.href="searchresult.php?search_name="+title;
                      return false;

                      

                  }


    function redirect(){
      window.location.href="checkout_page.php";

    }
    function add_to_cart(){
      var k=document.getElementById("cart");
      cart_value=k.innerText;
      var i=0;
      var j="";
      
      if(cart_value!="Cart"){
      while(i<cart_value.length){
        
        if(cart_value[i]=='0'||cart_value[i]=='1'|| cart_value[i]=='2'|| cart_value[i]=='3'|| cart_value[i]=='4'|| 
          cart_value[i]=='5'|| cart_value[i]=='6'||cart_value[i]=='7'||cart_value[i]=='8'||cart_value[i]=='9'){
          j=j+cart_value[i];
        }
        i=i+1;

      }
    }
    else{
      j="0";
      
      
    }
    

      var a=parseInt(j);
      
      a=a+1;
      document.getElementById("cart").innerHTML="Cart "+a;


    




    }
    function redirect(){
      window.location.href="checkout_page.php";

    }
  </script>



  </body>
</html>