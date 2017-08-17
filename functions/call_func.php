<?php
include("includes/db_connect.php");


function get_images(){		//using the name can help for future understanding of my code
global $con;
if(!isset($_GET['cat'])){
	if(!isset($_GET['brand'])){
	$get_prod="select * from products order by rand() LIMIT 0,6";
	$run=mysqli_query($con,$get_prod);
	while($row_product=mysqli_fetch_array($run,MYSQLI_ASSOC)){
	$prod_id=$row_product['product_id'];
	$prod_title=$row_product['prod_title'];
	$prod_cat=$row_product['cat_id'];
	$prod_desc=$row_product['pro_desc'];
	$prod_price=$row_product['prod_price'];
	$prod_brand=$row_product['branch_id'];
	$prod_img1=$row_product['prod_img1'];
$prod_img2=$row_product['prod_img2'];
$prod_img3=$row_product['prod_img3'];

echo "
<div id='insertion' >
<h3>$prod_title</h3>
<a href='details.php?prod_id=$prod_id'><img src='admin/prodimg/$prod_img1' width='280' height='380' id='effect'>
<p id='details'>Details</p></a>
<p><h2 id='but'>Price: Rs $prod_price</h2></p>
</div>
";
}}
}
}

function get_category(){
global $con;
	$get_category="select * from category";
	$run_category=mysqli_query($con,$get_category);
	while($row_category=mysqli_fetch_array($run_category,MYSQLI_ASSOC)){
		$cat_id=$row_category['cat_id'];
		$cat_title=$row_category['cat_title'];

		echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
	}

	
}

function get_brands(){
global $con;
	$get_brand="select * from brands";
	$run_brand=mysqli_query($con,$get_brand);
	while($row_brand=mysqli_fetch_array($run_brand,MYSQLI_ASSOC)){
		$brand_id=$row_brand['branch_id'];
		$brand_title=$row_brand['branch_title'];

		echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
	}
}

function get_cat_images(){		//using the name can help for future understanding of my code
global $con;
if(isset($_GET['cat'])){
	$cat=$_GET['cat'];
	$get_prod="select * from products where cat_id='$cat'";
	$run=mysqli_query($con,$get_prod);
	while($row_product=mysqli_fetch_array($run,MYSQLI_ASSOC)){
	$prod_id=$row_product['product_id'];
	$prod_title=$row_product['prod_title'];
	$prod_cat=$row_product['cat_id'];
	$prod_desc=$row_product['pro_desc'];
	$prod_price=$row_product['prod_price'];
	$prod_brand=$row_product['branch_id'];
	$prod_img1=$row_product['prod_img1'];


echo "
<div id='insertion' >
<h3>$prod_title</h3>
<a href='details.php?prod_id=$prod_id'><img src='admin/prodimg/$prod_img1' width='280' height='380' id='effect'>
<p id='details'>Details</p></a>
<p><h2 id='but'>Price: Rs $prod_price</h2></p>
</div>
";
}
}
}

function get_brand_images(){		//using the name can help for future understanding of my code
global $con;
if(isset($_GET['brand'])){
$brand=$_GET['brand'];
	$get_prod="select * from products where branch_id='$brand'";
	$run=mysqli_query($con,$get_prod);
	while($row_product=mysqli_fetch_array($run,MYSQLI_ASSOC)){
	$prod_id=$row_product['product_id'];
	$prod_title=$row_product['prod_title'];
	$prod_cat=$row_product['cat_id'];
	$prod_desc=$row_product['pro_desc'];
	$prod_price=$row_product['prod_price'];
	$prod_brand=$row_product['branch_id'];
	$prod_img1=$row_product['prod_img1'];

echo "
<div id='insertion' >
<h3>$prod_title</h3>
<a href='details.php?prod_id=$prod_id'><img src='admin/prodimg/$prod_img1' width='280' height='380' id='effect'>
<p id='details'>Details</p></a>
<p><h2 id='but'>Price: Rs $prod_price</h2></p>
</div>
";
}
}
}

