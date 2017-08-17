<?php
session_start();

include("includes/db_connect.php");
include("functions/call_func.php");
include("load.php");


?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" contents="text/html; charset=utf-8">
<title>Kart</title>
<link rel="stylesheet" href="styles/style.css" media="all">

<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="js/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script type="text/javascript" src="js/dropdown.js"></script>
<body>
<?php
$email=$_SESSION['c_email'];

?>

<div class="header">
	<div id="pay"><a href="index.php"><img src="images/mykart.png"></a></div>
</div>
<div style="margin-left:20%;margin-top:20px;background-color:#ABEBC6;" class="col-lg-7">
<div id="collapse">
<span id="over"><a href="#login"><p style="font-size:20px;margin:10px;padding:20px;">1. Login</p></a></span>
<div><p style="font-size:18px;margin:0px;color:red;padding:60px;background-color:#DCF2EB;"><?php  echo $email;?>
<span style="float:right;"><a href="#" id="change">Change</a></span>

</p></div>
<h4 style="padding-left:30px;" id="over"><a href="#delivery" >2. Delivery</a></h4>
<div><p>


<form method="POST" action="pay.php" id="form3">
<label>Pincode:</label><i><input type="textbox" id="pin" name="pin" placeholder="Enter 6-digit pin" required maxlength="6" value="<?php if(isset($_SESSION['pincode'])) { echo $_SESSION['pincode'];}?>"></i><br>
<label>Name:</label><input type="textbox" id="name" name="name" placeholder="Enter Name" required value="<?php  if(isset($_SESSION['name'])) { echo $_SESSION['name'];}?>"><br>
<label>Address:</label><input type="textbox" id="address" name="address" placeholder="Enter your Address" style="height:100px" required value="<?php if(isset($_SESSION['address'])){echo $_SESSION['address']; }?>"><br>
<label>Locality:</label><input type="textbox" id="local" name="local" placeholder=" Eg: near durga mandir" value="<?php  if(isset($_SESSION['locality'])) { echo $_SESSION['locality'];}?>"><br>
<label>City:</label><input type="textbox" id="city" name="city" placeholder="Enter city" required value="<?php if(isset($_SESSION['city'])) { echo $_SESSION['city'];} ?>"><br>
<label>State:</label><input type="textbox" id="state" name="state" placeholder="Enter state" required value="<?php  if(isset($_SESSION['state'])) { echo $_SESSION['state'];} ?>"><br>
<label>Mobile:</label><input type="textbox" id="mob" name="mob" placeholder="10 digit mobile number" required maxlength="10" value="<?php  if(isset($_SESSION['mobile'])) { echo $_SESSION['mobile'];} ?>"><br>
<label></label>

<input type="submit" name="save" class="btn btn-default btn-success btn-inline" style="width:500px;height:60px;font-size:25px" value="Save Address">
</form>


</p></div>

<h4 style="padding-left:30px;" id="over"><a href="#review#order" >3. Review Orders</a></h4>
<div><p>
<form action='payment.php' method='post' enctype='multipart-form/data'>

<?php 
$ip=get_ip_address();
$query="select * from cart where ip_address='$ip'";
$query_run=mysqli_query($con,$query);
$num_row=mysqli_num_rows($query_run);

?>

<table id="table">
<tr align="center" id="tr">
<td>Item Details</td>
<td>Price</td>
<td >Quantity</td>
<td >Sub Total</td>
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
$qty=$get_row['qty'];

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
<td width="150px"><span style="margin-left:40px"><?php echo "<img src='admin/prodimg/$prod_img1'  width='70' height='70' ></span><br> <span >$prod_title</span>"?></td>
<td width="100px"><?php echo "Rs: ".$prod_price?></td>
<td width="80px"><?php  echo $qty;    ?></td>

<td width="80px">
<?php

$send=$qty*$prod_price;
echo $send;

?>
</td>


</tr>
<tr>
<td>
<a href="shopping_cart.php">change</a>
</td>
</tr>
<?php }} ?>

</table>
<table id="table">
<tr  id="tr">
<td ><div id="price1"><?php  

echo "Rs: ".$sum;

?></div></td>
</tr>
</table>

</form>




</p></div>

<h4 style="padding-left:30px;" id="over"><a href="deliver" >4. COD</a></h4>
<div><p>

here will be the delivery details

</p></div>
</div>

<script>
$(document).ready(function(){
	$('#collapse div').hide();
	$('#collapse a').click(function(e){

$(this).parent().next('#collapse div').slideToggle('slow');

$(this).parent().toggleClass('active');
e.preventDefault();

});
});
</script>
<script>
$(document).ready(function(){
	$('#change').click(function(){
$('#change').load('logout.php');
});
});
</script>
</div>
</body>
</html>
