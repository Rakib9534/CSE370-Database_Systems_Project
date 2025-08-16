<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$DBname     = "TMS";

$Checker = new mysqli($servername, $username, $password, $DBname);

if ($Checker->connect_error) {
    die("Connection Failed: " . $Checker->connect_error);
} else {
    //echo "Connection Success!";
}
?>