function get_ip_address(){
if(!empty($_SERVER['HTTP_CLIENT_IP'])){

$ip=$_SERVER['HTTP_CLIENT_IP'];}
else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}
else if(!empty($_SERVER['REMOTE_ADDR'])){
$ip=$_SERVER['REMOTE_ADDR'];
}
return $ip;

}


function cart(){
global $con;
if(isset($_GET['add_cart'])){
$cart=$_GET['add_cart'];
$ip_address=get_ip_address();
$query="select *from cart where product_id='$cart' and ip_address='$ip_address'";
$query_run=mysqli_query($con,$query);
if(mysqli_num_rows($query_run)>0){
echo "";
}
else{

$query_insert="insert into cart(product_id,ip_address) values('$cart','$ip_address')";
$query_insert_run=mysqli_query($con,$query_insert);

}
}
}

function add_cart(){
global $con;
if(isset($_GET['add_cart'])){
$_ip=get_ip_address();
$cart=$_GET['add_cart'];

$query1="select * from cart where ip_address='$_ip'";
$query_run1=mysqli_query($con,$query1);
$query_row=mysqli_num_rows($query_run1);

$query="select *from cart where product_id='$cart' and ip_address='$_ip'";
$query_run=mysqli_query($con,$query);
$number=mysqli_num_rows($query_run);
if(mysqli_num_rows($query_run)>0){
 echo "";}
else{
$queue=$query_row++;
echo  "$query_row";
}
}
}

function details(){
global $con;
if(isset($_GET['prod_id'])){
$details=$_GET['prod_id'];
 $get_prod="select * from products where product_id='$details'";
	$run=mysqli_query($con,$get_prod);
	while($row_product=mysqli_fetch_array($run,MYSQLI_ASSOC)){
	$prod_id=$row_product['product_id'];
	$prod_title=$row_product['prod_title'];
	$prod_cat=$row_product['cat_id'];
	$prod_desc=$row_product['pro_desc'];
	$prod_price=$row_product['prod_price'];
	$prod_brand=$row_product['branch_id'];
	$prod_img1=$row_product['prod_img1'];
$prod_img2=$row_product['prod_img2'];
$prod_img3=$row_product['prod_img3'];


echo "
<div class='right_content'>

	<div id ='desc'>
<h3>$prod_title</h3>
<p><h2 id ='heading'> Rs $prod_price</h2></p><hr>
<p><u>DESCRIPTION:</u><br>
<table id='table'>
<tr id='despacito'><td><pre>$prod_desc</pre></td></tr></table>
</div>
<div id='slidedesc'>
	<div id='fadedesc'>
		<img src='admin/prodimg/$prod_img1' width='280' height='300' >
		<img src='admin/prodimg/$prod_img2' width='280' height='300' >
		<img src='admin/prodimg/$prod_img3' width='280' height='300' >
        </div>
	<div><a href='index.php?add_cart=$prod_id'><button id='new'>Add to Cart</button></a>
	</div>
	</div>
</div>
";

}
}
}

function shopping_cart(){
global $con;
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
$total_price=array($get_row1['prod_price']);
$value=array_sum($total_price);
$sum+=$value;
}
}
}

function sum_price(){
global $con;
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
$sum+=$value;
}
}
echo "Rs :".$sum;
}



function call(){
global $con;
if(isset($_POST['save'])){
if(isset($_POST['pin']) && isset($_POST['name']) &&isset($_POST['address']) &&isset($_POST['local']) &&isset($_POST['city']) &&isset($_POST['state']) && isset($_POST['local'] )){
$pin=$_POST['pin'];
echo $pin;
$name=$_POST['name'] ;
$address=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$mob=$_POST['mob'];
$local=$_POST['local'];
$mail=$_SESSION['c_email'];

$quer="update customer set pincode='$pin',name='$name',address='$address',locality='$local',city='$city',state='$state',mobile='$mob' where c_email='$mail' ";
//$run_query=mysqli_query($con,$quer);
if(mysqli_query($con,$quer)){

echo "successfully registered";

}else{

echo "sorry";
}
}
}
}

?>
