<?php
session_start();
include("includes/db_connect.php");
include("functions/call_func.php");

echo $_SESSION['product_id'];


?>
