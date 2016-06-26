<?php
include('head.php');
include('connection.php');
echo'

<!DOCTYPE Html>

<html lang="en">
<head>
  <title>Nav-Tabs</title>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="bootstrap-3.3.5/dist/css/home.css">
  <link rel="stylesheet" type="text/css" href="bootstrap-3.3.5/dist/css/style_common_home.css">
  <link rel="stylesheet" type="text/css" href="bootstrap-3.3.5/dist/css/style1_home.css">
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

    
    
if(isset($_POST['submit'])){


$search_data=$_POST['q'];
if (is_null($search_data)){
$b="Location:home.php";
    header($b);

}
$query1="select * from category where category_name like '%$search_data%'" ;
$res=mysqli_query($conn,$query1);
if(mysqli_num_rows($res)>0){
	 
	$row=mysqli_fetch_array($res);
	
    $cat_id=$row['cat_id'];
    $b="Location:searchresult.php?search_id=1&cat_id=".$cat_id;
    header($b);
}
else{
 $query2="select * from sub_category where sub_category_name like '%$search_data%'" ;
$res=mysqli_query($conn,$query2);
if(mysqli_num_rows($res)>0){
 	$row=mysqli_fetch_array($res);
 	
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
 	}

    }


}
}


//****************** BODY OF THE HOME PAGE GOES HERE *************************////

$q1 = "select * from category";
$q1_res = mysqli_query($conn,$q1);

if(mysqli_num_rows($q1_res)>0){

    while($q1_row = mysqli_fetch_assoc($q1_res)){
        $cat_id = $q1_row['cat_id'];
        $cat_name = $q1_row['category_name'];
        //$sub_cat_name = rtrim($sub_cat_name);
        if(strcmp($cat_name,"books_and_media")==0){
          $cat_name = "Books & Media";
        }
      echo '<div class="panel panel-success" style="margin:10px">';

?>
      <div class="panel-heading"><?php echo $cat_name?></div>;
      
        <div class="panel-body">
        <div class="container">
            <div class="rows">
        <?php
        
        $q2 = "select * from sub_category where cat_id = '$cat_id'";
        $q2_res = mysqli_query($conn,$q2);
        $c=0;
        if(mysqli_num_rows($q2_res)>0){
            while($q2_row = mysqli_fetch_assoc($q2_res)){
                $sub_cat_name = $q2_row['sub_category_name'];
                $b="searchresult.php?search_name=".$sub_cat_name;
                $sub_cat_img = $q2_row['sub_category_image'];
                $c=$c+1;
        ?>
                
                    <div class="col-sm-4">
                      <div class="view view-first">
                        <img src=<?php echo '"'.$sub_cat_img.'"' ?> />
                          <a href="<?php echo $b?>" onClick="location()">
                        
                        <div class="mask">
                              <h2><?php echo $sub_cat_name?></h2>
                        
                        </div>
                        </a>   
                      </div>
                    </div>
                      
        <?php
            }
            ?>
            </div>
        </div> 
      
<?php
        }
        ?>
        </div>;
      </div>  
        <?php
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
  function redirect(){
      window.location.href="checkout_page.php";

    }
   function search(){



                      var title=document.getElementById("search1").value;
                      //alert("blah blah black "+title);
                      window.location.href="searchresult.php?search_name="+title;
                      return false;

                      
                  }
  </script>
    </body>
</html>
  

