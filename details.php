<?php

include("includes/db_connect.php");
include("functions/call_func.php");



?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" contents="text/html; charset=utf-8">
<title>Kart</title>
<link rel="stylesheet" href="styles/style.css" media="all">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script type="text/javascript" src="js/cycle.js"></script>
<script>
$(document).ready(function(){
  $("#fadedesc").cycle({
	fx:'fade',
next:'#fadedesc',
pause:1
});
});
</script>
</head>
<body>
<div class="wrapper">
<div class="header">
	<a href="index.php"><img src="images/mykart.png"></a>
<div id="form">
	<form method='POST' action='search.php' enctype='multipart-form/data'>
		<input type="text" placeholder="search products and brands"  id="search" name="search">
		<input type="submit" value="Search" id="search_prod" name="search_prod">
	</form>
</div>
	<a href="shopping_cart.php"><div class="vertical_line">
		 <div class="cart"><img src="images/20117429_2226354237637406_253754890_n.png"></div>		
	</div></a>
	<div class="line">
	       <?php
	  if(!isset($_SESSION['c_email']) ) {    echo '<div class="sign"><a href="checkout.php">login</div>		
		<div class="img"><img src="images/user-old.png"></a></div>';}
else{
echo '<div class="sign"><a href="logout.php">logout</div>		
		<div class="img"><img src="images/user-old.png"></a></div>';

}
?>
	</div>
</div>
<div class="nav">
	<ul id="menu">
		<li><a href="index.php">Home</a></li>
		<li><a href="all_products.php">All Products</a></li>
		<li><a href="myaccount.php">My Account</a></li>
		<li><a href="shopping_cart.php">Shopping Cart</a></li>
		<li><a href="register.php">Sign up</a></li>
		<li><a href="contactus.php">Contact us</a></li>

<li style="float:right"><?php
 if(!isset($_SESSION['c_email']) ){
echo "";
}
else{
$wow=$_SESSION['c_email'] ;
echo "WELCOME-$wow";
}


?>
	</li>
	</ul>


</div>
<div class="content">
	<div id="left_content">
		<div id="sidebar_tit">Categories</div>
		<ul id="category"><?php get_category(); ?></ul>
		
		<div id="sidebar_tit">Brands</div>
		<ul id="category"><?php get_brands(); ?></ul>
		
	</div>
	<div id="right_content">
	  
		<div id="product_box">
	<?php details(); ?>
		</div>

        </div>
</div>
<div class="footer">
<h1 style="color:black;text-align:center;font-size:25px;padding-top:30px;">&copy;www.mykart.com-2017</h1></div>

</div>


</body>
</html>
