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


if(loggedin('customer_id')){

$customer_id=$_SESSION['customer_id'];





             $total_price=0;

        $query="select * from add_to_cart where customer_id=$customer_id";
        $res=mysqli_query($conn,$query);
        if(mysqli_num_rows($res)>0){
          $i=0;
          echo'
            <div class="container">
              <div class="row" Style="border:solid;">
                <div class="col-md-4">
                <h1>PRODUCT<h1>
                </div>
                <div class="col-md-2" >
                   <h1>QTY<h1>   

                </div>
                <div class="col-md-3"><h1>PRICE</h1></div>
                <div class="col-md-3"><h1>TOTAL PRICE<h1></div>
             </div>
            </div>';
            $stack=array();
            $space="  ";

          while($rows=mysqli_fetch_array($res)){
            $i=$i+1;
            $product_id=$rows['product_id'];
            $seller_id=$rows['seller_id'];
            $qty=$rows['qty'];
            array_push($stack,$product_id);
            $price=$rows['price'];
            $query="select * from product where product_id=$product_id";
            $res1=mysqli_query($conn,$query);
            $rows1=mysqli_fetch_array($res1);
            $product_name=$rows1['product_name'];
            $pimage=$rows1['pimage'];
            $query="select * from seller_login where seller_id=$seller_id";
            $res1=mysqli_query($conn,$query);
            $rows1=mysqli_fetch_array($res1);
            $seller_name=$rows1['seller_name'];
            $total_price=$total_price+$qty*$price;
            echo'
            <div class="container">
              <div class="row" Style="border:solid;">
                <div class="col-md-4">
                <div class="row">
                <div class="col-md-1" ><h2>'.$i.'</h2></div>
                  <div class="col-md-8" >
                    <a href="#"  class="thumbnail" style="margin-right:50px;" id="'.$product_id.'"  onclick="markthislink(this)" >
              
                      <img src="'.$pimage.'" class="img-rounded" alt="Cinque Terre" style="width:270px;height:270px;" />
              
                     </a>
                 </div>
                 <div class="col-md-3" >
                  <h2>'.$seller_name.'</h2>
                  <p>'.$product_name.'<p>


                 </div>
              </div>


                </div>
                <div class="col-md-2" >
                      <h2 style="text-align:center">'.$qty.'</h2>
                      <form method="post">
                        <input type="text" name="qty" style="width:25%;">

                        <button type="submit" class="btn btn-primary" name="submit?'.$i.'" id="submit"  >save</button>
                        <button type="submit" class="btn btn-primary" name="remove?'.$i.'" id="remove"  style="margin-top:10px;width:100%;">remove</button>
                      </form>

                </div>
                <div class="col-md-3"><h2>'.$price.'</h2></div>
                <div class="col-md-3"><h2>'.$qty*$price.'<h2></div>

             </div>
            </div>';


          }
          echo'<div class="container">
            <div class="row">
              <div class="col-md-2"><h2>Total Price:</h2></div>
              <div class="col-md-2"><h2>Rs. '.$total_price.'</h2></div>
              <div class="col-md-5">
              <form method="post">
               <button type="submit" class="btns btn-default" id="order" name="order" style="float:left">order now</button>
               </form>
              </div>
            </div>



          </div>';
        }
        $j=1;
        while($j<=$i){
          $rest='submit?'.$j;
          $rest2='remove?'.$j;
          if(isset($_POST[$rest2])){
            $array=explode('?',$rest2);
            
            $number=$array[1];
            $numb=intval($number);

            $product_id_qty=$stack[$numb-1];
            $query="delete from add_to_cart where product_id=$product_id_qty and customer_id=$customer_id";
            mysqli_query($conn,$query);
            
            header("Location:checkout_page.php");


          }
          if(isset($_POST[$rest])){
            //echo''.$rest.'';
            $quantity=$_POST['qty'];
            $array=explode('?',$rest);
            $number=$array[1];
          //  echo''.$number.'';
            $numb=intval($number);

            echo''.$stack[$numb-1].'';
            $product_id_qty=$stack[$numb-1];
            if($quantity>0){
            $query="update add_to_cart set qty=$quantity where product_id=$product_id_qty and customer_id=$customer_id";
            mysqli_query($conn,$query);
            }
            
            header("Location:checkout_page.php");
          }
          $j=$j+1;
      }
      if(isset($_POST['order'])){
        $query="insert into orders(customer_id) values($customer_id)";  
        mysqli_query($conn,$query);
        $query="select * from orders where customer_id=$customer_id";
        $res=mysqli_query($conn,$query);

        while($rows=mysqli_fetch_array($res)){

            $order_no=$rows['order_no'];
        }
        $j=0;
        while($j<$i){

          $product_id_qty=$stack[$j];
          $query="select qty from add_to_cart where product_id=$product_id_qty and customer_id=$customer_id";
          $res=mysqli_query($conn,$query);
          $row=mysqli_fetch_array($res);
          $qty1=$row['qty'];
          $query="insert into order_details values($product_id_qty,$qty1,$order_no)";
          mysqli_query($conn,$query);
          $j=$j+1;

        }
        $query="delete from add_to_cart where customer_id=$customer_id";
        mysqli_query($conn,$query);
        echo''.$query.'';
        header("Location:home1.php");

      }




}
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
  </script>



  </body>
</html>



    