<?php
session_start();

include("includes/db_connect.php");
if(isset($_POST['save'])){
if(isset($_POST['pin']) && isset($_POST['name']) &&isset($_POST['address']) &&isset($_POST['local']) &&isset($_POST['city']) &&isset($_POST['state']) && isset($_POST['local'] )){
$pin=$_POST['pin'];
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
echo "<script>alert('successfully registered!');
 window.location.href='payment.php';
</script>
";

}else{

echo "sorry";
}
}
}
?>

