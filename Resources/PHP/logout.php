<?php

session_start();
$_SESSION['username']="";
$_SESSION['user_id']="";
header("Location:../../login.php");

?>