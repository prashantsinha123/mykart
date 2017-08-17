<?php
session_start();

include("includes/db_connect.php");
include("functions/call_func.php");



?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" contents="text/html; charset=utf-8">
<title>Kart</title>
<link rel="stylesheet" href="styles/style.css" media="all">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script type="text/javascript" src="js/cycle.js"></script>

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
		 <div class="cart"><img src="images/20117429_2226354237637406_253754890_n.png"><sup><div id='cart_text'><?php add_cart();?></div></sup></div>		
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
		<li><a href=<?php if(isset($_SESSION['c_email'])){
echo "myAccount.php";;
}
else{
echo "checkout.php";
}?>>My Account</a></li>
		<li><a href="shopping_cart.php">Shopping Cart</a></li>
		<li><a href="login_signup.php">Sign up</a></li>
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


		<?php 
		if(!isset($_SESSION['c_email'])){
			include("login_signup.php");
			exit();
			}else{
			header('Location:payment.php');
}
		?>


</body>
</html>
