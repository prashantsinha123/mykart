<?php
session_start();

error_reporting(0);
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
  $("#slideshow").cycle({
	fx:'shuffle',
next:'#slideshow',
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
		<li><a href="cart.php">Shopping Cart</a></li>
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
<div id="product_box">
<form action='shopping_cart.php' method='post' enctype='multipart-form/data'>

<?php 
$ip=get_ip_address();
$query="select * from cart where ip_address='$ip'";
$query_run=mysqli_query($con,$query);
$num_row=mysqli_num_rows($query_run);

?>

<div id="shopping_cart">
 

<?php
if($num_row==0){
header('Location:blank.php');
}


else
{
 echo "Shopping Cart ($num_row items selected )";}?> 
</div>

<table id="table">
<tr align="center" id="tr">
<td width="400px">Item Details</td>
<td width="200px" align="center">Price</td>
<td >Quantity</td>
<td >Sub Total</td>
<td>Remove</td>
</tr>
</table>
<table id="table">
<?php
$sum=0;
$_ip=get_ip_address();
$query="select * from cart where ip_address='$_ip'";
$query_run=mysqli_query($con,$query);
$num_row=mysqli_num_rows($query_run);
while($get_row=mysqli_fetch_array($query_run)){
$pro_id=$get_row['product_id'];

$query1="select * from products where product_id='$pro_id'";
$query_run1=mysqli_query($con,$query1);
while($get_row1=mysqli_fetch_array($query_run1)){
$prod_title=$get_row1['prod_title'];
$prod_img1=$get_row1['prod_img1'];
$prod_price=$get_row1['prod_price'];
$prod_id=$get_row1['product_id'];
$total_price=array($get_row1['prod_price']);
$value=array_sum($total_price);

?>



<tr>
<td width="400px"><?php echo "<div class='container'><div id='floating'><img src='admin/prodimg/$prod_img1' width='100' height='100' ></div> <div id=cart_desc><a href='details.php?prod_id=$prod_id'>$prod_title</a></div></div>"?></td>
<td width="200px"><?php echo "Rs: ".$prod_price?></td>
<td width="250px"><input type="number" name="qty<?php echo $prod_id; ?>" value="0" width="50px" min="0"></td>
<?php 
if(isset($_POST['update'])){
$qty=$_POST['qty'.$prod_id];
$quant="update cart set qty='$qty' where product_id='$prod_id'";
$quant_run=mysqli_query($con,$quant);
$new= $_POST['qty'.$prod_id]*$get_row1['prod_price'];         //this method is very necessary to get the total output.I did it yippeee!
$sum=$sum+$new;
}
?>


<td  align="center"> <?php if($qty==0){
echo $prod_price;}else{$send=$prod_price*$qty; 

echo $send;
}?>
</td>
<td align="center" width="250px"><input type ="checkbox" name="check[]" class="padding" value="<?php echo $prod_id;?>"> </td>

</tr>

<?php }} ?>

</table>
<table id="table">
<tr  id="tr">
<td  width="250px" ><div id="price"><a  href="index.php" >Continue Shopping</a></div></td>

<td><?php if($num_row==0){ echo '<input type="submit" value="Update" name="update" disabled="disabled" id="up1">';}else{echo '<input type="submit" value="Update" name="update" id="up">';}?></td>

<td width="250px"><div id="price1"><?php  

echo "Rs: ".$sum;

?></div></td>
<td width="300px"><div id="price"><a href="checkout.php" id="price">Proceed to Payment >></a></div></td>
</tr>
</table>

</form>

</div>
<div class="footer">
<h1 style="color:black;text-align:center;font-size:25px;padding-top:30px;">&copy;www.mykart.com-2017</h1></div>

</div>

<?php
if(isset($_POST['update'])){
if($qty>=0){
foreach(@$_POST['check'] as $remove){
$rem= "delete from cart where product_id='$remove'";
$run_rem=@mysqli_query($con,$rem);

if($run_rem){
echo "<script>window.open('shopping_cart.php','_self')</script>";
}
}
}
}

?>




</body>
</html>
