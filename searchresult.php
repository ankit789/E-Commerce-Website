<?php
include('head.php');
include('connection.php');
include('test.php');
$catid=0;
$sub_cat_id=0;

$search_data= $_GET['search_name'];

echo'
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

echo '
<br/>
<div class="container-fluid">
<div class="row">';
     
      

$query1="select * from category where category_name like '%$search_data%'" ;
$res=mysqli_query($conn,$query1);
if(mysqli_num_rows($res)>0){
   
  $row=mysqli_fetch_array($res);
  
    $catid=$row['cat_id'];
    $query="select * from product where cat_id='$catid'";
    $res=mysqli_query($conn,$query);
    if(mysqli_num_rows($res)>0){
      echo '
       <div class="col-md-3" Style="border:solid;">
 
      ';

    $query_for_min_max_price="select MIN(price) as min_price,MAX(price) as max_price from product where cat_id=$catid";
    $res_for_min_max_price=mysqli_query($conn,$query_for_min_max_price);
    $row_for_min_max_price=mysqli_fetch_array($res_for_min_max_price);
    $min_price=$row_for_min_max_price['min_price'];
    $max_price=$row_for_min_max_price['max_price'];



 echo'
      <h3>Price</h3>
      <div class="col-md-6"> 
        <h5><b>Min Price:'.$min_price.'</b></h5>

      </div>
      <div class="col-md-6"> 
        <h5><b>Max Price:'.$max_price.'</b></h5>

      </div>

      
      
      <div class="row">
  <div class="col-md-1" style="width:50%">
  <div class="form-group">
  <input type="text" class="form-control" id="minprice" name="minprice">
  </div>
  </div>
  <div class="col-md-1" style="width:50%">
  <div class="form-group">
  <input type="text" class="form-control" id="maxprice" name="maxprice">
  </div>
  </div>
  </div>
   <button type="submit" class="btn btn-default" name="refine" id="'.$search_data.'" style="width:100%;" onClick="return search2(this)">refine</button>

       </div>
      <div class="col-md-9" >
      <div Style="height:100px;">
      ';
      if(isset($_GET['pricesortdesc'])){
        $pricesort="sorted in descending order";
      }
      else if(isset($_GET['pricesortasc'])){
        $pricesort="sorted in ascending order";
      }
      else{
        $pricesort="";

      }
      $search_d=$search_data."-".$pricesort;
    echo'
      <h2>Search Result Of:'.$search_d.'</h2>
      <a href="searchresult.php?search_name='.$search_data.'&pricesortdesc">price high to low</a>
      <a href="searchresult.php?search_name='.$search_data.'&pricesortasc">price low to high</a>
      </div>
      <br/>';
  if (isset($_GET['minprice'])){
      $minprice=$_GET['minprice'];
      if(isset($_GET['maxprice'])){
        $maxprice=$_GET['maxprice'];
        $query_for_min_max_price="select * from product where cat_id=$catid and price between $minprice and $maxprice";
        $res=mysqli_query($conn,$query_for_min_max_price);

      }
      else{

          $query_for_min_max_price="select * from product where cat_id=$catid and price > $minprice";
          $res=mysqli_query($conn,$query_for_min_max_price);
      }




    }
    else if(isset($_GET['maxprice'])){
      $maxprice=$_GET['maxprice'];
      $query_for_min_max_price="select * from product where cat_id=$catid and price < $maxprice";
          $res=mysqli_query($conn,$query_for_min_max_price);


    }
    else if(isset($_GET['pricesortdesc'])){
      $query_for_price_sort="select * from product where cat_id=$catid order by price desc";
      $res=mysqli_query($conn,$query_for_price_sort);
    }
    else if(isset($_GET['pricesortasc'])){
      $query_for_price_sort="select * from product where cat_id=$catid order by price ";
      $res=mysqli_query($conn,$query_for_price_sort);
    }
      while($rows=mysqli_fetch_array($res)){
        $pimage=$rows['pimage'];
        $product_id=$rows['product_id'];
        // add something about the image dude!!
        // $pimage=$rows['??'];
        $product_name=$rows['product_name'];
        $price=$rows['price'];
        $seller_id=$rows['seller_id'];
        $query1="select * from seller_login where seller_id='$seller_id'";
        $res1=mysqli_query($conn,$query1);
        $row1=mysqli_fetch_array($res1);
        $seller_name=$row1['seller_name'];
        echo'
        <div class="col-md-4" style="float:left;">
          <a href="#"  class="thumbnail" style="margin-right:50px;" id="'.$product_id.'"  onclick="markthislink(this)" >
          <h4>'.$product_name.'</h4>
          <img src='.$pimage.' class="img-rounded" alt="Cinque Terre" style="width:270px;height:270px;" />
          <p><b>'.$seller_name.'<br>Price:'.$price.'</b></p>
          </a>
        </div>
    ';

      }


    }

    
}
else{
 $query2="select * from sub_category where sub_category_name like '%$search_data%'" ;
$res=mysqli_query($conn,$query2);
if(mysqli_num_rows($res)>0){
  $row=mysqli_fetch_array($res);
  
    $sub_cat_id=$row['sub_cat_id'];
$query="select * from product where sub_cat_id='$sub_cat_id'";
    $res=mysqli_query($conn,$query);
    if(mysqli_num_rows($res)>0){
      $i=2;
       echo '
       <div class="col-md-3" style="border-right:outset grey;border-bottom:ridge grey" >
       <h3>Filter By</h3>';
 
      while($i<sizeof($arr[$sub_cat_id-1])){
        $test=$arr[$sub_cat_id-1][$i]."|".$search_data;
      
    echo'
    <div class="col-md-12">
      <input type="checkbox"id="'.$test.'" onClick="difflocation(this)" >'.$arr[$sub_cat_id-1][$i].'</input></div>';
      $i=$i+1;
}
$query_for_min_max_price="select MIN(price) as min_price,MAX(price) as max_price from product where sub_cat_id=$sub_cat_id";
$res_for_min_max_price=mysqli_query($conn,$query_for_min_max_price);
$row_for_min_max_price=mysqli_fetch_array($res_for_min_max_price);
$min_price=$row_for_min_max_price['min_price'];
$max_price=$row_for_min_max_price['max_price'];

      echo'
      <h3>Price</h3>
      <div class="col-md-6"> 
        <h5><b>Min Price:'.$min_price.'</b></h5>

      </div>
      <div class="col-md-6"> 
        <h5><b>Max Price:'.$max_price.'</b></h5>

      </div>

      
      
      <div class="row">
  <div class="col-md-1" style="width:50%">
  <div class="form-group">
  <input type="text" class="form-control" id="minprice" name="minprice">
  </div>
  </div>
  <div class="col-md-1" style="width:50%">
  <div class="form-group">
  <input type="text" class="form-control" id="maxprice" name="maxprice">
  </div>
  </div>
  </div>
   <button type="submit" class="btn btn-default" name="refine" id="'.$search_data.'" style="width:100%;" onClick="return search2(this)">refine</button>

       </div>
      <div class="col-md-9" >
      <div Style="height:100px;">
      ';
      if(isset($_GET['pricesortdesc'])){
        $pricesort="sorted in descending order";
      }
      else if(isset($_GET['pricesortasc'])){
        $pricesort="sorted in ascending order";
      }
      else{
        $pricesort="";

      }
      $search_d=$search_data."-".$pricesort;
    echo'
      <h2>Search Result Of:'.$search_d.'</h2>
      <a href="searchresult.php?search_name='.$search_data.'&pricesortdesc">price high to low</a>
      <a href="searchresult.php?search_name='.$search_data.'&pricesortasc">price low to high</a>
      </div>
<br/>';

$query_for_checkbox = "select request_table_name from sub_category where sub_cat_id=$sub_cat_id";
      $res_for_checkbox=mysqli_query($conn,$query_for_checkbox);
      $row_for_checkbox=mysqli_fetch_array($res_for_checkbox);
      $request_table_name=$row_for_checkbox['request_table_name'];
      $i=2;
      $name="";
      while($i<strlen($request_table_name)){
        $name=$name.$request_table_name[$i];
        $i=$i+1;


      }



    if(isset($_GET['pspecs'])){
      
      $pspecs=$_GET['pspecs'];
      

      $query_for_pspecs="select * from product p where sub_cat_id=$sub_cat_id and p.product_id in (select product_id from $name order by $pspecs) ";
      $query_for_pspecs="SELECT DISTINCT product.* FROM product inner join $name ON product.product_id = $name.product_id ORDER BY $name.$pspecs DESC";
      $res=mysqli_query($conn,$query_for_pspecs);
       

    }
    else if (isset($_GET['minprice'])){
      $minprice=$_GET['minprice'];
      if(isset($_GET['maxprice'])){
        $maxprice=$_GET['maxprice'];
        $query_for_min_max_price="select * from product where sub_cat_id=$sub_cat_id and price between $minprice and $maxprice";
        $res=mysqli_query($conn,$query_for_min_max_price);

      }
      else{

          $query_for_min_max_price="select * from product where sub_cat_id=$sub_cat_id and price > $minprice";
          $res=mysqli_query($conn,$query_for_min_max_price);
      }




    }
    else if(isset($_GET['maxprice'])){
      $maxprice=$_GET['maxprice'];
      $query_for_min_max_price="select * from product where sub_cat_id=$sub_cat_id and price < $maxprice";
          $res=mysqli_query($conn,$query_for_min_max_price);


    }
    else if(isset($_GET['pricesortdesc'])){
      $query_for_price_sort="select * from product where sub_cat_id=$sub_cat_id order by price desc";
      $res=mysqli_query($conn,$query_for_price_sort);
    }
    else if(isset($_GET['pricesortasc'])){
      $query_for_price_sort="select * from product where sub_cat_id=$sub_cat_id order by price ";
      $res=mysqli_query($conn,$query_for_price_sort);
    }
      while($rows=mysqli_fetch_array($res)){
        $pimage=$rows['pimage'];
        $product_id=$rows['product_id'];
        // add something about the image dude!!
        // $pimage=$rows['??'];
        $product_name=$rows['product_name'];
        $price=$rows['price'];
        $seller_id=$rows['seller_id'];
        $query1="select * from seller_login where seller_id='$seller_id'";
        $res1=mysqli_query($conn,$query1);
        $row1=mysqli_fetch_array($res1);
        $seller_name=$row1['seller_name'];
        echo'
        <div class="col-md-4" style="float:left;">
          <a href="#"  class="thumbnail" style="margin-right:50px;" id="'.$product_id.'"  onclick="markthislink(this)" >
          <h4>'.$product_name.'</h4>
          <img src="'.$pimage.'" class="img-rounded" alt="Cinque Terre" style="width:200px;height:270px;" />
          <p><b>'.$seller_name.'<br>Price:'.$price.'</b></p>
          </a>
        </div>
        ';

      }


    }

}

    else{
        $query2="select * from product where product_name like '%$search_data%'" ;
$res=mysqli_query($conn,$query2);
if(mysqli_num_rows($res)>0){
   echo '
       <div class="col-md-3" Style="border:solid;">
 
    
      
       ';
       $query_for_min_max_price="select MIN(price) as min_price,MAX(price) as max_price from product where product_name like '%$search_data%'";
    $res_for_min_max_price=mysqli_query($conn,$query_for_min_max_price);
    $row_for_min_max_price=mysqli_fetch_array($res_for_min_max_price);
    $min_price=$row_for_min_max_price['min_price'];
    $max_price=$row_for_min_max_price['max_price'];


       echo'
      <h3>Price</h3>
      <div class="col-md-6"> 
        <h5><b>Min Price:'.$min_price.'</b></h5>

      </div>
      <div class="col-md-6"> 
        <h5><b>Max Price:'.$max_price.'</b></h5>

      </div>

      
      
      <div class="row">
  <div class="col-md-1" style="width:50%">
  <div class="form-group">
  <input type="text" class="form-control" id="minprice" name="minprice">
  </div>
  </div>
  <div class="col-md-1" style="width:50%">
  <div class="form-group">
  <input type="text" class="form-control" id="maxprice" name="maxprice">
  </div>
  </div>
  </div>
   <button type="submit" class="btn btn-default" name="refine" id="'.$search_data.'" style="width:100%;" onClick="return search2(this)">refine</button>

       </div>
      <div class="col-md-9" >
      <div Style="height:100px;">
      ';
      if(isset($_GET['pricesortdesc'])){
        $pricesort="sorted in descending order";
      }
      else if(isset($_GET['pricesortasc'])){
        $pricesort="sorted in ascending order";
      }
      else{
        $pricesort="";

      }
      $search_d=$search_data."-".$pricesort;
    echo'
      <h2>Search Result Of:'.$search_d.'</h2>
      <a href="searchresult.php?search_name='.$search_data.'&pricesortdesc">price high to low</a>
      <a href="searchresult.php?search_name='.$search_data.'&pricesortasc">price low to high</a>
      </div>
      <br/>';
      if (isset($_GET['minprice'])){
      $minprice=$_GET['minprice'];
      if(isset($_GET['maxprice'])){
        $maxprice=$_GET['maxprice'];
        $query_for_min_max_price="select * from product where product_name like '%$search_data%' and price between $minprice and $maxprice";
        $res=mysqli_query($conn,$query_for_min_max_price);

      }
      else{

          $query_for_min_max_price="select * from product where product_name like '%$search_data%' and price > $minprice";
          $res=mysqli_query($conn,$query_for_min_max_price);
      }




    }
    else if(isset($_GET['maxprice'])){
      $maxprice=$_GET['maxprice'];
      $query_for_min_max_price="select * from product where product_name like '%$search_data%' and price < $maxprice";
          $res=mysqli_query($conn,$query_for_min_max_price);


    }
    else if(isset($_GET['pricesortdesc'])){
      $query_for_price_sort="select * from product  where product_name like '%$search_data%' order by price desc";
      $res=mysqli_query($conn,$query_for_price_sort);
    }
    else if(isset($_GET['pricesortasc'])){
      $query_for_price_sort="select * from product where product_name like '%$search_data%' order by price ";
      $res=mysqli_query($conn,$query_for_price_sort);
    }
 
  //$query="select * from product where product_name like '%$product_name%'";
  
    if(mysqli_num_rows($res)>0){
      while($rows=mysqli_fetch_array($res)){
        $pimage=$rows['pimage'];
        $product_id=$rows['product_id'];
        // add something about the image dude!!
        // $pimage=$rows['??'];
        $product_name=$rows['product_name'];
        $price=$rows['price'];
        $seller_id=$rows['seller_id'];
        $query1="select * from seller_login where seller_id='$seller_id'";
        $res1=mysqli_query($conn,$query1);
        $row1=mysqli_fetch_array($res1);
        $seller_name=$row1['seller_name'];
        echo'
        <div class="col-md-4" style="float:left;">
          <a href="#"  class="thumbnail" style="margin-right:50px;" id="'.$product_id.'"  onclick="markthislink(this)" >
          <h4>'.$product_name.'</h4>
          <img src="'.$pimage.'" class="img-rounded" alt="Cinque Terre" style="width:270px;height:270px;" />
          <p><b>'.$seller_name.'<br>Price:'.$price.'</b></p>
          </a>
        </div>
    ';

      }


    }


    }


}


}


