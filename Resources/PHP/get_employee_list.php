<?php
include 'connect.php';
if(isset($_REQUEST['search']))
{
	$keyword = $_REQUEST['keyword'];
	$sql = "SELECT * FROM employees WHERE empName LIKE '%$keyword%' ORDER BY empName DESC";	
}
else
{
	$sql = "SELECT * FROM employees ORDER BY empID DESC";
}
$result = mysqli_query($conn,$sql);
?>