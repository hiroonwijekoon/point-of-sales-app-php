<?php
include 'connect.php';
if(isset($_REQUEST['search']))
{
	$keyword = $_REQUEST['keyword'];
	$sql = "SELECT * FROM inventory WHERE size LIKE '%$keyword%' ORDER BY size DESC";	
}
else
{
	$sql = "SELECT * FROM inventory ORDER BY size DESC";
}
$result = mysqli_query($conn,$sql);
?>