echo '</div>
      </div>
      </div>';
/*if($catid!=0){
    $query="select * from product where cat_id='$catid'";
    $res=mysqli_query($conn,$query);
    if(mysqli_num_rows($res)>0){
      while($rows=mysqli_fetch_array($res)){
        $pimage=1;
        $product_id=$rows['product_id'];
        // add something about the image dude!!
        // $pimage=$rows['??'];
        $product_name=$rows['product_name'];
        $price=$rows['price'];
        $seller_id=$rows['seller_id'];
        $query1="select * from seller_login where seller_id='$seller_id'";
        $res1=mysqli_query($conn,$query1);
        $row1=mysqli_fetch_array($res1);
        $seller_name=$row1['seller_name'];
        echo'
        <div class="row-md-4" style="float:left;">
        <a href="#"  class="thumbnail" style="margin-right:50px;" id="'.$product_id.'"  onclick="markthislink(this)" >
         <h4>'.$product_name.'</h4>
    <img src="'.$pimage.'" class="img-rounded" alt="Cinque Terre" style="width:270px;height:270px;" />
    <p><b>'.$seller_name.'<br>Price:'.$price.'</b></p>
    </a>
    </div>
    ';

      }


    }


}
else if ($sub_cat_id!=0){

$query="select * from product where sub_cat_id='$sub_cat_id'";
    $res=mysqli_query($conn,$query);
    if(mysqli_num_rows($res)>0){
      while($rows=mysqli_fetch_array($res)){
        $pimage=1;
        $product_id=$rows['product_id'];
        // add something about the image dude!!
        // $pimage=$rows['??'];
        $product_name=$rows['product_name'];
        $price=$rows['price'];
        $seller_id=$rows['seller_id'];
        $query1="select * from seller_login where seller_id='$seller_id'";
        $res1=mysqli_query($conn,$query1);
        $row1=mysqli_fetch_array($res1);
        $seller_name=$row1['seller_name'];
        echo'
        <div class="row-md-4" style="float:left;">
        <a href="#"  class="thumbnail" style="margin-right:50px;" id="'.$product_id.'"  onclick="markthislink(this)" >
         <h4>'.$product_name.'</h4>
    <img src="'.$pimage.'" class="img-rounded" alt="Cinque Terre" style="width:270px;height:270px;" />
    <p><b>'.$seller_name.'<br>Price:'.$price.'</b></p>
    </a>
    </div>
    ';

      }


    }

}
else{

$query="select * from product where product_name like '%$product_name%'";
    $res=mysqli_query($conn,$query);
    if(mysqli_num_rows($res)>0){
      while($rows=mysqli_fetch_array($res)){
        $pimage=1;
        $product_id=$rows['product_id'];
        // add something about the image dude!!
        // $pimage=$rows['??'];
        $product_name=$rows['product_name'];
        $price=$rows['price'];
        $seller_id=$rows['seller_id'];
        $query1="select * from seller_login where seller_id='$seller_id'";
        $res1=mysqli_query($conn,$query1);
        $row1=mysqli_fetch_array($res1);
        $seller_name=$row1['seller_name'];
        echo'
        <div class="row-md-4" style="float:left;">
        <a href="#"  class="thumbnail" style="margin-right:50px;" id="'.$product_id.'"  onclick="markthislink(this)" >
         <h4>'.$product_name.'</h4>
    <img src="'.$pimage.'" class="img-rounded" alt="Cinque Terre" style="width:270px;height:270px;" />
    <p><b>'.$seller_name.'<br>Price:'.$price.'</b></p>
    </a>
    </div>
    ';

      }


    }

}

if(isset($_POST['submit'])){


$search_data=$_POST['q'];
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
<script >
          
                  function search(){



                      var title=document.getElementById("search1").value;
                      //alert("blah blah black "+title);
                      window.location.href="searchresult.php?search_name="+title;
                      return false;

                      
                  }
                  function search2(xl){



                      var minprice=document.getElementById("minprice").value;
                      var maxprice=document.getElementById("maxprice").value;
                      //alert(minprice+maxprice);
                      var s=$(xl).attr("id");
                      //alert(s);
                      //var search_data=<?php echo $search_data?>;
                     // window.location.href="searchresult.php?search_name="+s+"&minprice="+minprice+"&maxprice="+maxprice;
                      
                      if(!minprice&&!maxprice){
                      }
                      else if(!minprice){
                        window.location.href="searchresult.php?search_name=" + s +"&maxprice="+maxprice;

                      }
                      else if(!maxprice){
                        window.location.href="searchresult.php?search_name=" + s +"&minprice="+minprice;
                      }
                      else{
                        window.location.href="searchresult.php?search_name=" + s +"&minprice="+minprice+"&maxprice="+maxprice;
                      }
                      return false;

                      
                  }
                 function markthislink(xl){

                    var s=$(xl).attr("id");
                    window.location.href="product.php?pid="+s;

}
                    function difflocation(xl){
                        var s=$(xl).attr("id");
                        
                        var v1 =s.split("|");
                       // alert(v1[0]);
                        window.location.href="searchresult.php?search_name="+v1[1]+"&pspecs="+v1[0];


                    }
                    function refine(){
                     // alert("its working!! thank GOD");
                      return false;
                    }
                    function redirect(){
      window.location.href="checkout_page.php";

    }


                  
            
        </script>

          </body>
</html>
