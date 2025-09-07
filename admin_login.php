<?php
require_once("DBConnect.php");
if (isset($_POST["username"]) && isset($_POST["password"])){
	$u = $_POST["username"];
	$p = $_POST["password"];
	$sql = "select * from admin where User_Admin = '$u' and password = '$p'";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result) !=0){
		header("Location: home.php");
		//echo "Login successful";
	}
	else{
		echo "Invalid username and passoword";
	}

}
?>