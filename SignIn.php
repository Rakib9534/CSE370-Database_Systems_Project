<?php
require_once("DBConnect.php");
if (isset($_POST["username"]) && isset($_POST["password"])){
	$u = $_POST["username"];
	$p = $_POST["password"];
	$sql = "select * from admin where user_admin = '$u' and password = '$p'";
	$result = mysqli_query($Checker,$sql);
	if (mysqli_num_rows($result) !=0){
		header("Location: home.php");
	}
	else{
		echo "Invalid username and passoword";
	}

}
?>