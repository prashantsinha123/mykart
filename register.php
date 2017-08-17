
<?php
session_start();
include("includes/db_connect.php");
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

<div id="reg">
		<hr><div style="font-size:20px">MY ADDRESS</div><hr>

	<div id="form3">
<form method="POST" action="new.php">
<label>Pincode:</label><i><input type="textbox" id="pin" name="pin" placeholder="Enter 6-digit pin" required maxlength="6" value="<?php if(isset($_SESSION['pincode'])) { echo $_SESSION['pincode'];}?>"></i><br>
<label>Name:</label><input type="textbox" id="name" name="name" placeholder="Enter Name" required value="<?php echo $_SESSION['name']; ?>"><br>
<label>Address:</label><input type="textbox" id="address" name="address" placeholder="Enter your Address" style="height:100px" required value="<?php echo $_SESSION['address']; ?>"><br>
<label>Locality:</label><input type="textbox" id="local" name="local" placeholder=" Eg: near durga mandir" value="<?php echo $_SESSION['locality']; ?>"><br>
<label>City:</label><input type="textbox" id="city" name="city" placeholder="Enter city" required value="<?php echo $_SESSION['city']; ?>"><br>
<label>State:</label><input type="textbox" id="state" name="state" placeholder="Enter state" required value="<?php echo $_SESSION['state']; ?>"><br>
<label>Mobile:</label><input type="textbox" id="mob" name="mob" placeholder="10 digit mobile number" required maxlength="10" value="<?php echo $_SESSION['mobile']; ?>"><br>
<label></label>

<input type="submit" name="save" class="btn btn-default btn-success btn-inline" style="width:500px;height:60px;font-size:25px" value="Save Address">
</form>
</div>
</div>

<div id="message"></div>
</body>
</html>



