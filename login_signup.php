<?php   
@session_start();
include("includes/db_connect.php");

?>

<div class="container multi-form-wrapper">
	<div id="main-login" class="module-form  col-xs-12 col-sm-5 col-md-5 col-lg-5">
		<div class="form-content">
			<div class="form-header background-dark-green white">
				<div class="form-top-left">
					<h1>Login</h1>
				</div>
			<div class="form-top-right"><span class="glyphicon glyphicon-lock"></span>
			</div>
				<br style="clear:both"/>
			</div>
<div class="form-body">
	<form  action="checkout.php" method="POST" id="form1">
	<div>
		<label><span class="glyphicon glyphicon-user"></span>E-mail</label>
	</div>
<div style="overflow:hidden"><input type="textbox" name="usn" placeholder="Enter valid id" size="50px"></div><br>
	<label><span class="glyphicon glyphicon-eye-open"></span>Password</label>
		<div style="overflow:hidden"><input type="password" name="psn" placeholder="Enter password" size="50px"></div><br>

<div class="inner-addon left-addon">
    <span class="glyphicon glyphicon-lock fa-3x"></span>
    <input type="submit" name="login" value="Login" id="form1"  class="btn btn-default btn-success btn-block " />
</div>

	</form>

</div>
<div class="right">
<p>Forgot<a href="#forgot-password" data-toggle="modal">Password ?</a></p><br>
</div>
		</div>
</div>




<div id="main-signup" class="module-form col-xs-12 col-sm-5 col-md-5 col-lg-5">
	<div class="form-content">
			<div class="form-header background-maroon">
				<div class="form-top-left">
		<h1>Signup</h1>	
				</div>
				<div class="form-top-right"><span class="glyphicon glyphicon-pencil"></span>
				</div>
		<br style="clear:both"/>
			</div>
<div class="form-body">
	<form  action="checkout.php" method="POST" id="form2">
	<div>
		<label><span class="glyphicon glyphicon-user"></span>E-mail</label>
	</div>
<div style="overflow:hidden"><input type="textbox" name="email" placeholder="Enter valid id" size="45px"></div><br>
	<label><span class="glyphicon glyphicon-eye-open"></span>Password</label>
		<div style="overflow:hidden"><input type="password" name="passcode" placeholder="Enter password" size="45px"></div><br>
	<label><span class="glyphicon glyphicon-eye-open"></span>Confirm Password</label>
		<div style="overflow:hidden"><input type="password" name="repasscode" placeholder="Re-nter password" size="45px"></div><br>	
	<div class="inner-addon left-addon">
        	<span class="glyphicon glyphicon-pencil fa-2x"></span>
        <input type="submit" name="signup" value="Signup" id="form2"  class="btn btn-default btn-success btn-block " /><br>
</div>
	</form>
</div>

	</div>
</div>
</div>


<div class="modal fade " id="forgot-password" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" >
				<span class="glyphicon glyphicon-lock fa-2x"></span>
				<p style ="display:inline">Change your password:</p>
			</div>
			<form method="POST" action="checkout.php" id="form3">
			<div class="modal-body">
				<label><span class="glyphicon glyphicon-user"></span>E-mail</label>
			<div style="overflow:hidden"><input type="textbox" name="email" placeholder="Enter your e-mail" size="50px" required></div>
			<div style="overflow:hidden"><input type="password" name="new" placeholder="Enter new password" size="50px" required><br></div>
			<div style="overflow:hidden"><input type="password" name="renew" placeholder="Confirm new password" size="50px" required><br></div>
			</div>
			<div class="modal-footer">
				<input type="submit" name="change" id="form3"  value="Change" style="color:black">
			</div></form>
<?php
if(isset($_POST['change'])){
	if(isset($_POST['email']) && isset($_POST['new']) && isset($_POST['renew'])){
$mail=$_POST['email'];
$new_pass=sha1($_POST['new']);
$renew_pass=sha1($_POST['renew']);
if($new_pass==$renew_pass){
//if verification through mail is confirmed then this step will be followed otherwise new message box with invalid verification.
$quer="update customer set c_password='$new_pass' where c_email='$mail'";
$query_run=mysqli_query($con,$quer);
echo "<script>alert('password successfully changed!')</script>";


}else{
echo "<script> alert('password not matched!')</script>";
}


}else{

echo "<script>alert('invalid input!')</script>";
}
}
?>


		</div>
	</div>
</div>

<?php
if(isset($_POST['signup'])){
	if(isset($_POST['email']) && isset($_POST['passcode']) && isset($_POST['repasscode'])){
$email=$_POST['email'];
$passcode=sha1($_POST['passcode']);
$repasscode=sha1($_POST['repasscode']);

if($passcode==$repasscode){
//if verification through mail and validation of email is done then insert this else fail
$query="insert into customer(c_email,c_password) values('$email','$passcode')";
$query_run=mysqli_query($con,$query);
echo "<script>alert('Successfully registered!')</script>";
}
else{
echo "<script>alert('password not matched!')</script>";
}

}
}


// working now






if(isset($_POST['login'])){
	if(isset($_POST['usn']) && isset($_POST['psn'])){
$usn=$_POST['usn'];

$psn=sha1($_POST['psn']);
$query="select * from customer where c_email='$usn' AND c_password='$psn'";
$query_run=mysqli_query($con,$query);
$customer_count=mysqli_num_rows($query_run);
$ip=get_ip_address();
$new_query="select * from cart where ip_address='$ip'";
$run_new_query=mysqli_query($con,$new_query);
$get_row=mysqli_num_rows($run_new_query);

if($customer_count==0){
echo "<script>alert('Username or password is invalid!')</script>";
exit();
}

if($customer_count==1 && $get_row==0){
$_SESSION['c_email']=$usn;
echo "<script>alert('Successfully logged in!')</script>";
echo "<script>window.open('myAccount.php','_self')</script>";

}
else{
$_SESSION['c_email']=$usn;
echo "<script>alert('Successfully logged in!')</script>";
echo "<script>window.open('payment.php','_self')</script>";
}
}

}

?>






