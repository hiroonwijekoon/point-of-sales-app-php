<?php
include 'connect.php';
if(isset($_REQUEST['search']))
{
	$keyword = $_REQUEST['keyword'];
	$sql = "SELECT * FROM customers_details WHERE cus_name LIKE '%$keyword%' ORDER BY cus_id DESC";	
}
else
{
	$sql = "SELECT * FROM customers_details ORDER BY cus_id DESC";
}
$result = mysqli_query($conn,$sql);
?>