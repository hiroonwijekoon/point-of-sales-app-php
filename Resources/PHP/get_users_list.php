<?php
include 'connect.php';
if(isset($_REQUEST['search']))
{
	$keyword = $_REQUEST['keyword'];
	$sql = "SELECT * FROM users WHERE full_name LIKE '%$keyword%' ORDER BY user_id DESC";	
}
else
{
	$sql = "SELECT * FROM users ORDER BY user_id DESC";
}
$result = mysqli_query($conn,$sql);
?>