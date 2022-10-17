<?php
include 'connect.php';
$sql = "SELECT * FROM inventory ORDER BY brand DESC";
$result = mysqli_query($conn,$sql);
?>