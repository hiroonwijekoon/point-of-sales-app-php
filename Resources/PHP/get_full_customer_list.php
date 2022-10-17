<?php
include 'connect.php';
$sql = "SELECT * FROM customers_details ORDER BY cus_id DESC";
$result = mysqli_query($conn,$sql);
?>