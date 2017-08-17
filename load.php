<?php
@session_start();
include("includes/db_connect.php");
?>
<!DOCTYPE html>
<html>
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
<?php
$email=$_SESSION['c_email'];
$order="select * from customer where c_email='$email'";
$order_run=mysqli_query($con,$order);
$array=mysqli_fetch_array($order_run);
$custom_id=$array['customer_id'];
$_SESSION['address']=$array['address'];
$_SESSION['pincode']=$array['pincode'];
$_SESSION['name']=$array['name'];
$_SESSION['city']=$array['city'];
$_SESSION['locality']=$array['locality'];
$_SESSION['state']=$array['state'];
$_SESSION['mobile']=$array['mobile'];




?>

</body>
</html>
