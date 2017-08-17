<?php
include("includes/db_connect.php");
?>

<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" contents="text/html; charset=utf-8">
<title>Kart</title>
<link rel="stylesheet" href="styles/style.css">
</head>
<body>
<form method="post" action="insert_product.php" enctype="multipart/form-data">
<table width="700" align="center" border="1" id="tables">
<tr>
<td><h1>Insert new Products:</h1>
</td>
</tr>

<tr>
	<td><input type="text" name="product_title" placeholder="Enter the product title" size="50"></td>
</tr>

<tr>
	<td>
<select name="product_cat"><option>Select Category</option>

<?php
	$get_category="select * from category";
	$run_category=mysqli_query($con,$get_category);
	while($row_category=mysqli_fetch_array($run_category,MYSQLI_ASSOC)){
		$cat_id=$row_category['cat_id'];
		$cat_title=$row_category['cat_title'];

		echo "<option  value='$cat_id'>$cat_title</option>";
	}
?>


</select>
</td>
</tr>

<tr>
	<td>
<select name="product_brand">
<option> Select Brand</option>
<?php
	$get_brand="select * from brands";
	$run_brand=mysqli_query($con,$get_brand);
	while($row_brand=mysqli_fetch_array($run_brand,MYSQLI_ASSOC)){
		$brand_id=$row_brand['branch_id'];
		$brand_title=$row_brand['branch_title'];

		echo "<option value='$brand_id'>$brand_title</option>";
	}
?>
</select>
</td>
</tr>

<tr>
	<td><input type="file" name="product_img1" ></td>
</tr>

<tr>
	<td><input type="file" name="product_img2" td>
</tr>

<tr>
	<td><input type="file" name="product_img3" ></td>
</tr>

<tr>
	<td><input type="text" name="product_price" placeholder="Enter the product price" size="50"></td>
</tr>

<tr>
	<td><textarea name="product_desc" placeholder="Enter description of the product"></textarea></td>
</tr>

<tr>
	<td><input type="text" name="product_keyword" placeholder="Enter the product keyword" size="50"></td>
</tr>

<tr>
	<td><input type="submit" name="insertion" value="submit"></td>
</tr>
</table>
</form>
</body>
</html>
<?php
if(isset($_POST['insertion'])){
$product_title=$_POST['product_title'];
$product_cat=$_POST['product_cat'];
$product_brand=$_POST['product_brand'];
$product_price=$_POST['product_price'];
$product_desc=$_POST['product_desc'];
$product_keyword=$_POST['product_keyword'];
$status='on';
//names of images
$product_img1=$_FILES['product_img1']['name'];
$product_img2=$_FILES['product_img2']['name'];
$product_img3=$_FILES['product_img3']['name'];
//temporary names

$temp_img1=$_FILES['product_img1']['tmp_name'];
$temp_img2=$_FILES['product_img2']['tmp_name'];
$temp_img3=$_FILES['product_img3']['tmp_name'];

if($product_title=="" OR $product_cat=="" OR$product_brand=="" OR$product_price=="" OR$product_desc=="" OR$product_keyword=="" OR $product_img1==""){

echo "<script>alert('Fill all the inputs !')</script>";
exit();
}
else{

move_uploaded_file($temp_img1,"prodimg/$product_img1");
move_uploaded_file($temp_img2,"prodimg/$product_img2");
move_uploaded_file($temp_img3,"prodimg/$product_img3");

$insert="insert into products(cat_id,branch_id,date,prod_title,prod_img1,prod_img2,prod_img3,prod_price,pro_desc,status) 
values('$product_cat','$product_brand',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_desc','$status')";

$run_product=mysqli_query($con,$insert);

if($run_product){
echo "<script>alert('successfully inserted!')</script>";
}else
{
echo "<script>alert('Insertion failed!')</script>";}
}



















}




?>
