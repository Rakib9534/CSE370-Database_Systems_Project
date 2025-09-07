<?php

session_start();  


unset($_SESSION['user_id']);
unset($_SESSION['username']);


session_destroy();

// Redirect to login page
header("Location: index.php");
exit;
?>
