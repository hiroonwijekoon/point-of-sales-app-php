<?php
include 'connect.php';
$sql = "DELETE FROM customers_details WHERE cus_id=".$_REQUEST['cus_id'].";";
$result = mysqli_query($conn,$sql);
if($result)
{
	header("Location:../Pages/customer_manager.php");
}
else
{
	mysqli_error($conn);
}
mysqli_close($conn);
?>