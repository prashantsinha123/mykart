
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
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/cycle.js"></script>

<script type="text/javascript" src="js/jquery.js"></script>
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

<div class="container multi-form-wrapper">
	<div  class=" col-sm-5 col-md-5 col-lg-5" >
		<div class="form-header1 background-white white">
			<div style="font-size:20px;color:red" >MY ACCOUNT</div>
			<label><span class="glyphicon glyphicon-user fa-4x" ></span><?php echo $_SESSION['c_email']?></label><hr>
			<div>
			<div style="width:100px;height:60px">	
				<div style="float:left"><span class="glyphicon glyphicon-file fa-2x"></div>
				<div style="float:right"><div style="color:red; font-size:15px">ORDERS</div></div>
				<div  style="padding:30px; font-size:15px;margin:10px"><a href="#" onclick="return load('old','order.php');"  style="text-decoration:none;color:#61A8A8">Orders</a></div>	
			</div>
			</div><hr>
			<div><span class="glyphicon glyphicon-user fa-4x"> Profile</div>


			<div style="padding:30px" id="listing">
			<ul style="list-style-type:none;">
				<li><a href='#' onclick=" return load('old','register.php');">Saved Address</a></li>
				<li><a href="#" onclick=" return load('old','cards.php');">Saved cards</a></li>
				<li><a href="#password" onclick=" return load('old','password.php');">Change Password</a></li>
				<li><a href="#history" onclick=" return load('old','shopplist.php');">Shopping list</a></li>
			</ul>




			
		</div>	
	</div>
</div>


<script>
 
function load(thediv,file){
if(window.XMLHttpRequest){
xmlhttp= new XMLHttpRequest();
}else{
xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');

}
xmlhttp.onreadystatechange=function(){

if(xmlhttp.readyState==4 && xmlhttp.status==200){

document.getElementById(thediv).innerHTML=xmlhttp.responseText;
}
}

xmlhttp.open('GET',file,true);
xmlhttp.send();


}
</script>
<div  class="module  col-sm-5 col-md-5 col-lg-7" id='old'></div>

</div>















